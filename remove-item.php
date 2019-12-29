<?php
session_start();
$sid = $_GET['sid'];
unset($_SESSION['invoice'][$sid]);
header("location: create-invoice.php?id={$_GET['id']}");
?>