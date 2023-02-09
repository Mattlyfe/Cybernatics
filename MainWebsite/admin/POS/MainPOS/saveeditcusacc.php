<?php
// configuration
include('../MainPOS/connect.php');
// new data
$id = $_POST['memi'];
$a = $_POST['lname'];
$b = $_POST['fname'];
$z = $_POST['email'];
$c = $_POST['contactno'];
$d = $_POST['password'];
$e = $_POST['valid'];

$pw = $_POST['pass'];

// query
if($d == $pw){
    $sql = "UPDATE users 
    SET last_name=?, first_name=?, email=?, contactno=?, valid=?
    WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($a,$b,$z,$c,$e,$id));
    header("location: cusaccmngmnt.php");
}

else{
    $sql = "UPDATE users 
            SET last_name=?, first_name=?, email=?, contactno=?, password=?, valid=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($a,$b,$z,$c,md5($d),$e,$id));
    header("location: cusaccmngmnt.php");
}

?>