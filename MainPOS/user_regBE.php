<!DOCTYPE html>
<html>
    <head>
    </head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <body>
        <?php
            include("sidenav.php");
            if(isset($_POST['create'])){
                echo 'User submitted.';
            }
        ?>
        <div class="main_content">
            <form action="user_regBE.php" method="post">
                <div class="container">
                    
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <hr class="mb-3">
                        <label for="first_name"><b>First Name</b></label>
                        <input class="form-control" type="text" name="first_name" required>
                        
                        <label for="last_name"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="last_name" required>

                        <label><b>Password</b>
                        <input class="form-control" type="password" name="pswd" id="pswd" required onkeyup='check();' />
                        </label>

                        <label><b>Confirm Password</b>
                        <input class="form-control" type="password" name="cpswd" id="cpswd" required onkeyup='check();' /> 
                        <span id='message'></span>
                        </label>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="sbmt_btn" value="Register">
                    </div>
                    </div>
                    <script>
                    var check = function() {
                        if (document.getElementById('pswd').value ==
                        document.getElementById('cpswd').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'match found';
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'not matching';
                    }
                }</script>
                </div>
            </form>
        </div>
    </body>
</html>