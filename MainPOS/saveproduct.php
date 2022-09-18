<?php
session_start();
include('../MainPOS/connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['qty'];
$f = $_POST['o_price'];
$g = $_POST['profit'];
$h = $_POST['gen'];
$i = $_POST['date_arrival'];
$j = $_POST['qty_sold'];
// query
$sql = "INSERT INTO products (product_code,product_name,expiry_date,price,qty,o_price,profit,gen_name,date_arrival,qty_sold) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,));
header("location: inventory.php");


?>