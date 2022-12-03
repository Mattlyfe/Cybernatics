<?php
require_once('config1.php');
if(!isset($_SESSION)) 
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
} else {

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
<title>Admin| Customer Account Management</title>
<link rel="shortcut icon" href="img/icon logo.png">
<link href="css/bootstrap.css" rel="stylesheet">

<!--link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css"-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
        <div style="margin-top: -19px; margin-bottom: 21px;">
			<h3>Active Customer Accounts on the Online Store</h3>
		</div>	
        <i class="bi bi-search" style="font-size:26px;"></i> <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search..." autocomplete="off" />
<br><br>
        <div class="row" style="height:500px; overflow-y: scroll;">
                <div class="col-md-12">
                
                    <div class="table-responsive"> 
                    
                    <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> User ID</th>
			<th width="9%"> Name </th>
			<th width="14%"> E-Mail </th>
            <th width="14%"> Contact No. </th>
			<th width="13%"> Validity </th>
			<th width="8%"> Valid ID </th>
            <th width="8%"> Valid ID </th>
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
                    <td class="cart-product-sub-total">0<?php echo $row['contactno']; ?>  </td>
                    
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

                    <?php if($row['validPicFront'] == null){?>
                        <td class="cart-product-sub-total"> No ID submitted yet
                    <?php }

                     else{ ?>
					<td class="cart-product-sub-total"><a rel="facebox" title="Click to check reciept" href="showValidIdFront.php?id=<?php echo $id; ?>"><img  src="validIDs/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['validPicFront']);?>" alt="" width="200" height="150"></a>  </td>
                    <?php }?>

                    <?php if($row['validPicFront'] == null){?>
                        <td class="cart-product-sub-total"> No ID submitted yet
                    <?php }

                     else{ ?>
					<td class="cart-product-sub-total"><a rel="facebox" title="Click to check reciept" href="showValidIdBack.php?id=<?php echo $id; ?>" ><img  src="validIDs/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['validPicBack']);?>" alt="" width="200" height="150"></a>  </td>
                    <?php }?>

					<td>
					<button id="editBtn<?php echo $row['id']; ?>" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pass"></i></button>

					
                    <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
				</tr>
<div class="modal fade" id="editModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="addAnnouncementLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column text-center">
                
                <form action="saveeditcusacc.php" method="post">
                    <center><h4><i class="icon-edit icon-large"></i> Edit Account:</h4></center>
                    <hr>
                    <div id="ac">
                    <input type="hidden" name="memi" value="<?php echo $row['id']; ?>" />
                    <input type="hidden" name="pass" value="<?php echo $row['password']; ?>" />
                    <span>Name : </span><br><input type="text" style="width:359px; height:40px;"  name="name" value="<?php echo $row['name']; ?>" Required/><br>
                    <span>E-Mail : </span><br><input type="text" style="width:359px; height:40px;"  name="email" value="<?php echo $row['email']; ?>" /><br>
                    <span>Contact Number : </span><input type="text" style="width:359px; height:40px;" name="contactno" value="<?php echo $row['contactno']; ?>" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" /> <br>
                    <span>Password : </span><br><input type="password" style="width:359px; height:40px;" name="password" value="<?php echo $row['password']; ?>"/><br>
                    <span>Valid : </span><select name ="valid" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <?php
                        $val= $row['valid'];
                        if($val== 0){?>
                        <option value="0" selected>No Valid ID's Submitted</option>
                        <option value="1" >Validation on-going</option>
                        <option value="2">Account Validated</option>
                        <?php
                        }
                        ?>
                        <?php
                        if($val== 1){?>
                        <option value="0" >No Valid ID's Submitted</option>
                        <option value="1" selected>Validation on-going</option>
                        <option value="2">Account Validated</option>
                        <?php
                        }
                        ?>
                    
                        <?php
                        if($val== 2){?>
                        <option value="0" >No Valid ID's Submitted</option>
                        <option value="1" >Validation on-going</option>
                        <option value="2" selected>Account Validated</option>
                        <?php
                        }
                        ?>
                        
                      </select><br>
                    
                    <div style="text-align: center; margin-top: 10px">
                    
                    <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
                    </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
  </div>

<?php } ?>
	

	</tbody>
</table>
<div class="clearfix"></div>
                </div>
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
<?php }
} ?>