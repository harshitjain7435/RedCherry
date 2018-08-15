<?php
include"header.php";
if(!isset($_SESSION["admin"]))
	header("location:index.php");
include"db.php";
?>
<div class="container">
              <div class="grid_3 grid_4 w3_agileits_icons_page">
						<div class="icons">
							<section id="new">
								<h3 class="page-header page-header icon-subheading">Orders </h3>							  

								<div class="row fontawesome-icon-list wthree">
									
									<a  href='#' id='panding-orders'><div class='icon-box col-md-3 col-sm-4'><i class='fa fa-shopping-basket' aria-hidden='true'></i><label> Pending Orders </label></div></a>
									
									<a  href='#' id='under-processing'><div class='icon-box col-md-3 col-sm-4'><i class='fa fa-spinner fa-pulse' aria-hidden='true'></i><label>Order Under Processing</label></div></a>
									
									<a  href='#'><div class='icon-box col-md-3 col-sm-4'><i class='fa fa-paper-plane' aria-hidden='true'></i><label>Delivered Orders</label></div></a>
									
									<a  href='#'><div class='icon-box col-md-3 col-sm-4'><i class='fa fa-blind' aria-hidden='true'></i> <label>fa-blind</label></div></a>
									
									 </div>
									 <div class='table-responsive' id='order-contain'>
									 </div>
									 <div class='table-responsive' id='service-man'>
									 </div>									 
								</section>
								<section id="new">
								<h3 class="page-header page-header icon-subheading">Service </h3>							  

								<div class="row fontawesome-icon-list wthree">
									
									
									<a  href="#"><div class="icon-box col-md-3 col-sm-4"><i class="fa fa-asl-interpreting" aria-hidden="true"></i><label> Service Men </label></div></a>
									
									<a  href="#"  id="add-service-man"><div class="icon-box col-md-3 col-sm-4"><i class="fa fa-sign-in" aria-hidden="true"></i><label> Add New Service Man</label></div></a>
									
									<a  href="#"><div class="icon-box col-md-3 col-sm-4"><i class="fa fa-audio-description" aria-hidden="true"></i><label> Delivered Orders</label></div></a>
									
									<a  href="#"><div class="icon-box col-md-3 col-sm-4"><i class="fa fa-blind" aria-hidden="true"></i> <label>fa-blind</label></div></a>
									
									 </div>
									  <div class='table-responsive' id='service-contain'>
									 </div>
								</section>
						</div>
			</div>
		</div>
						