<?php
session_start();
include('../connect.php');
$date_today = $_POST['date_today'];


// $query = "SELECT SUM(transactions.total_amount) as 'total_amount' FROM transactions
// LEFT JOIN transaction_items ON transaction_items.transaction_id = transactions.id 
// WHERE date_format(transactions.date_created,'%Y-%m-%d') = '$date_today'";

$query = "SELECT 
SUM(A.total_amount) as 'total_amount'
FROM
(SELECT 
    IFNULL(SUM(grandTotal), 0) AS 'total_amount'
FROM
    order_header
WHERE
    DATE_FORMAT(dateCreated, '%Y-%m-%d') = '$date_today' UNION ALL SELECT 
    IFNULL(SUM(transactions.total_amount), 0) AS 'total_amount'
FROM
    transactions
LEFT JOIN transaction_items ON transaction_items.transaction_id = transactions.id
WHERE
    DATE_FORMAT(transactions.date_created, '%Y-%m-%d') = '$date_today') A;";

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
$q = $db->prepare($query);
$q->execute();

$jsonArray = array();
for($i=0; $row = $q->fetch(); $i++){
    $jsonArray[] = array('total_amount' => $row['total_amount']);
}
echo json_encode($jsonArray);
?>