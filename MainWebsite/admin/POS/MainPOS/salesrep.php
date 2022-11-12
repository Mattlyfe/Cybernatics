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
		overflow-x: hidden;
	}
	.invetb{
		padding-top: 50px;
		padding-left: 317px;
		padding-right: 70px;
		height:1000px;
		overflow-y:auto;
		overflow-x: hidden;
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.1/apexcharts.min.js" integrity="sha512-YwMWovbODpJxF5IN8vZI3F6v+t/Q0UBrgfeyJUEJYl00uOVWqtWWOIfpplNy88ZL2ZYb5LywrKz2aD0ZtlFU9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
       
		
		
    ?>
    
	<div class="row invetb" >
	<div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Sales Report</h3>
		</div>	
		<div class="col-12 mt-1">
		<div class="row mt-1">
			<!-- <div id="chart" class="col"></div> -->
			<div class="col-4 d-flex justify-content-center">
				<div class="card bg-dark  text-white text-center p-3 ">
					<p>Total Sales today</p>
					<p id="sale_today" style="font-weight:bold">0.00</p>
				</div>
			</div>
			<div class="col-4 d-flex justify-content-center">
				<div class="card bg-dark text-white text-center p-3 ">
					<p>Online Store Sales </p>
					<p id="online-store" style="font-weight:bold">0.00</p>
				</div>
			</div>
			<div class="col-4 d-flex justify-content-center">
				<div class="card bg-dark text-white text-center p-3 ">
					<p>In-Store Sales </p>
					<p id="instore" style="font-weight:bold">0.00</p>
				</div>
			</div>
		</div>
		<div class="row mt-5" style="border-bottom:solid black 4px">
            <div class="col m-2">
				<label for="">Date From:</label>
				<input type="date" id="datefrom" name="date">
				<label for="">Date To:</label>
				<input type="date" id="dateto" name="date">
				<button class="btn btn-primary btn-sm" id="generate" type="button">Generate</button>	
            </div>
        </div>
		<div class="row">
			<div class="col-6 pt-2" style="height:100%">
				<div id="chart"></div>
			</div>
			<div class="col-6">
				<div id="chart2"></div>
			</div>
		</div>
		</div>
    </div>
	<div class="clearfix"></div>
	</div>

	<script src="js/jquery.js">
    </script>
    <script type="text/javascript">
		$( document ).ready(function() {
			let from = $('#datefrom').val()
			let to = $('#dateto').val()
			if(from == ''|| to == ''){
				$.post('SalesReport/getChartData.php','',function(response){
				var data = JSON.parse(response)
				var options = {
					chart: {
						type: 'line'
					},
					series: [
						{
						name: 'sales',
						data: data.map(e=>{return e.total_amount})
						}
					],
					xaxis: {
						categories: data.map(e=>{return e.dates})
					}
				}
				var chart = new ApexCharts(document.querySelector('#chart'), options)
				chart.render()
			})
			}
			
			$.post('SalesReport/getStoreSales.php','',function(response){
				var data = JSON.parse(response)

				let online_store= Number(data[0].online)
				let in_store= Number(data[0].instore)

				let online_currency = online_store.toLocaleString("en-US");
				let instore_currency = in_store.toLocaleString("en-US");

				$('#online-store').html("PHP "+online_currency+".00")
				$('#instore').html("PHP "+instore_currency+".00")
				var options2 = {
					chart: {
						type: 'pie'
					},
					series: [in_store,online_store],
					labels: ['In-Store', 'Online Store'],
					plotOptions: {
						pie: {
							customScale: 0.8
						}
					}
				}
				var chart2 = new ApexCharts(document.querySelector('#chart2'), options2)
				chart2.render()
			})	

			let currentDate = new Date().toJSON().slice(0, 10);
			console.log(currentDate);
			let serializedData = `date_today=${currentDate}`
			$.post('SalesReport/getSalesToday.php',serializedData,function(response){
				console.log(response)
				var data = JSON.parse(response)
				let sales_today = Number(data[0].total_amount)
				let sales_currency = sales_today.toLocaleString("en-US");
				$('#sale_today').html("PHP "+sales_currency+".00")
			})
		});
		
    
	
    $('#generate').click(function(){
        let from = $('#datefrom').val()
		let to = $('#dateto').val()
       
		let serializedData = `from=${from}&to=${to}`
        $.post('SalesReport/generateData.php',serializedData,function(response) {

				var data = JSON.parse(response)
				var options = {
					chart: {
						type: 'line'
					},
					series: [
						{
						name: 'sales',
						data: data.map(e=>{return e.total_amount})
						}
					],
					xaxis: {
						categories: data.map(e=>{return e.dates})
					}
				}
				var chart = new ApexCharts(document.querySelector('#chart'), options)
				chart.render()
			
        });
    })
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