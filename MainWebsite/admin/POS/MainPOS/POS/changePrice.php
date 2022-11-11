<?php
session_start();
include('../connect.php');
$price = $_POST['selected_price'];
$item_id = $_POST['selected_id'];

$query = "UPDATE item_container set price = $price  WHERE id = $item_id";
$q = $db->prepare($query);
$q->execute();

header("location: ../pos.php");

?>