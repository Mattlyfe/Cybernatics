<?php
	include('config.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM users_be WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditaccount.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Account:</h4></center>
<hr>
<div id="ac">
<span>First name : </span><input type="text" style="width:359px; height:40px;"  name="First name" value="<?php echo $row['first_name']; ?>" Required/><br>
<span>Last name : </span><input type="text" style="width:359px; height:40px;"  name="Last name" value="<?php echo $row['last_name']; ?>" /><br>
<span>Password : </span><input type="text" style="width:359px; height:40px;" name="password" value="<?php echo $row['password']; ?>"/><br>


<div style="text-align: center; margin-top: 10px">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>