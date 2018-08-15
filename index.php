
<?php
session_start();
include"db.php";
?>
<html lang="en">
<head>
<title>Red Cherry | Order Online Food</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
 <meta name="google-signin-scope" content="profile email">
 <link rel="icon" href="images/redcherry.jpg" />
    <meta name="google-signin-client_id" content="1047021615598-ris7iu4uldi8f42omb5q1bocnn44iodr.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		 
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-staple.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-hj.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
<!--//web-fonts-->
<script src="js/jquery-321.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
});
$(document).ready(function(){
	//User Login
    $("#BtnLogin").click(function(){
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
    });
	//Forgot Password
	$("#ForgotPasswordBtn").click(function(){
    $("#ForgotPasswordModal").modal("show");
    });
	
	$("#check-email").click(function(){
			var email=document.Password.checkemail.value;
			$.post("password-reset.php",{email1:email},function(data)
				{
					$("#msg").html(data).show();
				});
	});
	$("#send-Message").click(function(){
			var name=document.message.Name.value;
			var email=document.message.Email.value;
			var message=document.message.Message.value;
			$.post("message.php",{Email:email,Name:name,Message:message},function(data)
				{
					$("#message").html(data).show();
				});
	});
});
</script>


</head>

<body>

<?php
if(!isset($_SESSION["google_usr"]))
include"login.php";
include"signup.php";
include"restaurant-login.php";
include"restaurant-signup.php";
include"forgot-password.php";
?>
<!-- banner -->
	<div class="bg-1" id="home">
		<!-- header -->
		<div class="banner-top navbar-inverse" id='navbar'>
			<div class="social-bnr-agileits">
				<ul>
					<li><a href="https://www.facebook.com/profile.php?id=100005614877373" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://twitter.com/harshitjain7435" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="https://in.linkedin.com/in/harshit-jain-1884aa111" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>					
				</ul>
			</div>
			<div class="contact-bnr-w3-agile">
				<ul>
				<?php
					if(	(!isset($_SESSION["usr_id"])) && (!isset($_SESSION["google_usr"]))	)
						echo"<li><a href='#' id='BtnResLogin'><i class='glyphicon glyphicon-glass' aria-hidden='true'></i> For Restaurants</a></li>";
					if(isset($_SESSION["usr_id"]))
					{
						$id=$_SESSION["usr_id"];
						$q=mysqli_query($con,"select * from user_info where id='$id'");
						if($row=mysqli_fetch_array($q))
						{
							$name=$row[1];
							$a=base64_encode($row[2]);
							echo"<li><a href='user.php?q=$a'><i class='fa fa-user' aria-hidden='false'></i><label class='text-capitalize'>Hi, $name </label></a></li>";
						}
					}
					else if(isset($_SESSION["google_usr_id"]))
					{
						$id=$_SESSION["google_usr_id"];
						$q=mysqli_query($con,"select * from google_user_info where id='$id'");
						if($row=mysqli_fetch_array($q))
						{
							$name=$row[2];
							$a=base64_encode($row[6]);
							echo"<li><a href='user.php?q=$a'><i class='fa fa-user' aria-hidden='false'></i><label class='text-capitalize'>Hi, $name </label></a></li>";
						}
							
					}
					else
						echo"<li><a href='#' id='BtnLogin'><i class='fa fa-sign-in' aria-hidden='true' ></i> Login</a></li>";
				?>
			
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
							<li class="menu__item"><a href="gallery.php" class=" menu__link">Gallery</a></li>
							
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
	<!-- banner-text -->
		<div class="banner-text"> 
			<h2 class="">MADE FOR FOODIES MADE BY FOODIES</h2>
			<div class="book-form">
			<p>FIND BY TYPE AND CUISINE</p>
			 <center>  <form action="find-choice.php" method="post">
			 
					<div class="col-md-4 form-time-w3layouts">
							<label><i class="glyphicon glyphicon-cutlery" aria-hidden="true"></i> TYPE</label>
							<select class="form-control" name="food_type">
									<?php
							$r=mysqli_query($con,"select * from food_type");
							while($row=mysqli_fetch_array($r))
							{
								$a=base64_encode($row[1]);
								echo"<option value='$a'>$row[1]</option>";
							}							
							?>	
							</select>
					</div>
					<div class="col-md-4 form-left-agileits-w3layouts ">
							<label><i class="fa fa-users" aria-hidden="true"></i> CUISINE</label>
							<select class="form-control" name="cuisine">
								<?php
							$r=mysqli_query($con,"select * from cuisine");
							while($row=mysqli_fetch_array($r))
							{
								$b=base64_encode($row[1]);
								echo"<option value='$b'>$row[1]</option>";
							}							
							?>	
							</select>
					</div>
					<div class="col-md-4 form-left-agileits-submit">
						  <input type="submit" value="Find My Choice">
					</div>
				</form></center>
			</div>
		</div>
		<!-- gallery -->
	<div class="gallery-ban" id="gallery">
	<div class="container">
				<ul id="flexiselDemo1">			
					<li>
						<div class="wthree_testimonials_grid_main">
							
									<img src="images/p1.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="wthree_testimonials_grid_main">
							
									<img src="images/p2.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="wthree_testimonials_grid_main">
						
									<img src="images/p3.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="wthree_testimonials_grid_main">
						
									<img src="images/p4.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="wthree_testimonials_grid_main">
						
									<img src="images/p5.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
					<li>
						<div class="wthree_testimonials_grid_main">
						
									<img src="images/p6.jpg" alt=" " class="img-responsive" />
						</div>
					</li>
				</ul>
				
	</div>
	</div>
	<!-- //gallery -->
	</div>
