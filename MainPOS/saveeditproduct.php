<?php
// configuration
include('../MainPOS/connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['productCode'];
$z = $_POST['genName'];
$b = $_POST['productName'];
$c = $_POST['category'];
$d = $_POST['productPrice'];
$e = $_POST['oPrice'];
$f = $_POST['profit'];
$g = $_POST['productAvailability'];

// query
$sql = "UPDATE products 
        SET productCode=?, genName=?, productName=?, category=?, productPrice=?, oPrice=?, profit=?, productAvailability=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$c,$d,$e,$f,$g,$id));
header("location: inventory.php");

?>