<script>
function number(e)
	{
	var keyId=(window.event)?event.keyCode:e.which;
		if((keyId>=48&&keyId<=57))
			return true;
		else if((keyId==8))
			return true;
		else
			return false;
	}
function valid(e)
	{
	var keyId=(window.event)?event.keyCode:e.which;
		if((keyId>=65&&keyId<=90)||(keyId>=97&&keyId<=122)||(keyId==32)||(keyId==8))
			return true;
		else
			return false;
	}
</script>
<?php
include"header.php";
include"db.php";
?>

<div style="margin-top:-45px;" >
<div class="book-form">
<h4 class='tittle-w3'>Add Food</h4>
<form class="form-horizontal" method="post" action="save-records.php" name="records" style="font-weight:bolder" enctype="multipart/form-data" >
						  <div class="form-group">
							<label for="inputName3" class="col-sm-2 control-label">Food Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Food's Name" name="FName" onkeypress="return valid(event)"  required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputName3" class="col-sm-2 control-label">Food Type</label>
							<div class="col-sm-10">
							  <select class="form-control" name="category">
									<?php
							$r=mysqli_query($con,"select * from food_type");
							while($row=mysqli_fetch_array($r))
							{
								echo"<option value='$row[1]'>$row[1]</option>";
							}							
							?>	
							</select>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputName3" class="col-sm-2 control-label">Cuisine</label>
							<div class="col-sm-10">
							  <select class="form-control" name="cuisine">
									<?php
							$r=mysqli_query($con,"select * from cuisine");
							while($row=mysqli_fetch_array($r))
							{
								echo"<option value='$row[1]'>$row[1]</option>";
							}							
							?>	
							</select>
							</div>
						  </div>

						   <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Quantity Details</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Quantity details" name="quantity" required>
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="inputNumber3" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
							 <input type="text" class="form-control" id="inputNumber3" placeholder="Price(INR)" name='price' onkeypress="return number(event)" maxlength="4"  required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputNumber3" class="col-sm-2 control-label">Photo</label>
							<div class="col-sm-10">
							 <input type="file" class="btn" id="inputimg3" name='photo'  required>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Other Details</label>
							<div class="col-sm-10">
							  <textarea class="form-control" id="inputEmail3" placeholder="Details" name="details"   required></textarea>
							</div>
						  </div>
						 
						  <div class="form-group ">
							<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add in My Menu</button>
							</div>
						  </div>
						  
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
include"footer.php";
?>