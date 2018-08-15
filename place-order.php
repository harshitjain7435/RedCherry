<?php
session_start();
include"db.php";
$name=mysqli_real_escape_string($con,$_POST["name"]);
$add=mysqli_real_escape_string($con,$_POST["address"]);
$email=mysqli_real_escape_string($con,$_POST["mail"]);
$phone=mysqli_real_escape_string($con,$_POST["phone"]);
$area=mysqli_real_escape_string($con,$_POST["area"]);
if(	(isset($_SESSION["usr_email"])) || (isset($_SESSION["google_email"]))	)
{
 $up=mysqli_query($con,"select * from cart where usr_email='$email' and  order_status='0'");
  if($up)
 {
	
	if($row=mysqli_fetch_array($up))
	{
		$r1=mysqli_query($con,"insert into placed_orders(usr_email,name,mobile_number,address,area)values('$email','$name','$phone','$add','$area')");
		$a=1;
		while($row1=mysqli_fetch_array($up))
		{
			$r=mysqli_query($con,"update cart set order_status='$a' where usr_email='$email'");
		}
	}
	echo "<label class='flash' align='center'>Thank you...!!!</label></br></br>";
	echo "<label class='thankyou_msg'>Your Order has been Placed Successfully</label>";
	

	}
}
else if(isset($_SESSION["dummy_usr_id"]))
{
	$r2=mysqli_query($con,"insert into placed_orders(usr_email,name,mobile_number,address,area)values('$email','$name','$phone','$add','$area')");
	$dummy_id=$_SESSION["dummy_usr_id"];
	$q=mysqli_query($con,"select * from dummy_usr where usr_id='$dummy_id'");
	while($row=mysqli_fetch_array($q))
	{
			$q1=mysqli_query($con,"insert into cart(usr_email,product_id,quantity,order_status)values('$email','$row[2]','$row[3]','1')");
			$q2=mysqli_query($con,"delete from dummy_usr where id=$row[0]");
			
	}
	echo "<label class='flash' align='center'>Thank you...!!!</label></br></br>";
	echo "<label class='thankyou_msg'>Your Order has been Placed Successfully</label>";
}
   
?>