<?php
include_once './db_data.php';

$query = "SELECT id,name FROM color";
$colorList = '<table class="prodList table">
					<thead>
						<tr>
							<th scope="col">Name</th>
						</tr>
					</thead>
					<tbody>';
$colorsData = new DbData();
$colorsDataArray = $colorsData->getDbData($query);
$numOfColors = $colorsData->getNumofData();
for($i=0;$i<$numOfColors;$i++)
{
	$colorList .= makeColorHtml($colorsDataArray[$i]);
}
$colorList .= '</tbody></table>';
echo $colorList;

function makeColorHtml($colorData){
		$output='';
		$output .= '<tr class="prodRow" data-id="'.$colorData['id'].'">';
        $output .= '<td class="prodItem">'.$colorData['name'].'</td>'; 
		$output .= '</tr>';
		return $output;
	}
?>