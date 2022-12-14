<?php 
session_start(); 
include "config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate(md5($_POST['password']));

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$result = $db->prepare("SELECT * FROM users_be WHERE user_name='$uname' AND password='$pass'");
		$result->execute();
		$row=$result->fetch(PDO::FETCH_ASSOC);

		if ($result->rowCount() > 0) {
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['first_name'].' '.$row['last_name'];
            	$_SESSION['uid'] = $row['ID'];
				$_SESSION['role'] = $row['role'];

				if($row['role'] == "supplier"){
            	header("Location: purchaseorder.php");
            	exit;
			}

			else
			{
				header("Location: index.php");
		        exit();
			}
            }
            else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}