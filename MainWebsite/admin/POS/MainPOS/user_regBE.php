<?php
require_once('config.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
else
{
    session_destroy();
    session_start(); 
}

if (empty($_SESSION['user_name'])) {
    header('Location: login.php');
} else {

if($_SESSION['role'] == "cashier" ){
    header("Location: index.php");
}

else if($_SESSION['role'] == "supplier" ){
    header("Location: purchaseorder.php");
}

else{
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin| Account Registration</title>
    <link rel="shortcut icon" href="img/icon logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="user_regForm.css">
    <body>
        <div class="accCreate_notif">
        <?php
            include("sidenav.php");
        ?>
        </div>
        <div class="main_content">
            <form action="process.php" method="post" name="register" id="register">
                <div class="container">
                    
                <div class="row">
                    <div class="col-sm-3">
                        <img src="img/user_iconLogo.png" alt="user_iconLogo">
                        <h1>Registration</h1>
                        <hr class="mb-3">
                        <label for="first_name"><b>First Name</b></label>
                        <input class="form-control" type="text" name="first_name" id="first_name" maxlength="16" required onkeydown="return /[a-z ]/i.test(event.key)">
                        
                        <label for="last_name"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="last_name" id="last_name" maxlength="16" required onkeydown="return /[a-z ]/i.test(event.key)">

                        <label for="user_name"><b>User Name</b></label>
                        <input class="form-control" type="text" name="user_name" id="user_name" maxlength="16" required>

                        <label for="role"><b>Role</b></label>
                        <select name="role" class="custom-select my-1 mr-sm-2" id="role">
                            <option value="cashier" selected>Cashier</option>
                            <option value="supplier">Supplier</option>
                        </select><br>
                        <br>
                        <label for="password"><b>Password</b>
                        <input class="form-control" type="password" name="password" id="password" maxlength="16" required onkeyup='check();' /> 
                        <input type="checkbox" onclick="myFunction()">Show Password             
                        </label>
                        <label for="confirmpassword"><b>Confirm Password</b>
                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" maxlength="16" required onkeyup='check();' />
                        <span id='message'></span>
                        </label>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="sbmt_btn" id="accregister" value="Register" disabled>
                    </div>
                    </div>

                    <script>
                        function myFunction() {
                        var x = document.getElementById("password");
                        if (x.type === "password") {
                        x.type = "text";
                        } else {
                        x.type = "password";
                        }
                        }
		           </script>        

                    <script>
                    var check = function() {
                    if (document.getElementById('password').value ==
                        document.getElementById('confirmpassword').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'Password matched';
                        document.querySelector('#accregister').disabled = false;
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Password not match';
                        document.querySelector('#accregister').disabled = true;
                    }
                }</script>
                </div>
            </form>
        </div>
        
    </body>
</html>
<?php } 
}?>