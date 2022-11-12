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
    <body>
        <div class="accCreate_notif">
        <?php
            include("sidenav.php");
        ?>
        </div>
        <div class="main_content">
            <form action="user_regBE.php" method="post" name="register" id="register" onSubmit="return valid();">
                <div class="container">
                    
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <hr class="mb-3">
                        <label for="first_name"><b>First Name</b></label>
                        <input class="form-control" type="text" name="first_name" id="first_name" required onkeydown="return /[a-z ]/i.test(event.key)">
                        
                        <label for="last_name"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="last_name" id="last_name" required onkeydown="return /[a-z ]/i.test(event.key)">

                        <label for="user_name"><b>User Name</b></label>
                        <input class="form-control" type="text" name="user_name" id="user_name" required>

                        <label for="role"><b>Role</b></label>
                        <select name="role" class="custom-select my-1 mr-sm-2" id="role">
                            <option value="admin" selected>Admin</option>
                            <option value="cashier" >Cashier</option>
                            <option value="supplier">Supplier</option>
                        </select><br>

                        <label for="password"><b>Password</b>
                        <input class="form-control" type="password" name="password" id="password" required onkeyup='check();' /> 
                        <input type="checkbox" onclick="myFunction()">Show Password             
                        </label>

                        <label for="confirmpassword"><b>Confirm Password</b>
                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" required onkeyup='check();' />
                        <span id='message'></span>
                        </label>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="sbmt_btn" id="accregister" value="Register">
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
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Password not match';
                    }
                }</script>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script type="text/javascript">
        $(function(){
            $('#accregister').click(function(e){

                var valid = this.form.checkValidity();
                if(valid){

                    var first_name      = $('#first_name').val();
                    var last_name       = $('#last_name').val();
                    var user_name       = $('#user_name').val();
                    var role            = $('#role').val();
                    var password        = $('#password').val();
                    var confirmpassword = $('#confirmpassword').val();

                    e.preventDefault();
                    if(password == confirmpassword){
                    $.ajax({
                        type: 'POST',
                        url:  'process.php',
                        data: {first_name: first_name, last_name: last_name, user_name: user_name, role: role, password: password, confirmpassword: confirmpassword},
                        success: function(data){
                            Swal.fire({
                            'title' : 'Successful.',
                            'text'  : data,
                            'type'  : 'success'
                                        }) , $("#register")[0].reset();
                        },
                        error: function(data){
                            Swal.fire({
                            'title' : 'Error.',
                            'text'  : 'There were errors while creating your account.',
                            'type'  : 'error.'
                                        })
                        }
                    });            
                }
            }
            });
        });
        </script>
    </body>
</html>
<?php } 
}?>