<?php
require_once('includes/connect.php');
$sql = "SELECT id, name FROM items WHERE name LIKE :search LIMIT 5";
$result = $db->prepare($sql);
$result->bindValue(':search', $_GET['search'].'%');
$result->execute();
$res = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
	echo "<li><a href='add-invoice-item.php?id={$row['id']}'>".$row['name']."</a>";
}
?>