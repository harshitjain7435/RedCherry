<?php
include"db.php";
$name=$_REQUEST["Name"];
$email=$_REQUEST["Email"];
$msg=$_REQUEST["Message"];
$date=date("d-m-y");
$time=date("h:m:s");
$q=mysqli_query($con,"insert into messages(name,email,message,date,time)values('$name','$email','$msg','$date','$time')");
if($q)
{
	echo "Thank You, We will Contact you very soon";
}
else
	echo mysqli_error($con);
?>