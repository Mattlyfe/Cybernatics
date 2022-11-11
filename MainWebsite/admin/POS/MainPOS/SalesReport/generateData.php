<?php
session_start();
include('../connect.php');
$from = $_POST['from'];
$to = $_POST['to'];

$query = "SELECT SUM(transactions.total_amount) as 'total_amount', date_format(transactions.date_created,'%Y-%m-%d') as 'dates' FROM transactions
LEFT JOIN transaction_items ON transaction_items.transaction_id = transactions.id 
WHERE date_format(transactions.date_created,'%Y-%m-%d') BETWEEN '$from' and '$to'
GROUP BY date_format(transactions.date_created,'%Y-%m-%d')";
$q = $db->prepare($query);
$q->execute();

$jsonArray = array();
for($i=0; $row = $q->fetch(); $i++){
    $jsonArray[] = array('total_amount' => $row['total_amount'], 'dates' => $row['dates']);
}
echo json_encode($jsonArray);
?>