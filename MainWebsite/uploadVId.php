<?php
session_start();
include('includes/config.php');


// Check if image file is a actual image or fake image
if(isset($_POST["imgSubmit"])) {
    $id = $_SESSION['id'];
    $target_dir = "admin/POS/MainPOS/validIDs/$id/";
    
    if(!file_exists($target_dir) || !is_dir($target_dir)){
      mkdir("$target_dir",  0777, true);
    }
    else{
      rmdir($target_dir);
    }
    for($i=0;$i<2;$i++){
    $uploadOk = 1;
    $filename = $_FILES['file']['name'][$i];
    $target_file = $target_dir.basename($filename);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo '<script> alert("Sorry, only JPG, JPEG, & PNG files are allowed."); </script>';
      echo '<script> window.location = "my-account.php"; </script>';
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo '<script> window.location = "my-account.php"; </script>';
    } else {
      if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file)) {
        
        if($i == 0){
            $front = basename( $target_file);
        }

        if($i == 1){
            $back = basename( $target_file);
            mysqli_query($con, "update users set valid=1, validPicFront='$front', validPicBack='$back' where id='$id'");
            echo '<script>window.location = "my-account.php"</script>';
        }

      } 
      
      else {
        echo "Sorry, there was an error uploading your file.";
        echo '<script>window.location = "my-account.php"</script>';
      }
    }
}


}

if(isset($_POST['update']))
	{
		$first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
		$contactno=$_POST['contactno'];
		$email=$_POST['email'];
		$query=mysqli_query($con,"update users set first_name='$first_name', last_name='$last_name',contactno='$contactno', email='$email' where id='".$_SESSION['id']."'");
		if($query)
		{
            echo "<script>alert('Your info has been updated');</script>";
            
		}
        echo '<script>window.location = "my-account.php"</script>';
	}
?>