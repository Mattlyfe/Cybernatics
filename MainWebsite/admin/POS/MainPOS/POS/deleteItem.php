<?php
session_start();
include('../connect.php');
$item_id = $_POST['selected_id'];

$query = "DELETE from item_container where id = $item_id";
$q = $db->prepare($query);
$q->execute();

header("location: ../pos.php");

?>