<?php
session_start();
include"db.php";
$res_id=$_SESSION["res_id"];
$res_name=$_SESSION["res_name"];
$fname=mysql_real_escape_string($_POST["FName"]);
$quantity=mysql_real_escape_string($_POST["quantity"]);
$category=mysql_real_escape_string($_POST["category"]);
$cuisine=mysql_real_escape_string($_POST["cuisine"]);
$price=mysql_real_escape_string($_POST["price"]);
$z=move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload-img/".$_FILES["photo"]["name"]);
$photo=$_FILES["photo"]["name"];
$other=mysql_real_escape_string($_POST["details"]);

$r=mysqli_query($con,"insert into food_details(res_id,res_name,food_name,cuisine,category,price,photo,quantity,details)values('$res_id','$res_name','$fname','$cuisine','$category','$price','$photo','$quantity','$other')");
if($r)
{
	$_SESSION["msg"]='Item added Successfully, Thank You.';
	echo $_SESSION["msg"];
	header("location:index.php");
}
else
	mysqli_error($con);
?>