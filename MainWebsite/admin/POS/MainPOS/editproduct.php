<?php
	include('../MainPOS/connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Product Code : </span><input type="text" style="width:359px; height:40px;"  name="productCode" value="<?php echo $row['productCode']; ?>" Required/><br>
<span>Generic Name : </span><input type="text" style="width:359px; height:40px;"  name="genName" value="<?php echo $row['genName']; ?>" /><br>
<span>Product Name : </span><textarea style="width:359px; height:40px;" name="productName"><?php echo $row['productName']; ?> </textarea><br>
<span>Category : </span><select name ="category" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
	<?php
	$cat= $row['category'];
	if($cat== 3){?>
    <option value="3" selected>Condiments</option>
    <option value="4" >Cookies and Crackers</option>
    <option value="5">Dairy</option>
    <option  value="6">Fashion</option>
	<?php
	}
	?>
	<?php
	if($cat== 4){?>
    <option value="3">Condiments</option>
    <option value="4" selected>Cookies and Crackers</option>
    <option value="5">Dairy</option>
    <option  value="6">Fashion</option>
	<?php
	}
	?>

	<?php
	if($cat== 5){?>
    <option value="3">Condiments</option>
    <option value="4">Cookies and Crackers</option>
    <option value="5" selected>Dairy</option>
    <option  value="6">Fashion</option>
	<?php
	}
	?>
	
	<?php
	if($cat== 6){?>
    <option value="3">Condiments</option>
    <option value="4">Cookies and Crackers</option>
    <option value="5">Dairy</option>
    <option  value="6" selected>Fashion</option>
	<?php
	}
	?>
  </select><br>
<span>Selling Price : </span><input type="text" style="width:359px; height:40px;" id="txt1" name="productPrice" value="<?php echo $row['productPrice']; ?>" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required/><br>
<span>Original Price : </span><input type="text" style="width:359px; height:40px;" id="txt2" name="oPrice" value="<?php echo $row['oPrice']; ?>" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required/><br>
<span>Profit : </span><input type="text" style="width:359px; height:40px;" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>
<span>QTY: </span><input type="number" style="width:359px; height:40px;" min="0" name="productAvailability" value="<?php echo $row['productAvailability']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/><br>

<div style="text-align: center; margin-top: 10px">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>