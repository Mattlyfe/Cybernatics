<?php
// configuration
include('connect1.php');
// new data
$id = $_POST['memi'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$pw = $_POST['password'];
$sql = "UPDATE users_be 
SET first_name=?, last_name=?, password=?,
WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($fname,$lname,$pw,$id));

header("location: accmngmnt.php");


?>