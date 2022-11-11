<?php
session_start();
include('../connect.php');

$id = $_POST['id'];

$query = "DELETE FROM order_header where transactionId = '$id'";
$q = $db->prepare($query);
$q->execute();

$query1 = "DELETE FROM orders WHERE id > 0 AND transactionId = '$id'";
$q1 = $db->prepare($query1);
$q1->execute();

echo "Order deleted Successfully";
?>