<?php
session_start();
include('../connect.php');
$total_amount = $_POST['post_total_amount'];
$cash_tendered = $_POST['post_cash_tendered'];
$changed = $_POST['post_changed'];
$user = $_SESSION['uid'];
$mop = $_POST['mop'];
$codes = $_POST['post_codes'];
$quantity = $_POST['post_quantity'];
$price = $_POST['post_price'];
// foreach($initial as $amount){
//     $total_amount += $amount;
// }
date_default_timezone_set('Asia/Taipei');
$date = date("Y-m-d G:i:s");

$query = "INSERT INTO transactions (total_amount,mop,cash_tendered,changed,user_id,date_created) VALUES (:total_amount,:mop,:cash_tendered,:changed,:user_id,:date_created)";
$q = $db->prepare($query);
$q->execute(array(':total_amount'=>$total_amount,':mop'=>$mop,':cash_tendered'=>$cash_tendered,':changed'=>$changed,':user_id'=>$user, ':date_created'=>$date));
$last_id = $db->lastInsertId();

$arr_codes = preg_split ("/\,/", $codes);
$arr_qty = preg_split ("/\,/", $quantity);
$arr_price = preg_split ("/\,/", $price);

$query = "INSERT INTO transaction_items (product_code,transaction_id,quantity,product_price,date_created) VALUES (:product_code,:transaction_id,:quantity,:prices,:date_created)";
$q = $db->prepare($query);



$output = array();
for($i = 0; $i < count($arr_codes); $i++){
    $output[] = array(
            'code' => $arr_codes[$i],
            'qty' => $arr_qty[$i],
            'price' => $arr_price[$i],
        );
}

foreach($output as $e){
       $q->execute(array(':product_code'=>$e['code'],':transaction_id'=>$last_id,':quantity'=>$e['qty'],':prices'=>$e['price'], ':date_created'=>$date));
}

echo "TR#".$last_id;
// $jsonArray = array();
// foreach (array_combine( $p_id, $ordered_quantity ) as $id => $quantity) {
//     $jsonArray[] = array('id' => $id, 'quantity' => $quantity);
// }

// $json = json_encode($jsonArray);
// $queries = json_decode($json);
// $query = "INSERT INTO transaction_items (purchase_order_id,product_id,quantity) VALUES (:purchase_order_id,:product_id,:quantity)";
// $q = $db->prepare($query);

// foreach($queries as $data){
//     $q->execute(array(':purchase_order_id'=>$last_id,':product_id'=>$data->id,':quantity'=>$data->quantity));
// }

// header("location: ../pos.php");

?>