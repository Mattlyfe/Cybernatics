<?php
session_start();
include('includes/config.php');

// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && $_POST['paymethod'] == "E-Wallet") {
  
  $rNo = $_POST['referenceno'];
  $id = $_SESSION['id'];
  $target_dir = "admin/POS/MainPOS/referenceno/user id - $id/$rNo/";
  mkdir($target_dir,  0777, true);
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $rNoimg= basename( $target_file);
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      mysqli_query($con,"update orders set 	orderStatus='Pending', paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
      mysqli_query($con,"update order_header set remark='Pending Payment',referenceNo='".$_POST['referenceno']."',  rNoImg='$rNoimg' where transactionId='".$_POST['transactionNo']."'");
      unset($_SESSION['cart']);
      header('location:order-history.php');
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
else if(isset($_POST["submit"]) && $_POST['paymethod'] == "Cash on Delivery"){
  $tNo = $_POST['transactionNo'];
  mysqli_query($con,"update order_header set remark='Pending Payment', referenceNo= 'COD #$tNo' where transactionId='".$_POST['transactionNo']."'");

  mysqli_query($con,"update orders set 	orderStatus='Pending', paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
  unset($_SESSION['cart']);
  header('location:order-history.php');
}
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
            $sql = "SELECT * FROM card_account WHERE card_name = '$cardname' AND card_number = '$cardnum' AND card_cvv = '$cardcvv' AND card_expire = '$cardexp'";
            $results = mysqli_query($con, $sql);
            if (mysqli_num_rows($results) === 1){
                $row = mysqli_fetch_assoc($results);
                if ($row['card_name'] === $cardname || $row['card_number'] === $cardnum 
                || $row['card_cvv'] === $cardcvv || $row['card_expire'] === $cardexp){

                  if(isset($_POST["submit"]) && $_POST['paymethod'] == "Debit/Credit Card"){
                    $tNo = $_POST['transactionNo'];
                    mysqli_query($con,"update order_header set remark='Pending Payment', referenceNo= 'Credit/Debit #$tNo' where transactionId='".$_POST['transactionNo']."'");
                  
                    mysqli_query($con,"update orders set 	orderStatus='Pending', paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
                    unset($_SESSION['cart']);
                    header('location:order-history.php');
                  }
                }
            }
        }
    }

?>