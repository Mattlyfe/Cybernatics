<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			
		}
	}	

// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
		
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d G:i:s");
	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	mysqli_query($con,"insert into order_header(userId,dateCreated, grandTotal) values('".$_SESSION['id']."','$date' ,'".$_SESSION['tp']."')");
	$transactionId = mysqli_insert_id($con);
	$value=array_combine($pdd,$quantity);
	foreach($value as $qty=> $val34){
// 		mysqli_query($con,"update products set productAvailability=productavailability-$val34 where id='".$_SESSION['sid']."'");
		mysqli_query($con,"insert into orders(userId,productId,quantity,transactionId,orderDate) values('".$_SESSION['id']."','$qty','$val34','$transactionId', '$date')");
		header('location:payment-method.php?transactionId='.$transactionId);
	}
}
}




// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
// 		if($query)
// 		{
// echo "<script>alert('Shipping Address has been updated');</script>";
// 		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Cart</title>
		
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		<!--Alert box using AJAX Sweet -->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="image/icons/icon logo.png">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
        
        <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100776989531652");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart']))
{
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-description item">Images</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-total last-item">Subtotal</th>
					<th class="cart-romove item">Remove</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="8">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
 // print_r($_SESSION['pid'])=$pdtid;exit;
	?>


				<tr>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/POS/MainPOS/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

 $_SESSION['sid']=$pd;
						 ?></a></h4>
						
					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
				                
				                <?php $max =$row['productAvailability']; 
				                    $qty = $_SESSION['cart'][$row['id']]['quantity'];
				                echo '<input type="number" value="'.$qty.'"  name="quantity['.$row['id'].']" onchange="calculateTotal()" min="0" max="'.$max.'" value="1" oninput="'; ?>this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">'; ?>
				             
				             
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "₱"." ".$row['productPrice']; ?>.00</span></td>

					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo "₱"." ".($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']); ?>.00</span></td>
					<td class="romove-item" ><button style="font-size:20px" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>"  class="fa fa-trash-o"></button></td>
				</tr>

				<?php 
                }
             }
 $_SESSION['pid']=$pdtid;
				?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div><!-- /.shopping-cart-table -->			


<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
						Total<span class="inner-left-md"><?php echo "&#8369"." ".$_SESSION['tp']="$totalprice". ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						
					<?php $valid = mysqli_query($con,"select * from users where id = '".$_SESSION['id']."'");
						$row = mysqli_fetch_assoc($valid);
						if ($row['valid'] == 2){ 
							if ($_SESSION['tp'] >= 7000){
								echo '<div class="cart-checkout-btn pull-right">
								<button type="submit" id="ordersubmit" name="ordersubmit" class="btn btn-primary">PROCEED TO CHECKOUT</button>
							</div>';
							}
							else{
								echo "<span style='color:red'>Minimum of ₱ 7,000.00 to Proceed checkout</span>";
								echo '<div class="cart-checkout-btn pull-right">
								<button type="submit" id="ordersubmit" name="ordersubmit" class="btn btn-primary" disabled>PROCEED TO CHECKOUT</button>
							</div>';
							}
							
						} else if($row['valid'] == 0) {?><br>
							<li>Please <b><a href="my-account.php">Verify</a></b> your Account to <b>Proceed Checkout</b></li><br /><br />
						<?php } else if($row['valid'] == 1) {?><br>
							<li>Please wait for your account to be <b>Validated</b> to <b>Proceed Checkout</b></li><br /><br />
						<?php } ?>
						
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<?php 
    } 
    else
     {
            echo "Your shopping Cart is empty";
            
    }
    ?>
</div>			</div>
</div> 
		</div> 
</div> 
		</form>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>


	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	<script>
		var iqnty = document.getElementsByClassName('cart-product-quantity').value;
		var iprice = document.getElementsByClassName('cart-product-sub-total').value;
		var itotal = document.getElementsByClassName('cart-product-grand-total').value;
		var igrandtotal = document.getElementsByClassName('cart-grand-total').value;

		function calculateTotal()
		{
			for(i=0; i<iprice.length; i++){	
				itotal[i].innerText=(iprice[i].value)*(iqnty[i].value);
			}
			
		}

		calculateTotal();
	</script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>

</div>
</div>
<?php include('includes/footer.php');
?>
</body>
</html>