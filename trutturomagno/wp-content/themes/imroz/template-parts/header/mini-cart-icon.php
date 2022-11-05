<?php
/**
 * Created by PhpStorm.
 * User: Rainbow-Themes
 * Date: 2/1/2022
 * Time: 4:57 PM
 */


// Get Value
$imroz_options = Helper::imroz_get_options();

global $woocommerce;
$minicart_icon = isset($imroz_options['minicart_icon']) ? $imroz_options['minicart_icon'] : false;
?>
<?php if (class_exists('woocommerce') && $minicart_icon): ?>
    <div class="rbt-mini-cart-wrap">
        <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i class="feather-shopping-cart"></i><span
    class="rbt-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
    </div>
<?php endif; ?>