<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
        <link rel="shortcut icon" href="img/icon logo.png">
        <link rel="stylesheet" type="text/css" href="loginstyles.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    </head>
    <body>
        <form action="loginhandle.php" method="POST">
            <div>
                <img src="/MainWebsite/admin/POS/MainPOS/img/storelogo.png" alt="" class="storeLogo">
            </div>
            <h2>Employee Login</h2>
            <?php if(isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php }?>
            <div class="loginField">
                <label>User Name</label>
                <input type="text" name="uname" placeholder="User Name">
            </div>
            <div class="loginField">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="loginBtn">
                    <span class="button__text">LOG IN </span>
                    <i class="loginIcon fas fa-chevron-right"></i>
            </button>	
        </form>
    </body>
</html>