<!-- //banner -->
<div class="ab-w3l-about">
	<div class="container">
		 <h3 class="tittle-w3"><span>Welcome to Our</span> RedCherry</h3>
			<p class="para-w3l"><span>RedCherry</span> is Udaipur's most convenient and first online food ordering 
site. It connects people with the best restaurants around them. 
Delivering in almost all areas of Udaipur.</p>
	</div>
</div>

<!--count-->
			<div class="count-agileits">
				<div id="particles-js"></div>
					
					<div class="count-grids">
					<h3 class="tittle-w3">Handling <span>your needs</span> with care</h3>
					<div class="count-bgcolor-w3ls">
						<div class="col-md-4 count-grid">
						<i class="fa fa-cutlery" aria-hidden="true"></i>
							<div class="count hvr-bounce-to-bottom">
							<?php
							$count=200;
							$r=mysqli_query($con,"select * from cuisine");
							while($row=mysqli_fetch_array($r))
							{
								$count++;
							}							
							?>	
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?php echo $count; ?>' data-delay='.9' data-increment="1"><?php echo $count; ?></div>
									<span></span>
									<h5 style="background:none;">TYPES OF CUISINE</h5>
							</div>
						</div>
						<div class="col-md-4 count-grid">
						<i class="fa fa-cutlery" aria-hidden="true"></i>
							<div class="count hvr-bounce-to-bottom">
							<?php
							$count=250;
							$r=mysqli_query($con,"select * from restaurants_info");
							while($row=mysqli_fetch_array($r))
							{
								$count++;
							}							
							?>	
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?php echo $count; ?>' data-delay='.9' data-increment="1"><?php echo $count; ?></div>
									<span></span>
									<h5 style="background:none;">Restaurants</h5>
							</div>
						</div>
						<div class="col-md-4 count-grid">
						<i class="fa fa-user-plus" aria-hidden="true"></i>
							<div class="count hvr-bounce-to-bottom">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='105209' data-delay='.5' data-increment="1">105209</div>
									<span></span>
									<h5 style="background:none;">Users</h5>
								</div>
						</div>
						<div class="clearfix" ></div>
						</div>
					</div>
			</div>
				<!--count-->
	

<!--blogs-->
<div style="padding-top:70px;padding-bottom:70px;" id="blogs">
	<div class="container-fluid"  >
	<h3 class="tittle-w3">Most Trending</h3>
		<div class="row" style="background:#000040">
		<h1>&nbsp;</h1>
		<?php
		$count=0;
		$q=mysqli_query($con,"select * from food_details order by id DESC limit 4");
			while($row=mysqli_fetch_array($q))
			{
			$count++;
				$a=base64_encode($row[0]);
				//$rev=rand(10,20);
				
					echo"
							<div class='col-sm-3 col-lg-3 col-md-3' >
										<div class='thumbnail' style='height:450px;'>
											<img src='upload-img/$row[7]' alt='' class='img-thumbnail img-responsive' style='width:320px;height:200px;'>
											<div class='caption'>
												<h4 class='pull-right'><i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$row[6]/-</h4>
												<h4><a href='menu-details.php?q=$a'>$row[3]</a>
												</h4>
												<p>($row[4],$row[5])</p>
												<p>$row[8]</p>
												<p>$row[9]</p>
												<p>By:-$row[2]</p>
											</div>
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
									</div>";
	}
	?>
		<h1>&nbsp;</h1>
		</div>
	</div>
