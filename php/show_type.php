<?php
include_once './db_data.php';

$query = "SELECT id,name FROM type";
$typeList = '<table class="prodList table">
					<thead>
						<tr>
							<th scope="col">Name</th>
						</tr>
					</thead>
					<tbody>';
$typeData = new DbData();
$typeDataArray = $typeData->getDbData($query);
$numOfType = $typeData->getNumofData();
for($i=0;$i<$numOfType;$i++)
{
	$typeList .= makeTypeHtml($typeDataArray[$i]);
}
$typeList .= '</tbody></table>';
echo $typeList;

function makeTypeHtml($typeData){
		$output='';
		$output .= '<tr class="prodRow" data-id="'.$typeData['id'].'">';
        $output .= '<td class="prodItem">'.$typeData['name'].'</td>'; 
		$output .= '</tr>';
		return $output;
	}
?>