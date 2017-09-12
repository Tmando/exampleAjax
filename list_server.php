<?php
  include 'dbconnect.php';
  $nameItem = $_POST['idItem'];
  $sql = "INSERT INTO items (itemname) VALUES (\"$nameItem\")";
  if (mysqli_query($conn, $sql)) {

      $output = "New record created successfully" . "xxxxxxxxxxxxx";
  } else {
      $output = "Error: ". "xxxxxxxxxxxxx" . $sql . "<br>" . mysqli_error($conn);
  }

  $sql = "SELECT * FROM items";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
          $myArray[] = $row;
      }
          echo json_encode($myArray);
  } else {
      echo "0 results";
  }
  mysqli_close($conn);


















 ?>
