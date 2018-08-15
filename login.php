

<div class="modal fade" id="LoginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5><span class="glyphicon glyphicon-lock"></span> Login</h5>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="login-next-process.php">
            <div class="form-group">
             <label for="usrname"><span class="fa fa-envelope"></span>&nbsp; Email</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block btn-lg"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
				  <label> OR</label>
				  
						&nbsp;&nbsp;&nbsp;
					 <div id="my-signin2" class="btn"></div>
      				<script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
        var details="";
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
		
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
	details="ID: " + profile.getId()+'Full Name: ' + profile.getName()+'Given Name: ' + profile.getGivenName()+'Family Name: ' + profile.getFamilyName()+"Image URL: " + profile.getImageUrl()+"Email: " + profile.getEmail()+"<br>ID Token:  " + id_token;
		//document.getElementById("name").innerHTML=details;
		
		window.location.href="getGoogleinfo.php?id="+profile.getId()+"&FullName="+profile.getName()+"&GivenName="+profile.getGivenName()+"&FamilyName="+profile.getFamilyName()+"&ImageURL="+profile.getImageUrl()+"&Email="+ profile.getEmail()+"&TokenId="+id_token;
		
    }
    function onFailure(error) {
      console.log(error);
    }
	
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
	  
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  	<div id="name"></div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#" id="BtnSignup">Sign Up</a></p>
          <p>Forgot <a href="#" id="ForgotPasswordBtn">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
