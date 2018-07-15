<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$SQL = "SELECT id, folderId, title FROM files";

$result = ReturnArraySQL($SQL, $DBConn);

echo(json_encode($result, JSON_NUMERIC_CHECK));
