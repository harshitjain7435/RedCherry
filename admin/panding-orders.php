<script>
$(".showServiceMan").click(function()
{
				var id=$(this).attr("id");	
				$.post("search-service-man.php",{id:id},function(data)
				{	
								$("#order-contain").html(data).show();
				});

});
</script>
<?php
include"db.php";
echo "
											<table class='table'>
												<thead><tr>
													<th>Name</th>
													<th>Email</th>
													<th>Area</th>
													<th>Address</th>
													<th>Action</th>
												</tr></thead><tbody>";
												$q=mysqli_query($con,"select * from placed_orders where order_status='0'");
												while($row=mysqli_fetch_array($q))
												{
													echo"<tr><td>$row[2]</td>
													<td>$row[1]</td>
													<td>$row[5]</td>
													<td>$row[4]</td>
													<td><a href='#' class='showServiceMan' id='$row[0]'><h4 style='color:red'>Send to Service Man</h4></a></td>
													</tr>";
												}
												echo"</tbody>
											</table>
											";
?>