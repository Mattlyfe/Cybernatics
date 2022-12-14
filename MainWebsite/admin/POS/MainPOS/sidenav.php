<?php 
@session_start();
?>
<html>
    <head>
        <title>Main POS</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <h3>Sandra's Store</span></h3>
                <ul>
                    <?php
                     if($_SESSION['role'] == "cashier") {
                        echo "<li><a href='index.php'><i class='bx bx-home-circle' ></i>Dashboard</a></li>";
                        echo "<li><a href='inventory.php'><i class='bx bx-food-menu' ></i></i>Inventory</a></li>";
                        echo "<li><a href='purchaseorder.php'><i class='bx bx-purchase-tag-alt'></i></i>Purchase Order</a></li>";
                        echo "<li><a href='onlineorder.php'><i class='bx bx-notepad'></i>Online Orders</a></li>";
                        echo "<li><a href='orderhistory.php'><i class='bx bx-time' ></i></i>Order History</a></li>";
                        echo "<li><a href='logout.php'><i class='bi bi-box-arrow-left' ></i> Log-Out</a></li>";
                     }
                     elseif($_SESSION['role'] == "supplier"){
                        echo "<li><a href='purchaseorder.php'><i class='bx bx-purchase-tag-alt'></i></i>Purchase Order</a></li>";
                        echo "<li><a href='logout.php'><i class='bi bi-box-arrow-left' ></i> Log-Out</a></li>";
                     }else{
                        echo "<li><a href='index.php'><i class='bx bx-home-circle' ></i>Dashboard</a></li>";
                        echo "<li><a href='user_regBE.php'><i class='bx bxs-user-plus'></i>User Registration</a></li>";
                        echo "<li><a href='inventory.php'><i class='bx bx-food-menu' ></i></i>Inventory</a></li>";
                        echo "<li><a href='purchaseorder.php'><i class='bx bx-purchase-tag-alt'></i></i>Purchase Order</a></li>";
                        echo "<li><a href='onlineorder.php'><i class='bx bx-notepad'></i>Online Orders</a></li>";
                        echo "<li><a href='orderhistory.php'><i class='bx bx-time' ></i></i>Order History</a></li>";
                        echo "<li><a href='salesrep.php'><i class='bx bxs-report'></i>Sales Report</a></li>";
                        echo "<li><a href='https://business.facebook.com/latest/inbox/all?asset_id=100776989531652&bpn_id=1548041719000460&nav_id=1044118049&nav_ref=redirect_biz_inbox&mailbox_id=' target='_blank'><i class='bx bxs-chat' ></i>Messages</a></li>";
                        echo "<li><a href='accmngmnt.php'><i class='bx bxs-user-account'></i>Account Management</a></li>";
                        echo "<li><a href='cusaccmngmnt.php'><i class='bx bxs-user-account'></i>Customer Account Management</a></li>";
                        echo "<li><a href='logout.php'><i class='bi bi-box-arrow-left' ></i> Log-Out</a></li>";
                     }
                    ?>
                   
                </ul> 
            </div>
        </div>
    </body>
</html>