<?php
// configuration
include('connect1.php');
// new data
if(isset($fname) && isset($lname) && isset($pw) ){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $pw = $_POST['password'];

$sql = "UPDATE users_be 
SET first_name=?, last_name=?, password=?,
WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($fname,$lname,$pw));



}

header("location: accmngmnt.php");


?>