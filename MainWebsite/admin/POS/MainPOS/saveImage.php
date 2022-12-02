<?php
session_start();
include('connect.php');
error_reporting(0);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $id = $_POST['memi'];
  $target_dir = "productimages/$id/";
  if(!file_exists($target_dir) || !is_dir($target_dir)){
    mkdir("$target_dir",  0777, true);
  }
  else{
    rmdir($target_dir);
  }

  for($i=0;$i<3;$i++){
  $uploadOk = 1;
  $filename = $_FILES['file']['name'][$i];
  $target_file = $target_dir.basename($filename);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo '<script> alert("Sorry, only JPG, JPEG, & PNG files are allowed."); </script>';
    echo '<script> window.location = "inventory.php"; </script>';
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo '<script> window.location = "inventory.php"; </script>';
  } else {
    if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file)) {
      
      if($i == 0){
          $a = basename( $target_file);
      }

      if($i == 1){
          $z = basename( $target_file);
      }

      if($i == 2){
          $b = basename( $target_file);
      }
      
      } 
    
    else {
      echo '<script>alert(Sorry, there was an error uploading your file.)</script>;';
      echo '<script>window.location = "inventory.php"</script>';
    }

  }
}
//new data

  if($uploadOk == 1){
    // query
    $sql = "UPDATE products 
    SET productImage1=?, productImage2=?, productImage3=?
    WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($a,$z,$b,$id));
    
    echo '<script>alert("Product Images Uploaded!")</script>;';
    echo '<script>window.location = "inventory.php"</script>';
  }

  else{
    echo '<script>alert("There was an error uploading the image")</script>;';
    echo '<script>window.location = "inventory.php"</script>';
  }
}
?>