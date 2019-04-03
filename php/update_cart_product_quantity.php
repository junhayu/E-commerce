<?php
session_start();
	$id=0;
	$qt=0;
	if(isset($_POST['qt']) )
	{
		$id = $_POST['id'];
		$qt = (int)$_POST['qt'];
		if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]['quantity']= $qt;
			$_SESSION['cart'][$id]['subTotal']= round(($qt * $_SESSION['cart'][$id]['price']),2);
		}
		echo 'success';
	}
	else
	{
		echo 'failed';
	}
?>