<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$SQL = "SELECT text FROM files WHERE id = :id";
$arr = array();
$arr[":id"] = $fileId;
$ret = ReturnArrayPrepared($SQL, $arr, $DBConn);


if(count($ret) == 0){
	echo "That id returned nothing";
}else{
	$markdown = $ret[0]["text"];
	if($doParse){
		require(dirname(__FILE__).'/../vendor/autoload.php');
		$parser = new \cebe\markdown\GithubMarkdown();
		echo $parser->parse($markdown);
	}else{
		echo $markdown;
	}
}
