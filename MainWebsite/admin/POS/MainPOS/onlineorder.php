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

	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            ?>
	<!-- profit compu -->
	<script>
		function search() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("result");
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
	function compute(index,price,method){
		
		if(method == "Edit"){
			var quantity = document.getElementById('editQuantity_'+index).value;
			var product = Number(quantity) * Number(price);
			document.getElementById('editAmount_'+index).value = product
		}
		else{
			var quantity = document.getElementById('quantity_'+index).value;
			var product = Number(quantity) * Number(price);
			document.getElementById('amount_'+index).value = product
		}
	}
	function deleteRow(r){
		var index = r.parentNode.parentNode.rowIndex;
		document.getElementById("resultTable").deleteRow(index);
	}
	function deleteRowEdit(id){
		document.getElementById('editQuantity_'+id).value = 0
		document.getElementById('editAmount_'+id).value = 0
	}
	</script>
		<!-- end of profit compu -->
	<div class="invetb">
		<div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Online Order</h3>
		</div>		
		<div class="mb-4">
		<span>Transaction No. :</span> 
		<input type="text" id="myInput" onkeyup="search()" style="padding:2px;" name="filter" value="" placeholder="Transaction Number" autocomplete="off" />
		
		</div>
        <div class="row" style="height:500px; overflow-y: scroll;">
            <div class="col-12"> 
                <table class="hoverTable w-100" id="result" data-responsive="table" style="text-align: left;">
                <thead>
                    <tr>
                        <th > Transaction No. </th>
                        <th > Date </th>
                        <th > Remarks </th>
                        <th > Total </th>
                        <th > Status </th>
                        <th > Action </th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            include('../MainPOS/connect.php');
                            $res = $db->prepare("SELECT orders.transactionId,date_format(order_header.dateCreated,'%Y-%m-%d') as 'date_created',sum(products.productPrice) as 'total',orders.orderStatus,orders.orderDate,order_header.remark from orders
                            left join products on products.id = orders.productId 
                            left join order_header on order_header.transactionId = orders.transactionId
                            where orders.orderStatus<>'Received'
                            group by orders.transactionId");

                            $res->execute();
                            for($i=0; $row = $res->fetch(); $i++){
                                echo '<tr class="record">';
                                ?>
                                    <td><?php echo 'OL-0'.$row['transactionId']; ?></td>
                                    <td><?php echo $row['date_created']; ?></td>
                                    <td><?php echo $row['remark'] ?></td>
                                    <td><?php echo formatMoney($row['total'], true) ?></td>
                                    <td><?php echo $row['orderStatus']; ?></td>
                                    <td>
                                        
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="<?php echo '#editModals'.$row['transactionId']; ?>"><i class="bi bi-wallet"></i></button>
                                    <div class="modal fade"  id="<?php echo 'editModals'.$row['transactionId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Current Status: <span style="color:green"><?php echo $row['remark']?></span></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                $pendActive = '';
                                                $pdActive = '';
                                                
                                                if($row['remark'] == "Pending Payment"){
                                                    $pendActive = 'disabled';
                                                }
                                                if($row['remark'] == "Paid"){
                                                    $pdActive = 'disabled';
                                                }
                                                
                                                ?>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeRemark(<?php echo $row['transactionId']?>,'Pending Payment')" class="btn btn-primary w-100 m-1 <?php echo $pendActive ?>">Pending Payment</button></div>
                                                    <div class="col-6"><button onclick="changeRemark(<?php echo $row['transactionId']?>,'Paid')" class="btn btn-primary w-100 m-1 <?php echo $pdActive ?>">Paid</button></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="<?php echo '#editModal'.$row['transactionId']; ?>"><i class="bi bi-pass"></i></button>
                                    <div class="modal fade"  id="<?php echo 'editModal'.$row['transactionId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Current Status: <span style="color:green"><?php echo $row['orderStatus']?></span></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                $penActive = '';
                                                $fdActive = '';
                                                $prepActive = '';
                                                $odActive = '';
                                                $pacActive = '';
                                                $rcActive = '';

                                                if($row['orderStatus'] == "Pending"){
                                                    $penActive = 'disabled';
                                                }
                                                if($row['orderStatus'] == "For Delivery"){
                                                    $fdActive = 'disabled';
                                                }
                                                if($row['orderStatus'] == "Preparing"){
                                                    $prepActive = 'disabled';
                                                }
                                                if($row['orderStatus'] == "Out For Delivery"){
                                                    $odActive = 'disabled';
                                                }
                                                if($row['orderStatus'] == "Packing"){
                                                    $pacActive = 'disabled';
                                                }
                                                if($row['orderStatus'] == "Received"){
                                                    $rcActive = 'disabled';
                                                }
                                                
                                                ?>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'Pending')" class="btn btn-primary w-100 m-1 <?php echo $penActive ?>">Pending</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'For Delivery')" class="btn btn-primary w-100 m-1 <?php echo $fdActive ?>">For Delivery</button></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'Preparing')" class="btn btn-primary w-100 m-1 <?php echo $prepActive ?>">Preparing</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'Out For Delivery')" class="btn btn-primary w-100 m-1 <?php echo $odActive ?>">Out For Delivery</button></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'Packing')" class="btn btn-primary w-100 m-1 <?php echo $pacActive ?>">Packing</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['transactionId']?>,'Received')" class="btn btn-primary w-100 m-1 <?php echo $rcActive ?>">Received</button></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="deleteOL(<?php echo $row['transactionId']?>)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    
                                    </td>		
                                    
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
	<div class="clearfix"></div>
	</div>
	</div>
	</div>
	</div>

	<script src="js/jquery.js"></script>
	<script type="text/javascript">
	function changeRemark(id,remark){
        let serializeData = `id=${id}&remark=${remark}`
        $.post('OnlineOrder/changeRemark.php',serializeData,function(response){
            swal('Success',response,'success')
            setTimeout(() => {
                window.location.href = 'onlineorder.php'
            }, 1500);
            
        })
    }
    function changeStatus(id,status){
        let serializeData = `id=${id}&status=${status}`
        $.post('OnlineOrder/changeStatus.php',serializeData,function(response){
            swal('Success',response,'success')
            setTimeout(() => {
                window.location.href = 'onlineorder.php'
            }, 1500);
            
        })
    }
    function deleteOL(id){
        let serializeData = `id=${id}`
        swal({
        title: "Delete Order?",
        text: "Do you want to delete Online Order #OL-0"+id+"?",
        icon: "warning",
        dangerMode: true,
        closeOnClickOutside: false,
        buttons:["No","Yes"]
        })
        .then(willDelete=>{
            if(willDelete){
                $.post('OnlineOrder/deleteOL.php',serializeData,function(response){
                    swal('Success',response,'success')
                    setTimeout(() => {
                        window.location.href = 'onlineorder.php'
                    }, 1500);
                })
            }
            
        })
    }
	</script>
	</body>
	</html>
    <?php } ?>