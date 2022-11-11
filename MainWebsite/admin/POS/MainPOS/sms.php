<?php
require_once '../vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC5bd4b03770b34bc287a4ca1d14b7154d"; 
$token  = "fd024cf7f857964cc7681bd56c4230be"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+639562331515", // to 
                           array(      
                                'from'=>"+18585446890",  
                               "body" => "Your message" 
                           ) 
                  ); 
 
print($message->sid)
?>
