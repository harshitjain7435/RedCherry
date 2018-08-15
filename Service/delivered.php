<?php
session_start();
include"db.php";
$s_id=$_SESSION["service_man"];
$date=date("y-m-d");
$time=date("h:m:s");
echo $s_id;
$q=mysqli_query($con,"select * from service_mans_order where service_man_id='$s_id'");
if($row=mysqli_fetch_array($q))
{
	
		$qq=mysqli_query($con,"update service_mans_order set delivery_status='1' where service_man_id='$s_id' and delivery_status='0'");
	$q1=mysqli_query($con,"select * from placed_orders where id='$row[2]'");
	if($row1=mysqli_fetch_array($q1))
	{
		$q2=mysqli_query($con,"update cart set delivery_status='1', time='$time', date='$date' where usr_email='$row1[1]' and order_status='1' and delivery_status='0'");
		$qq=mysqli_query($con,"update service_man set status='0' id='$s_id' ");
		if($q2)
		{
			echo "<label>Thank You</label>";
		}
		else
			echo mysqli_error($con);
	} 
		else
			echo mysqli_error($con);
}
		else
			echo mysqli_error($con);
?>