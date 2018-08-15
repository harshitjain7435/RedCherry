<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1047021615598-2b379f8knpjmt069k1f2bftkd517aarc.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
    <script>
      
    </script>
  <div id="my-signin2"></div>
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
		
		//alert(console.log('Full Name: ' + profile.getName()));
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
		details="ID: " + profile.getId()+'Full Name: ' + profile.getName()+'Given Name: ' + profile.getGivenName()+'Family Name: ' + profile.getFamilyName()+"Image URL: " + profile.getImageUrl()+"Email: " + profile.getEmail()+"<br>ID Token:  " + id_token;
		document.getElementById("name").innerHTML=details;
		//window.location.href="getinfo.php?name="+profile.getName();
		
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
	<p> </p>
  </body>
</html>