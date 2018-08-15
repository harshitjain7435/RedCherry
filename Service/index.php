<?php
session_start();
include"db.php";
?>
<?php
session_start();
?>
<html lang="en">
<head>
<title>Red Cherry | Service</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
 <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1047021615598-ris7iu4uldi8f42omb5q1bocnn44iodr.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
		 
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style-staple.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/loader.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style-hj.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
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
});
$(document).ready(function(){
	
	
});
</script>


</head>

<body style="background:url(../images/ba1.jpg);background-position:center;background-repeat:repeat;background-attachment:scroll;">

<!-- banner -->
	<div class="bg-1 inner-bg-w3" id="home" >
		<!-- header -->
		
		<div class="banner-top navbar-inverse" id='navbar'>
			<div class="contact-bnr-w3-agile">
				<ul>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:harshitjain7435@gmail.com">help@redcherry.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>02953-293080</li>	
					<li>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	<!-- //header -->

<div class="banner-text"> 
	<h1>&nbsp;</h1>
			<h2 class="">Log in <i class='fa fa-sign-in' aria-hidden='true' ></i></h2>
			<div class="book-form">
			<p></p>
			 <center> 
			  <form action="log-in-process.php" method="post">
			 <div class=" form-time-w3layouts">
							<?php
							if(isset($_SESSION["service_login_error"]))
								echo "<h3 style='color:red'>",$_SESSION["service_login_error"],"</h3>";
							?>
					</div>
					<div class="col-md-4 form-time-w3layouts">
							<label><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Employee ID</label>
							 <input type="text" class="form-control" id="usrname" placeholder="Employee ID" name="emp_id" onKeyPress="return valid(event)">
					</div>
					<div class="col-md-4 form-left-agileits-w3layouts ">
							<label><i class="fa fa-eye" aria-hidden="true"></i> Password</label>
							 <input type="password" class="form-control" id="usrname" placeholder="Password" name="password">
					</div>
					<div class="col-md-4 form-left-agileits-submit">
						  <input type="submit" value="Log in">
					</div>
				</form></center>
			</div>
		</div>
		<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1>
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1> 
	<h1>&nbsp;</h1>
	</div>
</div>
<!-- //banner -->