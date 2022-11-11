<?php
session_start();
include('../connect.php');
$supplier_name = $_POST['supplier_name'];
$mop = $_POST['mop'];
$delivery_date = $_POST['delivery_date'];
$po_status = "Pending";
$initial = $_POST['initial_amount'];
$p_id = $_POST['p_id'];
$total_amount = 0;
$ordered_quantity = $_POST['ordered_quantity'];
$user = $_SESSION['id'];
foreach($initial as $amount){
    $total_amount += $amount;
}

$query = "INSERT INTO purchase_orders (supplier_name,mop,po_status,total_amount,delivery_date,user_id) VALUES (:supplier_name,:mop,:po_status,:total_amount,:delivery_date,:user_id)";
$q = $db->prepare($query);
$q->execute(array(':supplier_name'=>$supplier_name,':mop'=>$mop,':po_status'=>$po_status,':total_amount'=>$total_amount,':delivery_date'=>$delivery_date,':user_id'=>$user));

$last_id = $db->lastInsertId();

$jsonArray = array();
foreach (array_combine( $p_id, $ordered_quantity ) as $id => $quantity) {
    $jsonArray[] = array('id' => $id, 'quantity' => $quantity);
}

$json = json_encode($jsonArray);
$queries = json_decode($json);
$query = "INSERT INTO purchase_order_items (purchase_order_id,product_id,quantity) VALUES (:purchase_order_id,:product_id,:quantity)";
$q = $db->prepare($query);

foreach($queries as $data){
    $q->execute(array(':purchase_order_id'=>$last_id,':product_id'=>$data->id,':quantity'=>$data->quantity));
}

header("location: ../purchaseorder.php");

?>