<?php
require_once './db_data.php';

$q = "SELECT id,name FROM menu";
	$MenuData = new DbData();
	$MenuDataArray = $MenuData->getDbData($q); //get parent categories from database
echo json_encode($MenuDataArray);

?>