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

<i class="bi bi-search" style="font-size:26px;"></i> <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Order..." autocomplete="off" />
<br><br>
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
	$query=mysqli_query($con,"select distinct orders.userId as uid, users.name as uname, order_header.transactionId as transId, order_header.dateCreated as date, order_header.referenceNo as refNo,orders.paymentMethod as paym, order_header.grandTotal as gTotal from order_header join orders on orders.transactionId=order_header.transactionId  join users on users.id=orders.userId where order_header.referenceNo is not null order by transId DESC");


while($row=mysqli_fetch_array($query))
{
?>

				<tr>
					<td class="cart-product-name-info"> #<?php echo $tId = $row['transId'] ?></td>
          <td class="cart-product-name-info"> ID<?php echo $uId = $row['uid'] ?> - <?php echo $row['uname'] ?></td>

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


<?php } ?>
	
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery.js"></script>
</body>
</html>