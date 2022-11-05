<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package imroz
 */
?>

<div class="woocommerce-header-shop">
    <div class="row align-items-center rn-shop-top mb--30">
        <div class="col-md-6 col-xs-12">            
            <div class="woocommerce-count">
                <?php woocommerce_result_count();?>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="woocommerce-sort-list">
                <?php woocommerce_catalog_ordering();?>
            </div>
        </div>
    </div>
</div>