<?php
session_start();
include('../connect.php');
if(isset($_POST['date']) != null){
    $date = $_POST['date'];
    $query = "SELECT sum(total_amount) as 'ta' FROM transactions
    left join transaction_items on transaction_items.transaction_id = transactions.id
    left join products on products.productCode = transaction_items.product_code where transaction_items.date_created LIKE '%$date%';";
    $q = $db->prepare($query);
    $q->execute();
    $row = $q->fetch();
    $total = 0;
    foreach($row as $ro){
        $total = $ro;
    }
    echo $total;
}

?>