<?php
require './database.php';

$menuId = isset($_POST['menuId']) ? $_POST['menuId'] : null;
$productList = '';
$productList .= '<option value="0">Choose...</option>';
$q = "SELECT * FROM category WHERE menuId = '$menuId'";
if ($result=mysqli_query($conn,$q))
 {
  // Fetch one and one row
  while ($row=mysqli_fetch_assoc($result))
    {
		$productList .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  mysqli_free_result($result);
}
mysqli_close($conn);
echo $productList;

?>