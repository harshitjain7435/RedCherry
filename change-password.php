<?php
include"db.php";
?>	
<script>
function valid()
	{
		var pass=document.password.password1.value;
		var cpass=document.password.password2.value;
		// alert(pass);
		if(pass==cpass)
			document.getElementById("condition-msg").innerHTML='<i class="fa fa-check" aria-hidden="true"></i>Password Matched';
		else
			document.getElementById("condition-msg").innerHTML='<i class="fa fa-times" aria-hidden="true"></i>Password Not Matched';
			
	}
	function check()
	{
	var pass=document.password.password1.value;
		var cpass=document.password.password2.value;
		var mail=document.password.email.value;
		if(pass=="")
		{
		alert("Please enter the Password");
		return false;
		}
		if(cpass=="")
		{
		alert("Please enter the Password");
		return false;
		}
		if(pass==cpass)
		{
			$.post("update-password.php",{email:mail,password:pass},function(data)
				{
					$("#success-msg").html(data).show();
				});
			return false;
		}
		else
		{
			alert("Please Enter the same Password");
			return false;
		}
	}
</script>
<html lang="en">
<head>
<title>Red Cherry | Order Online Food</title>
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
  </head>
  <body>
  <div class="bg-1" id="home">
		
	<!-- banner-text -->
		<div class="banner-text"> 
			<h2 class="">Change Password</h2>
			<div class="book-form" id='success-msg'>
				<?php
				$time=base64_decode($_REQUEST["q"]);
				$email=base64_decode($_REQUEST["em"]);
				$query2=mysqli_query($con,"select * from forgot_password_mng where email='$email' and req_time='$time'");
					if($r=mysqli_fetch_array($query2))
					{
						$date=date("Y-m-d H:i:s", strtotime($time."+ 20 minutes"));
						$time_now=date("Y-m-d H:i:s");
						if($date>=$time_now)
							echo "
							<form class='form-horizontal' method='post' action='update-password.php' name='password' style='font-weight:bolder' onsubmit='return check()'>
						  <div class='form-group'>
							<label for='inputName3' class='col-sm-4 control-label'>Email</label>
							<div class='col-sm-8'>
							<input type='text' class='form-control' id='inputEmail3' placeholder='Enter Password' name='email' value='$email' required readonly>
							</div>
						  </div>
						  
						   <div class='form-group'>
							<label for='inputName3' class='col-sm-4 control-label'>Enter Password</label>
							<div class='col-sm-8'>
							  <input type='password' class='form-control' id='inputEmail3' placeholder='Enter Password' name='password1'  required>
							</div>
						  </div>
						  

						   <div class='form-group'>
							<label for='inputEmail3' class='col-sm-4 control-label'>Confirm Password</label>
							<div class='col-sm-8'>
							 <input type='password' class='form-control' id='inputEmail3' placeholder='Re-Enter Password' name='password2' onkeyup='valid()'  required>
							 <label id='condition-msg' style='color:red;'></label>
							</div>
						  </div>
						  
						 
						  <div class='form-group'>
							<label for='inputEmail3' class='col-sm-4 control-label'></label>
							<div class='col-sm-8'>
							<button type='submit' class='btn btn-success btn-block'><i class='fa fa-pencil-square' aria-hidden='true'></i>
&nbsp;Change Password</button>
							</div>
						  </div>
						  
						</form>
							";
						else
							echo "<p> Sorry, This link has been expired.";
					}
					else
							echo "<p> Sorry, This is not a valid link or this is an expired link.";
				?>
					
			</div>
		</div>
	
	</div>
</body>									
					