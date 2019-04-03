<?php
require_once './db_data.php';
$queryParams = isset($_POST['queryParams']) ? $_POST['queryParams'] : null;
$menuId = isset($_POST['menuId']) ? $_POST['menuId'] : 1;
$categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 1;
$productList = '';
//if no filter option is selected, use the default one. Otherwise, use 'createQuery' function to create filtered query
$query = ($queryParams==null) ? "SELECT p.id,p.name,p.image_path,p.price,menu.name as 'menuName',color.name as 'colorName',type.name as 'typeName',category.name as 'categoryName' FROM product p
				INNER JOIN color ON color.id=p.colorId
				INNER JOIN category ON category.id=p.categoryId
				INNER JOIN menu ON menu.id=p.menuId
				INNER JOIN type ON type.id = p.typeId WHERE p.categoryId='$categoryId' ORDER BY price ASC" : createQuery($queryParams,$categoryId);
$productsData = new DbData();

$productsDataArray = $productsData->getDbData($query);
$numOfProducts = $productsData->getNumofData();
for($i=0;$i<$numOfProducts;$i++)
{
	$productList .= makeProductHtml($productsDataArray[$i]);
}
$productList .='<input id="itemsFound" type="number" value="'.$numOfProducts.'" hidden />';
echo $productList;

//create html tags for a product
function makeProductHtml($productData){
		$output='';
		
		$output .= '<div class="catItem prodItem j-proditem">';
		$output .= '<div class="inner">';
		$output .= '<a href="./product.php?pid='.$productData['id'].'&name='.$productData['name'].'
		&price='.$productData['price'].'&categoryName='.$productData['categoryName'].'&menuName='.$productData['menuName'].'&colorName='.$productData['colorName'].'&typeName='.$productData['typeName'].'&path='.$productData['image_path'].'" class="j-link">';
		$output .= '<div class="u-imgWrap u-relative">
			<img height="350" width="340" class="img-fluid lazyloaded" src="'.$productData['image_path'].'" alt="Responsive image" >
			</div>';
		$output .= '<div class="textWrap">';
        $output .= '<div class="prodTitle">'.$productData['name'].'</div>'; 
		$output .= '<div class="prodPrice">$'.$productData['price'].'</div>'; 
		$output .= '</div>';
		$output .= '</a>';
		$output .= '</div>';
		$output .= '</div>';
		return $output;
	}

//create query from filtered elements
function createQuery($params,$cId)
	{
		$query="SELECT p.id,p.name,p.image_path,p.price,color.name as 'colorName',type.name as 'typeName',menu.name as 'menuName',category.name as 'categoryName' FROM product p
				INNER JOIN color ON color.id=p.colorId
				INNER JOIN category ON category.id=p.categoryId
				INNER JOIN menu ON menu.id=p.menuId
				INNER JOIN type ON type.id = p.typeId
				WHERE p.categoryId='$cId'";
		$length=0;
		foreach($params as $key => $val)
		{
			$cnt=0;
			if($key !="SORT")
			{
				$query .= " AND ". $key . "ID IN (";
				
				$length = sizeof($val);
				
				foreach($val as $valKey => $value)
				{
					$query .=$val[$valKey];
					$cnt++;
					if($cnt<$length) $query .=",";
				}
				
				$query .= ") ";
			}
		}
		if(array_key_exists("SORT",$params))
		{
			$sortKey ="";
			
		foreach($params["SORT"] as $val)  //runs once
			{
				$sortKey  = $val;
			}
			switch($sortKey)
			{
				case 'SPH':
					$query .= "ORDER BY price DESC";
					break;
				case 'SN':
					$query .= "ORDER BY name ASC";
					break;
				default:
					$query .= "ORDER BY price ASC";
			}
			
		}
		
		return $query;
	}
?>