<?php
require_once('includes/connect.php');
$sql = "DELETE FROM clients WHERE id=?";
$result = $db->prepare($sql);
$res = $result->execute(array($_GET['id']));
if($res){
	//redirect user to view clients page
	header('location: view-clients.php');
}else{
	echo "Failed to Delte Record";
}