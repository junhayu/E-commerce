<?php
require './database.php';
$name = isset($_POST['name']) ? $_POST['name'] : null;
$msg = ' ';

 if(empty($name))
{
	$msg ='Input was invalid';
}
else
{
	$name = ucfirst($name);
	$q = "INSERT INTO color (name)
			VALUES ('$name')";
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