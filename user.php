<?php
//session_start();
include"db.php";
include"header.php";
$email=mysql_real_escape_string($_REQUEST["q"]);
$email=base64_decode($email);
echo "<div style='padding-top:70px;padding-bottom:70px;' >
	<div class='container'  >";
	echo"<div class='row'>
			<div class='col-md-3'>";
			if(isset($_SESSION["usr_id"]))
			{
				$q=mysqli_query($con,"select * from user_info where email='$email'");
						if($row=mysqli_fetch_array($q))
						{
							echo "<div class='panel panel-default'>
						  <div class='panel-heading'><center>Welcome $row[1]</center></div>
							  <div class='panel-body'>";
								 echo "
								 <h4><a href=''>Panding Order</a></h4><br>
								 <h4><a href='#' id='my-orders'>My Orders</a></h4><br>
								 <h4><a href='logout.php'>Logout</a></h4><br>
							  </div>
						</div>";
						}
						
			}
			else if(isset($_SESSION["google_usr_id"]))
			{
				$q=mysqli_query($con,"select * from google_user_info where email='$email'");
						if($row=mysqli_fetch_array($q))
						{
							echo "<div class='panel panel-default'>
						  <div class='panel-heading'><center>Welcome $row[2]</center></div>
							  <div class='panel-body'>";
								echo "<center><img src=$row[5] class='img-responsive img-circle'></center>";
								echo"<h4><a href=''>Panding Order</a></h4><br>
								 <h4><a href=''>Orders</a></h4><br>";
							  echo "
							  </div>
						</div>";
						}
			}

			echo "</div>";
	echo"<div class='col-md-9'><div class='containe' id='MyOrders'></div>";
						$q1=mysqli_query($con,"select * from cart where usr_email='$email' and order_status='1' and delivery_status='0'");
						$q2=mysqli_query($con,"select * from cart where usr_email='$email' and order_status='1' and delivery_status='0'");
						if($row1=mysqli_fetch_array($q1))
						{
							echo "<div class='panel panel-default'>
						  <div class='panel-heading'><center>Pending Orders</center></div>
							  <div class='panel-body'>";
							  $total=0;
							  while($row2=mysqli_fetch_array($q2))
							  {
							  		$q3=mysqli_query($con,"select * from food_details where id='$row2[2]'");
										if($row3=mysqli_fetch_array($q3))
										{
										$price=$row2[3]*$row3[6];
							 			$total+=$price;
											echo"<div class='row thumbnail'>
													<div class='col-md-3'>
														<img src='upload-img/$row3[7]' alt='' class=' img-responsive' style='min-width:70px;height:70px;'>
													</div>
													<div class='col-md-6'>
														<h4 class='w3-title'><a href='#'>$row3[3]</a> </h4>
														<label id='s$row[0]' name='quantity1'>Quantity:- $row2[3]</label><br>
														<label id='s$row[0]' name='quantity1'>By:- $row3[2]</label>
													</div>
													<div class='col-md-3'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$price/-
														</h4>
														<h6>&nbsp;</h6>
													</div>
												</div>";
												

										}
										
							  }
							  echo"<div class='row thumbnail'>
													<div class='col-md-9'>
														<label>Total Amount :-</label>
													</div>
													<div class='col-md-3'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$total/-
														</h4>
														
													</div>
												</div>";
								 echo "
							  </div>
						</div>";
						
							echo"</div> "; //<!-- closing of col-md-9 -->	
						}
						else
						{
							echo "<center><h2>No Panding Order</h2></center>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1><h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							<h1>&nbsp;</h1>
							";
							
						}
	?>
		</div> <!-- closing of row -->
	</div> <!-- closing of container-->
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php
include "footer.php";
?>