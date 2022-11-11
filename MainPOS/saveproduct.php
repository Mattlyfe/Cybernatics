<?php
session_start();
include('../MainPOS/connect.php');
$a = $_POST['productCode'];
$b = $_POST['genName'];
$c = $_POST['productName'];
$d = $_POST['category'];
$f = $_POST['productPrice'];
$g = $_POST['oPrice'];
$h = $_POST['profit'];
$i = $_POST['qty'];
// query
$sql = "INSERT INTO products (productCode,genName,productName,category,productPrice,oPrice,profit,productAvailability) VALUES (:a,:b,:c,:d,:f,:g,:h,:i)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i));
header("location: inventory.php");


?>