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
	function captcha2(e)
	{
		//var val = "";
		var cap=document.Signup.capt.value;
		if (cap==val)
			return true;
		else
		{
			alert(cap+val);
			return false;
		}
	}
</script>

<div class="modal fade" id="SignupModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5><span class="glyphicon glyphicon-user"></span> Sign Up</h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
         <form role="form" method="post" action="signup-next-process.php" name="Signup">
            <div class="form-group">
             <label for="usrname"><span class="fa fa-user"></span>&nbsp; Name</label>
              <input type="text" class="form-control" id="usrname" placeholder="Name" name="Name" onkeypress="return valid(event)">
            </div>
			 <div class="form-group">
             <label for="usrname"><span class="fa fa-envelope"></span>&nbsp; Email</label>
              <input type="text" class="form-control" id="usrname" placeholder="Email" name="email">
            </div>
			 <div class="form-group">
             <label for="usrname"><span class="fa fa-envelope"></span>&nbsp; Phone Number</label>
              <input type="text" class="form-control" id="usrname" placeholder="Phone" name="phone" onkeypress="return number(event)">
            </div>
            <div class="form-group">
              <label for="psw"><span class="fa fa-key"></span>&nbsp; Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Password" name="password">
            </div>
			 <div class="form-group">
				
              <label for="psw"><span class="fa fa-bug"></span>&nbsp; Are you human ? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Solve this &nbsp; </label>
              <input type="text" class="form-control" id="psw" placeholder="Answer" name="capt">
            </div>
			
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
             <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#" id="SinupModel">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
