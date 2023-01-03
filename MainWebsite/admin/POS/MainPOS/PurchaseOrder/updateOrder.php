<?php
session_start();
include('../connect.php');
// $supplier_name = $_POST['supplier_name'];
// $mop = $_POST['mop'];
// $delivery_date = $_POST['delivery_date'];
// $po_status = "Pending";
$initial = $_POST['initial_amount'];
$p_id = $_POST['p_id'];
$total_amount = 0;
$ordered_quantity = $_POST['ordered_quantity'];
$po_id = $_POST['po_id'];

foreach($initial as $amount){
    $total_amount += $amount;
}
$query = "UPDATE purchase_orders set total_amount = :total_amount WHERE id = :po_id";
$q = $db->prepare($query);
$q->execute(array(':total_amount'=>$total_amount,':po_id'=>$po_id));

$jsonArray = array();
foreach (array_combine( $p_id, $ordered_quantity ) as $id => $quantity) {
    $jsonArray[] = array('id' => $id, 'quantity' => $quantity);
}
$json = json_encode($jsonArray);
$queries = json_decode($json);

$query = "UPDATE purchase_order_items set quantity = :quantity WHERE purchase_order_id = :po_id AND product_id = :product_id";
$q = $db->prepare($query);

foreach($queries as $data){
    $q->execute(array(':po_id'=>$po_id,':product_id'=>$data->id,':quantity'=>$data->quantity));
}

header("location: ../purchaseorder.php");

?>