<?php
session_start();
include "config.php";
    if (isset($_POST['nameOnCard'])&& isset($_POST['cardNo'])
    && isset($_POST['cvv'])&& isset($_POST['expYear'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $cardname = validate($_POST['nameOnCard']);
        $cardnum = validate($_POST['cardNo']);
        $cardcvv = validate($_POST['cvv']);
        $cardexp = validate($_POST['expYear']);

        if(empty($cardname) && empty($cardnum) && empty($cardcvv) && empty($cardexp)){
            header("Location: payment-method.php?error=Missing Fields");
            exit();
        }
        else{
            $sql = "SELECT * FROM shopping WHERE card_name = $cardname AND card_number = $cardnum AND card_cvv = $cardcvv AND card_expire = $cardexp";
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results) === 1){
                $row = mysqli_fetch_assoc($results);
                if ($row['card_name'] === $cardname || $row['card_number'] === $cardnum 
                || $row['card_cvv'] === $cardcvv || $row['card_expire'] === $cardexp){
                    
                }
            }
        }
    }
?>