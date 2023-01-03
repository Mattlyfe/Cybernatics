<?php
	include('../MainPOS/connect1.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM users_be WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>