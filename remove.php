<?php
session_start();
?>
<script>

$("#OrderNow").click(function(){
    $("#OrderModel").modal("show");
    });
$(".increment").click(function()
	{
					var cartId=$(this).attr("id");	
					var qunt=document.getElementById("s"+cartId).innerHTML;
					var qunt=parseInt(qunt);
					
						$.post("order_increment.php",{quntity2:qunt,id:cartId},function(data)
							{		
								$("#basket").html(data).show();
							});
					
	});
	$(".decrement").click(function()
	{
				var cartId=$(this).attr("id");	
				var qunt=document.getElementById("s"+cartId).innerHTML;
				var qunt=parseInt(qunt);
				if(qunt>1)
				{
					$.post("order_decrement.php",{quntity2:qunt,id:cartId},function(data)
					{		
						$("#basket").html(data).show();
					});	
				}
	});
	$(".remove").click(function()
	{
				var cartId=$(this).attr("id");	
				$.post("remove.php",{id:cartId},function(data)
					{		
						$("#basket").html(data).show();
					});	
	});
</script>

<?php
include"db.php";
$cart_id=$_POST["id"];


if(isset($_SESSION["dummy_usr_id"]))
 {
	$find=mysqli_query($con,"select * from dummy_usr where id='$cart_id'");
	if($rr=mysqli_fetch_array($find))
	{
		mysqli_query($con,"delete from dummy_usr where id='$cart_id'");
	}
}
else if(isset($_SESSION["usr_email"]))
{
//$usr_email=$_SESSION["usr_email"];
	$find=mysqli_query($con,"select * from cart where cart_id='$cart_id'");
	if($rr=mysqli_fetch_array($find))
	{
		mysqli_query($con,"delete from cart where cart_id='$cart_id'");
	}
}
else if(isset($_SESSION["google_email"]))
{
//$usr_email=$_SESSION["usr_email"];
	$find=mysqli_query($con,"select * from cart where cart_id='$cart_id'");
	if($rr=mysqli_fetch_array($find))
	{
		mysqli_query($con,"delete from cart where cart_id='$cart_id'");
	}
}
//$usr_email=$_SESSION["usr_email"];
	echo "<div class='panel panel-default'>
						  <div class='panel-heading'> <i class='fa fa-cart-arrow-down fa-2x' aria-hidden='true'> Food Basket</i></div>
							  <div class='panel-body'>";
							  if(isset($_SESSION["dummy_usr_id"]))
							  {
							  		$dummy_id=$_SESSION["dummy_usr_id"];
									$total=0;
									$q=mysqli_query($con,"select * from dummy_usr where usr_id='$dummy_id'");
									while($row=mysqli_fetch_array($q))
									{
										$q1=mysqli_query($con,"select * from food_details where id='$row[2]'");
										while($row1=mysqli_fetch_array($q1))
										{
										$price=$row[3]*$row1[6];
										$total+=$price;
											echo"<div class='row thumbnail increment'>
													<div class='col-md-3'>
														<img src='upload-img/$row1[7]' alt='' class=' img-responsive' style='min-width:70px;height:70px;'>
													</div>
													<div class='col-md-6'>
														<h4 class='w3-title'><a href='#'>$row1[3]</a> </h4>
														
														<i class='increment fa fa-plus-square' id='$row[0]' style='cursor:pointer'></i>
														<label id='s$row[0]' name='quantity1'>$row[3]</label>
														<i class='decrement fa fa-minus-square'  id='$row[0]' style='cursor:pointer'></i>
													</div>
													<div class='col-md-3'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$price/-
														</h4>
														<h6>&nbsp;</h6>
														<h6 class='w3-title'><a href='#' id='$row[0]' class='remove'>Remove</a> </h6>
													</div>
												</div>";
										}
									}
									echo"<div class='row thumbnail'>
													<div class='col-md-6'>
														<label>Total Amount :-</label>
													</div>
													<div class='col-md-6'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$total/-
														</h4>
														<h4>&nbsp;</h4>
														<h3><a href='#' id='OrderNow' class='label label-primary btn btn-block btn-lg'>Order Now</a></h3><h4>&nbsp;</h4>
													</div>
												</div>";
							  }
							  else if(isset($_SESSION["usr_email"]))
							  {
							  		$user_email=$_SESSION["usr_email"];
									$total=0;
									$q=mysqli_query($con,"select * from cart where usr_email='$user_email' and order_status='0'");
									while($row=mysqli_fetch_array($q))
									{
										$q1=mysqli_query($con,"select * from food_details where id='$row[2]'");
										while($row1=mysqli_fetch_array($q1))
										{
										$price=$row[3]*$row1[6];
										$total+=$price;
											echo"<div class='row thumbnail increment'>
													<div class='col-md-3'>
														<img src='upload-img/$row1[7]' alt='' class=' img-responsive' style='min-width:70px;height:70px;'>
													</div>
													<div class='col-md-5'>
														<h4 class='w3-title'><a href='#'>$row1[3]</a> </h4>
														
														<i class='increment fa fa-plus-square' id='$row[0]' style='cursor:pointer'></i>
														<label id='s$row[0]' name='quantity1'>$row[3]</label>
														<i class='decrement fa fa-minus-square'  id='$row[0]' style='cursor:pointer'></i>
													</div>
													<div class='col-md-4'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$price/-
														</h4>
														<h6>&nbsp;</h6>
														<h6 class='w3-title'><a href='#' id='$row[0]' class='remove'>Remove</a> </h6>
													</div>
												</div>";
										}
									}
									echo"<div class='row thumbnail'>
													<div class='col-md-6'>
														<label>Total Amount :-</label>
													</div>
													<div class='col-md-6'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$total/-
														</h4>
														<h4>&nbsp;</h4>
														<h3><a href='#' id='OrderNow' class='label label-primary btn btn-block btn-lg'>Order Now</a></h3><h4>&nbsp;</h4>
													</div>
												</div>";
							  }
							   else if(isset($_SESSION["google_email"]))
							  {
							  		$user_email=$_SESSION["google_email"];
									$total=0;
									$q=mysqli_query($con,"select * from cart where usr_email='$user_email' and order_status='0'");
									while($row=mysqli_fetch_array($q))
									{
										$q1=mysqli_query($con,"select * from food_details where id='$row[2]'");
										while($row1=mysqli_fetch_array($q1))
										{
										$price=$row[3]*$row1[6];
										$total+=$price;
											echo"<div class='row thumbnail increment'>
													<div class='col-md-3'>
														<img src='upload-img/$row1[7]' alt='' class=' img-responsive' style='min-width:70px;height:70px;'>
													</div>
													<div class='col-md-5'>
														<h4 class='w3-title'><a href='#'>$row1[3]</a> </h4>
														
														<i class='increment fa fa-plus-square' id='$row[0]' style='cursor:pointer'></i>
														<label id='s$row[0]' name='quantity1'>$row[3]</label>
														<i class='decrement fa fa-minus-square'  id='$row[0]' style='cursor:pointer'></i>
													</div>
													<div class='col-md-4'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$price/-
														</h4>
														<h6>&nbsp;</h6>
														<h6 class='w3-title'><a href='#' id='$row[0]' class='remove'>Remove</a> </h6>
													</div>
												</div>";
										}
									}
									echo"<div class='row thumbnail'>
													<div class='col-md-6'>
														<label>Total Amount :-</label>
													</div>
													<div class='col-md-6'>
														<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$total/-
														</h4>
														<h4>&nbsp;</h4>
														<h3><a href='#' id='OrderNow' class='label label-primary btn btn-block btn-lg'>Order Now</a></h3><h4>&nbsp;</h4>
													</div>
												</div>";
							  }
							  else
							  {
								  echo"<center><i class='fa fa-shopping-basket fa-5x' aria-hidden='true'></i><center>";
							  }
							  
							  
							 	echo "</div>
						</div>";
	
	
?>
 <div class="contain">
								<p style="color:#000099">If You Order from more then one restaurants then your delivery time will increase.</p>
								<p style="color:#000099">Delivery Time is depend on your Order from Number of restaurants</p>
							</div>