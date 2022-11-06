<?php
	include('../MainPOS/connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form method="post" action="saveImage.php" enctype="multipart/form-data">
<center><h4><i class="icon-edit icon-large"></i> Upload Image</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Image (3 Images only): </span><input type="file" name="file[]" id="file" required="required" multiple><br>

<div style="float:right; margin-right:10px;">

<button name="submit" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>