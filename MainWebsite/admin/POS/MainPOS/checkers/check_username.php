<?php 
require_once("../config1.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	
	$result =mysqli_query($con,"SELECT user_name FROM users_be WHERE user_name='$username'");
	$count=mysqli_num_rows($result);

if($count>0)
{
	echo "<span style='color:red'> Account already exists.</span>";
 	echo "<script>document.querySelector('#accregister').disabled = true;</script>";
} else{
	
	echo "<span style='color:green'> Account available for Registration.</span>";
 	echo "<script>document.querySelector('#accregister').disabled = false;</script>";
	 echo "<script>document.getElementById('#stopper').required = false;</script>";
}
}


?>
