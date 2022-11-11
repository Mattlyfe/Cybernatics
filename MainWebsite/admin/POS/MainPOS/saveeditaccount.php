<?php
// configuration
include('connect1.php');
// new data
$id = $_POST['memi'];
$uname = $_POST['user_name'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$oldpw = $_POST['password'];
$newpw = $_POST['pass'];

if($oldpw == $newpw){
    $sql = "UPDATE users_be 
    SET user_name=?, first_name=?, last_name=?
    WHERE ID=?";
    $q = $db->prepare($sql);
    $q->execute(array($uname,$fname,$lname,$id));
    header("location: accmngmnt.php");
}

else{
    $sql = "UPDATE users_be 
    SET user_name=?, first_name=?, last_name=?, password=?
    WHERE ID=?";
    $q = $db->prepare($sql);
    $q->execute(array($uname,$fname,$lname,md5($newpw),$id));
    header("location: accmngmnt.php");
}

?>