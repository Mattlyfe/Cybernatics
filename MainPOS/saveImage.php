<?php
session_start();
include('../MainPOS/connect.php');


$id = $_POST['memi'];
mkdir("uploads/$id/",  0777, true);
$target_dir = "uploads/$id/";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $countfiles = count($_FILES['file']['name']);

    for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    $target_file = $target_dir.basename($filename);

  if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file)) {
    echo "The file ". htmlspecialchars( basename( $target_file)). " has been uploaded.";
    
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
    echo "Sorry, there was an error uploading your file.";
  }
 
}
//new data


// query
$sql = "UPDATE products 
SET productImage1=?, productImage2=?, productImage3=?
WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$id));
header("location: inventory.php");
}

?>