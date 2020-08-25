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

$productIDs = explode("*", $_GET['product_ids']);

$sql = "SELECT `products_model` FROM `products` WHERE `products_id` in (";

for ($x = 0;$x < count($productIDs);$x++){
	if($x == 0){
		if(strlen($productIDs[$x]) == 0) continue;
		$sql = $sql."".$productIDs[$x]."";
	} else {
		if(strlen($productIDs[$x]) == 0) continue;
		$sql = $sql.",".$productIDs[$x]."";
	}
}

$sql = $sql.")";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$response;
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$response=$response."*".$row["products_model"];
  }

  echo substr($response, 1);
  
} else {
  echo "0 results";
}

$conn->close();
?>