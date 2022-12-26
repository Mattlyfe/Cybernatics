<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
else
{
    session_destroy();
    session_start(); 
}

if (empty($_SESSION['user_name'])) {
    header('Location: login.php');
} else {

if($_SESSION['role'] == "supplier" ){
    header("Location: purchaseorder.php");
}

else{

?>
<html>
    <head>
	<title>Admin| Inventory</title>
	<link rel="shortcut icon" href="img/icon logo.png">
    <link href="css/bootstrap.css" rel="stylesheet">
<!--link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css"-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<style type="text/css">
  body{
    padding-bottom: 40px;
  }
  .invetb{
    padding-top: 50px;
    padding-left: 317px;
	padding-right: 200px;
  }
  table, tr, td
  {
    text-align: center;
    padding: 10px;
    border-spacing: 10px;
    border: 3px black solid;
  }
  th
  {
    background-color: #E0E0E0;
    font-size: 17px;
	padding: 5px;
  }

  
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">

<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
    </head>
    <body>
        <?php
            include("sidenav.php");
        ?>
        
<!-- profit compu -->
<script>
function sum() {
	var txtFirstNumberValue = document.getElementById('txt1').value;
	var txtSecondNumberValue = document.getElementById('txt2').value;
	var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('txt3').value = result;
	}		
}
</script>


    <!-- end of profit compu -->
<div class="invetb">
<div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Inventory</h3>
		</div>	
<div style="margin-top: -19px; margin-bottom: 21px;">
			<?php 
			include('connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY id");
				$result->execute();
				$rowcount = $result->rowcount();
			?>

			<?php 
			include('connect.php');
				$result = $db->prepare("SELECT * FROM products where productAvailability < 10 ORDER BY id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();

			?>
				<div style="text-align:center;">
			Total Number of Products:  <font color="green" style="font:bold 22px 'Josefin Sans', sans-serif;;">[<?php echo $rowcount;?>]</font>
			</div>
			
			<div style="text-align:center;">
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Josefin Sans', sans-serif;;">[<?php echo $rowcount123;?>]</font> Products are below QTY of 10 
			</div>
</div>
<i class="bi bi-search" style="font-size:26px;"></i> <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<button id="addBtn" data-toggle="modal" data-target="#addModal" class="btn btn-info" style="float:right; width:230px; height:35px;" ><i class="bi bi-plus-circle-fill"></i> Add Product</button>
<br><br>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="addAnnouncementLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column text-center">
				
               <form action="saveproduct.php" method="post">
				<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
				<hr>
				<div id="ac">
				<span>Product Code : </span><input type="text" style="width:359px; height:40px;" name="productCode" id="productCode" onblur="addprodCAvailability()"><br>
				<span id="additem-availability-status" style="font-size:12px;"></span><br>
				<span>Generic Name : </span><input type="text" style="width:359px; height:40px;" name="genName" Required/><br>
				<span>Product Name : </span><textarea style="width:359px; height:40px;" name="productName"> </textarea><br>
				<span>Category : </span><select name ="category" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
					<option selected hidden>Choose...</option>
					<option value="3">Condiments</option>
					<option value="4">Cookies and Crackers</option>
					<option value="5">Dairy</option>
					<option  value="6">Beverages</option>
				</select><br>
				<span>Selling Price : </span><br><input type="text" id="txt1" style="width:359px; height:40px;" name="productPrice" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required><br>
				<span>Before Price : </span><br><input type="text" id="txtB" style="width:359px; height:40px;" name="productPriceBeforeDiscount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required><br>
				<span>Original Price : </span><input type="text" id="txt2" style="width:359px; height:40px;" name="oPrice" onkeyup="sum();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required><br>
				<span>Profit : </span><br><input type="text" id="txt3" style="width:359px; height:40px;" name="profit" readonly><br>

				<span>Quantity : </span><br><input type="number" style="width:359px; height:40px;" min="0" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required ><br>
				<span></span><input type="hidden" style="width:359px; height:40px;" id="txt22" name="qty_sold" Required ><br>
				<div style="text-align: center; margin-top: 10px">
				<button class="btn btn-success btn-block btn-large" style="width:267px;" id="saveProd"><i class="icon icon-save icon-large"></i> Save</button>
				</div>
				</div>

				</form>
            </div>
        </div>
    </div>
  </div>

  <button id="genBtn" data-toggle="modal" data-target="#genBModal" class="btn btn-success" style="float:right; width:230px; height:35px;" ><i class="bi bi-upc"></i> Generate Barcode</button>
<br><br>
<div class="modal fade" id="genBModal" tabindex= "-1" role="dialog" aria-labelledby="addAnnouncementCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="addAnnouncementLongTitle">Generate Barcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column text-center">
				<form method="post">
				<span>Generate New Code : </span><input type="text" style="width:359px; height:40px;" name="genCode" id="genCode" onblur ="prodCAvailability()">
				<input type="text" id="stopper" name="stopper" hidden required><br>
				<span id="item-availability-status" style="font-size:12px;"></span>
					<?php 
					if(isset($_POST['codeSubmit'])){
						$code = $_POST['genCode']; ?>
						
						<script>
							
							let codeSubmit = document.getElementById('codeSubmit');

							codeSubmit.onClick = window.open('barcode_gen.php?genCode=<?php echo $code;?>','popUpWindow','height=500,width=400,left=100,top=100,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=yes');

							
						</script>

					<?php 
					} 
					?>

					<br>
				<button class="btn btn-success btn-block btn-large" style="width:267px;" name="codeSubmit" id="codeSubmit" disabled><i class="icon icon-save icon-large"></i> Submit</button>
				</form>
               
            </div>
        </div>
    </div>
  </div>
<div class="row" style="height:500px; overflow-y: scroll;">
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Product Code </th>
			<th width="12%"> Brand Name </th>
			<th width="14%"> Generic Name </th>
			<th width="13%"> Category / Description </th>
			<th width="9%"> Date Added </th>
			<th width="6%"> Original Price </th>
			<th width="6%"> Selling Price </th>
			<th width="6%"> Before Price </th>
			<th width="6%"> QTY </th>
			<th width="6%"> Total </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('connect.php');
				$result = $db->prepare("SELECT *, productPrice * productAvailability as total FROM products ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['productAvailability'];
				$category = $row['category'];
				
				
				if ($category == 3){
					$categoryName = 'Condiments';
				}

				if ($category == 4){
					$categoryName = 'Cookies and Crackers';
				}

				if ($category == 5){
					$categoryName = 'Dairy';
				}

				if ($category == 6){
					$categoryName = 'Beverages';
				}

				if ($availableqty < 10) {
				echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
				}
				else {
				echo '<tr class="record">';
				}
			?>
			<td><?php echo $row['productCode']; ?></td>
			<td><?php echo $row['productName']; ?></td>
			<td><?php echo $row['genName']; ?></td>
					
			<td><?php echo $categoryName; ?></td>
			<td><?php echo $row['postingDate']; ?></td>

			<td><?php
			$oprice=$row['oPrice'];
			echo formatMoney($oprice, true);
			?></td>
			<td><?php
			$pprice=$row['productPrice'];
			echo formatMoney($pprice, true);
			?></td>
			<td>
			<?php
			$total=$row['productPriceBeforeDiscount'];
			echo formatMoney($total, true);
			?>
			</td>
			<td><?php echo $row['productAvailability']; ?></td>
			<td>
			<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			</td>
			<!-- Action button-->
			<td>
			<a rel="facebox" title="Click to upload Image" href="uploadImage.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success"><i class="bi bi-card-image"></i></button></a>

			<button id="editBtn<?php echo $row['id']; ?>" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pass"></i></button>
			<a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
			</tr>
		
			
	<div class="modal fade" id="editModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="addAnnouncementLongTitle">Edit Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body d-flex flex-column text-center">
			  <form action="saveeditproduct.php" method="post">
					<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
					<hr>
					<div id="ac">
						<input type="hidden" name="memi" value="<?php echo $row['id']; ?>" />
						<span>Product Code : </span><input type="text" style="width:359px; height:40px;"  name="productCode" value="<?php echo $row['productCode']; ?>" Required/><br>
						<span>Generic Name : </span><input type="text" style="width:359px; height:40px;"  name="genName" value="<?php echo $row['genName']; ?>" /><br>
						<span>Product Name : </span><textarea style="width:359px; height:40px;" name="productName"><?php echo $row['productName']; ?> </textarea><br>
						<span>Category : </span><select name="category" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
							<?php
							$cat=$row['category'];
							if($cat== 3)
							{
								?>
									<option value="3" selected>Condiments</option>
									<option value="4" >Cookies and Crackers</option>
									<option value="5">Dairy</option>
									<option  value="6">Beverages</option>
								<?php
							}
							?>
							<?php
							if($cat== 4)
							{
								?>
									<option value="3">Condiments</option>
									<option value="4" selected>Cookies and Crackers</option>
									<option value="5">Dairy</option>
									<option  value="6">Beverages</option>
								<?php
							}
							?>

							<?php
							if($cat== 5)
							{
								?>
									<option value="3">Condiments</option>
									<option value="4">Cookies and Crackers</option>
									<option value="5" selected>Dairy</option>
									<option  value="6">Beverages</option>
								<?php
							}
							?>
							
							<?php
							if($cat== 6)
							{
								?>
									<option value="3">Condiments</option>
									<option value="4">Cookies and Crackers</option>
									<option value="5">Dairy</option>
									<option  value="6" selected>Beverages</option>
								<?php
							}
							?>
						</select><br>
						<span>Selling Price : </span><br><input type="text" style="width:359px; height:40px;" id="txt1<?php echo $row['id']; ?>" value="<?php echo $row['productPrice']; ?>" name="productPrice" onkeyup="sum<?php echo $row['id']; ?>();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required/><br>
						<span>Before Price : </span><br><input type="text" style="width:359px; height:40px;" id="txtB" name="productPriceBeforeDiscount" value="<?php echo $row['productPriceBeforeDiscount']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required/><br>
						<span>Original Price : </span><br><input type="text" style="width:359px; height:40px;" id="txt2<?php echo $row['id']; ?>" value="<?php echo $row['oPrice']; ?>" name="oPrice" onkeyup="sum<?php echo $row['id']; ?>();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" Required/><br>
						<span>Profit : </span><br><input type="text" style="width:359px; height:40px;" id="txt3<?php echo $row['id']; ?>" value="<?php echo $row['profit']; ?>" name="profit"  readonly><br>
						<span>QTY: </span><br><input type="number" style="width:359px; height:40px;" name="productAvailability"  value="<?php echo $row['productAvailability']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/><br>
						<div style="text-align: center; margin-top: 10px">

							<button type="submit" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
						</div>
					</div>
				</form>
              </div>
          </div>
      </div>
    </div>
	<script>
	function sum<?php echo $row['id']; ?>() {
		var txtFirstNumberValue<?php echo $row['id']; ?> = document.getElementById('txt1<?php echo $row['id']; ?>').value;
		var txtSecondNumberValue<?php echo $row['id']; ?> = document.getElementById('txt2<?php echo $row['id']; ?>').value;
		var result<?php echo $row['id']; ?> = parseInt(txtFirstNumberValue<?php echo $row['id']; ?>) - parseInt(txtSecondNumberValue<?php echo $row['id']; ?>);
		if (!isNaN(result<?php echo $row['id']; ?>)) {
			document.getElementById('txt3<?php echo $row['id']; ?>').value = result<?php echo $row['id']; ?>;
		}
				
	}
	</script>
			<?php
                }
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>


 
	

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Product? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

<script>
	function prodCAvailability() {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "checkers/check_productCode.php",
				data:'code='+$("#genCode").val(),
				type: "POST",

			success:function(data){

				$("#item-availability-status").html(data);
				$("#loaderIcon").hide();

			},

			error:function (){}
			});
	}
</script>

<script>
	function addprodCAvailability() {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "checkers/check_addproductCode.php",
				data:'code='+$("#productCode").val(),
				type: "POST",

			success:function(data){

				$("#additem-availability-status").html(data);
				$("#loaderIcon").hide();

			},

			error:function (){}
			});
	}
</script>

</body>
</html>
<?php 
} 
}
?>