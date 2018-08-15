<?php
session_start();
?>
<html lang="en">
<head>
<title>Red Cherry | Admin</title>
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
  a div:hover
  {
  	color:#FFFFFF;
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
	$("#panding-orders").click(function()
	{
				$.post("panding-orders.php",function(data)
				{	
								$("#order-contain").html(data).show();
				});
					
	});
	$("#under-processing").click(function()
	{
				$.post("under-processing.php",function(data)
				{	
								$("#order-contain").html(data).show();
				});
					
	});
	$("#add-service-man").click(function()
	{
				$.post("add-service-man.php",function(data)
				{	
								$("#service-contain").html(data).show();
				});
					
	});
	$(".assign-task").click(function()
	{
					var id=$(this).attr("id");
					var usrEmail=document.getElementById("UserOrderId").innerHTML;
					alert(usrEmail);	
					alert(id);
					/*$.post("assign-task.php",{id:id,mail:usrEmail},function(data)
					{	
									$("#order-contain").html(data).show();
					});*/
	
	});
});
</script>


</head>

<body >

<!-- banner -->
	<div id="home" >
		<!-- header -->
		
		<div class="banner-top navbar-inverse" id='navbar'>
			<div class="contact-bnr-w3-agile">
				<ul>
					<li><i class="fa fa-sign-out" aria-hidden="true"></i>logout</li>	
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:harshitjain7435@gmail.com">help@redcherry.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>02953-293080</li>	
					
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	<!-- //header -->
