<div id="cart-header">
	<span class="setting-title"><?php echo TEXT_SHOPPING_CART_HEADER_CONTENT; ?></span>
	<ul class="unstyled nomargin">
		<?php foreach($cart as $content){ ?>
			<li><div class="media">
            <a class="pull-left" href="<?php echo zen_href_link(zen_get_info_page($content['id']), 'products_id=' . $content['id']); ?>"><?php echo zen_image(DIR_WS_IMAGES . $content['image'], $content['name'], 40, 40); ?></a>
            <div class="media-body">
                <p class="media-heading"><a href="<?php echo zen_href_link(zen_get_info_page($content['id']), 'products_id=' . $content['id']); ?>"><?php echo $content['name']; ?></a></p>
                <p class="price"><?php echo $content['quantity'] . ' X ' . $currencies->format($content['price']); ?></p>
            </div>
            </div></li>
		<?php } ?>
	</ul>
	<p class="total"><?php echo TABLE_HEADING_TOTAL . ' : ' . $currencies->format($_SESSION['cart']->show_total()); ?></p>
	<a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>" class="button small"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a>&nbsp;&nbsp;<a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>" class="button small checkout"><?php echo HEADER_TITLE_CHECKOUT; ?></a>

</div>