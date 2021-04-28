<?php

$Route->add('/dashboard', function () {

    $Core = new Apps\Core;

    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");

    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;
    $Investments = $DB->where("accid", $Template->storage("accid"))->get("investments");

    $Template->assign("Investments", $Investments);
    $Template->assign("menukey", "dashboard");
    $render = $Core->Kyc($accid, "users.dashboard");

    $Template->render($render);
}, 'GET');

$Route->add('/dashboard/deposits/new', function () {
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");
    $Template->assign("menukey", "Add/Deposit Fund");
    $accid = $Template->storage("accid");
    $Core = new Apps\Core;
    $render = $Core->Kyc($accid, "users.deposit");
    $Template->render($render);
}, 'GET');


$Route->add('/dashboard/withdrawals/new', function () {
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");

    $DB = new Apps\MysqliDb;
    $Wallet = $DB->where("accid", $Template->storage("accid"))->getOne("wallets");
    $Template->assign("Wallet", $Wallet);

    $Template->assign("menukey", "Receive/Withdraw Fund");
    $Template->render("users.withdraw");
    $accid = $Template->storage("accid");
    $Core = new Apps\Core;
    $render = $Core->Kyc($accid, "users.deposit");
    $Template->render($render);
}, 'GET');

$Route->add('/dashboard/{page}', function ($page) {
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");
    $Template->assign("menukey", $page);

    $accid = $Template->storage("accid");
    $Core = new Apps\Core;
    $render = $Core->Kyc($accid, "users.{$page}");
    $Template->render($render);
}, 'GET');

$Route->add('/dashboard/packages/{pid}/select', function ($pid) {
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");
    $Template->assign("menukey", "New Investment");

    $DB = new Apps\MysqliDb;
    $Package = $DB->where("pid", $pid)->getOne("packages");
    $Template->assign("package", $Package);

    $accid = $Template->storage("accid");
    $Core = new Apps\Core;
    $render = $Core->Kyc($accid, "users.investments.new");
    $Template->render($render);
}, 'GET');


$Route->add('/dashboard/investments/{page}', function ($page) {

    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Dashboard | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");
    $Template->assign("menukey", $page);

    $accid = $Template->storage("accid");
    $Core = new Apps\Core;
    $render = $Core->Kyc($accid, "users.investments.{$page}");
    $Template->render($render);
}, 'GET');











$Route->add('/user/forms/deposit', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;

    $method = $data->method;
    $amount = floatval($data->amount);

    $did = $DB->insert("deposits", array(
        "accid" => $accid,
        "amount" => $amount
    ));


    if ($did) {

        //Send Email//


        //Send Email//
        $Template->setError("Your Deposit was created successfully", "success", "/dashboard/deposits");
        $Template->redirect("/dashboard/deposits");
    }
    $Template->setError("Invoice for this deposit failed, try again later", "danger", "/dashboard/deposits/new");
    $Template->redirect("/dashboard/deposits/new");
}, 'POST');





$Route->add('/user/forms/withdraw', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;
    $Wallet = $DB->where("accid", $Template->storage("accid"))->getOne("wallets");
    $balance = floatval($Wallet['balance']);

    $method = $data->method;
    $amount = floatval($data->amount);

    if ($amount <= $balance) {
        $wid = $DB->insert("withdrawals", array(
            "accid" => $accid,
            "amount" => $amount,
            "method" => $method
        ));
        if ($wid) {
            //Send Email//


            //Send Email//
            $Template->setError("Your Withdrawal request was created successfully", "success", "/dashboard/withdrawals");
            $Template->redirect("/dashboard/withdrawals");
        }
        $Template->setError("Your Withdrawal request failed, try again later", "danger", "/dashboard/withdrawals/new");
        $Template->redirect("/dashboard/withdrawals/new");
    }
    $Template->setError("The amount you are withdrawing is more than your account balance.", "danger", "/dashboard/withdrawals/new");
    $Template->redirect("/dashboard/withdrawals/new");
}, 'POST');


$Route->add('/user/forms/profile', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;

    $firstname = $data->firstname;
    $lastname = $data->lastname;
    $email = $data->email;
    $mobile = $data->mobile;
    $address = $data->address;
    $postalcode = $data->postalcode;
    $country = $data->country;
    $currency = $data->currency;

    $updated = $DB->where("accid", $accid)->update("inv_users", array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "mobile" => $mobile,
        "address" => $address,
        "postalcode" => $postalcode,
        "country" => $country,
        "currency" => $currency
    ));
    if ($updated) {
        $Template->setError("Your profile has been updated successfully", "success", "/dashboard/profile");
        $Template->redirect("/dashboard/profile");
    }
    $Template->setError("Profile update failed, try again later", "danger", "/dashboard/profile");
    $Template->redirect("/dashboard/profile");
}, 'POST');




$Route->add('/user/forms/settings', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;

    if (isset($data->emailnotix)) {
        $emailnotix = !$data->emailnotix;
        $updated = $DB->where("accid", $accid)->update("inv_users", array(
            "emailnotix" => $emailnotix
        ));
    }

    if (isset($data->smsnotix)) {
        $smsnotix = !$data->smsnotix;
        $updated = $DB->where("accid", $accid)->update("inv_users", array(
            "smsnotix" => $smsnotix
        ));
    }
    if (isset($data->newsnotix)) {
        $newsnotix = !$data->newsnotix;
        $updated = $DB->where("accid", $accid)->update("inv_users", array(
            "newsnotix" => $newsnotix
        ));
    }

    $Template->setError("Your Settings has been updated successfully", "success", "/dashboard/settings");
    $Template->redirect("/dashboard/settings");
}, 'POST');


