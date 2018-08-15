<?php
ob_start();
session_start();
include"header.php";
include"db.php";
$r_name=mysql_real_escape_string($_POST["RName"]);
$email=mysql_real_escape_string($_POST["email"]);
$pass=mysql_real_escape_string($_POST["password"]);
$q=mysqli_query($con,"select * from restaurants_info where restaurants_name='$r_name' and email='$email' and password='$pass'");
echo "	<div class='gallery'>
				<div class='container'>";
if($row=mysqli_fetch_array($q))
{
	$_SESSION["res_id"]=$row[0];
	$_SESSION["res_name"]=$row[1];
	echo "<h2 class='tittle-w3'>Welcome $row[1] :)</h2>";
}
else
{
	$_SESSION["login_error"]="Please Enter the valid details";
}
if(isset($_SESSION["res_id"]))
{
	header("location:restaurants/index.php");
}
else
	echo $_SESSION["login_error"];
?>

<!-- Footer -->
<?php
include"footer.php";
?>