<?php
session_start();
include('../connect.php');
$quantity = $_POST['selected_quantity'];
$item_id = $_POST['selected_id'];
if(!empty($item_id)){
$query = "UPDATE item_container set quantity = $quantity WHERE id = $item_id";
$q = $db->prepare($query);
$q->execute();
}
else{
    header("location: ../pos.php");
}
header("location: ../pos.php");

?>