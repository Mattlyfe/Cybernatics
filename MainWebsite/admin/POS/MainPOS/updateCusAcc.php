<?php
	include('../MainPOS/connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM users WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcusacc.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Account:</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" style="width:359px; height:40px;"  name="name" value="<?php echo $row['name']; ?>" Required/><br>
<span>E-Mail : </span><input type="text" style="width:359px; height:40px;"  name="email" value="<?php echo $row['email']; ?>" /><br>
<span>Contact Number : </span><input type="text" style="width:359px; height:40px;" name="contactno" value="<?php echo $row['contactno']; ?>"/> <br>
<span>Password : </span><input type="password" style="width:359px; height:40px;" name="password" value="<?php echo $row['password']; ?>"/><br>
<span>Valid : </span><select name ="valid" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
	<?php
	$val= $row['valid'];
	if($val== 0){?>
    <option value="0" selected>No Valid ID's Submitted</option>
    <option value="1" >Validation on-going</option>
    <option value="2">Account Validated</option>
	<?php
	}
	?>
	<?php
	if($val== 1){?>
    <option value="0" >No Valid ID's Submitted</option>
    <option value="1" selected>Validation on-going</option>
    <option value="2">Account Validated</option>
	<?php
	}
	?>

	<?php
	if($val== 2){?>
    <option value="0" >No Valid ID's Submitted</option>
    <option value="1" >Validation on-going</option>
    <option value="2" selected>Account Validated</option>
	<?php
	}
	?>
	
  </select><br>

<div style="text-align: center; margin-top: 10px">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>