<?php if(!isset($_SESSION)) 
{ 
    session_start(); 
}
else
{
    session_destroy();
    session_start(); 
}

if (empty($_SESSION['user_name'])) {
    header('Location: login.php');
} else { ?>
<html>
		<head>
		<title>Admin| Purchase Order</title>
		<link rel="shortcut icon" href="img/icon logo.png">
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
	.modal.custom .modal-dialog{
		--bs-modal-width: 1000px;
	}

	
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
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
			<h3>Purchase Order</h3>
		</div>		
		<div class="mb-4">
		<span>Order No. :</span>
		
		<input type="text" id="myInput" onkeyup="search()" style="padding:2px;" name="filter" value="" placeholder="Order Number" autocomplete="off" />
		<?php if($_SESSION['role'] != "supplier"){?>
		<button type="button" class="btn btn-info" style="float:right" data-toggle="modal" data-target="#exampleModal">
			<i class="bi bi-plus-circle-fill"></i> Add Order
		</button>
		<?php } else{?> <br> <br>
			<?php } ?>
		</div>
	<div class="modal custom fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
		<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add Purchase Order</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				<form action="PurchaseOrder/addOrder.php" method="POST">
				<div class="row mb-3">
						<?php
						require_once('config.php');
						?>
						<?php
						$query = "SELECT * FROM users_be WHERE role = 'supplier'";
						$suppliers = mysqli_query($con, $query);
						?>
						<div class="col-6">
						Supplier:
						<select style="width:100%; border:solid black 1px; border-radius:5px" class="form-control form-control-sm" name="supplier_name" required>
						<option>Select Supplier</option>
						<?php
						foreach ($suppliers as $sups){
						?>
							<option><?php echo $sups['user_name']; ?></option>
							<?php
							}
							?>
						</select>
						<!--<input type="" style="width:100%; border:solid black 1px; border-radius:5px" name="supplier_name" placeholder="Supplier Name" required>-->
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-6">
						Mode Of Payment:
						<select style="width:100%; border:solid black 1px; border-radius:5px" name="mop" class="form-control form-control-sm" required>
							<option>Cash</option>
							<option>Gcash</option>
							<option>Paymaya</option>
						</select>
						</div>
						<div class="col-6">
						Expected Delivery Date: 
						<input type="date" style="width:100%; border:solid black 1px; border-radius:5px" name="delivery_date" placeholder="MM-DD-YYYY" required>
						</div>
					
				</div>
				<div class="row">
					<div class="col-12">
						<table class="hoverTable w-100" id="resultTable" data-responsive="table" style="text-align: left;">
							<thead>
								<tr>
									<th > Product Code </th>
									<th > Category </th>
									<th > Product Name </th>
									<th > Quantity </th>
									<th > Recommended Quantity to order </th>
									<th > Price </th>
									<th > Amount </th>
									<th > Action </th>
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
								$result = $db->prepare("SELECT * FROM products ORDER BY id DESC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
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
                    					$categoryName = 'Beverages';
                    				}
									if ($availableqty < 10) {
										echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
									}
									else {
										echo '<tr class="record">';
									} 
									?>
									<td style="display:none"><input type="text" name='p_id[]' value='<?php echo $row['id'];?>'></td>
									<td><?php echo $row['productCode'];?></td>
									<td><?php echo $categoryName ?></td>
									<td><?php echo $row['productName']; ?></td>
									<td><input name='ordered_quantity[]' style="text-align:right; width:100%;" oninput="compute(<?php echo $row['id']; ?>,<?php echo $row['oPrice']; ?>); this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="quantity_<?php echo $row['id']; ?>" type="number" placeholder="0" min="0" ></td>
                                    <?php
                                    $qty = $row['productAvailability'];
                                    $maintaining = 1000;
                                    $eoq = ($maintaining - $qty);?>
                                    <td> <?php echo $eoq; ?> pcs </td>
									<td><?php $pprice=$row['oPrice']; echo formatMoney($pprice, true); ?></td>
									<td><input class="tableInput" id="amount_<?php echo $row['id']; ?>" type="text" name='initial_amount[]' value="0" readonly></td>
									
									<td><button onclick="deleteRow(this)" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></td>
									</tr>
									<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Place Order</button>
			</div>
			</form>
		</div>
		</div>
	</div>
	</div>
	<table class="hoverTable w-100" id="result" data-responsive="table" style="text-align: left;">
		<thead>
			<tr>
				<th class="order-by-desc"> Order No. </th>
				<th > Supplier </th>
				<th > Date Created </th>
				<th > Delivery Date </th>
				<th > Status </th>
				<th > Total Amount </th>
				<th > Action </th>
			</tr>
		</thead>
		<tbody>
				<?php
					include('../MainPOS/connect.php');
					
				 	if($_SESSION['role'] != "supplier"){
					    $res = $db->prepare("SELECT * FROM purchase_orders ORDER BY id DESC");
				 	}
				 	else{
				 	    $res = $db->prepare("SELECT * FROM purchase_orders WHERE supplier_name='".$_SESSION['user_name']."' ORDER BY id DESC");
					}

					$res->execute();
					for($x=0; $row = $res->fetch(); $x++){
						echo '<tr class="record">';
						?>
							<td><?php echo 'PO-0'.$row['id']; ?></td>
							<td><?php echo $row['supplier_name']; ?></td>
							<td><?php echo $row['date_created']; ?></td>
							<td><?php echo $row['delivery_date']; ?></td>
									
							<td><?php echo $row['po_status']; ?></td>
							<td><?php echo formatMoney($total=$row['total_amount'], true) ?></td>  
							<td>
								<button type="button" data-toggle="modal" data-target="<?php echo '#editModal'.$row['id']; ?>" class="btn btn-success"><i class="bi bi-pass"></i></button>
    								<div class="modal fade" id="<?php echo 'editModal'.$row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    									<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    										<div class="modal-content">
    											<form method="POST" action="PurchaseOrder/updateOrder.php">
    												<div class="modal-header">
    												    <?php
														if($_SESSION['role'] != "supplier"){ ?>
    													<h5 class="modal-title" id="exampleModalLongTitle">Edit Purchase Order</h5>
    													<?php 
    													} 
    													else{ ?>
    													<h5 class="modal-title" id="exampleModalLongTitle">Breakdown Purchase Order</h5>
    													<?php 
    													} 
    													?>
    													
    													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    													<span aria-hidden="true">&times;</span>
    													</button>
    												</div>
    												<div class="modal-body">
    												<table class="hoverTable w-100" id="resultEdit" data-responsive="table" style="text-align: left;">
    													<thead>
    														<tr>
    															<th > Product Code </th>
    															<th > Category </th>
    															<th > Product Name </th>
    															<th > Quantity </th>
    															<th > Price </th>
    															<th > Amount </th>
    															<?php if($_SESSION['role'] != "supplier"){?>
    															<th > Action </th>
    															<?php }?>
    														</tr>
    													</thead>
    													<tbody>
															
    													<?php
														if($_SESSION['role'] != "supplier"){
															$po_id = $row['id'];
    														$result = $db->prepare("SELECT 
    														products.id as p_id,
    														products.productAvailability,
    														products.category,
    														products.productCode,
    														products.productName,
    														products.genName,
    														products.oPrice,
    														products.productPrice,
    														purchase_order_items.quantity,
    														purchase_orders.total_amount
    														FROM products 
    														left join purchase_order_items on purchase_order_items.product_id = products.id
    														left join purchase_orders on purchase_orders.id = purchase_order_items.purchase_order_id
    														where purchase_orders.id = $po_id;");
    
    														$result->execute();
														 }
														 else{
															$po_id = $row['id'];
    														$result = $db->prepare("SELECT 
    														products.id as p_id,
    														products.productAvailability,
    														products.category,
    														products.productCode,
    														products.productName,
    														products.genName,
    														products.oPrice,
    														products.productPrice,
    														purchase_order_items.quantity,
    														purchase_orders.total_amount
    														FROM products 
    														left join purchase_order_items on purchase_order_items.product_id = products.id
    														left join purchase_orders on purchase_orders.id = purchase_order_items.purchase_order_id
    														where purchase_orders.id = $po_id and purchase_order_items.quantity != '0';");
    
    														$result->execute();
														}
    														
    														for($y=0; $row = $result->fetch(); $y++){
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
																	$categoryName = 'Beverages';
																}

    															if ($availableqty < 10) {
    																echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
    															}
    															else {
    																echo '<tr class="record">';
    															} 
    															?>
    															<td style="display:none"><input type="text" name='p_id[]' value='<?php echo $row['p_id'];?>'></td>
    															<td><?php echo $row['productCode'];?></td>
    															<td><?php echo 	$categoryName; ?></td>
    															<td><?php echo $row['productName']; ?></td>
    															<?php if($_SESSION['role'] != "supplier"){?>
    															<td><input name='ordered_quantity[]' style="text-align:right; width:100%;" oninput="compute(<?php echo $row['p_id']; ?>,<?php echo $row['oPrice']; ?>,'Edit')" id="editQuantity_<?php echo $row['p_id']; ?>" type="number" value="<?php echo $row['quantity']; ?>"></td>
    															<?php } else{?>
    															<td><input name='ordered_quantity[]' style="text-align:right; width:100%;" oninput="compute(<?php echo $row['p_id']; ?>,<?php echo $row['oPrice']; ?>,'Edit')" id="editQuantity_<?php echo $row['p_id']; ?>" type="number" value="<?php echo $row['quantity']; ?>" readonly></td>
    															<?php } ?>
    															<td><?php $pprice=$row['oPrice']; echo formatMoney($pprice, true); ?></td>
    															<td><input class="tableInput" id="editAmount_<?php echo $row['p_id']; ?>" type="text" name='initial_amount[]' value="<?php $amount=$row['oPrice'] * $row['quantity']; echo $amount; ?>" readonly></td>
    															<?php if($_SESSION['role'] != "supplier"){?>
    															<td><button type="button" onclick="deleteRowEdit(<?php echo $row['p_id']; ?>)" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></td>
    															<?php } ?>
    														</tr>
    															<div style="display:none">
    																<input type="text" name='po_id' value='<?php echo $po_id;?>'>
    															</div>
    															<?php
    														}
    													?>
    													</tbody>
    													<td> </td>
														<td> </td>
														<td> </td>
														<td> </td>
														<td><b>Shipping fee: 60.00</td></b>
														<td colspan="6"><b>Total amount: <?php echo $total + 60;?></td></b>
    												</table>
    												</div>
    												<div class="modal-footer">
    													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    													<?php if($_SESSION['role'] != "supplier"){?>
    													<button type="submit" class="btn btn-primary">Update</button>
    													<?php } ?>
    												</div>
    											</form>
    										</div>
    									</div>
    								</div>

								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="<?php echo '#editStatusModal'.$po_id; ?>"><i class="bi bi-truck"></i></button>
                                    <div class="modal fade"  id="<?php echo 'editStatusModal'.$po_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
										<form method="POST">
                                            <div class="modal-content">
                                            <div class="modal-header">
												<?php
												$result = $db->prepare("SELECT * FROM purchase_orders
												where id = $po_id;");
												$result->execute();
												$row = $result->fetch();
											?>
                                                <h5 class="modal-title" id="exampleModalLongTitle">Current Status: <span style="color:green"><?php echo $row['po_status']?></span></h5>
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

                                                if($row['po_status'] == "Pending"){
                                                    $penActive = 'disabled';
                                                }
                                                if($row['po_status'] == "For Delivery"){
                                                    $fdActive = 'disabled';
                                                }
                                                if($row['po_status'] == "Preparing"){
                                                    $prepActive = 'disabled';
                                                }
                                                if($row['po_status'] == "Out For Delivery"){
                                                    $odActive = 'disabled';
                                                }
                                                if($row['po_status'] == "Packing"){
                                                    $pacActive = 'disabled';
                                                }
                                                if($row['po_status'] == "Received"){
                                                    $rcActive = 'disabled';
                                                }
                                                
                                                ?>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'Pending')" class="btn btn-primary w-100 m-1 <?php echo $penActive ?>">Pending</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'For Delivery')" class="btn btn-primary w-100 m-1 <?php echo $fdActive ?>">For Delivery</button></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'Preparing')" class="btn btn-primary w-100 m-1 <?php echo $prepActive ?>">Preparing</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'Out For Delivery')" class="btn btn-primary w-100 m-1 <?php echo $odActive ?>">Out For Delivery</button></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'Packing')" class="btn btn-primary w-100 m-1 <?php echo $pacActive ?>">Packing</button></div>
                                                    <div class="col-6"><button onclick="changeStatus(<?php echo $row['id']?>,'Received')" class="btn btn-primary w-100 m-1 <?php echo $rcActive ?>">Received</button></div>
                                                </div>
                                            </div>
											</form>
                                            </div>
                                        </div>
                                    </div>
                                    

    
    								<!--						$result->execute();-->
														 
										
    														
    								<!--						for($y=0; $row = $result->fetch(); $y++){-->
    								<!--							$availableqty=$row['productAvailability'];-->
    								<!--							$category = $row['category'];-->
    
    								<!--							if ($category == 3){-->
												<!--					$categoryName = 'Condiments';-->
												<!--				}-->
												
												<!--				if ($category == 4){-->
												<!--					$categoryName = 'Cookies and Crackers';-->
												<!--				}-->
												
												<!--				if ($category == 5){-->
												<!--					$categoryName = 'Dairy';-->
												<!--				}-->
												
												<!--				if ($category == 6){-->
												<!--					$categoryName = 'Beverages';-->
												<!--				}-->

    								<!--							else {-->
    								<!--								echo '<tr class="record">';-->
    								<!--							} -->
														 
												<!--		 		?>-->
														 
    								<!--							<td style="display:none"><input type="text" name='p_id[]' value='<?php echo $row['p_id'];?>'></td>-->
    								<!--							<td><?php echo $row['productCode'];?></td>-->
    								<!--							<td><?php echo 	$categoryName; ?></td>-->
    								<!--							<td><?php echo $row['productName']; ?></td>-->
    								<!--							<td><?php echo $row['quantity']; ?></td>-->
																

    								<!--							<td><?php $pprice=$row['oPrice']; echo formatMoney($pprice, true); ?></td>-->
																
    								<!--							<td><input class="tableInput" id="editAmount_<?php echo $row['p_id']; ?>" type="text" name='initial_amount[]' value="<?php $amount=$row['oPrice'] * $row['quantity']; echo $amount; ?>" readonly></td>-->
    								<!--						</tr>-->
    								<!--							<div style="display:none">-->
    								<!--								<input type="text" name='po_id' value='<?php echo $po_id;?>'>-->
    								<!--							</div>-->
    								<!--							<?php-->
    								<!--						}
    								<!--					?>-->
    								<!--					</tbody>-->
												<!--		<td> </td>-->
												<!--		<td> </td>-->
												<!--		<td> </td>-->
												<!--		<td> </td>-->
												<!--		<td><b>Shipping fee: 60.00</td></b>-->
												<!--		<td colspan="6"><b>Total amount: <?php echo $total + 60;?></td></b>-->
    								<!--				</table>-->
													
    								<!--				</div>-->
    										
    								<!--		</div>-->
    								<!--	</div>-->
    								<!--</div>-->
									


								<?php if($_SESSION['role'] != "supplier"){ ?>						
								<button type="button" data-toggle="modal" data-target="<?php echo '#deleteModal'.$po_id; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
								<div class="modal fade" id="<?php echo 'deleteModal'.$po_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<form method="POST" action="PurchaseOrder/deletePO.php">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Delete Purchase Order</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Are you sure you want to delete <?php echo 'PO-0'.$po_id; ?> ?
													<div style="display:none">
														<input type="text" name='po_id' value='<?php echo $po_id;?>'>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
													<button type="submit" class="btn btn-primary">Yes</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php 
								} 
								?>
								
							</td>
							
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
	
    function changeStatus(id,status){
            let serializeData = `id=${id}&status=${status}`
            $.post('PurchaseOrder/changeStatus.php',serializeData,function(response){
                swal('Success',response,'success')
                setTimeout(() => {
                    window.location.href = 'purchaseorder.php'
                }, 1500);
                
            })
        }
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
	<?php }
	?>