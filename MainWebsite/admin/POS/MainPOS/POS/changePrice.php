<?php
session_start();
include('../connect.php');
$price = $_POST['selected_price'];
$item_id = $_POST['selected_id'];
if(!empty($item_id)){
$query = "UPDATE item_container set price = $price  WHERE id = $item_id";
$q = $db->prepare($query);
$q->execute();
}
else{
    header("location: ../pos.php");
}
header("location: ../pos.php");

?>