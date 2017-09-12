<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if (!isset($_SESSION['user'])) {
     header("Location: index.php");
     exit;
 } else {
     $_SESSION['login'] = true;
 }
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<style>
  @import url('https://fonts.googleapis.com/css?family=Raleway');
    h1{
      font-family: 'Raleway', sans-serif;
      font-size:15pt;
    }
    label{
      margin-top: 10vh;

    }










</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<input name="item" id="itemInput">
<button id="inputButton" type="submit">Insert</button>
<script>
$(document).ready(function(){
$("#inputButton").click(function(){
  if($("#itemInput").val() != ''){
      var name = $("#itemInput").val();
      var dataString = 'idItem=' + name;
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "list_server.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader("Content-length", dataString.length);
      xhttp.setRequestHeader("Connection", "close");
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var stringArray = this.responseText;
          var outputArray = JSON.parse(stringArray);
          console.log(outputArray);
          var tag ="";
          for(let i = 0;i<outputArray.length;i++){
            tag += "<div class=\"row\">";
            tag += "<div class=\"col-lg-2\">";
            // tag += JavaScript == tag .= PHP
            tag += outputArray[i].itemId;
            tag += "</div>";
            tag += "<div class=\"col-lg-2\">";
            // tag += JavaScript == tag .= PHP
            tag += outputArray[i].itemname;
            tag += "</div>";
            tag += "</div>";

          }
          $("#output").html(tag);
        }
      };
      xhttp.send(dataString);
  }

});
});
</script>
<div id="output" class="container">

</div>
</body>
