<?php
require './database.php';
$name = isset($_POST['name']) ? $_POST['name'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$menuId = isset($_POST['menu']) ? $_POST['menu'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$category = isset($_POST['category']) ? $_POST['category'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;

$img = $_FILES["productImage"]["name"]; //stores the original filename from the client
$tmp = $_FILES["productImage"]["tmp_name"]; //stores the name of the designated temporary file
$errorimg = $_FILES["productImage"]["error"]; //stores any error code resulting from the transfer

 $target_dir = "../img/";
$target_file = $target_dir .basename($_FILES["productImage"]["name"]);
$path = 'img/'.basename($_FILES["productImage"]["name"]);
$uploadOk = 1;
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$msg = '';
//$msg .= 'file name is ' . $img. ' type ' . $imageFileType; 
if(empty($name) ||empty($price) ||empty($menuId) ||empty($color) ||empty($category) ||empty($type))
{
	$msg ='Input was invalid';
}
else if(file_exists($target_file)) {
    $msg ='Sorry, file already exists.';
}
else
{
	if ( 0 < $errorimg ) {
        $msg =  'Image Transfer Error Code : ' . $errorimg . '<br>';
    }
    else {
		$msg = "Image upload error";
		if(in_array($imageFileType, $valid_extensions))
		{
			 if(move_uploaded_file($tmp,$target_file))
			 {
				 $name = ucfirst($name);
				$q = "INSERT INTO product (name,price,menuId,colorId,typeId,categoryId,image_path)
						VALUES ('$name','$price','$menuId','$color','$type','$category','$path')";
				if ($result=mysqli_query($conn,$q))
				{
				  $msg ='Successful';
				}
				else
				{
					$msg = 'mysql error '. mysqli_error($conn);
				} 
			 }
		}
	}
}

echo $msg;
mysqli_close($conn);

?>