</div>

<!--//blogs-->			
<!--services-section-->
<div class="services-w3layouts" id="services">
	<!-- //Stats -->
			<div class="agitsworkw3ls-grid-2">
			   <div class="info-imgs">
			         <ul>
					  <li>
						  <div class="gallery-grid1">
								<a href="single.html"><img src="images/rsz_102.jpg" alt=" " class="img-responsive"></a>
								<div class="p-mask">
									<h4>&nbsp;</h4>
									<p>&nbsp;</p>
										<h4><span>Get 20% C</span>ash <span>B</span>ack</h4>
									<h4 >Ordered in mobile app only</h4>
									<h4>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h4>
								</div>
							</div>
					  </li>
					   <li>
							 <div class="gallery-grid1" >
								<img src="images/g6.jpg" class="img-responsive">
									<div class="p-mask">
											<h4>&nbsp;</h4>
									<p>&nbsp;</p>
										<h4><span>Get Upto</span> 40% Offer </h4>
									<h4 >Sunday Special Discount</h4>
									<h4>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h4>
									</div>
							</div>
					   </li>
					</ul>
				</div>
</div>
</div>


<div class="container-fluid agitsworkw3ls-grid" class="row" >
<h1>&nbsp;</h1>
<h3 class="tittle-w3"><span>Always</span> fresh <span>& </span>delicious <span>food</span></h3>
			<p class="para-w3l">We offer a variety of menus and cuisine options, for everything from box lunches to full-service plated dinners.</p>
			<div class="services-left-w3-agile">
				<h3 class="tittle-w3 sub-head"><span>Our </span>Menu</h3>
				<ul>
					<li><i class="fa fa-check" aria-hidden="true"></i>BEVERAGES</li>
					<li><i class="fa fa-check" aria-hidden="true"></i>BREAKFASTS</li>
					<li><i class="fa fa-check" aria-hidden="true"></i>LUNCH BUFFETS</li>
					<li><i class="fa fa-check" aria-hidden="true"></i>DINNER BUFFETS</li>
				</ul>
				</div>
				<div class="services-right-w3-agile">
				<h3 class="tittle-w3 sub-head">Cuisine</h3>
				<ul>
					<?php
							$r=mysqli_query($con,"select * from cuisine");
							while($row=mysqli_fetch_array($r))
							{
								echo"<li><i class='fa fa-check' aria-hidden='true'></i>$row[1]</li>";
							}							
					?>	
				</ul>
				</div>

</div>

<!-- mail -->
				<div class="mail">
				<div class="col-md-7">
					
					<div id="map" style="height:70%;width:100%"></div>
					<script>
					  function initMap() {
						var uluru = {lat: 24.614134, lng: 73.685575};
						var map = new google.maps.Map(document.getElementById('map'), {
						  zoom: 4,
						  center: uluru
						});
						var marker = new google.maps.Marker({
						  position: uluru,
						  map: map
						});
					  }
					</script>
					<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGaTDcPGv3RZOaMwzB6hzEQmdt-7guU74&callback=initMap">
					</script>
				</div>
					<div class="col-md-5 mail-grid1-form ">
						<h3 class="tittle-w3"><span>Send a </span>Message</h3>
							<h4 id="message" class="tittle-w3"></h4>
						<form action="#" method="post" name="message">
							<input type="text" name="Name" placeholder="Name" required="" />
							<input type="email" name="Email" placeholder="Email" required="" />
							<textarea name="Message" placeholder="Type Your Text Here...." required=""></textarea>
							 <button type="button" class="btn btn-success btn-block" id='send-Message'><span class="fa fa-paper-plane" disabled></span>&nbsp;&nbsp;Send Message</button>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			<!-- //mail -->

<?php
include"footer.php";
?>