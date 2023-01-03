<?php
// configuration
include('connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['productCode'];
$z = $_POST['genName'];
$b = $_POST['productName'];
$c = $_POST['category'];
$d = $_POST['productPrice'];
$h = $_POST['productPriceBeforeDiscount'];
$e = $_POST['oPrice'];
$f = $_POST['profit'];
$g = $_POST['productAvailability'];
$expDate = $_POST['expDate'];;

// query
$sql = "UPDATE products 
        SET productCode=?, genName=?, productName=?, category=?, productPrice=?, productPriceBeforeDiscount=?, oPrice=?, profit=?, productAvailability=?, expDate=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$c,$d,$h,$e,$f,$g,$expDate,$id));
header("location: inventory.php");

?>