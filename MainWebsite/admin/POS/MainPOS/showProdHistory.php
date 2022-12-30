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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
<table class="table table-bordered" >
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
                    <th class="cart-description item">Order Status</th>
					
					<th class="cart-description item">Reference No. Pic</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>
            <?php include('config1.php');
 $query=mysqli_query($con,"select distinct products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.transactionId as tId,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid, orders.orderStatus as oStatus, order_header.grandTotal as gtotal, order_header.referenceNo as rNo, order_header.rNoImg as rnoimg, orders.userid as uid from orders join products on orders.productId=products.id join order_header on orders.transactionId=order_header.transactionId where orders.transactionId=$id and orders.paymentMethod is not null");?>
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
					<td class="cart-product-sub-total"><?php echo $row['oStatus']; ?>  </td>
					<?php if($row['paym']  == "E-Wallet"){?>
                    <td class="cart-product-sub-total"><a rel="facebox" title="Click to check reciept" href="showReciept.php?id=<?php echo$tId; ?>" ><img  src="referenceno/user id - <?php echo htmlentities($row['uid']);?>/<?php echo htmlentities($row['rNo']);?>/<?php echo htmlentities($row['rnoimg']);?>" alt="" width="200" height="150"></a>  </td>
					<?php }
					else {?>
					<td class="cart-product-sub-total"> COD </td>
					<?php } ?>
				</tr>
                
<?php } $query -> close();?>

				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		<h1>Grand total: ₱ <?php echo $gtotal?><h1>

        <center><h4><i class="icon-edit icon-large"></i> Order # <?php echo$id?> Shipping Address</h4></center>
<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Name</th>
					<th class="cart-description item">Shipping Address</th>
					<th class="cart-product-name item">Barangay</th>
					<th class="cart-qty item">City</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>
            <?php
 $query1=mysqli_query($con,"select distinct users.id as id,users.first_name as fname,users.last_name as lname, users.billingAddress addr, users.billingState as brgy, users.billingCity as city, orders.userid as uid from users join orders on orders.userid=users.id where orders.transactionId=$id");?>
<?php
while($row=mysqli_fetch_array($query1))
{
?>
				<tr>
					<?php $name = $row['lname']. ', ' . $row['fname']?>
					<td># <?php echo $uId=$row['id']. ' ' .$name?></td>
					<td><?php echo $row['addr']; ?></td>    
					<td><?php echo $row['brgy']; ?></td> 
					<td><?php echo $row['city']; ?></td>    
				</tr>
                
<?php } $query1 -> close();?>

				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
        <input type="submit" name="submit" value="Go back" class="btn btn-warning">
		<button id="checkout" style="background: red;"type="button" class="btn btn-warning btn-lg">Print Receipt</button>
	</form>
	<script type="text/javascript">
			function createPDF(){
				var win = window.open('','','height=700,width=700');
				win.print();   //PRINT CONTENTS.
			}
			$('#checkout').click(function(){
				swal({
					title: "Print Order Reciept?",
					text: "Print the order receipt?",
					icon: "warning",
					dangermode: true,
					closeOnClickOutside: false,
                    buttons:["No","Yes"]
				});
				.then(willPrint => {
					if (willPrint){
						<?php
						$getOrderId = mysqli_query($con, "SELECT DISTINCT products.productName as ")
						?>
						var doc = new jsPDF('p','pt','letter');
						var body = [
							['Item', 'Quantity', 'Price']
						]
						var y = 20;
						doc.setLineWidth(1.5);
						doc.setFont(undefined, 'bold').text(250, 50, "SANDRA'S STORE");
						doc.text(170,70, "6017 Gen. T. De Leon, Valenzuela City");
                        doc.text(155,90, "TIN #: SAMPLE TIN NUMBER");
						doc.text(100,110, "Order Date: " +);
						doc.text(100,130, "Order ID: " +);

						doc.autoTable({
							body: body,
							startY: 150,
							theme: 'plain',
							headStyles:{halign:'center'},
							columnStyles: {
								0:{
									halign: 'right',
									tableWidth: 100,
								},
								1:{
									halign: 'center',
									tableWidth: 100,
								},
								2:{
									halign: 'center',
									tableWidth: 100,
								}
							}
						})
						doc.autoPrint();
						window.open(doc.output('bloburl'))
					}
				})

			});
	</script>
		
