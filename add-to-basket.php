<?php
session_start();
include"db.php";
$id=base64_decode($_REQUEST["q"]);
if(isset($_SESSION["usr_id"]))
{
	$usr_email=$_SESSION["usr_email"];
	$q=mysqli_query($con,"select * from cart where usr_email='$usr_email' and product_id='$id' and order_status='1'");
	if($row=mysqli_fetch_array($q))
	{
		header("location:".$_SERVER['HTTP_REFERER']);
	}	
	else
	{
		$q1=mysqli_query($con,"insert into cart(usr_email,product_id,quantity)values('$usr_email','$id','1')");
			if($q1)
			{
				header("location:".$_SERVER['HTTP_REFERER']);
			}
			else
				mysqli_error($con);
	}
}
else if(isset($_SESSION["dummy_usr_id"]))
{
	$dummy_id=$_SESSION["dummy_usr_id"];	
	$q=mysqli_query($con,"select * from dummy_usr where usr_id='$dummy_id' and product_id='$id'");
	if($row=mysqli_fetch_array($q))
	{
	
			header("location:".$_SERVER['HTTP_REFERER']);
			//echo"a";
	}
	else
	{
		$q1=mysqli_query($con,"insert into dummy_usr(usr_id,product_id)values('$dummy_id','$id')");
		if($q1)
		{
			header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
			mysqli_error($con);
	}
	
}
else if(isset($_SESSION["google_email"]))
{

	
	$usr_email=$_SESSION["google_email"];
	$q=mysqli_query($con,"select * from cart where usr_email='$usr_email' and product_id='$id'");
	if($row=mysqli_fetch_array($q))
	{
		header("location:".$_SERVER['HTTP_REFERER']);
	}	
	else
	{
		$q1=mysqli_query($con,"insert into cart(usr_email,product_id,quantity)values('$usr_email','$id','1')");
			if($q1)
			{
				header("location:".$_SERVER['HTTP_REFERER']);
			}
			else
				mysqli_error($con);
	}
}
else
{
	$q=mysqli_query($con,"insert into dummy_usr(product_id)values('$id')");
	if($q)
	{
		$_SESSION["dummy_usr_id"]=mysqli_insert_id($con);
		$dummy_id=$_SESSION["dummy_usr_id"];
		$q1=mysqli_query($con,"update dummy_usr set usr_id='$dummy_id' where id='$dummy_id'");
		if($q1)
		{
			header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
			mysqli_error($con);
	}
	else
		mysqli_error($con);
	
}