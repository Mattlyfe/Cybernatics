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
        <title>Admin| Point of Sales</title>
        <link rel="shortcut icon" href="img/icon logo.png">
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
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
	.tableInput{
		display:none;
		text-align:center; 
		border:0;
		outline:0;
		display:inline-block;
		background-color:transparent;
	}
	input{
		padding:3px;
	}

	
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
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
	
    <?php
       include('../MainPOS/connect.php');
       
       $getTotalItems = $db->prepare("SELECT * from item_container
       left join products on products.productCode = item_container.product_code ORDER BY item_container.id ASC");
       $getTotalItems->execute();
       $total = $getTotalItems->rowcount();

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
        function alert_message($message) {
            echo "<script>alert('$message');</script>";
        }
    ?>
    
	<div class="invetb">
    <div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Point of Sales</h3>
		</div>	
        <div class="row">
            <div class="col-3">
                <button type="button" data-toggle="modal" data-target="#changeQuantity"  class="btn btn-secondary w-100"><i class="bi bi-plus-slash-minus"></i> Change Quantity</button>
            </div>
            <div class="modal fade" id="changeQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                
                    <div class="modal-content">
                    <form action="POS/updateQuantity.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Quantity of <span name="selected_code"></span> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="selected_id" style="display:none" type="text">
                        <div class="row align-items-center">
                            <div class="col-12 d-flex justify-content-center">
                                <button id="minusBtn" type="button" class="btn btn-danger m-1"><i class="bi bi-dash"></i></button>
                                <input id="selectedQuantity" style="text-align:center;" type="number" name="selected_quantity" value="0" size="5" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                <button id="addBtn" type="button" class="btn btn-primary m-1"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="button" data-toggle="modal" data-target="#changePrice" class="btn btn-secondary w-100"><i class="bi bi-tags-fill"></i> Change Price</button>
            </div>
            <div class="modal fade" id="changePrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                
                    <div class="modal-content">
                    <form action="POS/changePrice.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Price of <span name="selected_code"></span> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="selected_id" style="display:none" type="text">
                        <label>Old Price: <span style="font-size:20px; font-weight:bold" name="selected_price"></label><br/>
                        <label>Input New Price</label>
                        <input style="text-align:right;" placeholder="0" class="w-100" name="selected_price" type="number" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Price</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="submit" data-toggle="modal" data-target="#deleteItem" class="btn btn-secondary w-100"><i class="bi bi-trash"></i> Delete Item</button>
            
            <div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                
                    <div class="modal-content">
                    <form action="POS/deleteItem.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete <span style="color:green" name="selected_code"></span>?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="selected_id" style="display:none" type="text">
                        Are you sure you want to delete this item? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>            
            <div class="col-3">
                <button type="submit" data-toggle="modal" data-target="#cancelPOS" class="btn btn-secondary w-100"><i class="bi bi-x-lg"></i> Cancel</button>
            </div>
            <div class="modal fade" id="cancelPOS" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <form id="cancelPOS" action="POS/cancelPOS.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cancel Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this transaction? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            
            <div class="col-3">
                <button type="button" data-toggle="modal" data-target="#checkPrice" class="btn btn-secondary w-100"><i class="bi bi-tags-fill"></i> Check Price</button>
            </div>
            <div class="modal fade" id="checkPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                
                    <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Check Price </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <span>Generate New Code : </span><input type="text" style="width:359px; height:40px;" name="productCode" id="productCode" onblur ="checkPrice()">
                    <span id="item-price-status" style="font-size:12px;"></span>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <form action="POS/itemEntry.php" method="POST">
                    <span>Search Product Code: </span> 
                    <input type="text" id="myInput" style="padding:2px; border-radius:10px" name="item" placeholder="Search Item" autocomplete="off" autofocus />
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </form>

            </div>
            <div class="col-6">
                <span style="font-size:20px; float:right">Number of Items: <?php echo $total?></span> 
            </div>
        </div>
        <div  class="row mt-4" style="height:400px; overflow-y: scroll;">
            <div class="w-100 col-12 p-2" id="receipt-print">
                <table class="w-100" id="table">
                    <thead>
                        <tr>
                            <th > No. </th>
                            <th > Product Code </th>
                            <th > Product Name </th>
                            <th > Qty </th>
                            <th > Product Price </th>
                            <th > Price </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        include('../MainPOS/connect.php');
                        $result = $db->prepare("SELECT item_container.quantity,item_container.price,item_container.id, products.productCode, products.productName,products.productPrice FROM item_container
                        left join products on products.productCode = item_container.product_code ORDER BY item_container.id ASC");
                        $result->execute();
                        $total_amount_due = 0;
                        $item_codes = array();
                        $item_qty = array();
                        $item_prices = array();
                        $name = $_SESSION['name'];
                        for($i=0; $row = $result->fetch(); $i++){
                            echo '<tr class="record">';
                        ?>
                        <td style="display:none"><?php echo $row['id']; ?></td>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $row['productCode']; ?></td>
                        <td><?php echo $row['productName']; ?></td>
                                
                        <td><?php $quantity = $row['quantity']; echo $quantity; ?></td>
                        <td> PHP
                        <?php
                       
                        array_push($item_codes,$row['productCode']);
                        array_push($item_qty,$quantity);
                       
                            if($row['price'] == 0){
                                echo $row['productPrice'];
                                array_push($item_prices, $row['productPrice']);
                            }else{
                                echo $row['price']; 
                                array_push($item_prices,$row['price']);
                            }
                            
                        ?>
                        </td>
                        <td>  PHP
                        <?php 
                            if($row['price'] == 0){
                                echo $quantity * $row['productPrice']; 
                                $total_amount_due += $quantity * $row['productPrice'];
                            }else{
                                echo $quantity * $row['price']; 
                                $total_amount_due += $quantity * $row['price'];
                            }        
                        ?>
                        </td>
                        <?php
                        }
                        ?>
                        <tr>
                        <td style="text-align:right"colspan='6'>Total Amount : PHP <?php echo $total_amount_due.".00"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12" >
                <h3 class="m-2">Total: <?php echo $total_amount_due.".00"?></h3>
                <button style="float:left" data-toggle="modal" data-target="#payment" type="button" class="btn btn-info btn-lg"><i class="bi bi-credit-card-2-front-fill"></i> PAYMENT</button>
                
                <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Please Enter Cash Tendered</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                <h5>Choose Payment Method</h5>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="options" id="options1" autocomplete="off" value="Cash" checked>CASH
                                    </label>
                                    <label class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        <input type="radio" name="options" id="options2" autocomplete="off" value="Gcash">GCASH
                                    </label>
                                    <label class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        <input type="radio" name="options" id="options3" autocomplete="off" value="Paymaya">PAYMAYA
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row p-2 align-items-center">
                                <div class="col pt-2 m-1" style="height:auto; border:solid black 1px; text-align:center">
                                    <h4>Amount Due</h4>
                                    <span>Number of Items: <?php echo $total?></span>
                                    <h4 class="m-3" style="font-weight:bold; color:green;"><?php echo " PHP ".formatMoney($total_amount_due,true)?></h4>
                                </div>
                                <div class="col pt-2 m-1" style="height:auto; border:solid black 1px; text-align:center">
                                    <h4>Cash Tendered</h4>
                                    <input style="text-align:center" id="cash_tendered" type="number" name="cash_tendered" size=35 value="0" min="0">
                                    <div class="row m-2">
                                        <div class="col-4">
                                            <input class="touchButton btn btn-success w-100" type="button" value="<?php echo $total_amount_due ?>">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="1000">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="500">
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="200">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="100">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="50">
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="20">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="10">
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-secondary w-100" type="button" value="1">
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <div class="col-4">
                                            
                                        </div>
                                        <div class="col-4">
                                        
                                        </div>
                                        <div class="col-4">
                                            <input class="touchButton btn btn-danger w-100" type="button" value="Clear">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button id="checkout" type="button" class="btn btn-warning btn-lg">Checkout</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<div class="clearfix"></div>
	</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Scan QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <img style="width:100%" src="src/qr.png">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<script src="js/jquery.js">
    </script>
    <script type="text/javascript">
        function createPDF(){
            var win = window.open('', '', 'height=700,width=700');
            win.print();    // PRINT THE CONTENTS.
        }
        $('#addBtn').click(function(){
            document.getElementById('selectedQuantity').value++
        });
        $('#minusBtn').click(function(){
            if(document.getElementById('selectedQuantity').value > 0){
            document.getElementById('selectedQuantity').value--}
        });
        $("#table tr").click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');    
            var value=$(this).find('td:first').html();
            var p_code=$(this).find('td:eq(3)').html();
            var selectedQuantity=$(this).find('td:eq(4)').html();
            var selectedPrice = $(this).find('td:eq(5)').html();
            
            document.getElementById('selectedQuantity').value = selectedQuantity

            var selected_price = document.getElementsByName('selected_price')
            selected_price.forEach(e=>{
                e.innerHTML = selectedPrice + ".00"
            })

            var item_id = document.getElementsByName('selected_id')
            item_id.forEach(e=>{
                e.value = value;
            })

            var product_code = document.getElementsByName("selected_code")
            product_code.forEach(e=>{
                e.innerHTML = p_code;
            })
        });
        $('.touchButton').click(function(){
            var inputs = Number(this.value);
            var old_value = Number(document.getElementById('cash_tendered').value)
            var new_value = inputs + old_value;
            document.getElementById('cash_tendered').value = new_value
        });
        // $('#options2').click(function(){
        //     let image_path = 'MainPOS/src/qr.png'
        //     $('#myModal').modal('toggle')
        // })
        $('#checkout').click(function(){
            var cash_tendered = Number($('#cash_tendered').val())
            var total_amount = Number(<?php echo $total_amount_due ?>)
            let payment = document.getElementsByName('options');
            let mop;
            payment.forEach(e=>{
                if(e.checked){
                    mop = e.value
                }
            })
            if(cash_tendered < total_amount || cash_tendered == 0){
                swal("Oops","Cash Tendered is not acceptable","error")
            }
            else if(total_amount == 0){
                swal("Item not Found","Please scan item first","warning")
            }
            else{
                var changed = cash_tendered - total_amount
                swal({
                    title: "Print Receipt?",
                    text: "Do you want to print receipt?",
                    icon: "warning",
                    dangerMode: true,
                    closeOnClickOutside: false,
                    buttons:["No","Yes"]
                    })
                    .then(willPrint => {
                        let arr = []
                        var post_codes = <?php echo json_encode($item_codes); ?>;
                        var post_quantity = <?php echo json_encode($item_qty); ?>;
                        var post_price = <?php echo json_encode($item_prices); ?>;
                        
                        
                        let serializeData = `mop=${mop}&post_total_amount=${total_amount}&post_cash_tendered=${cash_tendered}&post_changed=${changed}&post_codes=${post_codes}&post_quantity=${post_quantity}&post_price=${post_price}`
                        
                        $.post('POS/saveTransaction.php',serializeData,async function(response) {
                            await swal({
                                title: "Transaction No. "+response,
                                text: "CHANGED : PHP " + changed+".00",
                            })
                            $.post('POS/cancelPOS.php','',function(response) {
                                setTimeout(() => {
                                    window.location.href = "pos.php"
                                }, 1000);
                            });
                        });
                        if (willPrint) {
                            <?php 
                            $getlastId = $db->prepare("SELECT id FROM transactions ORDER BY id DESC LIMIT 1");
                            $getlastId->execute(); 
                            $row = $getlastId->fetch();

                            $lastid = $row['id'];
                            $newid = ($lastid + 1);
                            ?>
                            var doc = new jsPDF('p', 'pt', 'letter');
                            var y = 20;
                            var currentdate = new Date(); 
                            var datetime = 
                                            (currentdate.getMonth()+1)  + "/" 
                                            +currentdate.getDate() + "/"
                                            + currentdate.getFullYear() + " @ "  
                                            + currentdate.getHours() + ":"  
                                            + currentdate.getMinutes() + ":" 
                                            + currentdate.getSeconds();
                            let cashier = '<?php echo $name ?>'
                            let lastid = '<?php echo $newid ?>'
                            doc.setLineWidth(2);
                            doc.setFont(undefined, 'bold').text(250,50, "SANDRA STORE");
                            doc.text(170,70, "6017 Gen. T. De Leon, Valenzuela City");
                            doc.text(155,90, `Transaction Stamp: ${datetime} TR#`+lastid);
                            doc.text(350,110, "Cashier: "+cashier);
                            doc.text(100,110, "Cash Tendered: PHP "+ cash_tendered);
                            doc.text(100,130, "Change: PHP "+ changed);
                           
                            doc.autoTable({
                                html: '#table',
                                startY: 150,
                                theme: 'plain',
                                headStyles:{halign:'center'},
                                columnStyles: {
                                    0: {
                                        halign: 'right',
                                        tableWidth: 100,
                                        },
                                    1: {
                                        halign: 'center',
                                        tableWidth: 100,
                                    },
                                    2: {
                                        halign: 'center',
                                        tableWidth: 100,
                                    },
                                    3: {
                                        halign: 'center',
                                        tableWidth: 100,
                                    },
                                    4: {
                                        halign: 'center',
                                        tableWidth: 100,
                                    },
                                    5: {
                                        halign: 'center',
                                        tableWidth: 100,
                                    }
                                },

                            })
                            doc.autoPrint();
                            window.open(doc.output('bloburl'))
                          
                            
                            // var myBlob;
                            // var pdf = new jsPDF('p', 'pt', 'letter');
                            // pdf.fromHTML($('#receipt-print').html(), 15, 15, {
                            //     'width': 170,
                            // });
                            // myBlob = pdf.save('receipt');
                            
                            // var doc = new jsPDF('l', 'mm', 'letter');

                            // var pdfjs = document.querySelector('#receipt-print');

                            // // Convert HTML to PDF in JavaScript
                            // var myBlob;
                            // doc.fromHTML($('#receipt-print').html(), 15, 15, {
                            //     'width': 170,
                            // });
                            // myBlob = pdf.save('receipt');;
                        }
                       
                    });
            }
            
        })
    </script>

<script>
	function checkPrice() {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "checkers/check_Price.php",
				data:'code='+$("#productCode").val(),
				type: "POST",

			success:function(data){

				$("#item-price-status").html(data);
				$("#loaderIcon").hide();

			},

			error:function (){}
			});
	}
</script>
    <style>
    td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

    .selected {
        background-color: grey;
        color: #FFF;
    }
    </style>
	</body>
	</html>
    <?php } ?>