<?php
require './database.php';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$path='../';
$query = "SELECT image_path FROM product where id = '$id'";
if ($result=mysqli_query($conn,$query))
  {
	  while ($row = $result->fetch_row()) {
        $path .= $row[0];
    }
	  if(unlink($path))
	  {
		$query = "delete from product where id = '$id'";
		$msg = 'failed';
		if ($result=mysqli_query($conn,$query))
		  {
		  $msg = 'success';
		  
		}
	  }
	  else
	  {
		  $msg = 'Image file could not be deleted '.$path;
	  }
  }
  else
  {
	  $msg = "Error ".mysqli_error($conn);
  }
  echo $msg;
mysqli_close($conn);
?>