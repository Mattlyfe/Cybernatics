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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                To Be Shipped</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">4 Orders To Be Shipped</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Status of Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Sana -> Pending Payment</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--Feedback Widget-->
                <!--Stock Notification Widget-->
                <!--Chart of Orders from Online and Onsite Widget-->
                <!--Website Traffic Widget-->
            </div>
            <div>
            </div>
        </div>
    </body>
</html>