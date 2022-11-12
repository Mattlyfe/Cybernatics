<?php
session_start();
include("config.php");
session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="login.php";
</script>
