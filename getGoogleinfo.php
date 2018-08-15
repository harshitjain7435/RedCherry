<?php
session_start();
include"db.php";
$profile_id=mysql_real_escape_string($_GET["id"]);
$fullname=mysql_real_escape_string($_GET["FullName"]);
$givenname=mysql_real_escape_string($_GET["GivenName"]);
$fname=mysql_real_escape_string($_GET["FamilyName"]);
$url=mysql_real_escape_string($_GET["ImageURL"]);
$email=mysql_real_escape_string($_GET["Email"]);
$tokenid=mysql_real_escape_string($_GET["TokenId"]);
$q1=mysqli_query($con,"select * from google_user_info where email='$email' and profile_id='$profile_id'");
if($row=mysqli_fetch_array($q1))
{
	$_SESSION["google_usr_id"]=$row[0];
	$_SESSION["google_usr"]=$fullname;
				$_SESSION["google_email"]=$email;
	header("location:index.php");
}
else
{
			$q=mysqli_query($con,"insert into google_user_info(token_id,full_name,given_name,family_name,image_url,email,profile_id)values('$tokenid','$fullname','$givenname','$fname','$url','$email','$profile_id')");
			if($q)
			{
				$_SESSION["google_usr"]=$fullname;
				$_SESSION["google_email"]=$email;
				
			}
			$q1=mysqli_query($con,"select * from google_user_info where email='$email' and profile_id='$profile_id'");
			if($row=mysqli_fetch_array($q1))
			{
				$_SESSION["google_usr"]=$row[0];
				header("location:index.php");
			}
			
}

?>