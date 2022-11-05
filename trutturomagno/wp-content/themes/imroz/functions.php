<?php
/**
 * Imroz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package imroz
 */
define('RBT_THEME_URI', get_template_directory_uri());
define('RBT_THEME_DIR', get_template_directory());
define('RBT_CSS_URL', get_template_directory_uri() . '/assets/css/');
define('RBT_RTL_CSS_URL', get_template_directory_uri() . '/assets/css/rtl/');
define('RBT_JS_URL', get_template_directory_uri() . '/assets/js/');
define('RBT_RTL_JS_URL', get_template_directory_uri() . '/assets/js/rtl/');
define('RBT_ADMIN_CSS_URL', get_template_directory_uri() . '/assets/admin/css/');
define('RBT_ADMIN_JS_URL', get_template_directory_uri() . '/assets/admin/js/');
define('RBT_FREAMWORK_DIRECTORY', RBT_THEME_DIR . '/inc/');
define('RBT_FREAMWORK_HELPER', RBT_THEME_DIR . '/inc/helper/');
define('RBT_FREAMWORK_OPTIONS', RBT_THEME_DIR . '/inc/options/');
define('RBT_FREAMWORK_CUSTOMIZER', RBT_THEME_DIR . '/inc/customizer/');
define('RBT_THEME_PREFIX', 'imroz');
define('RBT_WIDGET_PREFIX', 'imroz');
define('RBT_FREAMWORK_LAB', RBT_THEME_DIR . '/inc/lab/');
define('RBT_FREAMWORK_TP', RBT_THEME_DIR . '/template-parts/');
define('RBT_IMG_URL', RBT_THEME_URI . '/assets/images/logo/');
define('RBT_WOOCMMERCE', RBT_THEME_DIR . '/woocommerce/custom/');

$rbt_theme_data = wp_get_theme();
define('RBT_VERSION', (WP_DEBUG) ? time() : $rbt_theme_data->get('Version'));


if (!function_exists('imroz_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function imroz_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on imroz, use a find and replace
         * to change 'imroz' to the name of your theme in all the template files.
         */
        load_theme_textdomain('imroz', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'imroz')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Post Format
         */
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));


        add_theme_support('responsive-embeds');
        
        // Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Fonts Support for block editor
        add_editor_style( array( 'style-editor.css', rbt_fonts_url() ) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

        add_theme_support( 'editor-color-palette', array(
            array(
                'name' => esc_html__( 'primary', 'imroz' ),
                'slug' => 'primary',
                'color' => '#f9004d',
            ),
            array(
                'name' => esc_html__( 'Secondary', 'imroz' ),
                'slug' => 'secondary',
                'color' => '#00D09C',
            ),
            array(
                'name' => esc_html__( 'Dark', 'imroz' ),
                'slug' => 'dark',
                'color' => '#1f1f25',
            ),
            array(
                'name' => esc_html__( 'Gray', 'imroz' ),
                'slug' => 'gray',
                'color' => '#717173',
            ),
            array(
                'name' => esc_html__( 'Light', 'imroz' ),
                'slug' => 'light',
                'color' => '#f8f9fc',
            ),
            array(
                'name' => esc_html__( 'White', 'imroz' ),
                'slug' => 'white',
                'color' => '#ffffff',
            ),
        ) );

        add_theme_support( 'editor-font-sizes', array(
            array(
                'name' => esc_html__( 'Small', 'imroz' ),
                'size' => 12,
                'slug' => 'small'
            ),
            array(
                'name' => esc_html__( 'Normal', 'imroz' ),
                'size' => 16,
                'slug' => 'normal'
            ),
            array(
                'name' => esc_html__( 'Large', 'imroz' ),
                'size' => 36,
                'slug' => 'large'
            ),
            array(
                'name' => esc_html__( 'Huge', 'imroz' ),
                'size' => 50,
                'slug' => 'huge'
            )
        ) );

        /**
         * Add Custom Image Size
         */
        add_image_size('imroz-blog-thumb', 791, 420, true);
        add_image_size('imroz-blog-thumb-full', 1230, 652, true);
        add_image_size('imroz-portfolio-thumb', 390, 532, true);
        add_image_size('imroz-gallery-thumb', 650, 433, true);
        add_image_size('imroz-contact-thumb', 650, 433, true);
    }
endif;
add_action('after_setup_theme', 'imroz_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imroz_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('imroz_content_width', 640);
}

add_action('after_setup_theme', 'imroz_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'scripts.php');
/**
 * Global Functions
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'global-functions.php');

/**
 * Register Custom Widget Area
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'widget-area-register.php');

/**
 * Register Custom Fonts
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'register-custom-fonts.php');

/**
 * TGM
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'tgm-config.php');

/**
 * Demo impoter File
 */
require_once( RBT_FREAMWORK_DIRECTORY . 'demo-import-config.php');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/underscore/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/underscore/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/underscore/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/underscore/jetpack.php';
}


/**
 * Helper Template
 */
require_once( RBT_FREAMWORK_HELPER . 'menu-area-trait.php');
require_once( RBT_FREAMWORK_HELPER . 'layout-trait.php');
require_once( RBT_FREAMWORK_HELPER . 'option-trait.php');
require_once( RBT_FREAMWORK_HELPER . 'meta-trait.php');
require_once( RBT_FREAMWORK_HELPER . 'title-trait.php');
// Helper
require_once( RBT_FREAMWORK_HELPER . 'helper.php');

/**
 * Options
 */
require_once( RBT_FREAMWORK_OPTIONS . 'theme/option-framework.php');
require_once( RBT_FREAMWORK_OPTIONS . 'page-options.php');
require_once( RBT_FREAMWORK_OPTIONS . 'post-format-options.php');
require_once( RBT_FREAMWORK_OPTIONS . 'user-extra-meta.php');
require_once( RBT_FREAMWORK_OPTIONS . 'portfolio-meta.php');

/**
 * Lab
 */
require_once( RBT_FREAMWORK_LAB . 'class-tgm-plugin-activation.php');
// -- Nav Walker
require_once( RBT_FREAMWORK_LAB . 'nav-menu-walker.php');
require_once( RBT_FREAMWORK_LAB . 'mobile-menu-walker.php');
require_once( RBT_FREAMWORK_LAB . 'onepage-nav-menu-walker.php');
require_once( RBT_FREAMWORK_TP . 'title/breadcrumb.php');

/**
 * Customizer
 */
require_once( RBT_FREAMWORK_CUSTOMIZER . 'color.php');

// WooCommerce
if (class_exists('WooCommerce')) {
    require_once(RBT_WOOCMMERCE . "wooc-functions.php");
    require_once(RBT_WOOCMMERCE . "wooc-hooks.php");
}





