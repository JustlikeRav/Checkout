<?php

$curl = curl_init();

$weight_oz = ((float) $_GET['weight'])*16;

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.shipengine.com/v1/rates/estimate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n  \"carrier_ids\": [\n    \"se-248578\"\n  ],\n  \"from_country_code\": \"US\",\n  \"from_postal_code\": \"78756\",\n  \"to_country_code\": \"".$_GET['country']."\",\n  \"to_postal_code\": \"".$_GET['zipcode']."\",\n  \"weight\": {\n    \"value\": ".$weight_oz.",\n    \"unit\": \"ounce\"\n  },\n  \"dimensions\": {\n    \"unit\": \"inch\",\n    \"length\": 15.0,\n    \"width\": 15.0,\n    \"height\": 10.0\n  },\n  \"confirmation\": \"none\",\n  \"address_residential_indicator\": \"no\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Host: api.shipengine.com",
    "API-Key: TEST_SB8LmMvXdJSaNK/S5payf7xun9IjhUQaXmPsX/sz+ZM",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>

