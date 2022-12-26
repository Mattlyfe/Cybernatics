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

if($_SESSION['role'] == "supplier" ){
    header("Location: purchaseorder.php");
}

else{
?>
<html>
    <head>
    <link href="css/bootstrap.css" rel="stylesheet">
	<title>Admin| Order History</title>
	<link rel="shortcut icon" href="img/icon logo.png">
<link href="css/bootstrap-responsive.css" rel="stylesheet">

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
	overflow-y: scroll;
	overflow-x: scroll;
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

<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel1.png'
    })
  })
  $(document).bind('afterClose.facebox');
</script>

    </head>
    <body>
        <?php
            include("sidenav.php");
        ?>

<div class="invetb">
<div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Order History</h3>
		</div>	
<div class="mb-4">
		<span>Transaction No. :</span> 
		<i class="bi bi-search" style="font-size:26px;"></i> <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Order..." autocomplete="off" />
		
		</div><br><br>
<div class="row" style="height:500px; overflow-y: scroll;">
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Transaction No. </th>
      		<th width="12%"> Ordered By </th>
			<th width="9%"> Date Received </th>
			<th width="14%"> Mode of Payment </th>
			<th width="13%"> Reference no. </th>
			<th width="8%"> Total </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
	<tbody>
	<?php include('config1.php');
	$query=mysqli_query($con,"select distinct orders.userId as uid, users.first_name as fname,users.last_name as lname, order_header.transactionId as transId, order_header.dateCreated as date, order_header.referenceNo as refNo,orders.paymentMethod as paym, order_header.grandTotal as gTotal from order_header join orders on orders.transactionId=order_header.transactionId  join users on users.id=orders.userId where order_header.referenceNo is not null order by transId DESC");


while($row=mysqli_fetch_array($query))
{
?>

				<tr>
					<td class="cart-product-name-info"> OL-0<?php echo $tId = $row['transId'] ?></td>
					<?php $name = $row['lname']. ', ' . $row['fname']?>
          			<td class="cart-product-name-info"> ID<?php echo $uId = $row['uid'] ?> - <?php echo $name ?></td>

					<td class="cart-product-name-info">
						
						<?php echo $row['date'];?></a></h4>
						
					</td>

					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>

					<td class="cart-product-sub-total"><?php echo $row['refNo']; ?>  </td>

					<td class="cart-product-sub-total">₱<?php echo $row['gTotal']; ?>  </td>

					<td>
					<a rel="facebox" title="Click to check reciept" href="showProdHistory.php?id=<?php echo $row['transId']; ?>"><button class="btn btn-warning"><i class="bi bi-receipt"></i></button></a>
					</td>
				</tr>


<?php 
} 
	$query=mysqli_query($con,"select distinct transactions.id as transId, transactions.date_created as date, transactions.mop as paym, transactions.total_amount as gTotal from transactions join transaction_items on transaction_items.transaction_id=transactions.id order by transId DESC");


while($row=mysqli_fetch_array($query))
{
    $tId = $row['transId'];
?>

				<tr>
					<td class="cart-product-name-info"> TR#<?php echo $row['transId']; ?></td>
          <td class="cart-product-name-info"> Instore</td>

					<td class="cart-product-name-info">
						
						<?php echo $row['date'];?></a></h4>
						
					</td>

					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>

					<td class="cart-product-sub-total">In-Store #<?php echo $tId; ?>  </td>

					<td class="cart-product-sub-total">₱<?php echo $row['gTotal']; ?>  </td>

					<td>
					<a rel="facebox" title="Click to check reciept" href="showProdHistoryIS.php?id=<?php echo $row['transId']; ?>"><button class="btn btn-warning"><i class="bi bi-receipt"></i></button></a>
					</td>
				</tr>
				
<?php 
} 
?>
	</tbody>
</table>
<script>
		function search() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("resultTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
				}
			}
		}
</script>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery.js"></script>
</body>
</html>
<?php 
} 
?>