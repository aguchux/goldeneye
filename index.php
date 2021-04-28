<?php


define('DOT', '.');
include DOT . "/bootstrap.php";

//Home page//
$Route->add('/', function () {
 
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Welcome | Golden Eye Capitals");
    $Template->render("home");

}, 'GET');
//Home page//

//Pages
$Route->add('/pages/{page}', function ($page) {  
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title","Golden Eye Capitals - {$page}");
    $Template->render("pages.{$page}");
}, 'GET');
$Route->add("/pages/{category}/{page}", function($category,$page){
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "Golden Eye Capitals - {$page}");
    $Template->render("{$category}.{$page}");
}, "GET");
//Pages//

require_once DOT . "/_public/auth.php";
require_once DOT . "/_public/users.php";

//Logout Sessions//
$Route->add(
    '/auth/logout',
    function () {
        $Template = new Apps\Template;
        $Template->expire();
        $Template->cleanAll(session_delete_timout);
        $Template->redirect(auth_url);
    },
    'GET'
);
//Logout Sessions//



$Route->run('/');
