<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imroz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="imroz-blog-sidebar" class="widget-area imroz-blog-sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
