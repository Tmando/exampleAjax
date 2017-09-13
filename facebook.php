<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <style>
    #UserInfo{
      margin-top: 10vh;
    }
    #logButton{
      margin-top: 3vh;

    }



    </style>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1160078457425323',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.10'
    });
    FB.AppEvents.logPageView();
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      console.log(response);
      if(response.status == 'connected'){
        console.log('Hallo');
        document.getElementById('logButton').innerHTML = "<button onclick=\"logout();\">Logout</button>";
      }else{
        document.getElementById('logButton').innerHTML ="<fb:login-button scope=\"public_profile,email\" onlogin=\"checkLoginState();\">" + "</fb:login-button>";
      }
      userInfo();
    });
  }
  function userInfo(){
    FB.api('me?fields=id,name,about,birthday,email,picture',function(response){
      if(response && !response.error){
        console.log(response);
        document.getElementById('UserInfo').innerHTML="<div class=\"col-lg-3 col-md-3 col-xs-3\">" + response.name+ "</div>";
        document.getElementById('UserInfo').innerHTML+="<div class=\"col-lg-3 col-md-3 col-xs-3\">" + response.id+ "</div>";
        document.getElementById('UserInfo').innerHTML+= "<div class=\"col-lg-3 col-md-3 col-xs-3\">"+"<img src=\"" + response.picture.data.url +"\">"+"</div>";

      }
    });
  }
  function logout(){
    FB.logout();
    location.reload();
    document.getElementById('UserInfo').innerHTML = "";
    document.getElementById('logButton').innerHTML ="<fb:login-button scope=\"public_profile,email\" onlogin=\"checkLoginState();\">" + "</fb:login-button>";
  }


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "http://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="container-fluid">
  <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Project name</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
             <li class="active"><a href="#">Home</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li id="logButton"><fb:login-button
               scope="public_profile,email"
               onlogin="checkLoginState();">
             </fb:login-button></li>
           </ul>
         </div><!--/.nav-collapse -->
       </div><!--/.container-fluid -->
     </nav>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">



</div>
</div>
<div class="row" id="UserInfo">

</div>
</div>
  </body>
</html>
