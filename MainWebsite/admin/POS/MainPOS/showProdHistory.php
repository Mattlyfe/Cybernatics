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
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Sub-total</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Order Date</th>
                    <th class="cart-description item">Order Status</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>
            <?php include('config1.php');
 $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.transactionId as tId,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid, order_header.orderStatus as oStatus, order_header.grandTotal as gtotal from orders join products on orders.productId=products.id join order_header on orders.transactionId=order_header.transactionId where orders.transactionId=$id and orders.paymentMethod is not null");?>
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
					<td class="cart-product-sub-total">₱ <?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
					<td class="cart-product-grand-total">₱ <?php echo (($qty*$price)+$shippcharge);?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['oStatus']; ?>  </td>
                    
				</tr>
                
<?php } ?>

				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		<h1>Grand total: ₱ <?php echo $gtotal?><h1>
        
        <input type="submit" name="submit" value="Go back" class="btn btn-warning"></form>
