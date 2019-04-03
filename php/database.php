<?php


$host = "localhost";
$user = "root";
$pswd = "root";
$dbnm = "nood"; 

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $pswd);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	
	
}

// create db if not exists
$db_selected = mysqli_select_db($conn,$dbnm);
 if ($db_selected) {
	mysqli_select_db($conn,$dbnm);
}
else
{
	$createDbQuery = "CREATE DATABASE IF NOT EXISTS ".$dbnm;
	mysqli_query($conn,$createDbQuery);
	mysqli_select_db($conn,$dbnm);
	
	//$root =  $_SERVER["DOCUMENT_ROOT"];
	$root = dirname(__FILE__); 
	//1 - eeeedddd/php
	//2 - eeeedddd
	$createTablesQuery = file_get_contents($root.'/sql/nood.sql');
	$conn->multi_query($createTablesQuery) or die("Failed to execute a sql script from a file: " . mysqli_error());
}

?>
