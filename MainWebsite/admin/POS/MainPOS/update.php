<?php
    require_once ('config.php');
    if(isset($_POST['update'])){
        $userid=intval($_GET['ID']);
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $upass=$_POST['password'];

        $sql="UPDATE users_be SET first_name=:fn, last_name=:ln, password=:pass WHERE ID=:uid";
        $query = $db->prepare($sql);

        $query->bindParam(':fn',$fname,PDO::PARAM_STR);
        $query->bindParam(':ln',$lname,PDO::PARAM_STR);
        $query->bindParam(':pass',$upass,PDO::PARAM_STR);
        $query->bindParam(':uid', $userid,PDO::PARAM_STR);

        $query->execute();

        echo "<script>alert('Record Updated successfully');</script>";
        echo "<script>window.location.href='accmngmnt.php'</script>"; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include ('sidenav.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Update Store Account</h3>
            </div>
            <?php
            $userid=intval($_GET['id']);
            $sql = "SELECT id, first_name, last_name, password FROM users_be WHERE id=:uid";
            $query = $db->prepare($sql);
            $query->bindParam(':uid',$userid,PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
                foreach($results as $result){
                ?>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <b>First Name</b>
                            <input type="text" name="firstname" value="<?php echo htmlentities($result->first_name);?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <b>Last Name</b>
                            <input type="text" name="lastname" value="<?php echo htmlentities($result->last_name);?>" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <b>First Name</b>
                            <input type="password" name="password" value="<?php echo htmlentities($result->password);?>" class="form-control" required>
                        </div>
                    </div>
                    <?php }}?>
                    <div class="row" style="margin-top: 1%">
                        <div class="col-md-8">
                            <input type="submit" name="update" value="Update">
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>