<?php
    require_once('config.php');
    if(isset($_REQUEST['del'])){
        $uid = intval($_GET['del']);
        $query = "DELETE FROM users_be WHERE ID=:id";
        $query = $db->prepare($sql);
        $query -> bindParam(':id',$uid, PDO::PARAM_STR);
        $query -> execute();

        echo "<script>alert('Record Updated Successfully);</script>";
        echo "<script>window.location.href='accmngmnt.php'</script>"; 
    }
?>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <style>
        .container{
            margin-left: 226px;
            width: 1140px;
        }
        .btn-size{
            padding: -5px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
    </style>
</head>
    <body>
        <?php
            include ('sidenav.php');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h3>Active Accounts on the Store</h3> <hr/>
                    <div class="table-responsive"> 
                        <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT first_name, last_name, password from users_be";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0){
                                foreach($results as $result){
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php echo htmlentities($result->first_name);?></td>
                                        <td><?php echo htmlentities($result->last_name);?></td>
                                        <td><?php echo htmlentities($result->password);?></td>
                                        <td><a href="update.php?id=<?php echo htmlentities($result->id)?>"><button class="btn btn-primary btn-size"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                        <td><a href="index.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-size" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                    </tr>
                            <?php
                            $cnt++;    
                            }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>