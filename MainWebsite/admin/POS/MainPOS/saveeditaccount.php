<?php
// configuration
include('connect1.php');
// new data
$id = $_POST['memi'];
$uname = $_POST['user_name'];
$role = $_POST['role'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$oldpw = $_POST['password'];
$newpw = $_POST['pass'];

if($oldpw == $newpw){
    $sql = "UPDATE users_be 
    SET user_name=?, role=?, first_name=?, last_name=?
    WHERE ID=?";
    $q = $db->prepare($sql);
    $q->execute(array($uname,$role,$fname,$lname,$id));
    header("location: accmngmnt.php");
}

else{
    $sql = "UPDATE users_be 
    SET user_name=?, role=?, first_name=?, last_name=?, password=?
    WHERE ID=?";
    $q = $db->prepare($sql);
    $q->execute(array($uname,$role,$fname,$lname,md5($oldpw),$id));
    header("location: accmngmnt.php");
}

?>