<?php
session_start();
	$cnt=0;
	$tp=0.00;
	$res = array();
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $key => $value)
		{
			$cnt += $_SESSION['cart'][$key]['quantity'];
			$tp += $_SESSION['cart'][$key]['subTotal'];
		}
		$res = array(
				"numOfProducts" => $cnt,
				"totalPrice" => $tp
				);
		
	}
	else
	{
		$res = array(
				"numOfProducts" => $cnt,
				"totalPrice" => $tp
				);
	}
	echo json_encode($res);
?>