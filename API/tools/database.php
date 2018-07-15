<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// This was for some stuff that used the database to get the endpoint data.  Didn't want to see that.
// $generalLogState = "ON";
// $generalLogStateOpposate = "OFF";


// DATABASE CONNECTION PARAMETERS
$dsn = "mysql:dbname=$dbname;host=$host";

// WE ALWAYS NEED A DATABASE CONNECTION OBJECT
try {
    $DBConn = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// ANY TIME SOMETHING CALLS PHP WITH GET OR POST PARAMETERS, YOU CAN GET THEM REGARDLESS
function SuperGet($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }elseif(isset($_GET[$name])){
        return $_GET[$name];
    }else{
        return null;
    }
}

// RUN PDO PREPARED STATMENT AND RETURNS THE ASSOCIATIVE ARRAY
function ReturnArrayPrepared($SQL, $arr, $db) {
	$SQL = "/*//////*/  " . $SQL . "  /*--------------------------------------------------------------------*/ \r\n \r\n";
	try{
		$prepSELECT = $db->prepare($SQL);
		$prepSELECT->execute($arr);
		$retarr = $prepSELECT->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
	}
	return $retarr;
}
// RUN PDO PREPARED STATMENT 
function RunPrepared($SQL, $arr, $db) {
	$SQL = "/*//////*/  " . $SQL . "  /*--------------------------------------------------------------------*/ \r\n \r\n";
	try{
		$prepSELECT = $db->prepare($SQL);
		$prepSELECT->execute($arr);
		$retarr = $prepSELECT->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
	}
}
// RUN SQL AND RETURNS THE ASSOCIATIVE ARRAY
function ReturnArraySQL($SQL, $db) {
	$SQL = "/*//////*/  " . $SQL . "  /*--------------------------------------------------------------------*/ \r\n \r\n";
	try{
		$qry = $db->query($SQL);
		$arr = $qry->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
	}
	return $arr;
}
// RUN SQL
function RunSQL($SQL, $db) {
	$SQL = "/*//////*/  " . $SQL . "  /*--------------------------------------------------------------------*/ \r\n \r\n";
	try{
		$qry = $db->query($SQL);
		$arr = $qry->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
	}
}



// PREFIX ARRAY KEYS WITH AN ":" FOR CALLING A PDO PREPARED STATMENT
// function PrefixKeysWithColon($arr){
//     $prefix = ':';
//     $arr = array_combine(
//         array_map(function($v) use ($prefix){
//         return $prefix.$v;
//         }, array_keys($arr)),
//         array_values($arr)
//     );
//     return $arr;
// }

