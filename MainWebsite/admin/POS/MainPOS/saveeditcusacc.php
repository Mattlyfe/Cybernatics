<?php
// configuration
include('../MainPOS/connect.php');
// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$z = $_POST['email'];
$b = $_POST['contactno'];
$c = $_POST['password'];
$d = $_POST['valid'];

$pw = $_POST['pass'];

// query
if($c == $pw){
    $sql = "UPDATE users 
    SET name=?, email=?, contactno=?, valid=?
    WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($a,$z,$b,$d,$id));
    header("location: cusaccmngmnt.php");
}

else{
    $sql = "UPDATE users 
            SET name=?, email=?, contactno=?, password=?, valid=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($a,$z,$b,md5($c),$d,$id));
    header("location: cusaccmngmnt.php");
}

?>