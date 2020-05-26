<?php

$productNamesHTML = "";

$productNames = explode("*", $_GET['productNames']);

$productPrices = explode("*", $_GET['productPrices']);
                  
for ($x = 0;$x < (count($productPrices)-1);$x++)
{

	if($x == 0){
		$productNamesHTML = "1. ".$productNames[$x];
	} else $productNamesHTML = $productNamesHTML."<br>" . ($x+1) . ". " . $productNames[$x];
    
}

$productPricesHTML = "";
                  
for ($x = 0;$x < (count($productPrices)-1);$x++)
{

	if($x == 0){
		$productPricesHTML = $productPrices[$x];
	} else $productPricesHTML = $productPricesHTML."<br>".$productPrices[$x];
    
}

$emailReceipt = '<div dir="ltr">
  <div dir="ltr">
    <div dir="ltr">
      <div dir="ltr">
        <div dir="ltr">
          <div dir="ltr">
            <div dir="ltr">
              <div dir="ltr">
                <div dir="ltr">
                  <div dir="ltr">
                    <table border="0" style="color: rgb(0, 0, 0); font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; width: 700px; margin-left: auto; margin-right: auto; border: none;">
                      <tbody>
                        <tr id="gmail-BannerRow" style="background-color: rgb(60, 60, 60); color: rgb(255, 255, 255);">
                          <td id="gmail-BannerCol" height="82" valign="middle" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-color: rgb(216, 216, 216); padding-left: 20px;">
                            <h1 style="text-align: center; font-weight: normal; padding-left: 20px; padding-right: 20px;">
                              <div>
                                <img src="https://www.avenview.com/purchase/avenview.png" width="263" height="85" style="margin-right: 5px;"> 
                                <br>
                              </div>
                            </h1>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td style="padding-bottom: 10px;">
                            <div id="gmail-bodyHtml" style="line-height: 24px; margin: 0px; padding: 40px 0px 0px;">
                              <p style="margin-bottom: 25px;">
                                <span class="gmail-email-title">
                                  <b>'.$_GET['name'].', thank you for your purchase. Here are the order details.</b>
                                </span>
                              </p>
                              <table style="border: none; border-collapse: collapse; width: 694.4px; margin-top: 30px;">
                                <tbody>
                                  <tr style="border-color: rgb(216, 216, 216); padding-top: 5px; padding-bottom: 5px; height: 33px;">
                                    <td width="6" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td class="gmail-tableheader" width="50%" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Order Summary</strong>
                                      </font>
                                    </td>
                                    <td width="2" style="font-size: 13px;"></td>
                                    <td id="gmail-cpBodyHtml_ctl38_tdOrderInformationHtmlPrefix" width="6" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td id="gmail-cpBodyHtml_ctl38_tdOrderInformationHtml" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Order Information</strong>
                                      </font>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216); vertical-align: text-top;">
                                    <td></td>
                                    <td style="line-height: 24px;">
                                      <table style="width: 344.8px;">
                                        <tbody>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Order Number:</td>
                                            <td nowrap="" style="vertical-align: text-top;">'.$_GET['id'].'</td>
                                          </tr>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Date Ordered:</td>
                                            <td>'.$_GET['time'].' 
                                              <br>
                                              <span class="gmail-SmallLightText"></span>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td style="line-height: 24px;">
                                      <table>
                                        <tbody>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Name:</td>
                                            <td style="vertical-align: text-top;">'.$_GET['name'].'</td>
                                          </tr>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Email:</td>
                                            <td style="vertical-align: text-top;">'.$_GET['email'].'</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                    <td width="2" class="gmail-tableheader" style="line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td colspan="4" class="gmail-tableheader" style="line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Items</strong>
                                      </font>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" style="font-size: 13px;">
                                      <table class="gmail-fullwidth-table" style="border: 0px; border-collapse: collapse; width: 692px;">
                                        <tbody>
                                          <tr style="border-color: rgb(216, 216, 216);">
                                            <td></td>
                                            <td></td>
                                            <td class="gmail-center-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: center; vertical-align: text-top;">
                                              <strong></strong>
                                            </td>
                                            <td class="gmail-right-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: right; vertical-align: text-top;">
                                              <strong></strong>
                                            </td>
                                            <td class="gmail-right-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: right; vertical-align: text-top;">
                                              <strong>Amount</strong>
                                            </td>
                                          </tr>
                                          <tr style="border-left-color: rgb(216, 216, 216); border-right-color: rgb(216, 216, 216); border-top-color: rgb(216, 216, 216);">
                                            <td class="gmail-productlink" colspan="2" style="vertical-align: text-top; overflow: hidden;">
                                              <strong>
                                                <span dir="ltr">'.
												$productNamesHTML
												.'
                                                </span>
                                              </strong>
                                            </td>
                                            <td class="gmail-center-text" style="width: 101.2px; text-align: center; vertical-align: text-top;">&nbsp;</td>
                                            <td class="gmail-right-text" style="width: 101.2px; text-align: right; vertical-align: text-top;"></td>
                                            <td class="gmail-right-text" style="width: 101.2px; text-align: right; vertical-align: text-top;">
											'.
											$productPricesHTML
											.'
                                            </td>
                                          </tr>
                                          <tr style="border-color: rgb(216, 216, 216);">
                                            <td colspan="2"></td>
                                            <td colspan="3">
                                              <table class="gmail-fullwidth-table gmail-totals-table" style="border-width: 2px 0px 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-collapse: collapse; width: 307.2px; text-align: right; line-height: 23px; border-top-color: rgb(153, 153, 153); border-top-style: solid; word-break: keep-all;">
                                                <tbody>
                                                  <tr style="border-top: 1px solid rgb(216, 216, 216);">
                                                    <td width="120"></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Subtotal:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" style="padding-left: 10px;">'.$_GET['totalPrice'].'</td>
                                                  </tr>
                                                  <tr style="border-color: rgb(216, 216, 216);">
                                                    <td></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Taxes:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" nowrap="" style="padding-left: 10px;">$0.00</td>
                                                  </tr>
                                                  <tr style="border-color: rgb(216, 216, 216);">
                                                    <td></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Total:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" style="padding-left: 10px;">'.$_GET['totalPrice'].'</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <br>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" height="14" style="font-size: 13px;">
                                      <span class="gmail-emailLink" style="font-size: 18px;">All payment processes are done in your AVSignCloud account Billing Section.</span> 
                                      <span style="font-size: 18px;">&nbsp;</span>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" height="14" style="font-size: 13px;">
                                      <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td style="padding-bottom: 15px;">
                            <span id="gmail-lblHelpLinkHtml" class="gmail-emailLink">If you have any questions, please 
                              <a href="mailto:sales@avenview.com">click here</a>&nbsp;and contact our sales department.
                            </span>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td>
                            <span id="gmail-lblThankYouHtml" class="gmail-emailLink">Thank you.</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
