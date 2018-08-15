<?php
include"db.php";
$time=base64_decode($_REQUEST["q"]);
$email=base64_decode($_REQUEST["em"]);
echo $email;
$query2=mysqli_query($con,"select * from forgot_password_mng where email='$email' and req_time='$time'");
	if($r=mysqli_fetch_array($query2))
	{
		$date=date("Y-m-d H:i:s", strtotime($time."+ 20 minutes"));
		$time_now=date("Y-m-d H:i:s");
		if($date>=$time_now)
			echo "active";
		else
			echo "expire";
	}

?>