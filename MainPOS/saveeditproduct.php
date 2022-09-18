<?php
// configuration
include('../MainPOS/connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$z = $_POST['gen'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['qty'];
$f = $_POST['o_price'];
$g = $_POST['profit'];
$h = $_POST['date_arrival'];
$i = $_POST['sold'];
// query
$sql = "UPDATE products 
        SET product_code=?, gen_name=?, product_name=?, expiry_date=?, price=?, qty=?, o_price=?, profit=?, date_arrival=?, qty_sold=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$c,$d,$e,$f,$g,$h,$i,$id));
header("location: inventory.php");

?>