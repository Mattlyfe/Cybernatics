<?php
session_start();
include('../connect.php');
$item = $_POST['item'];
if(!empty($item)){
    $query = "INSERT INTO item_container (product_code,quantity,price) VALUES (:product_code, 1,0)";
    $q = $db->prepare($query);
    $q->execute(array(':product_code'=>$item));
}
header("location: ../pos.php");
?>