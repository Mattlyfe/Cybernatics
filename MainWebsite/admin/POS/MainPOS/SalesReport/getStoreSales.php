<?php
session_start();
include('../connect.php');

$query = "SELECT 
(
SELECT sum(products.productPrice) from orders
left join products on products.id = orders.productId
) as 'online',
(
select sum(transactions.total_amount) from transactions
left join transaction_items on transaction_items.transaction_id = transactions.id
) AS 'instore'";
$q = $db->prepare($query);
$q->execute();

$jsonArray = array();
for($i=0; $row = $q->fetch(); $i++){
    $jsonArray[] = array('online' => $row['online'], 'instore' => $row['instore']);
}
echo json_encode($jsonArray);
?>