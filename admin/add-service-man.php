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
	$("#saveRecord").click(function()
	{
		var uname=document.AddServiceMan.name.value;
			var pass=document.AddServiceMan.pass.value;
			var email=document.AddServiceMan.email.value;
			var mobile_num=document.AddServiceMan.phone.value;
			$.post("save-service-record.php",{name:uname,password:pass,mail:email,phone:mobile_num},function(data)
			{
				$("#service-contain").html(data).show();
			});
		return false;
	});
</script>
<form class="form-horizontal" method="post" onsubmit="return saveRecord(event)" name="AddServiceMan">
						  <div class="form-group">
							<label for="inputName3" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" onkeypress="return valid(event)" required>
							</div>
						  </div>
						   <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email"  required>
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
						  <div class="form-group ">
							<div class="col-sm-offset-2 col-sm-10 ">
							<button type="button" class="btn btn-success btn-block" id='saveRecord'><span class="glyphicon glyphicon-user"></span> Add Service Man</button>
							</div>
						  </div>
						  
						</form>