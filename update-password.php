<?php
include"db.php";
$email=mysqli_real_escape_string($con,$_REQUEST["email"]);
$pass=mysqli_real_escape_string($con,$_REQUEST["password"]);
$query3=mysqli_query($con,"update user_info set password='$pass' where email='$email'");
		if($query3)
		{
			echo "<p >Your Password has been changed successfully</p>
			<p><a href='index.php'>Keep Ordering</a></p>
			";
			$query=mysqli_query($con,"DELETE FROM forgot_password_mng WHERE email='$email'");
		}
		else
			echo "<p>We have Some issue please try after some time</p>";

?>