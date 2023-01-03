<?php
session_start();
include('../connect.php');

$query = "DELETE from item_container where id != 0";
$q = $db->prepare($query);
$q->execute();

header("location: ../pos.php");

?>