<?php
session_start();
include('../connect.php');
$po_id = $_POST['po_id'];

$query = "DELETE from purchase_orders where id = :po_id";
$q = $db->prepare($query);
$q->execute(array(':po_id'=>$po_id));

$query = "DELETE from purchase_order_items where purchase_order_id = :po_id";
$q = $db->prepare($query);
$q->execute(array(':po_id'=>$po_id));

header("location: ../purchaseorder.php");

?>