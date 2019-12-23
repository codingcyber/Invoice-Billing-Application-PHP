<?php
session_start();
if(isset($_GET) & !empty($_GET)){
	$itemid = $_GET['id'];
	// get the customer id from url
	if(isset($_GET['quant']) & !empty($_GET['quant'])){
		$quant = $_GET['quant'];
	}else{
		$quant = 1;
	}
	// increase the quantity, if the item exits in session
	if(isset($_SESSION['invoice'])){
		// search the session for item id using array_search
		$key = array_search($itemid, array_column($_SESSION['invoice'], 'item_id'));
		if(isset($key) && ($key != NULL)){
			// udpate the quantity of the item
			$_SESSION['invoice'][$key]['quantity']++;
		}else{
			// add the new item to session with quantity 1
			echo "Item doesnot exist in session<br>";
			$_SESSION['invoice'][] = array(
									"item_id"	=> $itemid,
									"quantity"	=> $quant
									);
		}
	}else{
		// add the item to session, if the session doesn't exist
		echo "Session doesnot exist<br>";
		$_SESSION['invoice'][] = array(
									"item_id"	=> $itemid,
									"quantity"	=> $quant
									);
	}
	// redirect the user to create-invoice page with customer id
}else{
	// redirect the user to create-invoice page with customer id
}
echo "<pre>";
print_r($_SESSION['invoice']);
echo "</pre>";
//unset($_SESSION['invoice']);
?>