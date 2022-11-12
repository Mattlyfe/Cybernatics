<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
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

	    <title>Shopping Portal | Payment Method</title>
				<!-- Start of Async Drift Code -->
				<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('mfzdw3bw9zcu');
</script>
<!-- End of Async Drift Code -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="css/cardsstyles.css">
		<link rel="stylesheet" href="css/paymentstyles.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!--JQuery 1.8.3-->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="http://code.jquery.com/jquery-1.8.3.min.js%22%3E</script>
		<script language="javascript" type="text/javascript">

			
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+900+',height='+1200+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
	</head>
    <body class="cnt-home">
	
		
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Payment Method</li>
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
		
	<h1>Order # <?php echo intval($_GET['transactionId']); ?></h1>

		<table class="table table-bordered">
			<thead>
				<tr>
				<th class="cart-romove item">orderID</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Grandtotal</th>
					<th class="cart-description item">Order Date</th>
					
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.transactionId as tId,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.transactionId='".$_GET['transactionId']."'");
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
				<td># <?php echo $tId=$row['tId']; ?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/POS/MainPOS/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total">₱ <?php echo  $price=$row['pprice']; ?>  </td>
					<td class="cart-product-sub-total">₱ <?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
					<td class="cart-product-grand-total">₱ <?php echo (($qty*$price)+$shippcharge);?></td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
				</tr>
				<?php } ?>
				</tbody><!-- /tbody -->
		</table><!-- /table -->	
		<h1>Grand total: ₱ <?php echo $_SESSION['tp']?><h1>
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		
	</div><!-- /.container -->
