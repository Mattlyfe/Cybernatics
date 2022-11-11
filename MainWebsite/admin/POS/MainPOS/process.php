<?php
require_once('config.php');
?>

<?php 

if(isset($_POST)){
    $first_name           = $_POST['first_name'];
    $last_name            = $_POST['last_name'];
    $user_name            = $_POST['user_name'];
    $password             = $_POST['password'];
    $confirmpassword      = $_POST['confirmpassword'];

    $sql = "INSERT INTO users_BE (first_name, last_name, user_name, password) VALUES(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$first_name, $last_name, $user_name, $password]);
    if($result){
        echo 'Successfully saved.';
    }else{
        echo 'There were errors while saving the data.';
    }
}else{
    echo 'No data';
}

?>