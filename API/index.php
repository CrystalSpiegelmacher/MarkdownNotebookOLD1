<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("tools/config.php");
require_once("tools/header.php");
require_once("tools/database.php");


//----------------------------------------------------------------------------------- CONTENT TYPE
header('Content-Type: application/json');

//----------------------------------------------------------------------------------- URL PARAMETERS
$URIarr = explode("/", $_SERVER['REQUEST_URI']);

$param1 = false; $param2 = false; 
$param1 = $URIarr[1];
if(count($URIarr) > 2){
    $param2 = $URIarr[2];
}




//===================================================================================== GET CONTENT
if($param1 == "filehtml"){
	$fileId = $param2;
	$doParse = true;
	include("./endpoints/content.php");
//===================================================================================== GET MARKDOWN
}else if($param1 == "filemd"){
	$fileId = $param2;
	$doParse = false;
	include("./endpoints/content.php");
//===================================================================================== SAVE MARKDOWN
}else if($param1 == "markdownsave"){
	$fileId = $param2;
	include("./endpoints/markdownsave.php");
//===================================================================================== LIST
}else if($param1 == "files"){
	include("./endpoints/files.php");
//===================================================================================== FOLDERS
}else if($param1 == "folders"){
	include("./endpoints/folders.php");
//===================================================================================== NEW CONTENT SAVE
}else if($param1 == "newcontentsave"){
	include("./endpoints/newcontentsave.php");
//===================================================================================== DELETE CONTENT
}else if($param1 == "deletecontent"){
	$fileId = $param2;
	include("./endpoints/deletecontent.php");
//===================================================================================== BOO BOO
}else{
	echo "The API doesnt know what that endpoint is.";
}


