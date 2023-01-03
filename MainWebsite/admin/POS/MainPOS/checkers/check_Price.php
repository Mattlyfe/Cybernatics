<?php 
require_once("../config1.php");
if(!empty($_POST["code"])) {
	$code= $_POST["code"];
	
    $result =mysqli_query($con,"SELECT * FROM products WHERE productCode='$code'");
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);

    if($count>0)
    {
        echo "<h1 style='color:green'> {$row['productName']} </h1>";
        echo "<h1 style='color:green'> PHP {$row['productPrice']}.00 </h1>";
    } else{
        
        echo "<h1 style='color:red'> Product does not exist <h1>";
    }
}


?>
