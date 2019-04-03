<?php
session_start();
	$id=0;
	if(isset($_POST['id']) )
	{
		$id = $_POST['id'];
		if(isset($_SESSION['cart'][$id]))
		{
			unset($_SESSION['cart'][$id]);
		}
		echo 'success';
	}
	else
	{
		echo 'failed';
	}
?>