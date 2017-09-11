
<?php
  include 'dbconnect.php';
// Selecting Database
//Fetching Values from URL
$nameItem=$_POST['name1'];
/*
echo $nameItem;
*/
$sql = "INSERT INTO items (itemname) VALUES (\"$nameItem\")";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully" . "xxxxxxxxxxxxx";
} else {
    echo "Error: ". "xxxxxxxxxxxxx" . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);



?>
