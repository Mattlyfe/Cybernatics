<?php
session_start();

include('connect.php');

$query = "DELETE from item_container where id != 0";
$q = $db->prepare($query);
$q->execute();

include("config.php");
    $_SESSION['user_name'] = "";
    $_SESSION['name'] = "";
    $_SESSION['uid'] = "";
    $_SESSION['role'] = "";
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="login.php";
</script>
