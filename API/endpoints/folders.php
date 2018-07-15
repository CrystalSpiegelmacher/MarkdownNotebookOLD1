<?php



$SQL = "SELECT * FROM folders";


$result = ReturnArraySQL($SQL, $DBConn);



echo(json_encode($result, JSON_NUMERIC_CHECK));

