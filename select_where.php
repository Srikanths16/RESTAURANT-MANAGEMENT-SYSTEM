<?php

require_once('php/component1.php');

$servername = "localhost";
$username = "username";
$password = "";
$dbname = "menu";
$tablename = "home_items";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $tablename WHERE home_items='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    component1($row['item_name'], $row['item_price'], $row['item_image'], $row['id']);

    //echo "id: " . $row["id"]. " - Name: " . $row["item_name"]. " " . $row["item_price"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>