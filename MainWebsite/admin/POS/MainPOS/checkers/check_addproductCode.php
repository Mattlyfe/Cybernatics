<?php 
require_once("../config1.php");
if(!empty($_POST["code"])) {
	$code= $_POST["code"];
	
    $result =mysqli_query($con,"SELECT productCode FROM products WHERE productCode='$code'");
    $count=mysqli_num_rows($result);
    
if($count>0)
{
	echo "<span style='color:red'> Product already exists.</span>";
 	echo "<script>document.querySelector('#saveProd').disabled = true;</script>";
} else{
	
	echo "<span style='color:green'> Product available for Registration.</span>";
 	echo "<script>document.querySelector('#saveProd').disabled = false;</script>";
}
}


?>
