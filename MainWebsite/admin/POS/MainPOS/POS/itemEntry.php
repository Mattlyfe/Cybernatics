<?php
session_start();
include('../connect.php');
$item = $_POST['item'];
$query2 = "SELECT * FROM products where productCode='$item'";
    $q2 = $db->prepare($query2);
    $q2->execute();
    $row1=$q2->fetch();

if(!empty($item) && $item == $row1['productCode']){
    $query1 = "SELECT * FROM item_container where product_code='$item'";
    $q1 = $db->prepare($query1);
    $q1->execute();
    $row=$q1->fetch();

    if($item == $row['product_code']){
        $quantity = $row['quantity'];
        $quantity++;

        $query = "UPDATE item_container set quantity = $quantity WHERE product_code = $item";
        $q = $db->prepare($query);
        $q->execute();
    }
    else{
    $query = "INSERT INTO item_container (product_code,quantity,price) VALUES (:product_code, 1,0)";
    $q = $db->prepare($query);
    $q->execute(array(':product_code'=>$item));
    }
}

else 
{
    header("location: ../pos.php");
}
header("location: ../pos.php");
?>