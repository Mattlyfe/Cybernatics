<?php
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
    
if($_SESSION['role'] == "supplier" ){
    header("Location: purchaseorder.php");
}

else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Main POS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
    </head>
    <body>
        <?php
            include("sidenav.php");
            include('connect.php');
        ?>
        <!--Main Content of the Dashboard-->
        <div class="main_content">
            <div class="row">
                <!--To Be Shipped Widget-->
                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-align: center;">
                                                <a> To Be Updated Orders </a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;">
                                                <?php 
                                                    $nullOrder = $db->query("SELECT * FROM order_header WHERE orderStatus is NULL")->rowCount();
                                                    echo "<h4>$nullOrder orders haven't updated</h4>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--Status of Orders Widget-->
                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-align: center;">
                                                In Processed Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;">
                                                <?php 
                                                    $processedOrder = $db->query("SELECT * FROM order_header WHERE orderStatus = 'in Process'")->rowCount();
                                                    echo "<h4>$processedOrder orders being processed</h4>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--Feedback Widget-->
                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-align: center;">
                                                Delivered Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;">
                                                <?php 
                                                    $deliveredOrder = $db->query("SELECT * FROM order_header WHERE orderStatus = 'Delivered'")->rowCount();
                                                    echo "<h4>$deliveredOrder orders been delivered</h4>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <!--Stock Notification Widget-->
                    <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2" style="margin-left: 348px;">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-align: center;">
                                                   <a href="inventory.php"> Stock Notification </a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;">
                                                    <?php 
                                                        $stockNotif = $db->query("SELECT * FROM products where productAvailability < 10")->rowCount();
                                                        echo "<h4>$stockNotif products needed to be restocked soon</h4>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!--Chart of Orders from Online and Onsite Widget-->
            </div>
        </div>
        </div>
    </body>
</html>
<?php }
} ?>