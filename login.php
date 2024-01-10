<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is a required field");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is a required field");
	    exit();
	}else{
		$sql = "SELECT * FROM user_details WHERE userName='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['userName'] === $uname && $row['password'] === $pass) {
            	$_SESSION['userName'] = $row['userName'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: lawfirm_home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or Password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or Password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}