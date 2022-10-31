<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
    body{
        padding-bottom: 40px;
    }
    .invetb{
        padding-top: 50px;
        padding-left: 317px;
        padding-right: 200px;
        overflow-y: scroll;
        overflow-x: scroll;
    }
    table, tr, td
    {
        text-align: center;
        padding: 10px;
        border-spacing: 10px;
        border: 3px black solid;
    }
    th
    {
        background-color: #E0E0E0;
        font-size: 17px;
        padding: 5px;
    }
    </style>
    <body>
        <?php
            include("sidenav.php");
        ?>
        <div class="main_content">
            <div class="activeacocunts">
                <h3>Active Accounts on the Store</h3>
            </div>
            <table cellpadding="2" cellspacing = "2" border = "0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("config.php");
                    $cnt=1;
                    $stmt = $conn->prepare(
                        "SELECT * FROM users_be");
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach($users as $user){
                    ?>
                    <tr>
                        <td>
                            <?php echo $user['ID'];?>
                        </td>
                        <td>
                            <?php echo $user['first_name'];?>
                        </td>
                        <td>
                            <?php echo $user['last_name'];?>
                        </td>
                        <td>
                            <?php echo $user['password'];?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>