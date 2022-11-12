<?php
    require_once('config.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
else
{
    session_destroy();
    session_start(); 
}

if($_SESSION['role'] == "cashier" ){
    header("Location: index.php");
}

else if($_SESSION['role'] == "supplier" ){
    header("Location: purchaseorder.php");
}

else{
?>
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
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
    <body>
        <?php
            include ('sidenav.php');
        ?>
        
        <div class="invetb">
        <div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Accounts on the Store</h3>
		</div>		
        <i class="bi bi-search" style="font-size:26px;"></i> <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search..." autocomplete="off" />
        <br><br>
        <div class="row" style="height:500px; overflow-y: scroll;">
                <div class="col-md-12">
                
                    <div class="table-responsive"> 
                    <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="7%"> User ID</th>
            <th width="9%"> Username </th>
			<th width="12%"> First name </th>
			<th width="12%"> Last name </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
    
	<tbody>
	<?php 
	$query=mysqli_query($con,"select * from users_be");


while($row=mysqli_fetch_array($query))
{
?>

                <tr class="record">
					<td class="cart-product-name-info"> #<?php echo $id = $row['ID'] ?></td>
                    <td class="cart-product-name-info"><?php echo $row['user_name'];?></td>
					<td class="cart-product-name-info"><?php echo $row['first_name'];?></td>
					<td class="cart-product-sub-total"><?php echo $row['last_name']; ?>  </td>
					<td>
					<a rel="facebox" title="Click to edit" href="update.php?id=<?php echo $id; ?>"><button class="btn btn-warning"><i class="bi bi-pass"></i></button></a>
					
                    <a href="#" id="<?php echo $row['ID']; ?>" class="delbutton" title="Click to Delete account"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
				</tr>


<?php } ?>
	

	</tbody>
</table>
<div class="clearfix"></div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Acount? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteacc.php",
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
  </html>
  <?php } ?>