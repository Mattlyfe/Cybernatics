<?php
session_start();
include('../connect.php');
$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE purchase_orders set po_status = '$status' WHERE id = $id";
$q = $db->prepare($query);
$q->execute();

echo "Status updated Successfully";
?>