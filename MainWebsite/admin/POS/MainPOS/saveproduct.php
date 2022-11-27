<?php
session_start();
include('connect.php');
$a = $_POST['productCode'];
$b = $_POST['genName'];
$c = $_POST['productName'];
$d = $_POST['category'];
$f = $_POST['productPrice'];
$e = $_POST['productPriceBeforeDiscount'];
$g = $_POST['oPrice'];
$h = $_POST['profit'];
$i = $_POST['qty'];
date_default_timezone_set('Asia/Taipei');
$date = date("Y-m-d G:i:s");
// query
$sql = "INSERT INTO products (productCode,genName,productName,category,productPrice,productPriceBeforeDiscount,oPrice,profit,productAvailability, postingDate) VALUES (:a,:b,:c,:d,:f,:e,:g,:h,:i, :date)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':e'=>$e,':g'=>$g,':h'=>$h,':i'=>$i, ':date'=>$date));
header("location: inventory.php");


?>