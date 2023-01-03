<?php
session_start();
include_once 'includes/config.php';
$tId=intval($_GET['tId']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
		
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/trackPopup.css">
</head>
<body onload="openPopup()">
    
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100776989531652");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
<div class="pop-upContainer">
            <div class="popup" id="popup">
                <img src="image/trackIcon.png">
                <div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $tId;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT distinct order_header.transactionId as tranId, order_header.dateCreated as dateC, orders.orderStatus as orderS, order_header.remark as remark FROM order_header join orders on orders.transactionId=order_header.transactionId WHERE order_header.transactionId='$tId'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
     ?>

      <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['dateC'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['orderS'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2">Order Not Process Yet</td>
   </tr>
   <?php  }
$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE transactionId='$tId'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered successfully </b></td>
   <?php } 
 
  ?>
</table>
 </form>
</div>
                <button type="button" onclick="self.close()">Ok</button>
            </div>
        </div>
        <script>
            let popup = document.getElementById("popup");

            function openPopup(){
                popup.classList.add("open-popup");
            }
            function closePopup(){
                popup.classList.remove("open-popup");
            }
        </script>


</body>
</html>

     