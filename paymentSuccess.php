<!DOCTYPE html>
<html>
<body>

<div id="Box">
            <div class="alert alert-success">
                <strong>Payment Successful!</strong>
            </div>
			
			<?php

			echo '<dl class="dl-horizontal">
			                <dt>Order ID</dt>
			                <dd>'.$_GET['id'].'</dd>
			                <dt>Buyer Name</dt>
			                <dd>'.$_GET['name'].'</dd>
			                <dt>Buyer ID</dt>
			                <dd>'.$_GET['pid'].'</dd>
			            </dl>';
			
			?>
			
	<button onclick="myFunction()">Visit Avenview</button>
	
	<script>
	function myFunction() {
	  location.replace("https://www.avenview.com")
	}
	</script>
</div>

<?php
// the message
$msg = "New Purchase Made. Please check paypal.\n\nTransaction ID: ".$_GET['id']."\nBuyer Name: ". $_GET['name']."\nBuyer ID: ". $_GET['pid']."\nBuyer Email: ".$_GET['email'];

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("ravneet@avenview.com","New Purchase - Avenview Inc.",$msg);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
        #Box {
            width:400px;
            color: white;
            background: #555;
            text-align: center;
            margin-left: auto;
  			margin-right: auto;
            margin-top: 40px;
        }

		body{
        	background: #555;
        }
		
		button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
        
        p {
            width:200px;
            margin-left: 40%;
            display: block;
        }

        dl dt {
            margin-left: 0;
        }
</style>

</body>
</html> 
