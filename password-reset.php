<?php
include"db.php";
$time=date("Y-m-d H:i:s");
$email=mysqli_real_escape_string($con,$_REQUEST["email1"]);
$q=mysqli_query($con,"select * from user_info where email='$email'");
if($row=mysqli_fetch_array($q))
{
	$query2=mysqli_query($con,"select * from forgot_password_mng where email='$email'");
	if($r=mysqli_fetch_array($query2))
	{
		$query3=mysqli_query($con,"update forgot_password_mng set req_time='$time' where email='$email'");
		if($query3)
		{
			echo "<p >Thank You, We have send you a link by mail for reset the password, follow the link for reset the password. Link will expire in next 20 minute ";
					$a=base64_encode($time);
					$b=base64_encode($email);
					 $adminEmail="harshitjain.16mb.com";
	$messageSubject= "Hi,";
	$msgBody="Your Request for reset the password is approved here is a link for reset your password 
	http://www.jainharshit.16mb.com/RedCherry/change-password.php?q=$a&em=$b
	";
        mail($email,$messageSubject,$msgBody);
		}
	}
	else
	{
			$query1=mysqli_query($con,"insert into forgot_password_mng(email,req_time)values('$email','$time')");
			if($query1)
			{
			
					echo "<p >Thank You, We have send you a link by mail for reset the password, follow the link for reset the password. Link will expire in next 20 minute.";
					$a=base64_encode($time);
					$b=base64_encode($email);
					 $adminEmail="harshitjain.16mb.com";
	$messageSubject= "Hi,";
	$msgBody="Your Request for reset the password is approved here is a link for reset your password 
	http://www.jainharshit.16mb.com/RedCherry/change-password.php?q=$a&em=$b
	";
        mail($email,$messageSubject,$msgBody);
			}
	}
}
else
{
	echo "<p>Sorry, You have entered Wrong email or this email id is not registered.<br> Please try Again.</p>";
}