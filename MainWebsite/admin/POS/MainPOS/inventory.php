<html>
    <head>
    <link href="css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

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
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>
    <!-- end of profit compu -->
<div class="invetb">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="bi bi-arrow-bar-left"></i> Back</button></a>
			<?php 
			include('../MainPOS/connect.php');
				$result = $db->prepare("SELECT * FROM products");
				$result->execute();
				$rowcount = $result->rowcount();
			?>

			<?php 
			include('../MainPOS/connect.php');
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
<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="bi bi-plus-circle-fill"></i> Add Product</button></a><br><br>
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
				include('../MainPOS/connect.php');
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
					$categoryName = 'Fashion';
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
			<td><?php echo $row['productAvailability']; ?></td>
			<td>
			<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			</td>			
			<td>
			<a rel="facebox" title="Click to upload Image" href="uploadImage.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success"><i class="bi bi-card-image"></i></button></a>
			<a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning"><i class="bi bi-pass"></i></button></a>
			<a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
			</tr>
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
</body>
</html>