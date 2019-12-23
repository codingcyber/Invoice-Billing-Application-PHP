<?php
require_once('includes/connect.php');
$sql = "DELETE FROM items WHERE id=?";
$result = $db->prepare($sql);
$res = $result->execute(array($_GET['id']));
if($res){
	//redirect user to view service/products page
	header('location: view-services.php');
}else{
	echo "Failed to Delte Record";
}