<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$SQL = "UPDATE files SET text = :text, title = :title WHERE id = :id";

$arr = array();
$arr[":id"] = $fileId;

$objPay = json_decode($payload);

// var_dump($payload);
// var_dump($objPay);

$arr[":text"] = $objPay->markdown;
$arr[":title"] = $objPay->title;

$result = RunPrepared($SQL, $arr, $DBConn);

echo("{}");