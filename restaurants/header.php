<?php
session_start();
if(!isset($_SESSION["res_id"]))
{
	header("location:../index.php");
}
?>
<html lang="en">
<head>
<title>Red Cherry | Order Online Food</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		 
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style-staple.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style-hj.css" rel="stylesheet" type="text/css" media="all" />

  <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet"> 
<link href="../css/food-details-card.css" rel="stylesheet"> 
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--web-fonts-->
<link href="../css/google-font.css" rel="stylesheet">
<!--//web-fonts-->
<script src="../js/jquery-321.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <style>
  .modal-header, h5, .close {
      background-color:#FF5706 ;
      color:white !important;
      text-align: center;
      font-size: 30px;
	  max-height:100px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

<script>
$(document).scroll(function(){
	var w=window.screen.width;
	if(w>960)
	{
		$('#navbar').addClass('navbar-fixed-top');
	}
	else
	{
		$('#navbar').removeClass('navbar-fixed-top');
	}
	//User Login
   /* $("#BtnLogin").click(function(){
    $("#LoginModal").modal("show");
    });
	//User Sign Up
	 $("#BtnSignup").click(function(){
    $("#SignupModal").modal("show");
    });
	//Restaurant Login
	$("#BtnResLogin").click(function(){
    $("#ResLoginModal").modal("show");
    });
	//Restaurant Signup
	$("#BtnResSignup").click(function(){
    $("#ResSignupModal").modal("show");
    });*/
	
});
</script>


</head>

<body>
<?php
/*include"login.php";
include"signup.php";
include"restaurant-login.php";
include"restaurant-signup.php";*/
?>
<!-- banner -->
	<div class="bg-1 inner-bg-w3" id="home">
		<!-- header -->
		
		<div class="banner-top navbar-inverse" id='navbar'>
			<div class="social-bnr-agileits">
				<ul>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
				</ul>
			</div>
			<div class="contact-bnr-w3-agile">
				<ul>
				<li><a href="logout.php" id="BtnLogin"><i class="fa fa-sign-out" aria-hidden="true" ></i> Logout</a></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:harshitjain7435@gmail.com">help@redcherry.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>02953-293080</li>	
					<li>
						<div class="search">
							<input class="search_box" type="checkbox" id="search_box">
							<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
							<div class="search_form">
								<form action="#" method="post">
									<input type="search" name="Search" placeholder="Search..." required="" />
									<input type="submit" value="Send" />
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		
		
		
		<header>
			<div class="container" style="margin-top:50px">

			<!-- navigation -->
			<div class="w3_navigation">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="w3_navigation_pos">
						<h1><a href="index.php" style="font-family:'Open Sans', sans-serif"><span >R</span><span style="color:#FFFFFF">ed</span><span>C</span><span style="color:#FFFFFF">herry</span></a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--miranda">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item menu__item--current"><a href="index.php" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="about.php" class=" menu__link">About</a></li>
							<li class="menu__item"><a href="services.html" class=" menu__link">Services</a></li>
							<li class="menu__item"><a href="gallery.html" class=" menu__link">Gallery</a></li>
							
							<li class="menu__item"><a href="contact.html" class=" menu__link">Contact</a></li>
						</ul>
					</nav>
				</div>
			</nav>	
	</div>
	<div class="clearfix"></div>
		<!-- //navigation -->
			</div>
		</header>
	<!-- //header -->
	<!-- //header -->
</div>
<div class='gallery  bg-2' style="margin-bottom:0;">
	<div class='container'  >
		<div class='row'>
			<div class='col-md-3'>
				<div class='panel panel-default'>
						  <div class='panel-heading'>
						  <?php
								echo "<h4 class='tittle-w3'> WelCome ", $_SESSION["res_name"],"</h4>";
								if(isset($_SESSION["msg"]))
								{
									echo "<h4 class='tittle-w3'>", $_SESSION["msg"],"</h4>";
									unset($_SESSION["msg"]);
								}
							?>
						  </div>
							  <div class='panel-body'>
							  		<div class="list-group">
										<a href="index.php" class="list-group-item">HOME</a>
										<a href="menu.php" class="list-group-item">MENU</a>
										<a href="addfood.php" class="list-group-item">ADD FOOD</a>
									</div>
							  </div>
						</div>
			</div>
			<div class='col-md-9'>	
<!-- //banner -->