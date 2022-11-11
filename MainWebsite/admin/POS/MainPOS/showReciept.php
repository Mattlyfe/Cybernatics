<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel1.png'
    })
  })
</script>
<?php require_once('config1.php');
if(isset($_POST['submit'])){
    header('location:orderhistory.php');
}

$id=$_GET['id'];
$query = mysqli_query($con,"select order_header.referenceNo as rNo, order_header.rNoImg, orders.userId as uid from order_header join orders on orders.transactionId=order_header.transactionId where order_header.transactionId=$id");?>
<?php while($row=mysqli_fetch_array($query))
{ ?>
<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    margin: auto;
}
</style>
<form name ="submit" method="post">
<img  src="referenceno/user id - <?php echo htmlentities($row['uid']);?>/<?php echo htmlentities($row['rNo']);?>/<?php echo htmlentities($row['rNoImg']);?>" alt=""><?php 
 }
 
?>
<input type="submit" name="submit" value="Go back" class="btn btn-warning"></form>