<?php
require_once './db_data.php';
$mid =$_POST['mid']; //parent-category Id
$cid =$_POST['cid']; //sub-category Id
$filterArray=array();
if(empty($cid))  // If it is from a parent category page
{
	$filterArray= array (
				'category' => array(),
				'color' => array(),
				'type' => array()
				);
	$filterArray = fetchOptions($filterArray,$mid); 
}
else  		// If it is from a sub category page
{
	$filterArray= array (
				'color' => array(),
				'type' => array()
				);
	$filterArray = fetchOptions($filterArray,$mid);
}

echo json_encode($filterArray);


function fetchOptions($arr,$mid) {
	 foreach($arr as $key=>$value)
	{
		$query = ($key=='category')? "SELECT id,name FROM $key WHERE menuId=$mid":"SELECT id,name FROM $key";
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