';
?>

<!DOCTYPE html>
<html>
<body>

<div id="Box">
            <div class="alert alert-success">
                <strong>Payment Successful!<br>Receipt sent via Email</strong>
            </div>
			
			<?php

			echo '<dl class="dl-horizontal">
			                <dt>Order ID</dt>
			                <dd>'.$_GET['id'].'</dd>
			                <dt>Buyer Name</dt>
			                <dd>'.$_GET['name'].'</dd>
			                <dt>Email Address</dt>
			                <dd>'.$_GET['email'].'</dd>
			            </dl>';
			
			?>
</div>

<?php
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($emailReceipt,70);

$to = $_GET['email'];
$subject = "Purchase Receipt - Avenview Inc.";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Avenview Inc.<no-reply@avenview.com>' . "\r\n";
$headers .= 'Bcc: ravneet@avenview.com' . "\r\n";

// send email
mail($to,$subject,$emailReceipt,$headers);
?>


<?php
// Saving payment in Zencart backend
<?php
$servername = "localhost";
$username = "avenview_paypal";
$password = ")Y3{@%DMc&_t";
$dbname = "avenview_zc2015";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `orders` (`orders_id`, `customers_id`, `customers_name`, `customers_company`, `customers_street_address`, `customers_suburb`, `customers_city`, `customers_postcode`, `customers_state`, `customers_country`, `customers_telephone`, `customers_email_address`, `customers_address_format_id`, `delivery_name`, `delivery_company`, `delivery_street_address`, `delivery_suburb`, `delivery_city`, `delivery_postcode`, `delivery_state`, `delivery_country`, `delivery_address_format_id`, `billing_name`, `billing_company`, `billing_street_address`, `billing_suburb`, `billing_city`, `billing_postcode`, `billing_state`, `billing_country`, `billing_address_format_id`, `payment_method`, `payment_module_code`, `shipping_method`, `shipping_module_code`, `coupon_code`, `cc_type`, `cc_owner`, `cc_number`, `cc_expires`, `cc_cvv`, `last_modified`, `date_purchased`, `orders_status`, `orders_date_finished`, `currency`, `currency_value`, `order_total`, `order_tax`, `paypal_ipn_id`, `ip_address`, `mycourier_name`, `mycourier_account`) VALUES (NULL, '".$_GET['id']."', '".$_GET['name']."', 'test_company', 'test_adress', NULL, 'test_city', 'test_postalcode', 'test_state', 'test_country', 'test_telephone', '".$_GET['email']."', '0', 'UPS', 'United Parcel Service', 'test_adress', NULL, 'test_city', 'test_postalcode', 'test_state', 'test_country', '0', '', NULL, 'test_adress', NULL, 'test_city', 'test_postalcode', 'test_state', 'test_country', '0', 'PayPal', '', 'TestShippingMethod', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '".$_GET['time']."', '0', NULL, 'USD', NULL, '".$_GET['totalPrice']."', 'TaxCost', '0', '', NULL, NULL)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
        #Box {
            width:400px;
            color: black;
            background: white;
            text-align: center;
            margin-left: auto;
  			margin-right: auto;
            margin-top: 40px;
        }

		body{
        	background: white;
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
