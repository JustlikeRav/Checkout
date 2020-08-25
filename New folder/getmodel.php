<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "avenview_getmodel";
$password = "ox,;U,gjn34g";
$dbname = "avenview_zc2015";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `products_model` FROM `products` WHERE `products_id` in (1677,484)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$array=array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
	array_push($array, $row["products_model"]);
  }
  
  $myJSON = json_encode(array_values($array));

  echo $myJSON;
  
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>