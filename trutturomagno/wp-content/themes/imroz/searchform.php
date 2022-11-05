<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package imroz
 */
$unique_id = esc_attr( imroz_unique_id( 'search-' ) );
?>
<div class="inner">
    <form id="<?php echo esc_attr($unique_id); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET" class="blog-search">
        <input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'imroz' ); ?>" value="<?php echo get_search_query(); ?>"/>
        <button class="search-button"><i class="rbt feather-search"></i></button>
    </form>
</div>