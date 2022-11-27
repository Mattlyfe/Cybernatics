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
<title>Admin| Account Management</title>
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
            <th width="9%"> Role </th>
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
                    <td class="cart-product-name-info"><?php echo $row['role'];?></td>
                    <td class="cart-product-name-info"><?php echo $row['user_name'];?></td>
					<td class="cart-product-name-info"><?php echo $row['first_name'];?></td>
					<td class="cart-product-sub-total"><?php echo $row['last_name']; ?>  </td>
					<td>
					<button id="editBtn<?php echo $row['ID']; ?>" data-toggle="modal" data-target="#editModal<?php echo $row['ID']; ?>" class="btn btn-warning"><i class="bi bi-pass"></i></button>
                    <a href="#" id="<?php echo $row['ID']; ?>" class="delbutton" title="Click to Delete account"><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a></td>
				</tr>
<div class="modal fade" id="editModal<?php echo $row['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="addAnnouncementCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="addAnnouncementLongTitle">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body d-flex flex-column text-center">
                  
			  <form action="saveeditaccount.php" method="post">
                <center><h4><i class="icon-edit icon-large"></i> Edit Account:</h4></center>
                <hr>
                <div id="ac">
                <input type="hidden" name="memi" value="<?php echo $row['ID']; ?>" />
                <input type="hidden" name="pass" value="<?php echo $row['password']; ?>" />
                <span>Username : </span><br><input type="text" style="width:359px; height:40px;"  name="user_name" value="<?php echo $row['user_name']; ?>" /><br>
                <?php $role= $row['role']; 
                if($role != "admin"){?>
                <span for="role">Role : </span> 
                                        <select name="role" class="custom-select my-1 mr-sm-2" id="role">
                                            <?php 
                                           if($role == "cashier"){ ?>
                                            <option value="cashier" selected>Cashier</option>
                                            <option value="supplier">Supplier</option>
                                            <?php 
                                               
                                           } if($role == "supplier"){ ?>
                                            <option value="cashier" >Cashier</option>
                                            <option value="supplier" selected>Supplier</option>
                                            <?php 
                                               
                                           } 
                                            ?> 
                                            
                                        </select> <?php } ?> <br>
                <span>First name : </span><br><input type="text" style="width:359px; height:40px;"  name="first_name" value="<?php echo $row['first_name']; ?>" Required/><br>
                <span>Last name : </span><br><input type="text" style="width:359px; height:40px;"  name="last_name" value="<?php echo $row['last_name']; ?>" /><br>
                <span>Password : </span><br><input type="password" style="width:359px; height:40px;" name="password" value="<?php echo $row['password']; ?>"/><br>
                
                
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
  <?php } 
  }?>