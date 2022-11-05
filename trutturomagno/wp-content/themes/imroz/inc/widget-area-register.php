<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if(!function_exists('imroz_widgets_init')){
    function imroz_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'imroz'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'imroz'),
            'before_widget' => '<div id="%1$s" class="rbt-single-widget %2$s mt--50 mt_sm--30 mt_md--30 mt_lg--40">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="title mb--20">',
            'after_title' => '</h4>',
        ));

        if ( class_exists( 'WooCommerce' ) ) {
            register_sidebar(array(
                'name' => esc_html__('Shop Sidebar', 'imroz'),
                'id' => 'sidebar-shop',
                'description' => esc_html__('Add widgets here.', 'imroz'),
                'before_widget' => '<div id="%1$s" class="rbt-single-widget %2$s mt--50 mt_sm--30 mt_md--30 mt_lg--40">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="title mb--20">',
                'after_title' => '</h4>',
            ));
        }

        $number_of_widget 	= 4;
        $imroz_widget_titles = array(
            '1' => esc_html__( 'Footer Widget Area 1', 'imroz' ),
            '2' => esc_html__( 'Footer Widget Area 2', 'imroz' ),
            '3' => esc_html__( 'Footer Widget Area 3', 'imroz' ),
            '4' => esc_html__( 'Footer Widget Area 4', 'imroz' ),
        );
        for ( $i = 1; $i <= $number_of_widget; $i++ ) {
            register_sidebar( array(
                'name'          => $imroz_widget_titles[$i],
                'id'            => 'footer-'. $i,
                'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="title">',
                'after_title'   => '</h4>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'imroz_widgets_init' );
