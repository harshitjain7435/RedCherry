<?php
ob_start();
session_start();
include"header.php";
include"db.php";
$email=mysql_real_escape_string($_POST["email"]);
$pass=mysql_real_escape_string($_POST["password"]);
$q=mysqli_query($con,"select * from user_info where email='$email' and password='$pass'");
if($row=mysqli_fetch_array($q))
{
	$_SESSION["usr_id"]=$row[0];
	$_SESSION["usr_email"]=$row[2];
	$_SESSION["usr_name"]=$row[1];
	header("location:index.php");
}
else
{
	$_SESSION["login_error"]="Please Enter the valid details";
}
?>

<!-- Footer -->
<?php
include"footer.php";
?>