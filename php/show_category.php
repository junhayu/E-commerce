<?php
require_once './db_data.php';
$menu = isset($_POST['menu']) ? $_POST['menu'] : null;
$name='';
$categoriesHtml='';
if(empty($menu))
{
	//require_once('./database.php');
	$q = "SELECT id,name FROM menu";
	$MenuData = new DbData();
	$MenuDataArray = $MenuData->getDbData($q); //get parent categories from database
	$numOfMenu = $MenuData->getNumofData();
	 for($i=0;$i<$numOfMenu;$i++)
	{
		$query ="SELECT category.id,category.name,menu.name as 'menuName',menu.id as 'menuId' FROM category INNER JOIN menu ON menu.id = category.menuId WHERE menuId = '".$MenuDataArray[$i]['id']."'";
		$categoriesHtml .= '<div class="menuTable" data-menu="'.$MenuDataArray[$i]['id'].'">';
		$categoriesHtml .= makeCategoryHtml($MenuDataArray[$i]['id'],$MenuDataArray[$i]['name'],$query); //get html tags for child categories
		
		$categoriesHtml .= '</div>';
		$categoriesHtml .= makeAddChildCategoryButton($MenuDataArray[$i]['id'],$MenuDataArray[$i]['name']);
	} 

	
}
else
{
	$q = "SELECT name FROM menu WHERE id='$menu'";
	$MenuData = new DbData();
	$MenuDataArray = $MenuData->getDbData($q); //get parent categories from database
	$name = $MenuDataArray[0]['name'];
	$query ="SELECT category.id,category.name,menu.id as 'menuId',menu.name as 'menuName' FROM category INNER JOIN menu ON menu.id = category.menuId WHERE menuId = '$menu'";
	$categoriesHtml = makeCategoryHtml($menu,$name,$query);
}
echo $categoriesHtml; // return html tags to ajax call

//creates html tags for parent category
function makeCategoryHtml($menu,$name,$query) {
$productList='';
$productList = '<table class="prodList table admin_category">
					<thead>
						<tr data-id="'.$menu.'">
							<th scope="col">'.$name.'</th>
						</tr>
					</thead>
					<tbody>';
					
$categoriesData = new DbData();
$categoriesDataArray = $categoriesData->getDbData($query); //get child categories from database
$numOfcategories = $categoriesData->getNumofData();
for($i=0;$i<$numOfcategories;$i++)
{
	if($i==0)
	{
		
	}
	$productList .= makeSubCategoryHtml($categoriesDataArray[$i],$menu);
}
$productList .= '</tbody>
					</table>';
	return $productList;
}
//private function used inside 'makeCategoryHtml'. It makes html tags for a child category row 
function makeSubCategoryHtml($categoryData,$menu){
		$output='';
		
		$output .= '<tr class="prodRow" data-menu="'.$menu.'" data-id="'.$categoryData['id'].'">';
        $output .= '<td class="prodItem">'.$categoryData['name'].'</td>'; 
		
		$output .= '</tr>';
		return $output;
	}
function makeAddChildCategoryButton($menu,$name){
		$output='';
		
		$output .= '<button class="btn btn-outline-primary addChildCategory" type="button" data-menu="'.$menu.'" data-toggle="modal" data-target="#addCategoryModal" id="button-addon1">Add '.$name.'</button>';

		return $output;
}
?>