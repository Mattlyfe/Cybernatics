<?php
session_start();
include('../connect.php');
$id = $_POST['id'];
$remark = $_POST['remark'];

$query = "UPDATE order_header set remark = '$remark' WHERE transactionId = $id";
$q = $db->prepare($query);
$q->execute();

echo "Remark updated Successfully";
?>