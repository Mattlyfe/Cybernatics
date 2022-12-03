<?php
require_once('config.php');
error_reporting(0);
?>

<?php 

if(isset($_POST)){
    $first_name           = $_POST['first_name'];
    $last_name            = $_POST['last_name'];
    $user_name            = $_POST['user_name'];
    $role                 = $_POST['role'];
    $password             = $_POST['password'];
    $confirmpassword      = $_POST['confirmpassword'];

    $query=mysqli_query($con,"select * from users_be where user_name = '$user_name'");
    $row=mysqli_fetch_array($query);
    if($password == $confirmpassword){
    if($user_name != $row['user_name']){

        $sql = "INSERT INTO users_be (first_name, last_name, user_name, role, password) VALUES(?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$first_name, $last_name, $user_name, $role, md5($password)]);

        if($result){
            echo '<script>alert("Account Created!");</script>';
            echo '<script>window.location="user_regBE.php";</script>';
        }else{
            echo '<script>alert("There was an error.");</script>';
            echo '<script>window.location="user_regBE.php";</script>';
        }
    }
    else{
        echo '<script>alert("Account Exists!");</script>';
        echo '<script>window.location="user_regBE.php";</script>';
    }


}else{
    echo '<script>alert("Incorrect Password or Confirm Password!");</script>';
    echo '<script>window.location="user_regBE.php";</script>';
}
}
?>