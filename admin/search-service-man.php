<script>
$(".showServiceMan").click(function()
{
				var id=$(this).attr("id");	
				$.post("search-service-man.php",{id:id},function(data)
				{	
								$("#order-contain").html(data).show();
				});

});
$(".panding-orders").click(function()
	{
				$.post("panding-orders.php",function(data)
				{	
								$("#order-contain").html(data).show();
				});
					
	});
	$(".assign-task").click(function()
	{
					var id=$(this).attr("id");
					var UserOrderId=document.getElementById("UserOrderId").innerHTML;
					$.post("assign-task.php",{id:id,usrOrderId:UserOrderId},function(data)
					{	
					//alert(UserOrderId);
									$("#order-contain").html(data).show();
					});
	
	});
</script>
<?php
include"db.php";
$id=$_REQUEST["id"];
echo "
											<table class='table'>
												<thead><tr>
													<th>Name</th>
													<th>Email</th>
													<th>Area</th>
													<th>Address</th>
													<th>Action</th>
												</tr></thead><tbody>";
												$q=mysqli_query($con,"select * from placed_orders where id='$id'");
												while($row=mysqli_fetch_array($q))
												{
													echo"<tr><td>$row[2]<label id='UserOrderId' hidden>$row[0]</label></td>
													<td >$row[1]</td>
													<td>$row[5]</td>
													<td>$row[4]</td>
													<td><a href='#' class='showServiceMan' id='$row[0]'><h4 style='color:red'>Send to Service Man</h4></a></td>
													</tr>";
												}
												echo"</tbody>
											</table>
											";
echo "<h4 class='page-header page-header icon-subheading'>Available Service Man <span class='pull-right panding-orders' style='cursor:pointer' id=''>&times;</span> </h4>
<table class='table'>
		<thead>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>";
$q1=mysqli_query($con,"select * from service_man where status='0' and login_status='1'");
	while($row=mysqli_fetch_array($q1))
	{
	echo "		<tr><td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[4]</td>
				<td><h4><a href='#' class='assign-task label label-primary btn btn-block btn-lg' style='color:white' id='$row[0]'>Assign Order</a></h4></td>
				</tr>";
	}
	echo"</tbody>
			</table>";

?>