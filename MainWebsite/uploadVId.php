<?php
session_start();
include('includes/config.php');


// Check if image file is a actual image or fake image
if(isset($_POST["imgSubmit"])) {
    $id = $_SESSION['id'];
    mkdir("admin/POS/MainPOS/validIDs/$id/",  0777, true);
    $target_dir = "admin/POS/MainPOS/validIDs/$id/";
    for($i=0;$i<2;$i++){
    $filename = $_FILES['file']['name'][$i];
    $target_file = $target_dir.basename($filename);

  if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file)) {
    echo "The file ". htmlspecialchars( basename( $target_file)). " has been uploaded.";
    
    if($i == 0){
        $front = basename( $target_file);
    }

    if($i == 1){
        $back = basename( $target_file);
    }

  } 
  
  else {
    echo "Sorry, there was an error uploading your file.";
  }
 
}
mysqli_query($con, "update users set valid=1, validPicFront='$front', validPicBack='$back' where id='$id'");
echo '<script>window.location = "my-account.php"</script>';

}

if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$email=$_POST['email'];
		$query=mysqli_query($con,"update users set name='$name',contactno='$contactno', email='$email' where id='".$_SESSION['id']."'");
		if($query)
		{
            echo "<script>alert('Your info has been updated');</script>";
            
		}
        echo '<script>window.location = "my-account.php"</script>';
	}
?>