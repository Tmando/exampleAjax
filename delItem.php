<?php
  include 'dbconnect.php';
// Selecting Database
//Fetching Values from URL
$nameItem=$_POST['idItem'];
echo $nameItem;
var_dump($_POST);

$sql = "DELETE FROM items WHERE itemId = \"" . $nameItem."\"";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "Delete Record";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
