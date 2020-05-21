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

$arr = json_decode($response, true);

$shippingOptionsString = '';

$i = 0;

foreach($arr as $key=>$value){
	
	$shippingOptionsString .= '<tr>
             <td>
                 <div class="radio">
                     <label><input type="radio" onclick="shipping_change('.$i.');" id="regular" name="optradio">$'.$value['shipping_amount']['amount'].' USD</label>
                 </div>
             </td>
             <td>
             <div class="radiotext">
                 <label for="regular">'.$value['service_type'].'</label>
             </div>
             </td>
         </tr>';
		 
		 $i++;
}
?>

<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="payment.css">
	  
	  <script>

		var jsonResponse = "<?php echo $response ?>";
		var obj = JSON.parse(jsonResponse);

		function shipping_change(var index) {
		    alert(obj[index].service_type);
		}
		
		</script>
	  
   </head>
   <body>
      <div class="row">
         <div class="col-25">
		 <div class="image"> 
		 
		 </div>
            <div class="container">
               <?php
                  $productPrices = explode("*", $_GET['productPrices']);
                  $productNames = explode("*", $_GET['productNames']);
                  
                  echo '<h4>Cart <span class="price" style="color:#dedede"><i class="fa fa-shopping-cart"></i> <b>' . (count($productPrices) - 1) . '</b></span></h4>';
                  
                  for ($x = 0;$x <= count($productPrices);$x++)
                  {
                      echo "<p><a>" . $productNames[$x] . "</a> <span style=\"color:#dedede\" class='price'>" . $productPrices[$x] . "</span></p>";
                  }
				  
				  echo "<p><a>" . $arr[0]['service_type']. " (Shipping Cost)</a> <span style=\"color:#dedede\" class='price'>$" . $arr[0]['shipping_amount']['amount'] . " USD	</span></p>";
                  
                  ?>
               <hr>
               <?php
                  echo '<p>Total <span class="price" style="color:#dedede"><b>' . $_GET['totalPrice'] . '</b></span></p>';
                  ?>
            </div>
			<div class="paypal" style="margin-top:30px">
		 <div id="paypal-button-container"></div> </br></br>
		 
		 <?php
	
	echo '<table id="customers" class="table table-responsive">
     <thead>
         <tr>
             <th>Price</th>
             <th>Service</th>
         </tr>
     </thead>
     <tbody>
     <form id="shipping_cost_form">
         '.$shippingOptionsString.'
         </form>
         </tbody>
</table>';
	
	?>	

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=Afg8i2DaO7LJbQvEq2ijhCzp4PWnxdISyrwj2vP3bWTbMe0lHpskFxlkTv4lnnXBUd-fOqByb0Vs9tf3&currency=USD"></script>
	
	<?php
	$totalPrice = str_replace(",","",$_GET['totalPrice']);
	$totalPrice = str_replace("USD","",$totalPrice);
	$totalPrice = str_replace("$","",$totalPrice);
	
	$totalPriceFloat = floatval($totalPrice);
	
		//echo floatval($string)
		
	echo "<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
			style: {
                layout: 'horizontal',
                color: 'blue',
                tagline: 'false',
                label: 'checkout'
            },

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '".$totalPriceFloat."'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
					console.log(details);
					location.replace('https://www.avenview.com/purchase/paymentSuccess.php?id='+ details.id +'&time='+ details.create_time +'&pid='+ details.payer.payer_id + '&email='+details.payer.email_address +'&name='+ details.payer.name.given_name + ' ' + details.payer.name.surname +'&productPrices=".$_GET['productPrices']."&productNames=".$_GET['productNames']."&totalPrice=".$_GET['totalPrice']."')
                });
            }


        }).render('#paypal-button-container');
    </script>";
	
	?>

    
		 </div>
         </div>
      </div>
   </body>
</html>