<?php
require_once('includes/connect.php');
$sql = "SELECT id, name, mobile FROM clients WHERE mobile LIKE :search OR name LIKE :search OR email LIKE :search LIMIT 5";
$result = $db->prepare($sql);
$result->bindValue(':search', $_GET['search'].'%');
$result->execute();
$res = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
	echo "<li><a href='create-invoice.php?id={$row['id']}'>".$row['name']." - ".$row['mobile']."</a>";
}
?>