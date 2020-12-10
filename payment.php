<?php
function priceToFloat($string) {
  	$float = str_replace(",","",$string);
	$float = str_replace("USD","",$float);
	$float = str_replace("$","",$float);
    
  	return floatval($float);
}
?>

<?php

$productModelsConcat = file_get_contents('https://www.avenview.com/purchase/getmodel.php?product_ids='.$_GET['productIds']);

$curl = curl_init();

$weight_oz = ((float) $_GET['weight'])*16;

if($weight_oz < 1) $weight_oz = 1;

$p = "F1mmxiSJHLlzVJFJklHNB0qhfuvd1US/L1AKauUEgzk";
$s = "TEST_SB8LmMvXdJSaNK/S5payf7xun9IjhUQaXmPsX/sz+ZM";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.shipengine.com/v1/rates/estimate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 10,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  
    CURLOPT_POSTFIELDS =>"{\n  \"carrier_ids\": [\n    \"se-274396\"\n  ],\n  \"from_country_code\": \"US\",\n  \"from_postal_code\": \"78756\",\n  \"to_country_code\": \"".$_GET['country']."\",\n  \"to_state_province\": \"".$_GET['province']."\",\n  \"to_postal_code\": \"".$_GET['zipcode']."\",\n  \"weight\": {\n    \"value\": ".$weight_oz.",\n    \"unit\": \"ounce\"\n  },\n  \"dimensions\": {\n    \"unit\": \"inch\",\n    \"length\": 20.0,\n    \"width\": 20.0,\n    \"height\": 15.0\n  },\n  \"confirmation\": \"none\",\n  \"address_residential_indicator\": \"no\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Host: api.shipengine.com",
    "API-Key: ".$p,
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$arr = json_decode($response, true);

if($arr['errors'][0]['field_name'] == "to_postal_code"){

	echo '<script language="javascript">';
	echo "if (confirm('Zipcode is Invalid')) {
		  window.top.location.href = 'https://www.avenview.com/index.php?main_page=shopping_cart';;
		} else {
		  window.top.location.href = 'https://www.avenview.com/index.php?main_page=shopping_cart';;
		}";
	echo '</script>';
}

usort($arr, function($a, $b) {
    return $a['shipping_amount']['amount'] <=> $b['shipping_amount']['amount'];
});

$shippingOptionsString = '';

$i = 0;

$totalPrice1 = trim($_GET['totalPrice'],'$USD');
$totalPrice1 = str_replace( ',', '', $totalPrice1 );

if($totalPrice1 > 250.00){
	for ($i = 0; $i < count($arr); $i++) {
		$arr[$i]['shipping_amount']['amount'] = number_format((float)$arr[$i]['shipping_amount']['amount']*1.81, 2, '.', '');
	}
}

$i=0;
foreach($arr as $key=>$value){
	
	$shippingOptionsString .= '<a href="#" class="'.$i.'" onclick="shipping_change('.$i.');">'.$value['shipping_amount']['amount'].' - '.$value['service_type'].'</a>';
		 
		 $i++;
}

$totalInitialMoney = 0;
//Creating list array for PayPal checkout
$List = "";
?>

<html>

	<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="payment.css">
	  <script src="jQuery/jquery-2.1.3.min.js" type="text/javascript"></script>
	  
   </head>
   <body>
      <div class="row">
         <div class="col-25">
		 <div class="image"> 
		 
		 </div>
            <div class="container">
               <?php
                  $productPrices = explode("*", $_GET['productPrices']);
                  $productModels = explode("*", $productModelsConcat);
				  $productQty = explode("*", $_GET['productQty']);
                  
                  echo '<div class="dropdown">
				  <button class="dropbtn">Shipping Options</button>
				  <div class="dropdown-content">
				    '.$shippingOptionsString.'
				  </div>
				</div>';
                  
                  for ($x = 0;$x <= count($productPrices);$x++)
                  {
				  	if($productQty[$x]!=""){
						$totalPriceEachFloat = priceToFloat($productPrices[$x])*floatval($productQty[$x]);
						
						//Calculating Total initial money
						$totalInitialMoney = $totalInitialMoney + $totalPriceEachFloat;
						
						echo "<p><a>" . $productModels[$x] . " (x".$productQty[$x].")</a> <span style=\"color:#dedede\" class='price'>$" . sprintf('%0.2f', $totalPriceEachFloat) . "USD</span></p>";
						
						//Creating list array for PayPal checkout
						if($x==0){
							$List = "{
				            name: '".$productModels[0]."',
				            description: '',
				            quantity: '".$productQty[0]."',
				            price: '".priceToFloat($productPrices[0])."',
				            tax: '0',
							sku: 'Item # 1',
				            currency: 'USD'
				          }";
						}else{
							$List = $List.",{
				            name: '".$productModels[$x]."',
				            description: '',
				            quantity: '".$productQty[$x]."',
				            price: '".priceToFloat($productPrices[$x])."',
				            tax: '0',
							sku: 'Item # ".($x+1)."',
				            currency: 'USD'
				          }";
						}
					}
                  }
				  
				  echo "<p><a id='shipping_type'>" . $arr[0]['service_type'] . " (Shipping Cost)</a> <span style=\"color:#dedede\" value=" . $arr[3]['shipping_amount']['amount']." id='shipping_amount' class='price'>$" . $arr[0]['shipping_amount']['amount'] . "USD</span></p>";
                  
                  ?>
               <hr>
               <?php
                  echo '<p>Total <span class="price" id="total_cost" style="color:#dedede"><b>$' . $totalInitialMoney . 'USD</b></span></p>';
                  ?>
            </div>
			<div class="paypal" style="margin-top:30px">
		 <div id="paypal-button-container"></div> </br>

