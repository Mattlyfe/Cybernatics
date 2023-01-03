<?php require_once('config1.php');
$id=$_GET['id'];
$query = mysqli_query($con,"select * from users where id = $id");?>
<?php while($row=mysqli_fetch_array($query))
{ ?>
<style>
html, body {
    height: auto;
    width: auto;
    margin: 0;
    padding: 0;
}

img {
    max-width: 1000px;
    max-height: 1000px;
    width: auto;
    margin: auto;
}
</style>

<img  src="validIDs/<?php echo $id;?>/<?php echo htmlentities($row['validPicBack']);?>" alt="">
<?php } ?>