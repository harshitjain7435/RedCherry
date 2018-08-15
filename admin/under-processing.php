<?php
include"db.php";
$q=mysqli_query($con,"select * from service_mans_order where delivery_status='0'");
while($row=mysqli_fetch_array($q))
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
	echo "<div class='container row' style='color:blue'>Service Man <br>";
	$qqq=mysqli_query($con,"select * from service_man where id='$row[1]'");
	if($rowA=mysqli_fetch_array($qqq))
	{
		echo"<div class='col-md-4 col-sm-4'>
			<label>Name:- $rowA[1]</label>
		</div>
		<div class='col-md-4 col-sm-4'>
			<span>Email:- $rowA[2]</span>
		</div>
		<div class='col-md-4 col-sm-4'>
			<span>Mobile:- $rowA[4]</span>
		</div>";
	}
	echo "</div><hr><hr>";
}
?>