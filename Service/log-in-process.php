<?php
session_start();
include"db.php";
$id=mysqli_real_escape_string($con,$_POST["emp_id"]);
$pass=mysqli_real_escape_string($con,$_POST["password"]);
$q=mysqli_query($con,"select * from service_man where email='$id' and password='$pass'");
if($row=mysqli_fetch_array($q))
{
	$_SESSION["service_man"]=$row[0];
	header("location:Service.php");
	$q1=mysqli_query($con,"update service_man set login_status='1' where id='$row[0]'");
}
else
{
	$_SESSION["service_login_error"]="Please Enter the valid details";
	header("location:index.php");
}
?>
