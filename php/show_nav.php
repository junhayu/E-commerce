<?php
require_once './db_data.php';

	$q = "SELECT m.id,m.name FROM menu m";
	$MenuData = new DbData();
	$MenuDataArray = array('error' => false);
	$MenuDataArray = $MenuData->getDbData($q); //get parent categories from database
	$numOfMenu = $MenuData->getNumofData();
	for($i=0;$i<$numOfMenu;$i++)
	{
		$q = "SELECT c.id,c.name FROM category c WHERE c.menuId='".$MenuDataArray[$i]['id']."'";
		$CategoryData = new DbData();
		$MenuDataArray[$i]['categories'] = array('error' => false);
		$MenuDataArray[$i]['categories'] = $CategoryData->getDbData($q); //get parent categories from database
	}
echo json_encode($MenuDataArray); // return html tags to ajax call
exit;
?>