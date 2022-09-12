<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            include("sidenav.php");
            if(isset($_POST['create'])){
                echo 'User submitted.';
            }
        ?>
        <div>
            <form action="user_regBE.php" method="post">
                <div class="container">
                    <h1>Registration</h1>
                    <label for="first_name"><b>First Name</b></label>
                    <input type="text" name="first_name" required>
                    
                    <label for="last_name"><b>Last Name</b></label>
                    <input type="text" name="last_name" required>

                    <label><b>Password</b>
                    <input type="password" name="pswd" id="pswd"  onkeyup='check();' />
                    </label>

                    <label><b>Confirm Password</b>
                    <input type="password" name="cpswd" id="cpswd"  onkeyup='check();' /> 
                    <span id='message'></span>
                    </label>

                    <input type="submit" name="sbmt_btn" value="Register">
                    
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