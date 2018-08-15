<script>
$(".panding-orders").click(function()
	{
				$.post("panding-orders.php",function(data)
				{	
								$("#order-contain").html(data).show();
				});
					
	});
</script>
<?php
include"db.php";
$id=$_REQUEST["id"];
$usrOrderId=$_REQUEST["usrOrderId"];
$date=date("y-m-d");
$time=date("h:m:s");
$q=mysqli_query($con,"insert into service_mans_order(service_man_id,usrOrderId,date,time)values('$id','$usrOrderId','$date','$time')");
if($q)
{
	$q2=mysqli_query($con,"update service_man set status='1' where id='$id'");
	$q1=mysqli_query($con,"update placed_orders set order_status='1' where id='$usrOrderId'");
	if($q1)
	{
		echo "<h4 class='page-header page-header icon-subheading'>Message <span class='pull-right panding-orders' style='cursor:pointer' id=''>&times;</span> </h4>";
		$q2=mysqli_query($con,"select * from placed_orders where id='$usrOrderId' and order_status='1'");
		if($row=mysqli_fetch_array($q2))
		echo "<p>Order from $row[1] is Assigned to";
		$q2=mysqli_query($con,"select * from service_man where id='$id'");
		if($row1=mysqli_fetch_array($q2))
		echo" $row1[1]($row1[2]). Now contact to service man for further inquiry</p>";
	}
	else
		echo mysqli_error($con);
}
	else
		echo mysqli_error($con);
?>