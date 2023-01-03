<?php
session_start();
include('connect.php');
include('config.php');
error_reporting(0);

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
$expDate = $_POST['expDate'];;

$query=mysqli_query($con,"select * from products where productCode = '$a'");
$row=mysqli_fetch_array($query);

if($a != $row['productCode']){
    // query
    $sql = "INSERT INTO products (productCode,genName,productName,category,productPrice,productPriceBeforeDiscount,oPrice,profit,productAvailability, postingDate, expDate) VALUES (:a,:b,:c,:d,:f,:e,:g,:h,:i, :date, :expDate)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':e'=>$e,':g'=>$g,':h'=>$h,':i'=>$i, ':date'=>$date, ':expDate'=>$expDate));
    header("location: inventory.php");
}
else{
    echo '<script>alert("Product Exists!");</script>';
    echo '<script>window.location="inventory.php";</script>';
}

?>