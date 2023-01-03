<?php
session_start();
include("includes/config.php");
$_SESSION['login']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE userEmail = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
$_SESSION['login']="";
$_SESSION['id']="";
$_SESSION['username']="";
unset($_SESSION['cart']);
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
