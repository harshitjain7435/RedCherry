<?php
session_start();
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
<link href="css/loader.css" rel="stylesheet" type="text/css" media="all" />
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
  .modal-header,  .close {
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
				/*var myVar;
				
				function myFunction() {
				document.getElementById("loader").style.display = "block";
				  document.getElementById("shorted").style.display = "none";
					myVar = setTimeout(showPage, 3000);
					//alert("dikhe");
				}
				function showPage() {
				  document.getElementById("loader").style.display = "none";
				  //document.getElementById("shorted").style.display = "block";
				  alert("dikhe");
				}*/
</script>
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
	//T&c
	$("#TnCBtn").click(function(){
    $("#TnCModal").modal("show");
    });
	//Order
	$("#OrderNow").click(function(){
			$("#OrderModel").modal("show");
			var agreeORnot=$("#agree").is(":checked");
			if(agreeORnot==false)
			{
				document.getElementById("order_placed").disabled=true;
			}
			
    });
	$("#agree").click(function(){
			var agreeORnot=$("#agree").is(":checked");
			if(agreeORnot==false)
			{
				document.getElementById("order_placed").disabled=true;
			}
			if(agreeORnot==true)
			{
				document.getElementById("order_placed").disabled=false;
			}
			
    });
 	$(".filter").click(function() {
			var cuisines = new Array();
			var myVar;
				
			$("input:checkbox[name=cuisine]:checked").each(function() {
				   cuisines.push($(this).val());
			  });
			 //alert(cuisines);
			 
			 var types = new Array();
			$("input:checkbox[name=types]:checked").each(function() {
				   types.push($(this).val());
			  });
			// alert(types);
				
				document.getElementById("loader").style.display = "block";
				  document.getElementById("shorted").style.display = "none";
				  //$("#loader").addClass("col-md-6");
					myVar = setTimeout(showPage, 3000);
				
				function showPage() {
				  document.getElementById("loader").style.display = "none";
				  //document.getElementById("shorted").style.display = "block";
				 		 $.post("filter.php",{cuisines_array:cuisines,types_array:types},function(data)
						{
							$("#shorted").html(data).show();
						});
				}
	});
	$("#check-email").click(function(){
			var email=document.getElementById("input-email").values;
			//alert("'l;kf;");
	
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
	$("#order_placed").mousedown(function()
	{
			var uname=document.order.name.value;
			var add=document.order.add.value;
			var email=document.order.email.value;
			var mobile_num=document.order.phone.value;
			var area=document.order.area.value;
			
			$.post("place-order.php",{name:uname,address:add,mail:email,phone:mobile_num,area:area},function(data)
			{
				$("#modal-body").html(data).show();
			});
	});
	$("#my-orders").mousedown(function()
	{
			$.post("my-orders.php",function(data)
			{
				$("#MyOrders").html(data).show();
			});
	});
	
});
</script>


</head>

<body>
<?php
if(	(isset($_SESSION["usr_email"])) && (isset($_SESSION["dummy_usr_id"]))	)
{
	$dummy_id=$_SESSION["dummy_usr_id"];
	$usr_email=$_SESSION["usr_email"];
	$q=mysqli_query($con,"select * from dummy_usr where usr_id='$dummy_id'");
	while($row=mysqli_fetch_array($q))
	{
		$q1=mysqli_query($con,"insert into cart(usr_email,product_id,quantity)values('$usr_email','$row[2]','$row[3]')");
		if($q1)
		{
			$q2=mysqli_query($con,"delete from dummy_usr where id=$row[0]");
		}
	}
	unset($_SESSION["dummy_usr_id"]);
}
else if(	(isset($_SESSION["dummy_usr_id"])) && (isset($_SESSION["google_email"]))	)
{
	$dummy_id=$_SESSION["dummy_usr_id"];
	$usr_email=$_SESSION["google_email"];
	$q=mysqli_query($con,"select * from dummy_usr where usr_id='$dummy_id'");
	while($row=mysqli_fetch_array($q))
	{
		$q1=mysqli_query($con,"insert into cart(usr_email,product_id,quantity)values('$usr_email','$row[2]','$row[3]')");
		if($q1)
		{
			$q2=mysqli_query($con,"delete from dummy_usr where id=$row[0]");
		}
	}
	unset($_SESSION["dummy_usr_id"]);
}



if(!isset($_SESSION["google_usr"]))
include"login.php";
include"signup.php";
include"restaurant-login.php";
include"restaurant-signup.php";
include"forgot-password.php";
include"order.php";
include"TnC.php";
?>
<!-- banner -->
	<div class="bg-1 inner-bg-w3" id="home">
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
						<h1><a href="" style="font-family:'Open Sans', sans-serif"><span >R</span><span style="color:#FFFFFF">ed</span><span>C</span><span style="color:#FFFFFF">herry</span></a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--miranda">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item " id="home"><a href="index.php" class="menu__link">Home</a></li>
							<li class="menu__item" id="about"><a href="about.php" class=" menu__link" >About</a></li>
							<li class="menu__item" id="services"><a href="services.html" class=" menu__link" >Services</a></li>
							<li class="menu__item" id="gallery"><a href="gallery.php" class=" menu__link" >Gallery</a></li>
							
							<li class="menu__item" id="contact"><a href="contact.html" class=" menu__link">Contact</a></li>
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
<!-- //banner -->