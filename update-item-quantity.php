<?php
session_start();
$sesid = $_POST['sesid'];
$quantity = $_POST['quantity'];
$_SESSION['invoice'][$sesid]['quantity'] = $quantity;
header("location: create-invoice.php?id={$_POST['cid']}");
?>