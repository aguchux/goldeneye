<?php



$Route->add('/admin', function () {

    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Admin | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");

    $DB = new Apps\MysqliDb;
    $Investments = $DB->get("investments");

    $Template->assign("Investments", $Investments);
    $Template->assign("menukey", "dashboard");

    $Template->render("admin.dashboard");

}, 'GET');

$Route->add('/admin/{page}', function ($page) {
    $Template = new Apps\Template("/auth/login");
    $Template->assign("title", "Admin | Golden Eye Capital");
    $Template->addheader("layouts.admin.header");
    $Template->addfooter("layouts.admin.footer");
    $Template->assign("menukey", $page);
    
    $Template->render("admin.{$page}");

}, 'GET');