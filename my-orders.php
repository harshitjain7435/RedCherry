<?php
session_start();
?>
    <link rel="stylesheet" href="start-rating/star-rating.css" media="all" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="start-rating/star-rating.js" type="text/javascript"></script>
	<script>
		$(".get-rating").change(function()
		{
			var proId=$(this).attr("id");	
			var star=document.getElementById(proId).value;
			$.post("rate-product.php",{ProId:proId,star_rating:star},function(data)
			{
				//$("#MyOrders").html(data).show();
			});
		});
	</script>

<?php
include"db.php";
if(isset($_SESSION["google_email"]))
	$usr_email=$_SESSION["google_email"];
else if(isset($_SESSION["usr_email"]))
	$usr_email=$_SESSION["usr_email"];
$q=mysqli_query($con,"select * from cart where usr_email='$usr_email' and delivery_status='1'");
$total=0;
$date=0;
while($row=mysqli_fetch_array($q))
{
if($date!=$row[4])
{
	$date=$row[4];
	echo "<label>$row[4]($row[5])</label><hr>";
}
	
		$q1=mysqli_query($con,"select * from food_details where id='$row[2]'");
		while($row1=mysqli_fetch_array($q1))
		{
		$price=$row[3]*$row1[6];
		$total+=$price;
		echo"<div class='row thumbnail increment'>
					<div class='col-md-2'>
						<img src='upload-img/$row1[7]' alt='' class=' img-responsive' style='min-width:70px;height:70px;'>
					</div>
					<div class='col-md-3'>
						<h4 class='w3-title'><a href='#'>$row1[3]</a> </h4>
						<h4 class=''>By:-$row1[2]</h4>
						<label id='s$row[0]' name='quantity1'>Quantity:-$row[3]</label>
					</div>
					<div class='col-md-2'>
						<h4><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$price/-
						</h4>
							<h6>&nbsp;</h6>
					</div>
					<div class='col-md-6'>";
					$qq=mysqli_query($con,"select * from star_rating where pro_id='$row1[0]' and usr_email='$usr_email'");
					if($rowA=mysqli_fetch_array($qq))
					{
						echo "<input type='text' class='rating rating-loading get-rating' data-size='xs' title='' value='$rowA[1]' id='$row1[0]'>";
					}
					else
					{
						echo "<input type='text' class='rating rating-loading get-rating' data-size='xs' title='' id='$row1[0]'>";
						
					}
					echo "</div>
					</div>";
		}


}


?>