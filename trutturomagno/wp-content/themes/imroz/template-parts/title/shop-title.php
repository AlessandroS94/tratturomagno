<?php
/**
 * Template part for displaying header shop page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();

?>
<!-- Start Breadcrump Area  -->
<div class="shop-title-layout-1 breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1" data-black-overlay="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100 pt_sm--40 pt_md--50">
                    <?php
                    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                        ?><h1 class="title"><?php echo woocommerce_page_title( false ); ?></h1><?php

                        woocommerce_breadcrumb();

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->