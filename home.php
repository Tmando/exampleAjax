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
<?php include 'navbar.php'; ?>
  <label>Name :</label>

            <input id="name" type="text">
            <input id="submit" type="button" value="Submit">
            <script>
            /*
            $(document).ready(function(){
              $(".delButton").click(function(){
                alert($(this).val());
                var dataString = 'idItem' + $(this).val();
                $.ajax({
                type: "POST",
                url: "delItem.php",
                data: dataString,
                cache: false,
                success: function(result){
                alert(result);
                }
              });

            });
            */
            $(document).ready(function(){
            $(".delButton").click(function(){
            var name = $("#name").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'idItem=' + $(this).val();
            // AJAX Code To Submit Form.
              $.ajax({
                type: "POST",
                url: "delItem.php",
                data: dataString,
                cache: false,
                success: function(result){
                  alert(result);
                  window.location.reload();
                }
            });
            });
            });

            $(document).ready(function(){
            $("#submit").click(function(){
            var name = $("#name").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'name1='+ name;
            if(name==''){
            alert("Please Fill All Fields");
            }else{
            // AJAX Code To Submit Form.
              $.ajax({
                type: "POST",
                url: "ajaxsubmit.php",
                data: dataString,
                cache: false,
                success: function(result){
                  alert(result);
                  window.location.reload();
                }
            });
            }
            return false;
            });
            });
            </script>
            <?php
            $sql = "SELECT * FROM items";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>" . "id: " . $row["itemId"]. "  Name: " . $row["itemname"] . " <button name=\"delItem\" value=\"". $row["itemId"] ."\" class=\"delButton\">" . "Delete" . "</button>"."</p>";
                }
            } else {
                echo "0 results";
            }


            ?>
</body>
</html>
<?php ob_end_flush(); ?>
