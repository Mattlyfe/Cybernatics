<?php
// configuration
include('../MainPOS/connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$z = $_POST['email'];
$b = $_POST['contactno'];
$c = md5($_POST['password']);
$d = $_POST['valid'];

// query
$sql = "UPDATE users 
        SET name=?, email=?, contactno=?, password=?, valid=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$c,$d,$id));
header("location: cusaccmngmnt.php");

?>