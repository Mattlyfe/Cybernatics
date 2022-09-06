<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
        <link rel="stylesheet" type="text/css" href="loginstyles.css">
    </head>
    <body>
        <form action="loginhandle.php" method="POST">
            <h2>Sandra Store Login</h2>
            <?php if(isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php }?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name">

            <label>User Name</label>
            <input type="password" name="password" placeholder="Password">

            <button type="submit">Login</button>
        </form>
    </body>
</html>