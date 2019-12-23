<?php
session_start();
if(isset($_GET) & !empty($_GET)){
	$itemid = $_GET['id'];
	if(isset($_GET['quant']) & !empty($_GET['quant'])){
		$quant = $_GET['quant'];
	}else{
		$quant = 1;
	}
	$_SESSION['invoice'][] = array(
									"item_id"	=> $itemid,
									"quantity"	=> $quant
									);
}
echo "<pre>";
print_r($_SESSION['invoice']);
echo "</pre>";
?>