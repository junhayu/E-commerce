<?php
require_once './db_data.php';
$modalArray=array();

	$modalArray= array (
				'menu' => array(),
				'color' => array(),
				'type' => array()
				);
	$modalArray = fetchData($modalArray); 


echo json_encode($modalArray);


function fetchData($arr) {
	 foreach($arr as $key=>$value)
	{
		$query = "SELECT id,name FROM $key";
		$filterData = new DbData();
		$filterDataArray = $filterData->getDbData($query);
		$numOfFilters = $filterData->getNumofData();
		for($i=0;$i<$numOfFilters;$i++)
		{
			$arr[$key][$i]['id'] = $filterDataArray[$i]['id'];
			$arr[$key][$i]['name'] = $filterDataArray[$i]['name'];
		}
	} 
	return $arr;
}
?>