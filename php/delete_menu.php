<?php
require './database.php';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$msg = 'failed';
$path='../';
$query = "SELECT image_path FROM product WHERE menuId = '$id'";
if ($result=mysqli_query($conn,$query))
{
	$imageDeleteError=false;
	while ($row = $result->fetch_row()) {
		$path = '../'.$row[0];
		if(!unlink($path))
		{
			$imageDeleteError=true;
			break;
		}
	}
	if(!$imageDeleteError)
	{
		$query = "DELETE FROM product WHERE menuId='$id';";
		if ($result=mysqli_query($conn,$query))
		{
			$query = "DELETE FROM category WHERE menuId='$id'";
			if ($result=mysqli_query($conn,$query))
			{
				$query = "DELETE FROM menu WHERE id='$id'";
				if ($result=mysqli_query($conn,$query))
				{
					$msg = 'success';
				}
				else
				{
					$msg = 'error '.mysqli_error($conn);
				}
			}
			else
			{
				$msg = 'error '.mysqli_error($conn);
			}
		}
		else
		{
			$msg = 'error '.mysqli_error($conn);
		}
	}
	else
	{
		$msg = 'Image file could not be deleted '.$path;
	}
}
else
{
	$msg = 'error '.mysqli_error($conn);
}

echo $msg;
mysqli_close($conn);
?>