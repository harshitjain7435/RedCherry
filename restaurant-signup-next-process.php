<?php
include"db.php";
include"header.php";
$r_name=mysql_real_escape_string($_POST["RName"]);
$email=mysql_real_escape_string($_POST["email"]);
$phone=mysql_real_escape_string($_POST["phone"]);
$password=mysql_real_escape_string($_POST["pass"]);
$add=mysql_real_escape_string($_POST["add"]);
$q=mysqli_query($con,"insert into restaurants_info(restaurants_name,email,password,phone,address)values('$r_name','$email','$password','$phone','$add')");
if($q)
{
	echo "<script>Alert('Thank You')</script>";
}
else echo mysqli_error($con);


?>
<!-- gallery -->
	<div class="gallery">
		<div class="container">
			
					<div class=" login-agileinfo ">
						<h2 class="tittle-w3">Thank You !!</h2>
						<p>We are very thankful to you. Now you are in the list of our best Restaurants. We will contact you very soon.  </p>
						<?php
						$messageSubject= "Hi $r_name";
						$msgBody="We are very thankful to you. Now you are in the list of our best Restaurants. We will contact you very soon.
						Regards: Team RedCherry :) ";
							mail($email,$messageSubject,$msgBody);
						?>
						<label><a href="index.php">Go to Home</a></label>
					</div>	 
				
		</div>
	</div>
<!-- //gallery -->
<!-- Footer -->
<?php
include"footer.php";
?>