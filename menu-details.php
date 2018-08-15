<?php
include"db.php";
include"header.php";
//$req=mysql_real_escape_string($_REQUEST["q"]);
if(isset($_REQUEST["q"]))
{
	$req=mysql_real_escape_string($_REQUEST["q"]);
	$_SESSION["request"]=$req;
}
else
{
	$req=$_SESSION["request"];
}
$req=base64_decode($req);
include"left-bar.php";
			$q=mysqli_query($con,"select * from food_details where id='$req'");
	while($row=mysqli_fetch_array($q))
	{
	$cuisine=$row[4];
	$id=base64_encode($row[0]);
	$time=rand(35,50);
	$rev=rand(20,30);
	echo"
			<div class='row thumbnail'>
                        <div class='col-md-3'>
                            <img src='upload-img/$row[7]' alt='' class='img-thumbnail img-responsive' style='width:320px;height:200px;'>
						</div>
                            <div class='col-md-6'>
                                <h4 class='w3-title'></h4>
                                <h4><a href='#'>$row[3] &nbsp;</a> <i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$row[6]/-
                                </h4>
                                <p>($row[4],$row[5])</p>
                                <p>$row[8]</p>
                                <p>$row[9]</p>
                                <p>By:-$row[2]</p>
                            <div class='ratings'>";
											$total_star=0;
											$total_num=0;
											$query=mysqli_query($con,"select * from star_rating where pro_id='$row[0]'");
											while($r=mysqli_fetch_array($query))
											{
												$total_star+=$r[1];
												$total_num++;
											}
											$star_avg=0;
											if($total_num!=0)
											$star_avg=$total_star/$total_num;
												echo"<p class='pull-right'>$total_num reviews</p>
												
												<p>";
												for($i=1;$i<=$star_avg;$i++)
												{
													echo"<i class='fa fa-star'></i>";
												}
												for($j=$star_avg;$j<5;$j++)
												{
													echo"<i class='fa fa-star-o'></i>";
												}
													
												echo"</p>
											</div>
                            </div>
					<div class='col-md-3'>
						<h1>&nbsp;</h1>
                            <h3><a href='add-to-basket.php?q=$id' class='label label-primary btn btn-block btn-lg'>+ Add To meal</a></h3>
							<h3>&nbsp;</h3>
							 <h3><a href='#' class=' btn btn-lg' data-toggle='tooltip' data-placement='top' title='Estimated Dilivery Time'>$time Min. > ></a></h3>
					</div>
                   <h1>&nbsp;</h1>
				</div>";
	}
	?>
	<hr>
	<h2> Similar Dishes</h2>
	<hr>
	<h4>&nbsp;</h4>
	<?php
		$q=mysqli_query($con,"select * from food_details where cuisine='$cuisine'");
	while($row=mysqli_fetch_array($q))
	{
		$id=base64_encode($row[0]);
		$time=rand(35,50);
		if($row[0]!=$req)
		{
				$rev=rand(20,30);
				echo"
						<div class='row thumbnail'>
									<div class='col-md-3'>
										<img src='upload-img/$row[7]' alt='' class='img-thumbnail img-responsive' style='width:320px;height:200px;'>
									</div>
										<div class='col-md-6'>
											<h4 class='w3-title'></h4>
											<h4><a href='#'>$row[3] &nbsp;</a> <i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$row[6]/-
											</h4>
											<p>($row[4],$row[5])</p>
											<p>$row[8]</p>
											<p>$row[9]</p>
											<p>By:-$row[2]</p>
										
											<div class='ratings'>";
											$total_star=0;
											$total_num=0;
											$query=mysqli_query($con,"select * from star_rating where pro_id='$row[0]'");
											while($r=mysqli_fetch_array($query))
											{
												$total_star+=$r[1];
												$total_num++;
											}
											$star_avg=0;
											if($total_num!=0)
											$star_avg=$total_star/$total_num;
												echo"<p class='pull-right'>$total_num reviews</p>
												
												<p>";
												for($i=1;$i<=$star_avg;$i++)
												{
													echo"<i class='fa fa-star'></i>";
												}
												for($j=$star_avg;$j<5;$j++)
												{
													echo"<i class='fa fa-star-o'></i>";
												}
													
												echo"</p>
											</div>
										</div>
								<div class='col-md-3'>
									<h1>&nbsp;</h1>
                             <h3><a href='add-to-basket.php?q=$id' class='label label-primary btn btn-block btn-lg'>+ Add To meal</a></h3>
							<h3>&nbsp;</h3>
							 <h3><a href='#' class=' btn btn-lg' data-toggle='tooltip' data-placement='top' title='Estimated Dilivery Time'>$time Min. > ></a></h3>
								</div>
							   <h1>&nbsp;</h1>
							</div>";
						}
	}
	?>
	</div> <!-- closing of col-md-6 -->
	<?php
	include"right-bar.php";
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