<?php
session_start();
include('../connect.php');
$item_id = $_POST['selected_id'];
if(!empty($item_id)){
$query = "DELETE from item_container where id = $item_id";
$q = $db->prepare($query);
$q->execute();
}
else{
    header("location: ../pos.php");
}
header("location: ../pos.php");

?>