<?php
session_start();
if(!isset($_SESSION['cart'])) $_SESSION['cart']=array();
echo json_encode($_SESSION['cart']);

?>