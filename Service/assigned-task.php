<?php
session_start();
?>
<script>
$("#confirm").click(function(){
				 $.post("confirm.php",function(data)
						{
							$("#assigned-order-contain").html(data).show();
						});		
});
$("#delivered").click(function()
	{
				$.post("delivered.php",function(data)
				{	
				alert(data);
								$("#service-contain").html(data).show();
				});
					
	});
</script>
<?php
if(!isset($_SESSION["service_man"]))
{
	header("location:index.php");
}
include"db.php";
$service_id=$_SESSION["service_man"];
$q=mysqli_query($con,"select * from service_mans_order where service_man_id='$service_id' and delivery_status='0'");
if($row=mysqli_fetch_array($q))
{
	echo"<div class='contain row' style='color:blue'>";
	$email='';
	$q1=mysqli_query($con,"select * from placed_orders where id='$row[2]'");
	if($row1=mysqli_fetch_array($q1))
	{
		$email=$row1[1];
		echo"<div class='col-md-3 col-sm-3'>
			<label>Name:- $row1[2]</label>
		</div>
		<div class='col-md-3 col-sm-3'>
			<span>Address:- $row1[4]</span>
		</div>
		<div class='col-md-3 col-sm-3'>
			<span>Mobile:- $row1[3]</span>
		</div>
		<div class='col-md-3 col-sm-3'>
			<span>Area:- $row1[5]</span>
			<h6>&nbsp;</h6>";
			if($row[5]==0)
			{
				echo "<center><h1><button type='button' class='label label-primary btn btn-lg' id='confirm'>Confirm</button></h1></center>
		";
			}
			else if($row[5]==1)
			{
				echo "<h1><button type='button' class='label label-primary btn btn-lg' id='delivered'>Delivered</button></h1>";
			}
		echo "<h6>&nbsp;</h6>
		</div>";
		
	}
	echo "</div>";
	$q2=mysqli_query($con,"select * from cart where usr_email='$email' and order_status!='0' and delivery_status='0'");
	echo"<div class='container row'>";
	$res="0";
	$sr=1;
					echo"<div class='thumbnail' style='display:none'>";
	while($row2=mysqli_fetch_array($q2))
	{
		$q3=mysqli_query($con,"select * from restaurants_info");
		while($row3=mysqli_fetch_array($q3))
		{
			$q4=mysqli_query($con,"select * from food_details where res_name='$row3[1]'");
			while($row4=mysqli_fetch_array($q4))
			{
				if($row4[0]==$row2[2])
				{
					if($res!=$row3[1])
					{
						
					echo "</div>";
					echo"<div class='thumbnail'>";
					echo "<label style='color:red'>$row3[1]</label><br>
					<p style='color:red'>$row3[5]</p>";
					$res=$row3[1];
					$sr=1;
					}
					echo"<ul>";
					$q5=mysqli_query($con,"select * from food_details where id='$row2[2]'");
					while($row5=mysqli_fetch_array($q5))
					{
						echo "&nbsp;&nbsp;<span style='color:green'>$sr.$row5[3]</span>";
					}
					echo "</ul>";
					
				}
			}
			
		}
	}
	echo "</div>";
}
else
	echo"<label>No order</label>";
?>