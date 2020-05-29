<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=shopping_cart.<br />
 * Displays shopping-cart contents
 *
 * @package templateSystem
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_shopping_cart_default.php 15881 2010-04-11 16:32:39Z wilt $
 */
?>
<div class="centerColumn" id="shoppingCartDefault">
<?php
  if ($flagHasCartContents) {
?>

<?php
  if ($_SESSION['cart']->count_contents() > 0) {
?>
<div class="forward"><?php echo TEXT_VISITORS_CART; ?></div>
<?php
  }
?>

<style>

label {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.checkout {
  background-color: #ee0000;
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

.checkout:hover {
  background-color: #cc0000;
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

</style>

<h1 id="cartDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('shopping_cart') > 0) echo $messageStack->output('shopping_cart'); ?>

<?php echo zen_draw_form('cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product', $request_type)); ?>
<div id="cartInstructionsDisplay" class="content"><?php echo TEXT_INFORMATION; ?></div>

<?php if (!empty($totalsDisplay)) { ?>
  <div class="cartTotalsDisplay important"><?php echo $totalsDisplay; ?></div>
  <br class="clearBoth" />
<?php } ?>

<?php  if ($flagAnyOutOfStock) { ?>

<?php    if (STOCK_ALLOW_CHECKOUT == 'true') {  ?>

<div class="messageStackError"><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></div>

<?php    } else { ?>
<div class="messageStackError"><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></div>

<?php    } //endif STOCK_ALLOW_CHECKOUT ?>
<?php  } //endif flagAnyOutOfStock ?>

<table  border="0" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay" class="centeredContent">
     <tr class="tableHeading">
        <th scope="col" id="scQuantityHeading"><?php echo TABLE_HEADING_QUANTITY; ?></th>
        <th scope="col" id="scUpdateQuantity" class="hidden-phone">&nbsp;</th>
        <th scope="col" id="scProductsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
        <th scope="col" id="scUnitHeading" class="hidden-phone"><?php echo TABLE_HEADING_PRICE; ?></th>
        <th scope="col" id="scTotalHeading"><?php echo TABLE_HEADING_TOTAL; ?></th>
        <th scope="col" id="scRemoveHeading">&nbsp;</th>
     </tr>
         <!-- Loop through all products /-->
<?php
  foreach ($productArray as $product) {
?>
     <tr class="<?php echo $product['rowClass']; ?>">
       <td class="cartQuantity">
<?php
  if ($product['flagShowFixedQuantity']) {
    echo $product['showFixedQuantityAmount'] . '<br /><span class="alert bold">' . $product['flagStockCheck'] . '</span><br /><br />' . $product['showMinUnits'];
  } else {
    echo $product['quantityField'] . '<br /><span class="alert bold">' . $product['flagStockCheck'] . '</span><br /><br />' . $product['showMinUnits'];
  }
?>
       </td>
       <td class="cartQuantityUpdate hidden-phone">
<?php
  if ($product['buttonUpdate'] == '') {
    echo '' ;
  } else {
    $buttonUpdate = ((SHOW_SHOPPING_CART_UPDATE == 1 or SHOW_SHOPPING_CART_UPDATE == 3) ? '<button type="submit" class="unstyled refresh"><i class="icon-refresh"></i></button>' : '') . zen_draw_hidden_field('products_id[]', $product['id']);
    echo $buttonUpdate;
  }
?>
       </td>
       <td class="cartProductDisplay">
<a href="<?php echo $product['linkProductsName']; ?>"><span id="cartImage" class="hidden-phone"><?php echo $product['productsImage']; ?></span><span id="cartProdTitle"><?php echo $product['productsName'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>'; ?></span></a>
<br class="clearBoth" />


<?php
  echo $product['attributeHiddenField'];
  if (isset($product['attributes']) && is_array($product['attributes'])) {
  echo '<div class="cartAttribsList">';
  echo '<ul>';
    reset($product['attributes']);
    foreach ($product['attributes'] as $option => $value) {
?>

<li><?php echo $value['products_options_name'] . TEXT_OPTION_DIVIDER . nl2br($value['products_options_values_name']); ?></li>

<?php
    }
  echo '</ul>';
  echo '</div>';
  }
?>
       </td>
       <td class="cartUnitDisplay hidden-phone"><?php echo $product['productsPriceEach']; ?></td>
       <td class="cartTotalDisplay"><?php echo $product['productsPrice']; ?></td>
       <td class="cartRemoveItemDisplay">
<?php
  if ($product['buttonDelete']) {
?>
           <a class="unstyled remove" href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, 'action=remove_product&product_id=' . $product['id']); ?>"><i class="icon-remove"></i></a>
<?php
  }
  if ($product['checkBoxDelete'] ) {
    echo zen_draw_checkbox_field('cart_delete[]', $product['id']);
  }
?>
</td>
     </tr>
<?php
  } // end foreach ($productArray as $product)
  
  $productNames;
  $productPrices;
  
  foreach ($productArray as $product) {
  
    $productNames = $productNames.$product['productsName']."*";
    $productPrices = $productPrices.$product['productsPrice']."*";
	
  }
  
  //echo $productNames.$productPrices;
  
  //echo count($productArray);
?>
       <!-- Finished loop through all products /-->
      </table>

 <label for="country">Country</label>
    <select id="country" name="country" class="form-control">
    			<option value="Z">Select Country</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="EU">European Union</option>
                <option value="MX">Mexico</option>
                <option value="PL">Poland</option>
                <option value="PR">Puerto Rico</option>
                <option value="X">All other Countries or Territories</option>
            </select>
    
    <label for="fname">Zipcode/Pincode</label>
    <input type="text" id="zipcode" name="pincode" placeholder="Enter Zipcode/Pincode">
	
	<?php 
	
	$lol = explode (" ", $totalsDisplay);
	$weight = substr($lol[3], 0, -22);
	?>
	
	
	<script>
function checkoutNow() {
var e = document.getElementById("country");
var country = e.options[e.selectedIndex].value;
var zipcode = document.getElementById("zipcode").value;

var weight = "<?php echo $weight ?>";
var productNames = "<?php echo $productNames ?>".split('&').join('and');
var productPrices = "<?php echo $productPrices ?>";
var cartShowTotal = "<?php echo $cartShowTotal ?>";

if((country == "Z") || (zipcode == "")){
	alert("Please select Country & Zipcode");
} else {

var list = document.getElementsByClassName("cartQuantity")
var qtyList = list[0].children[0].value + "*";

for (i = 1; i < list.length; i++) {
	qtyList = qtyList + list[i].children[0].value + "*";
}

window.location.href = 'https://www.avenview.com/purchase/checkout.php?productNames='.concat(productNames,'&productPrices=',productPrices,'&productQty=',qtyList,'&totalPrice=',cartShowTotal,'&country=',country,'&zipcode=',zipcode,'&weight=',weight);

}
	
}
</script>
			
</br>

<br class="clearBoth" />

<!--bof shopping cart buttons-->
<div class="buttonRow forward"><?php echo '<a onclick="checkoutNow()">' . zen_image_button(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT) . '</a>'; ?></div>

<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_CONTINUE_SHOPPING, BUTTON_CONTINUE_SHOPPING_ALT) . '</a>'; ?></div>
<?php
// show update cart button
  //if (SHOW_SHOPPING_CART_UPDATE == 2 or SHOW_SHOPPING_CART_UPDATE == 3) {
?>
<!--div class="buttonRow back"><button class="button cartUpdate" type="submit"><i class="icon-refresh"></i> <?php echo TEXT_UPDATE; ?></button></div-->
<?php
  //} else { // don't show update button below cart
?>
<?php
  //} // show update button
?>
<!--eof shopping cart buttons-->
</form>

<br class="clearBoth" />


<!-- ** BEGIN PAYPAL EXPRESS CHECKOUT ** -->
<?php  // the tpl_ec_button template only displays EC option if cart contents >0 and value >0
if (defined('MODULE_PAYMENT_PAYPALWPP_STATUS') && MODULE_PAYMENT_PAYPALWPP_STATUS == 'True') {
  include(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/tpl_ec_button.php');
}
?>
<!-- ** END PAYPAL EXPRESS CHECKOUT ** -->

<?php
      if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '2') {
/**
 * load the shipping estimator code if needed
 */
?>

<?php
      }
?>
<?php
  } else {
?>

<h3 id="cartEmptyText"><?php echo TEXT_CART_EMPTY; ?></h3>

<?php
$show_display_shopping_cart_empty = $db->Execute(SQL_SHOW_SHOPPING_CART_EMPTY);

while (!$show_display_shopping_cart_empty->EOF) {
?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_UPCOMING') {
    include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
  }
?>
<?php
  $show_display_shopping_cart_empty->MoveNext();
} // !EOF
?>
<?php
  }
?>
</div>
