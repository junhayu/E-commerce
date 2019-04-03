<?php
require './database.php';
$name = isset($_POST['name']) ? $_POST['name'] : null;
$menuId = isset($_POST['menu']) ? $_POST['menu'] : null;
$msg = '';

 if(empty($name)||empty($menuId))
{
	$msg ='Input was invalid';
}
else
{
	$name = ucfirst($name);
	$q = "INSERT INTO category (name,menuId)
			VALUES ('$name','$menuId')";
	if ($result=mysqli_query($conn,$q))
	{
	  $msg ='Successful';
	}
	else
	{
		$msg = 'mysql error '. mysqli_error($conn);
	}
} 
echo $msg;
mysqli_close($conn);

?>