<?php
session_start();
include"db.php";
$id=mysqli_real_escape_string($con,$_POST["emp_id"]);
$pass=mysqli_real_escape_string($con,$_POST["password"]);
$q=mysqli_query($con,"select * from admin where emp_id='$id' and password='$pass'");
if($row=mysqli_fetch_array($q))
{
	$_SESSION["admin"]=$row[0];
	header("location:admin.php");
}
else
{
	$_SESSION["login_error"]="Please Enter the valid details";
	header("location:index.php");
}
?>
