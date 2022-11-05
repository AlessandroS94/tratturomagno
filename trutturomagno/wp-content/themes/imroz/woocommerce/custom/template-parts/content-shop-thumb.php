<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package imroz
 */
?>
<div class="shop-thumbnail">
	<?php
	global $product; ?>
	<div class="woocommerce-LoopProduct-link">
	<?php 
		woocommerce_show_product_loop_sale_flash();
        woocommerce_template_loop_add_to_cart();
		woocommerce_template_loop_product_thumbnail();
	?>
	</div>
</div>
<div class="shop-product-info">
	<?php rbt_shop_loop_product_title();?>
</div>