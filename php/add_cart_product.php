<?php
session_start();
	$product=array();
	$qt=0;
	if(isset($_POST['product']) )
	{
		$product =$_POST['product'];
		$qt = (int)$_POST['qt'];
		if(isset($_SESSION['cart'][$product['id']]))
		{
			$_SESSION['cart'][$product['id']]['quantity']+= $qt;
			$_SESSION['cart'][$product['id']]['subTotal'] = round(($_SESSION['cart'][$product['id']]['quantity'] * $_SESSION['cart'][$product['id']]['price']),2);
		}
		else
		{
			$_SESSION['cart'][$product['id']]['quantity'] = $qt;
			$_SESSION['cart'][$product['id']]['name'] = $product['name'];
			$_SESSION['cart'][$product['id']]['price'] = (float)$product['price'];
			$_SESSION['cart'][$product['id']]['path'] = $product['path'];
			$_SESSION['cart'][$product['id']]['subTotal'] = round(($qt * (float)$product['price']),2);
		}
	}
	else
	{
		$product =array('error' => false);
		
	}

	echo json_encode($product);
?>