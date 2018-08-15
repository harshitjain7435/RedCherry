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
	$("#OrderNow").click(function(){
			$("#OrderModel").modal("show");
			var agreeORnot=$("#agree").is(":checked");
			if(agreeORnot==false)
			{
				document.getElementById("order_placed").disabled=true;
			}
			
    });
	$("#agree").click(function(){
			var agreeORnot=$("#agree").is(":checked");
			if(agreeORnot==false)
			{
				document.getElementById("order_placed").disabled=true;
			}
			if(agreeORnot==true)
			{
				document.getElementById("order_placed").disabled=false;
			}
			
    });
</script>

<div class="modal fade" id="OrderModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5><span class="glyphicon glyphicon-user"></span> </h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;" id="modal-body">
         <form name="order">
            <div class="form-group">
             <label for="usrname"><span class="fa fa-user"></span>&nbsp; Name</label>
              <?php
				    if(isset($_SESSION["usr_name"]))
					{
						$name=$_SESSION["usr_name"];
							echo "<input type='text' class='form-control' value='$name' name='name'>";
					}
					else if(isset($_SESSION["google_usr"]))
					{
						$name=$_SESSION["google_usr"];
							echo "<input type='text' class='form-control' value='$name' name='name'>";
					}
					else
					{
						echo "<input type='text' class='form-control' placeholder='Name' name='name'>";
					}
					 ?>
            </div>
			 <div class="form-group">
			 <label for='usrname'><span class='fa fa-envelope'></span>&nbsp; Email</label>
				   <?php
				    if(isset($_SESSION["dummy_usr_id"]))
					{
							echo "
							<input type='email' class='form-control' value='' name='email' placeholder='abc@example.com'>";
					}
					else if(isset($_SESSION["google_email"]))
					{
						$email=$_SESSION["google_email"];
							echo"<input type='email' class='form-control' value='$email' name='email' readonly='readonly'>";
					}
					else if(isset($_SESSION["usr_email"]))
					{
						$email=$_SESSION["usr_email"];
							echo"<input type='email' class='form-control' value='$email' name='email' readonly='readonly'>";
					}
					 ?>
					 
            </div>
			 <div class="form-group">
             <label for='usrname'><span class='fa fa-phone'></span>&nbsp; Phone Number</label>
               <?php
				    if(isset($_SESSION["usr_email"]))
					{
						$email=$_SESSION["usr_email"];
						$q=mysqli_query($con,"select * from user_info where email='$email'");
						if($row=mysqli_fetch_array($q))
							echo "<input type='text' class='form-control' value='$row[4]' name='phone' >";
					}
					else
					{
						echo "<input type='text' class='form-control' id='usrname' placeholder='Phone Number' name='phone' >";
					}
				?>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-map-marker"></span>&nbsp; Area</label>
			  <select name="area" class="form-control">
			  <option value=' '>--Select Area--</option>
             <?php
			 $q=mysqli_query($con,"select * from areas");
			 
			 while($row=mysqli_fetch_array($q))
			 {
			 	echo "<option value='$row[1]'>$row[1]</option>";
			 }
			 
			 ?>
			 </select>
            </div>
			 <div class="form-group">
              <label for="psw"><span class="fa fa-home"></span>&nbsp; Address</label>
              <textarea class="form-control" placeholder="Address" name="add"></textarea>
            </div>
            <div class="form-group">
              <label for="psw">Cash On Delivery&nbsp;&nbsp;<span class="fa fa-inr"></span></label>
              <input type="checkbox" checked="checked" disabled="disabled"/>
            </div>
			 <div class="form-group">
              <input type="checkbox" id='agree'/> <span style="color:#000066">&nbsp;&nbsp;Make sure that you have read our <a href='#' style="color:#FF0000" id='TnCBtn'>Terms & Conditions</a> and agree with this.</span>
            </div>
             <button type="button" class="btn btn-success btn-block" id='order_placed'><span class="fa fa-paper-plane" disabled></span>&nbsp;&nbsp;Place Order</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
      
    </div>
  </div> 
