<?php
include_once './db_data.php';

$query = "SELECT p.id,p.name,p.price,p.image_path,m.name as 'menu',c.name as 'color',t.name as 'type',cc.name as 'category' FROM product p INNER JOIN menu m ON p.menuId=m.id
			INNER JOIN color c ON c.id=p.colorId
			INNER JOIN type t ON t.id=p.typeId
			INNER JOIN category cc ON cc.id=p.categoryId";
$productList = '<table class="prodList table">
					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Price</th>
							<th scope="col">Menu</th>
							<th scope="col">Category</th>
							<th scope="col">Color</th>
							<th scope="col">Type</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>';
$productsData = new DbData();
$productsDataArray = $productsData->getDbData($query);
$numOfProducts = $productsData->getNumofData();
for($i=0;$i<$numOfProducts;$i++)
{
	$productList .= makeProductHtml($productsDataArray[$i]);
}
$productList .= '</tbody></table>';
echo $productList;

function makeProductHtml($productData){
		$output='';
		$output .= '<tr class="prodRow" data-path="'.$productData['image_path'].'" data-id="'.$productData['id'].'">';
        $output .= '<td class="prodItem">'.$productData['name'].'</td>'; 
		$output .= '<td class="prodItem">$'.$productData['price'].'</td>'; 
		$output .= '<td class="prodItem">'.$productData['menu'].'</td>'; 
		$output .= '<td class="prodItem">'.$productData['category'].'</td>'; 
		$output .= '<td class="prodItem">'.$productData['color'].'</td>'; 
		$output .= '<td class="prodItem">'.$productData['type'].'</td>'; 
		$output .= '</tr>';
		return $output;
	}
?>