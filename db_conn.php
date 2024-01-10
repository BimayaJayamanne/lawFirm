<?php

$sname= "securitydb-2.cjpapks9auhg.ap-southeast-2.rds.amazonaws.com:3306";
$usrname= "admin";
$password = "Bimaya123";

$db_name = "management_system";

$conn = mysqli_connect($sname, $usrname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}