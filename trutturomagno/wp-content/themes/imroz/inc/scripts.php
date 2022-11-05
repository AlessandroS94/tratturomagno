<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package imroz
 */

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('imroz_scripts')){
    function imroz_scripts() {

        wp_deregister_style('font-awesome');

        // Fonts
        wp_enqueue_style('imroz-fonts', rbt_fonts_url());

        // Style
        if ( is_rtl() ) {
            wp_enqueue_style('bootstrap', RBT_RTL_CSS_URL . 'vendor/bootstrap.min.css', array(), RBT_VERSION);
        } else {
            wp_enqueue_style('bootstrap', RBT_CSS_URL . 'vendor/bootstrap.min.css', array(), RBT_VERSION);
        }

        wp_enqueue_style('lightbox', RBT_CSS_URL . 'vendor/lightbox.css', array(), RBT_VERSION);
        wp_enqueue_style('magnific-popup', RBT_CSS_URL . 'vendor/magnific-popup.css', array(), RBT_VERSION);
        wp_enqueue_style('font-awesome', RBT_CSS_URL . 'vendor/fontawesome.css', array(), RBT_VERSION);

        wp_enqueue_style('slick-slider', RBT_CSS_URL . 'vendor/slick-slider.css', array(), RBT_VERSION);
        
        wp_enqueue_style('animation', RBT_CSS_URL . 'vendor/animation.css', array(), RBT_VERSION);
        wp_enqueue_style('feather', RBT_CSS_URL . 'vendor/feather.css', array(), RBT_VERSION);
        wp_enqueue_style('imroz-main-style', RBT_CSS_URL . 'style.css', array(), RBT_VERSION);
        wp_enqueue_style('imroz-woocommerce', RBT_CSS_URL . 'woocommerce.css', array(), RBT_VERSION);
        wp_enqueue_style('imroz-dev-style', RBT_CSS_URL . 'dev-style.css', array(), RBT_VERSION);
        wp_enqueue_style('imroz-style', get_stylesheet_uri() );
        wp_style_add_data( 'imroz-style', 'rtl', 'replace' );

        // Scripts
        wp_enqueue_script('bootstrap', RBT_JS_URL . 'vendor/bootstrap.min.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('stellar', RBT_JS_URL . 'vendor/stellar.js', array('jquery'), RBT_VERSION, false);
        wp_enqueue_script('particles', RBT_JS_URL . 'vendor/particles.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('isotope', RBT_JS_URL . 'vendor/isotope.js', array('imagesloaded'), RBT_VERSION, true);
        wp_enqueue_script('counterup', RBT_JS_URL . 'plugins/counterup.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('feather-icons', RBT_JS_URL . 'plugins/feather-icons.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('lightgallery', RBT_JS_URL . 'plugins/lightgallery.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('jquery-magnific-popup', RBT_JS_URL . 'plugins/jquery.magnific-popup.min.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('parallax', RBT_JS_URL . 'plugins/parallax.js', array('jquery'), RBT_VERSION, false);
        wp_enqueue_script('slick', RBT_JS_URL . 'plugins/slick.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('waypoints', RBT_JS_URL . 'plugins/waypoints.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('wow', RBT_JS_URL . 'plugins/wow.js', array('jquery'), RBT_VERSION, true);
        wp_enqueue_script('imroz-cookie', RBT_JS_URL . 'vendor/js.cookie.js', array('jquery'), RBT_VERSION, true);




        // Style
        if ( is_rtl() ) {
            wp_enqueue_script('imroz-main', RBT_RTL_JS_URL . 'main.js', array('jquery'), RBT_VERSION, true);
        } else {
            wp_enqueue_script('imroz-main', RBT_JS_URL . 'main.js', array('jquery'), RBT_VERSION, true);
        }

        wp_enqueue_script('jquery-style-switcher', RBT_JS_URL . 'vendor/jquery.style.switcher.js', array('jquery'), RBT_VERSION, true);

        wp_enqueue_script('imroz-navigation', RBT_ADMIN_JS_URL . 'navigation.js', array(), RBT_VERSION, true );
        wp_enqueue_script('imroz-skip-link-focus-fix', RBT_ADMIN_JS_URL . 'skip-link-focus-fix.js', array(), RBT_VERSION, true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'imroz_scripts' );

/**
 * Imroz admin script
 */
if( !function_exists('imroz_media_scripts') ) {
    function imroz_media_scripts() {

         wp_enqueue_style( 'imroz-wp-admin', get_template_directory_uri() . '/assets/admin/css/admin-style.css', false, '1.0.0' );

        // JS
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'imroz-logo-uploader', RBT_ADMIN_JS_URL .'logo-uploader.js', false, '', true );
    }
}
add_action('admin_enqueue_scripts', 'imroz_media_scripts', 1000);

