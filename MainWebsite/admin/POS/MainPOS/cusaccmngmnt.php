<?php
    require_once('config1.php');
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

            <div class="row">
                <div class="col-md-12">
                <h3>Active Accounts on the Online Store</h3> <hr/>
                    <div class="table-responsive"> 
                    <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> User ID</th>
			<th width="9%"> Name </th>
			<th width="14%"> E-Mail </th>
			<th width="13%"> Validity </th>
			<th width="8%"> Valid ID (front) </th>
            <th width="8%"> Valid ID (back) </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
    
	<tbody>
	<?php 
	$query=mysqli_query($con,"select * from users");


while($row=mysqli_fetch_array($query))
{
?>

                <tr class="record">
					<td class="cart-product-name-info"> #<?php echo $id = $row['id'] ?></td>

					<td class="cart-product-name-info">
						
						<?php echo $row['name'];?></a></h4>
						
					</td>

					<td class="cart-product-sub-total"><?php echo $row['email']; ?>  </td>
                    
                    <?php $validity = $row['valid'];
                    if($validity == 0){
                        $valid = "No Valid ID's Submitted";
                    }
                    
                    else if($validity == 1){
                        $valid = "Validation on-going";
                    }
                    else if($validity == 2){
                        $valid = "Account Validated";
                    }?>
					<td class="cart-product-sub-total"><?php echo $valid; ?>  </td>

					<td class="cart-product-sub-total"><a rel="facebox" title="Click to check reciept" href="showValidIdFront.php?id=<?php echo $id; ?>"><img  src="validIDs/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['validPicFront']);?>" alt="" width="200" height="150"></a>  </td>

					<td class="cart-product-sub-total"><a rel="facebox" title="Click to check reciept" href="showValidIdBack.php?id=<?php echo $id; ?>"><img  src="validIDs/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['validPicBack']);?>" alt="" width="200" height="150"></a>  </td>

					<td>
					<a rel="facebox" title="Click to check reciept" href="updateCusAcc.php?id=<?php echo $id; ?>"><button class="btn btn-warning"><i class="bi bi-receipt"></i></button></a>
					
                    <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
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
   url: "deletecusacc.php",
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