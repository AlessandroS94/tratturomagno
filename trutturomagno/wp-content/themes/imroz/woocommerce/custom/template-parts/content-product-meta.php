<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package imroz
 */

global $product;
$imroz_options 	= Helper::imroz_get_options();
do_action( 'woocommerce_product_meta_start' );
$cats_html = wc_get_product_category_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'imroz' ) . '</span> ', '</div>' );
$tags_html = wc_get_product_tag_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'imroz' ) . '</span> ', '</div>' );
if ( $imroz_options['wc_cats'] ) {
	echo wp_kses_post( $cats_html );
}
if ( $imroz_options['wc_tags'] ) {
	echo wp_kses_post( $tags_html );
}
do_action( 'woocommerce_product_meta_end' ); 