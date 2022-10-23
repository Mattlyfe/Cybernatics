<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../MainWebsite/css/qr.css">
</head>
<body onload="openPopup()">
<div class="pop-upContainer">
            <div class="popup" id="popup">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <img src = "../MainWebsite/admin/images/qr.png">
    <br>
    <br>
    <br>
    <h1>Please Scan the qr code using the Gcash or Paymaya App</h1>
    <h1>Please send the proof payment to our <a href="http://m.me/Mattlyfee">Facebook Page</h1>
 </form>
</div>
                <button type="button" onclick="closePopup()">Ok</button>
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

     