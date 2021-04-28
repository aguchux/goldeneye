<?php

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

//Initialize the Config File
if (file_exists(DOT . '/config/config.php')) {
	include(__DIR__ . '/config/config.php');
	//nclude(__DIR__ . '/config/language.php');
	require __DIR__ . '/vendor/autoload.php';
	date_default_timezone_set(default_timezone);

	$Route = new Apps\Route;
	$Template = new Apps\Template;
	$Core = new Apps\Core;

	//Update live/online status of users//
	if ($Template->authorized) {
		$accid = $Template->storage("accid");
		$Core->setUserInfo($accid, "lastseen", date("Y-m-d g:i:s"));
	}
	//Update live/online status of users//

} else {
	die('config.php not found!');
}