</div><!-- /.body-content -->
					
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h2>Choose Payment Method</h2>
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	         Select your Payment Method
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
	    
			<ul>
				<input type="text" name="transactionNo" id="transactionNo" value="<?php echo intval($_GET['transactionId']); ?>" readonly hidden>
			<link rel="stylesheet" href="../MainWebsite/css/qr.css">
			<link rel="stylesheet" href="../MainWebsite/css/credit.css">
			<li><input type="radio" name="paymethod" id="paymethod" value="Debit/Credit Card" onclick="closePopup(); cardPopup(); debit()" required> Debit/Credit Card</li>
				<li>
					<form action="cardAccount.php" method="$_POST">
					<div class="cardbox">
					<div class="cardPaymentpopUp" id="cardPaymentpopUp">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
					</div>
								<label class="info-title">Name on Card</label>
								<input type="text" class="form-control unicase-form-control text-input" id="nameOnCard" name="nameOnCard"  required>
								<label class="info-title">Credit Card Number</label>
								<input type="text" class="form-control unicase-form-control text-input" id="cardNo" name="cardNo" onkeypress='validate(event)' maxlength="19" required>
								<label class="info-title">CVV</label>
								<input type="text" class="form-control unicase-form-control text-input" id="cvv" name="cvv" onkeypress='validate(event)' maxlength="3" required>
								<label class="info-title">Exp Year</label>
								<input type="text" class="form-control unicase-form-control text-input" id="expYear" name="expYear" onkeypress='validate(event)'  onkeyup="modifyInput(this)" maxlength="5" required>
							</table>
						</div>
					</div>
					</form>
				</li>
			
				<li>
					<input type="radio" name="paymethod" value="E-Wallet" onclick="openPopup(); closeCardPopup(); ewallet()" required> E-Wallet</li>
				<li>
				<form name="payment" method="post" action="upload.php" enctype="multipart/form-data">
					<div class="cardbox">
					<div class="popup" id="popup">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<img class="epayments" src="/MainWebsite/image/cardsimage/Gcash.png">					
					<img class="epayments" src="/MainWebsite/image/cardsimage/PayMaya.png">
					<div class="qr">
					<img src = "../MainWebsite/admin/images/qr.png" width="350" height="350">
					<br>
					Please Scan the qr code using the Gcash or Paymaya App
					</div>
					<br>
					<label class="info-title" for="referenceno">Reference No. <span>*</span></label>
	    			<input type="text" class="form-control unicase-form-control text-input" id="referenceno" name="referenceno" onkeypress='validate(event)' required>
					<label class="info-title" for="referenceno">Upload Screenshot of Proof of payment:<span>*</span></label>
					<input type="file" name="fileToUpload" id="fileToUpload" required>
					</table>
					</div>
					</div>
				</form>
					<script>
						let popup = document.getElementById("popup");
						let popup1 = document.getElementById("cardPaymentpopUp");

						function openPopup() {
						document.getElementById("popup").style.display = "block";
						}
						function closePopup() {
						document.getElementById("popup").style.display = "none";
						}
						function cardPopup(){
							document.getElementById("cardPaymentpopUp").style.display = "block";
						}
						function closeCardPopup(){
							document.getElementById("cardPaymentpopUp").style.display = "none";
						}
						function validate(evt) {
						var theEvent = evt || window.event;

						// Handle paste
						if (theEvent.type === 'paste') {
							key = event.clipboardData.getData('text/plain');
						} else {
						// Handle key press
							var key = theEvent.keyCode || theEvent.which;
							key = String.fromCharCode(key);
						}
						var regex = /[0-9]|\//;
						if( !regex.test(key) ) {
							theEvent.returnValue = false;
							if(theEvent.preventDefault) theEvent.preventDefault();
						}
						}

						$('#cardNo').on('keyup', function(e){
						// get value of the input field
						var val = $(this).val();
						var newval = '';
						// write regex to remove any space
						val = val.replace(/\s/g, '');
						// iterate through each numver
						for(var i = 0; i < val.length; i++) {
							// add space if modulus of 4 is 0
							if(i%4 == 0 && i > 0) newval = newval.concat(' ');
							// concatenate the new value
							newval = newval.concat(val[i]);
						}
						// update the final value in the html input
						$(this).val(newval);
					});
					function modifyInput(ele) {
  
					if (ele.value.length === 2) {
						ele.value = ele.value + '/'
					}
				}					
					</script>
				
				</li>
				<?php $valid = mysqli_query($con,"select * from users where id = '".$_SESSION['id']."'");
				$row = mysqli_fetch_assoc($valid);
				if ($row['valid'] == 2){ ?>
				<li><input type="radio" name="paymethod" id="paymethod" value="Cash on Delivery" onclick="closePopup(); closeCardPopup(); cod()" required> Cash on Delivery</li>
				<li>
					<div class="cardbox">
					<img class="cod" src="/MainWebsite/image/cardsimage/cod.jpg" > <br /><br />
					</div>
				</li>
				
			</ul><?php } else if($row['valid'] == 0) {?><br>
				<li>Please <b><a href="my-account.php">Verify</a></b> your Account to do <b>Cash on Delivery</b></li><br /><br />
			<?php } else if($row['valid'] == 1) {?><br>
				<li>Please wait for your account to be <b>Validated</b> to do <b>Cash on Delivery</b></li><br /><br />
			<?php } ?>

			<script>
			function debit(){
				$('#referenceno').prop('required', false);
				$('#fileToUpload').prop('required', false);

				$('#nameOnCard').prop('required', true);
				$('#cardNo').prop('required', true);
				$('#cvv').prop('required', true);
				$('#expYear').prop('required', true);
			}

			function ewallet(){
				$('#referenceno').prop('required', true);
				$('#fileToUpload').prop('required', true);

				$('#nameOnCard').prop('required', false);
				$('#cardNo').prop('required', false);
				$('#cvv').prop('required', false);
				$('#expYear').prop('required', false);
			}
			function cod(){

				$('#referenceno').prop('required', false);
				$('#fileToUpload').prop('required', false);
					
				$('#nameOnCard').prop('required', false);
				$('#cardNo').prop('required', false);
				$('#cvv').prop('required', false);
				$('#expYear').prop('required', false);
			}
			</script>
			
	     <input type="submit" value="Proceed Payment" name="submit" class="btn btn-primary">
		
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /.container -->
</div><!-- /.body-content -->
<?php include('includes/footer.php');?>
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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>