$Route->add('/users/forms/kyc/verify', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;
    $DB->where("accid", $accid);

    $FileDir = "./_store/documents/{$accid}/kycs";

    $handle = new \Verot\Upload\Upload($_FILES['documents']);
    if ($handle->uploaded) {
        $handle->file_new_name_body = sha1($_FILES['documents']['name'] .  time());
        $handle->dir_auto_create = true;
        $handle->file_overwrite = true;
        $handle->dir_chmod = 0777;
        $handle->process($FileDir);
        if ($handle->processed) {
            $file_url =  $handle->file_dst_pathname;
            $handle->clean();
            $Core->setUserInfo($accid, "kyc", true);
            $Core->setUserInfo($accid, "kyc_date", date("Y-m-d H:i:s"));
            $Core->setUserInfo($accid, "kyc_document", $file_url);
            $Core->debug($file_url);
        }
    }

    $Template->redirect("/user/kyc");
}, 'POST');


$Route->add('/user/forms/bank/update', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;
    $updated = $DB->where("accid", $accid)->update("inv_users", array(
        "bank_owner_name" => $data->bank_owner_name,
        "bank_owner_address" => $data->bank_owner_address,
        "bank_name" => $data->bank_name,
        "bank_address" => $data->bank_address,
        "bank_account" => $data->bank_account,
        "bank_notes" => $data->bank_notes,
    ));
    if ($updated) {
        $Template->setError("Your bank account details was updated successfully", "success", "/dashboard/bank");
        $Template->redirect("/dashboard/bank");
    }
    $Template->setError("Oops, bank account details update failed", "danger", "/dashboard/bank");
    $Template->redirect("/dashboard/bank");
}, 'POST');





$Route->add('/user/forms/passwordify', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;

    $newpassword = $Core->Passwordify($data->newpassword);
    $confirmpassword = $Core->Passwordify($data->confirmpassword);
    if ($newpassword === $confirmpassword) {
        $updated = $DB->where("accid", $accid)->update("inv_users", array(
            "password" => $newpassword
        ));
        if ($updated) {
            $Template->setError("Your Password was changed successfully", "success", "/dashboard/settings");
            $Template->redirect("/dashboard/settings");
        }
        $Template->setError("Oops, Password update failed", "danger", "/dashboard/settings");
        $Template->redirect("/dashboard/settings");
    }
    $Template->setError("The password did not match.", "warning", "/dashboard/settings");
    $Template->redirect("/dashboard/settings");
}, 'POST');



$Route->add('/user/forms/{pid}/invest', function ($pid) {

    $Core = new Apps\Core;
    $Template = new Apps\Template("/auth/login");

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");
    $accid = $Template->storage("accid");

    $DB = new Apps\MysqliDb;
    $Package = $DB->where("pid", $pid)->getOne("packages");

    $amount = floatval($data->amount);
    $notes = $data->notes;
    $plan = $data->plan;

    $Wallet = $DB->where("accid", $accid)->getOne("wallets");
    $balance = floatval($Wallet['balance']);
    if ($balance >= $amount) {
        //Debit//
        $debit = $DB->where("accid", $accid)->update("wallets", array(
            "balance" => floatval($balance - $amount)
        ));
        //Debit//
        if ($debit) {
            //Send Debit Email//

            //Send Debit Email//

            //Add Transaction//
            $transid = $DB->insert("transactions", array(
                "accid" => $accid,
                "type" => "debit",
                "amount" => $amount,
                "note" => "Deductions for Investment."
            ));
            if ($transid) {
                //Add Investment//
                $startDate = date("Y-m-d H:i:s");
                $roipay = $amount * ($Package["roi"] / 100);

                $Duration = (int)$Package['duration'];
                $inserted = $DB->insert("investments", array(
                    "accid" => $accid,
                    "package" => $pid,
                    "plan" => $plan,
                    "amount" => $amount,
                    "payout" => $amount + $roipay,
                    "notes" => $notes,
                    "starts" => $startDate,
                    "ends" => date('Y-m-d H:i:s', strtotime($startDate . " + {$Duration} days"))
                ));
                if ($inserted) {
                    //Send Investment Email//
                    
                    //Send Investment Email//
                    $Template->setError("You have placed an investment successfully. You investment in now running.", "success", "/dashboard/investments");
                    $Template->redirect("/dashboard/investments");
                }
                //Add Investment//
            }
            //Add Transaction//
        }
        $Template->setError("Oops! we could not place this investment for you. Kindly contact support for assistance.", "danger", "/dashboard/packages/{$pid}/select");
        $Template->redirect("/dashboard/packages/{$pid}/select");
    }
    $Template->setError("You do not have sufficient funding to place this investment, kindly deposit funds into your account and try again.", "danger", "/dashboard/investments");
    $Template->redirect("/dashboard/investments");
}, 'POST');