<script>
	  
	  window.onload = function() {
		  var defaultShippingCost = "<?php echo $arr[0]['shipping_amount']['amount'] ?>";
		  
		  currentTotalPrice = (parseFloat((parseFloat(defaultShippingCost) + parseFloat(totalPrice)))).toFixed(2);
		  
		  document.getElementById("total_cost").innerHTML = "$" + currentTotalPrice + "USD";
		};
		
		var totalPrice = "<?php echo $totalInitialMoney ?>";
		var currentTotalPrice = parseFloat(totalPrice);
		
		var javascript_array_string = '<?php echo json_encode($arr);?>';
		var javascript_array = JSON.parse(javascript_array_string);
		

		function shipping_change(index) {
			
			var x = document.getElementsByClassName(index.toString());
			
			document.getElementById("shipping_type").innerHTML = javascript_array[index].service_type + " (Shipping Cost)";
			document.getElementById("shipping_amount").innerHTML = "$" + javascript_array[index].shipping_amount.amount + "USD";
			
			currentTotalPrice = (parseFloat((parseFloat(javascript_array[index].shipping_amount.amount) + parseFloat(totalPrice)))).toFixed(2);
			
			document.getElementById("total_cost").innerHTML = "$" + currentTotalPrice + "USD";
		}
		
		</script>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=Afg8i2DaO7LJbQvEq2ijhCzp4PWnxdISyrwj2vP3bWTbMe0lHpskFxlkTv4lnnXBUd-fOqByb0Vs9tf3&currency=USD"></script>
	
	<?php
		
	echo "<div id='paypal-button'></div>
<script src='https://www.paypalobjects.com/api/checkout.js'></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'production',
    client: {
      sandbox: 'AWQriKQnVBrhyNpsPkm9QHX5DzLRk4tNjAXloflAmghkji7tGY9QDZpuCaOZXUqaeLI6YepYfVx8qy2R',
      production: 'Afg8i2DaO7LJbQvEq2ijhCzp4PWnxdISyrwj2vP3bWTbMe0lHpskFxlkTv4lnnXBUd-fOqByb0Vs9tf3'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'responsive',
      layout: 'vertical',
      color: 'white',
      shape: 'pill'
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
	var finalWithShippingcost = document.getElementById('total_cost').innerHTML;
			
	finalWithShippingcost = finalWithShippingcost.substring(0, finalWithShippingcost.length - 3);
	finalWithShippingcost = finalWithShippingcost.substr(1);
	finalWithShippingcost = parseFloat(finalWithShippingcost.replace(/,/g, ''));
	
	console.log((finalWithShippingcost-".priceToFloat($totalInitialMoney).").toFixed(2));
	
      return actions.payment.create({
        transactions: [{
	      amount: {
	        total: finalWithShippingcost,
	        currency: 'USD',
	        details: {
	          subtotal: ".priceToFloat($totalInitialMoney).",
	          tax: '0',
	          shipping: ((finalWithShippingcost-".priceToFloat($totalInitialMoney).").toFixed(2)),
	          handling_fee: '0',
	          shipping_discount: '0',
	          insurance: '0'
	        }
	        },
	        description: document.getElementById('shipping_type'),
	        item_list: {
	          items: [
	          ".$List."]
	        }
      }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
	  
	  console.log(data.orderID);
	  
	  var finalWithShippingcost = document.getElementById('total_cost').innerHTML;
			
	  finalWithShippingcost = finalWithShippingcost.substring(0, finalWithShippingcost.length - 3);
	  finalWithShippingcost = finalWithShippingcost.substr(1);
	  finalWithShippingcost = parseFloat(finalWithShippingcost.replace(/,/g, ''));
	  
        // Show a confirmation message to the buyer
        location.replace('https://www.avenview.com/purchase/paymentSuccess.php?id='+ data.orderID +'&totalPrice=$' + currentTotalPrice + 'USD&email=".$_GET['email']."&shipping=' + ((finalWithShippingcost-".priceToFloat($totalInitialMoney).").toFixed(2)) + '&productPrices=".$_GET['productPricesTimesQty']."&productQty=".$_GET['productQty']."&productModels=".str_replace(' ', '%20', $productModelsConcat)."&productNames=".$_GET['productNames']."')
      });
    }
  }, '#paypal-button');

</script>";
	
	?>

    
		 </div>
         </div>
      </div>
   </body>
</html>