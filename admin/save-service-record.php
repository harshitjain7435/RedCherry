<?php
include"db.php";
$name=$_POST["name"];
$email=$_POST["mail"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$q=mysqli_query($con,"insert into service_man(name,email,password,phone)values('$name','$email','$password','$phone')");
if($q)
{
	$id=mysqli_insert_id($con);
	$q1=mysqli_query($con,"select * from service_man where id='$id'");
	if($row=mysqli_fetch_array($q1))
	{
	echo "
		<table class='table'>
		<thead>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			</tr>
			</thead>
			<tbody>
				<tr><td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[4]</td>
				</tr>
			</tbody>
			</table>
					";
	}
	else
		echo mysqli_error($con);
}
?>