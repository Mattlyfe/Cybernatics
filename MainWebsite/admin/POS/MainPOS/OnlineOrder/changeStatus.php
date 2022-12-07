<?php
session_start();
require_once '../../vendor/autoload.php'; 
include('../connect.php');
use Twilio\Rest\Client; 
$id = $_POST['id'];
$status = $_POST['status'];
$from = "+18585446890";


$query = "UPDATE orders set orderStatus = '$status' WHERE id > 0 AND transactionId = $id";
$q = $db->prepare($query);
$q->execute();


$query1 = "SELECT users.first_name,users.last_name,order_header.transactionId, users.contactno FROM users 
LEFT JOIN orders ON orders.userId = users.id
LEFT JOIN order_header ON order_header.transactionId = orders.transactionId 
WHERE order_header.transactionId = '$id'
GROUP BY order_header.transactionId ";
$q1= $db->prepare($query1);
$q1->execute();

$jsonArray = array();
for($i=0; $row = $q1->fetch(); $i++){
    $jsonArray = array('first_name' => $row['first_name'],'last_name' => $row['last_name'], 'contactno' => $row['contactno']);
}

$to = "+63".$jsonArray['contactno'];
$sid    = "AC5bd4b03770b34bc287a4ca1d14b7154d"; 
$token  = "fd024cf7f857964cc7681bd56c4230be"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($to, // to 
                           array(      
                              "from"=>$from,  
                               "body" => "Hi ".$jsonArray['last_name'].", ".$jsonArray['first_name'].", Your Order #OL-0".$id." status is ".$status 
                           ) 
                  ); 

echo "Status updated Successfully";
?>