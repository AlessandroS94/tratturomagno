<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package imroz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function imroz_body_classes( $classes ) {

    $imroz_options = Helper::imroz_get_options();

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}


    // Scroll to top
    $classes[] = ($imroz_options['imroz_scroll_to_top_enable'] != 'no') ? "active-scroll-to-top" : "";
    $classes[] = ($imroz_options['imroz_preloader'] != 'no') ? "active-preloader" : "";


    $menu_type = rbt_get_acf_data( "imroz_menu_type");
    if ($menu_type){
        $classes[] = ($menu_type == 'onepage') ? "spybody imroz-active-onepage-navigation" : "";
    }


    $header_layout 			= Helper::imroz_header_layout();
    $header_transparent 	= $header_layout['header_transparent'];
    $classes[] = ("no" !== $header_transparent && "0" !== $header_transparent) ? " root-header-transparent " : "root-header-not-transparent";


    // Add dark / light body class conditions
    $global_dark_light_options = $imroz_options['active_dark_mode'];
    $client_cookie_key = $global_dark_light_options == 1 ? 'client_dark_mode_style_cookie' : 'client_light_mode_style_cookie';
    if (isset($_COOKIE[$client_cookie_key])) {
        $styleModeClass = $_COOKIE[$client_cookie_key] == 'dark' ? 'active-dark-mode':'active-light-mode';
    } else {
        $styleModeClass = $global_dark_light_options == 1 ? 'active-dark-mode':'active-light-mode';
    }
    $classes[] = $styleModeClass;

	return $classes;
}
add_filter( 'body_class', 'imroz_body_classes' );



/**
 * Get unique ID.
 */
function imroz_unique_id($prefix = '')
{
    static $id_counter = 0;
    if (function_exists('wp_unique_id')) {
        return wp_unique_id($prefix);
    }
    return $prefix . (string)++$id_counter;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function imroz_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action('wp_head', 'imroz_pingback_header');

/**
 * Comment navigation
 */
function imroz_get_post_navigation()
{
    if (get_comment_pages_count() > 1 && get_option('page_comments')):
        require(get_template_directory() . '/inc/comment-nav.php');
    endif;
}
require get_template_directory() . '/inc/comment-form.php';
