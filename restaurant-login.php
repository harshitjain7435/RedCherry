<?php
include"db.php";
?>
<div class="modal fade" id="ResLoginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5><span class="glyphicon glyphicon-lock"></span>&nbsp; Login</h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;"> 
				<form action="restaurant-login-next-process.php" method="post" >
				
				<label><i class="glyphicon glyphicon-cutlery" aria-hidden="true"></i> &nbsp; Restaurant</label>
					<select class="agile-ltext form-control form-group" name="RName">
					<option value="">--Select Your Restaurant--</option>
					<?php
								$r=mysqli_query($con,"select * from restaurants_info");
								while($row=mysqli_fetch_array($r))
								{
									echo"<option value='$row[1]'>$row[1]</option>";
								}							
								?>	
					</select>
					
					<div class="form-group">
              <label for="usrname"><span class="fa fa-envelope"></span>&nbsp; Email</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password">
            </div>
					
					
					
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> 
									<span> Remember me ?</span> 
								</label> 
							</li>
							<li><a href="#">Forgot password?</a> </li>
						</ul>
						<div class="clearfix"> </div>
					</div>   
				
				  <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button> 
				  </form>
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         <p>Don't have an Account? <a href="#" id="BtnResSignup">Sign Up Now!</a></p> 
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 