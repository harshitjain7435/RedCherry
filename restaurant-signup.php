<?php
								$a= rand(10,20);
								$b= rand(10,20);
								$c= $a+$b;
?>
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
	function captcha(e)
	{
		var val = "<?php echo $c ?>";
		var cap=document.ResSignup.capt.value;
		if (cap==val)
			return true;
		else
		{
			alert("Please Enter the Correct Answer");
			return false;
		}
	}
</script>
<?php
include"db.php";
?>
<div class="modal fade" id="ResSignupModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h5><span class="glyphicon glyphicon-user"></span> Sign Up</h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;"> 
							<form class="form-horizontal" method="post" action="restaurant-signup-next-process.php" onsubmit="return captcha(event)" name="ResSignup">
						  <div class="form-group">
							<label for="inputName3" class="col-sm-2 control-label">Restaurant's Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Restaurant's Name" name="RName" onkeypress="return valid(event)" required>
							</div>
						  </div>
						   <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="inputNumber3" class="col-sm-2 control-label">Contact Number</label>
							<div class="col-sm-10">
							 <input type="text" class="form-control" id="inputNumber3" placeholder="Phone Number" name='phone' onkeypress="return number(event)" maxlength="10" required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass" required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-10">
							  <textarea class="form-control" id="inputEmail3" placeholder="Address" name="add"  required></textarea>
							</div>
						  </div>
						  <div class="form-group">
						  <label for="psw"><span class="fa fa-bug"></span>&nbsp; Are you human ? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Solve this &nbsp;<?php echo "$a + $b = ? " ?> </label>
						  <input type="text" class="form-control" id="psw" placeholder="Answer" name="capt">
						</div>
						  <div class="form-group ">
							<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
							</div>
						  </div>
						  
						</form>
				</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove" onclick="captcha()"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 