<?php
	include('../MainPOS/connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM orders WHERE productid= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	if(isset($_POST['submit'])){
        header('location:orderhistory.php');
    }
?>
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
</script>
<form name ="submit" method="post">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<center><h4><i class="icon-edit icon-large"></i> Order # <?php echo$id?> Receipt</h4></center>
<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">orderID</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-total item">Sub-total</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Order Date</th>

					

				</tr>
			</thead><!-- /thead -->
			
			<tbody>
            
		<?php include('config1.php');
 $query=mysqli_query($con,"select distinct products.productImage1 as pimg1,products.productName as pname,products.productCode as proid,transaction_items.product_code as opid,transaction_items.transaction_id as tId,transaction_items.quantity as qty,products.productPrice as pprice,transactions.mop as paym,transactions.date_created as odate,transaction_items.id as orderid, transactions.total_amount as gtotal, transactions.user_id as uid from transaction_items join products on transaction_items.product_code=products.productCode join transactions on transaction_items.transaction_id=transactions.id where transaction_items.transaction_id=$id");?>
<?php
while($row=mysqli_fetch_array($query))
{$gtotal = $row['gtotal'];
?>
				<tr>
					<td># <?php echo $tId=$row['tId']; ?></td>
					<td class="cart-image">
						    <img src="productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
					</td>
					<td class="cart-product-name-info">
						
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total">₱ <?php echo $price=$row['pprice']; ?>  </td>
					<td class="cart-product-grand-total">₱ <?php echo ($qty*$price);?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
				</tr>
                
<?php } $query -> close();?>

				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		<h1>Grand total: ₱ <?php echo $gtotal?><h1>
        <input type="submit" name="submit" value="Go back" class="btn btn-warning"></form>
