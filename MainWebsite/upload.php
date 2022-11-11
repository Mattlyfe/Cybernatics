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
      mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
      mysqli_query($con,"update order_header set referenceNo='".$_POST['referenceno']."',  rNoImg='$rNoimg' where transactionId='".$_POST['transactionNo']."'");
      unset($_SESSION['cart']);
      header('location:order-history.php');
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
else if(isset($_POST["submit"]) && $_POST['paymethod'] == "Cash on Delivery"){
  $tNo = $_POST['transactionNo'];
  mysqli_query($con,"update order_header set referenceNo= 'COD #$tNo' where transactionId='".$_POST['transactionNo']."'");

  mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
  unset($_SESSION['cart']);
  header('location:order-history.php');
}

else if(isset($_POST["submit"]) && $_POST['paymethod'] == "Debit/Credit Card"){
  $tNo = $_POST['transactionNo'];
  mysqli_query($con,"update order_header set referenceNo= 'Credit/Debit #$tNo' where transactionId='".$_POST['transactionNo']."'");

  mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and transactionId='".$_POST['transactionNo']."'");
  unset($_SESSION['cart']);
  header('location:order-history.php');
}

?>