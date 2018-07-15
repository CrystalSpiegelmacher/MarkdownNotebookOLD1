<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("tools/config.php");
require_once("tools/header.php");
require_once("tools/database.php");



header('Content-Type: application/json');

$params = explode("/", $_SERVER['REQUEST_URI']);



if($params[1] == "folders"){
    include("endpoints/folders.php");
}










