<?php
session_start();
include"db.php";
$star=$_REQUEST["star_rating"];
$product=$_REQUEST["ProId"];
if(isset($_SESSION["google_email"]))
	$usr_email=$_SESSION["google_email"];
else if(isset($_SESSION["usr_email"]))
	$usr_email=$_SESSION["usr_email"];
$q=mysqli_query($con,"select * from star_rating where pro_id='$product' and usr_email='$usr_email'");
if($row=mysqli_fetch_array($q))
{
	$q1=mysqli_query($con,"update star_rating set star='$star' where pro_id='$product' and usr_email='$usr_email'");
}
else
{
	$q2=mysqli_query($con,"insert into star_rating(pro_id,star,usr_email)values('$product','$star','$usr_email')");
	
}

?>
