<?php
include"header.php";
include"db.php";
?>				
						<?php
						$res_id=$_SESSION["res_id"];
						$res_name=$_SESSION["res_name"];
						
						$q=mysqli_query($con,"select * from food_details where res_id='$res_id' and res_name='$res_name'");
						while($row=mysqli_fetch_array($q))
						{
						$rev=rand(10,20);
						echo"
						<div class='row thumbnail'>
											<div class='col-md-3'>
												<img src='../upload-img/$row[7]' alt='' class='img-thumbnail img-responsive' style='width:320px;height:200px;'>
											</div>
												<div class='col-md-6'>
													<h4 class='w3-title'></h4>
													<h4><a href='#'>$row[3] &nbsp;</a> <i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$row[6]/-
													</h4>
													<p>($row[4],$row[5])</p>
													<p>$row[8]</p>
													<p>$row[9]</p>
													<p>By:-$row[2]</p>
												
													<p class='pull-right'>$rev reviews</p>
													<p>
														<span class='glyphicon glyphicon-star'></span>
														<span class='glyphicon glyphicon-star'></span>
														<span class='glyphicon glyphicon-star'></span>
														<span class='glyphicon glyphicon-star'></span>
														<span class='glyphicon glyphicon-star-empty'></span>
													</p>
												</div>
												<div class='col-md-3'>
												<h1>&nbsp;</h1>
								<h3><a href='#' class='label label-danger btn btn-block btn-lg'>Remove</a></h3>
												<h4>&nbsp;</h4>
								<h3><a href='#' class='label label-success btn btn-block btn-lg'>Edit</a></h3>
											</div>
											</div>
									   ";
						}
						?>							
					</div>
			</div>
		</div>
	</div>