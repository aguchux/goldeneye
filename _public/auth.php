<?php


$Route->add('/auth/login', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Login : Golden Eye Capital");
    $Template->render("login");
}, 'GET');

$Route->add('/auth/forms/login', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");

    $username = $data->username;
    $password = $Core->Passwordify($data->password);

    $Login = $Core->Login($username, $password);
    if (isset($Login->accid)) {
        if ($Login->enabled) {
            $Template->authorize($Login->accid);
            $Template->redirect("/dashboard");
        }
        $Template->setError("Your account is not verified. Kindly check your email and verify your account", "warning", "/auth/login");
        $Template->redirect("/auth/login");
    }
    $Template->setError("Invallid Username OR Password", "danger", "/auth/login");
    $Template->redirect("/auth/login");
}, 'POST');


$Route->add('/auth/register', function () {

    $Template = new Apps\Template;
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Register : Golden Eye Capital");
    $Template->render("register");
}, 'GET');


$Route->add('/auth/verify/{link}', function ($link) {

    $Template = new Apps\Template;
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");

    $DB = new Apps\MysqliDb;
    $record = $DB->where("vcode", $link)->getOne("inv_users");
    $accid = (int)$record['accid'];
    if ($accid) {
        $DB->where("accid", $accid)->update("inv_users", array(
            "enabled" => 1,
            "vcode" => NULL
        ));
        $Template->setError("Congratulations, your account has been activated successfully.", "success", "/auth/login");
        $Template->redirect("/auth/login");
    }
    $Template->setError("Oops! we are sorry the link has either expired or is wrong.", "danger", "/auth/login");
    $Template->redirect("/auth/login");
}, 'GET');

$Route->add('/auth/forms/register', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $DB = new Apps\MysqliDb;

    $data = $Core->data;

    $token = $Template->storage("token");
    $Template->token($token, "/auth/login");

    $firstname = $data->firstname;
    $lastname = $data->lastname;
    $email = $data->email;
    $mobile = $data->mobile;
    $address = $data->address;
    $postalcode = $data->postalcode;
    $country = $data->country;
    $currency = $data->currency;
    $password = $Core->Passwordify($data->password);

    $record = $DB->where("email", $email)->orWhere("mobile", $mobile)->getOne("inv_users");
    if (isset($record['accid'])) {
        $Template->setError("Email already in use", "danger", "/auth/register");
        $Template->redirect("/auth/register");
    }

    $vcode = $Core->GenOTP();
    $pvcode = $Core->Passwordify($vcode . $email . $mobile);

    $added = (int)$DB->insert("inv_users", array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "mobile" => $mobile,
        "address" => $address,
        "postalcode" => $postalcode,
        "country" => $country,
        "currency" => $currency,
        "password" => $password,
        "vcode" => $pvcode
    ));

    if ($added) {
        $wallid = (int)$DB->insert("wallets", array(
            "accid" => $added
        ));
        if ($wallid) {
            if (express_login_after_registration) {
                $Template->authorize($added);
                $Template->redirect("/dashboard");
            } else {

                $subject = "Welcome {$firstname}, verify your account";
                $message = "Hello {$firstname} {$lastname}, thank you for joining Golden Eye Capital. Click the following link to activate your account. 
                <p><a href=\"https://goldeneyecapitals.com/auth/verify/{$pvcode}\">https://goldeneyecapitals.com/auth/verify/{$pvcode}</a>.</p>";

                //Email Notix//
                $Mailer = new Apps\Emailer();
                $EmailTemplate = new Apps\EmailTemplate('mails.welcome');
                $EmailTemplate->subject = $subject;
                $EmailTemplate->otp = $pvcode;
                $EmailTemplate->fullname = "{$firstname} {$lastname}";
                $EmailTemplate->mailbody = $message;

                $Mailer->fromEmail = "NoReply@goldeneyecapitals.com";
                $Mailer->fromName = "NoReply@GoldenEyeCapital";
                $Mailer->replyEmail = "info@goldeneyecapitals.com";
                $Mailer->replyName = "NoReply@GoldenEyeCapital";

                $Mailer->subject = $subject;
                $Mailer->SetTemplate($EmailTemplate);
                $Mailer->toEmail = $email;
                $Mailer->send();
                //Email Notix//

                $Template->setError("<strong>Cogratulations!</strong> Your account is created successfully. Kindly check your email to activate your account.", "success", "/auth/login");
                $Template->redirect("/auth/login");
            }
        }
        $del = $DB->where("accid", $added)->delete("inv_users");
        $Template->setError("So sorry, wallet creation failed. You can try agian later.", "danger", "/auth/register");
        $Template->redirect("/auth/register");
    }
    $Template->setError("So sorry, registration failed. You can try agian later.", "danger", "/auth/register");
    $Template->redirect("/auth/register");
}, 'POST');


$Route->add('/auth/reset', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Reset Account : Golden Eye Capital");
    $Template->render("reset");
}, 'GET');

$Route->add('/auth/forms/reset', function () {

    $Core = new Apps\Core;
    $Template = new Apps\Template;

    $DB = new Apps\MysqliDb;

    $data = $Core->data;
    $token = $Template->storage("token");
    $Template->token($token, "/auth/reset");
    $username = $data->username;
    $record = $DB->where("email", $username)->getOne("inv_users");
    if (isset($record['accid'])) {
        $Template->store("ThisUser", "{$record['firstname']} {$record['lastname']}");
        $Template->store("accid", $record['accid']);
        $Template->redirect("/auth/edit-password");
    }
    $Template->setError("Account not found, kindly recheck and try again", "danger", "/auth/reset");
    $Template->redirect("/auth/reset");
}, 'POST');


$Route->add('/auth/edit-password', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.auth.header");
    $Template->addfooter("layouts.auth.footer");
    $Template->assign("title", "Change Password : Golden Eye Capital");
    $Template->render("edit-password");
}, 'GET');


$Route->add('/auth/forms/edit-password', function () {
    $Core = new Apps\Core;
    $Template = new Apps\Template;
    $DB = new Apps\MysqliDb;
    $data = $Core->data;
    $token = $Template->storage("token");
    $Template->token($token, "/auth/edit-password");
    $password = $data->password;
    $passwordcmf = $data->password_cmf;
    if ($password === $passwordcmf) {
        $accid = $Template->storage("accid");
        $password = $Core->Passwordify($password);
        $done = $DB->where("accid", $accid)->update("inv_users", array(
            "password" => $password
        ));
        if ($done) {
            $Template->expire();
            $Template->setError("Password changed successfully, login to your account.", "success", "/auth/login");
            $Template->redirect("/auth/login");
        }
        $Template->setError("Password change failed.", "danger", "/auth/reset");
        $Template->redirect("/auth/reset");
    }
    $Template->setError("Password did not match", "danger", "/auth/edit-password");
    $Template->redirect("/auth/edit-password");
}, 'POST');
