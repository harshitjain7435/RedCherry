<?php
session_start();
include"db.php";
$name=mysqli_real_escape_string($con,$_POST["Name"]);
$email=mysqli_real_escape_string($con,$_POST["email"]);
$phone=mysqli_real_escape_string($con,$_POST["phone"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);
$q=mysqli_query($con,"insert into user_info(name,email,password,phone)values('$name','$email','$password','$phone')");
if($q)
{
	$r=mysqli_query($con,"select * from user_info where phone='$phone'");
		$_SESSION["usr_id"]=mysqli_insert_id($con);
		$_SESSION["usr_email"]=$email;
		$_SESSION["usr_name"]=$name;
	header("location:index.php");
}
else echo mysqli_error($con);


?>
