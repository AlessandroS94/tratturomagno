<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since imroz 1.0
 */
/**
 * rbt_custom_customize_register
 */
if (!function_exists('rbt_custom_customize_register')) {
    function rbt_custom_customize_register()
    {
        /**
         * Custom Separator
         */
        class Imroz_Separator_Custom_control extends WP_Customize_Control
        {
            public $type = 'separator';

            public function render_content()
            {
                ?>
                <p>
                <hr></p>
                <?php
            }
        }
    }

    add_action('customize_register', 'rbt_custom_customize_register');
}

/**
 * Start rbt_Customize
 */
class rbt_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See rbt_live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since imroz 1.0
     */
    public static function register($wp_customize)
    {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_panel('rbt_colors_options',
            array(
                'title' => esc_html__('Imroz Colors Options', 'imroz'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => esc_html__('Allows you to customize some example settings for imroz.', 'imroz'), //Descriptive tooltip
            )
        );

        $wp_customize->add_section('rbt_colors_main_options',
            array(
                'title' => esc_html__('Global Colors', 'imroz'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );

        /*************************
         * Primary
         ************************/
        $wp_customize->add_setting('color_primary',
            array(
                'default' => '#FD4766',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary',
            array(
                'label' => esc_html__('Primary Color', 'imroz'),
                'settings' => 'color_primary',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Primary light
         ************************/
        $wp_customize->add_setting('color_primary_light',
            array(
                'default' => '#fff5f7',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary_light',
            array(
                'label' => esc_html__('Primary Light Color', 'imroz'),
                'settings' => 'color_primary_light',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('rbt_separator_primary_light_sec', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Imroz_Separator_Custom_control($wp_customize, 'rbt_separator_primary_light_sec', array(
            'settings' => 'rbt_separator_primary_light_sec',
            'section' => 'rbt_colors_main_options',
        )));

        /*************************
         * Secondary
         ************************/
        $wp_customize->add_setting('color_secondary',
            array(
                'default' => '#337DFF',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_secondary',
            array(
                'label' => esc_html__('Secondary Color', 'imroz'),
                'settings' => 'color_secondary',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Secondary light
         ************************/
        $wp_customize->add_setting('color_secondary_light',
            array(
                'default' => '#fff5f7',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_secondary_light',
            array(
                'label' => esc_html__('Secondary Light Color', 'imroz'),
                'settings' => 'color_secondary_light',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('rbt_separator_primary_light', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Imroz_Separator_Custom_control($wp_customize, 'rbt_separator_primary_light', array(
            'settings' => 'rbt_separator_primary_light',
            'section' => 'rbt_colors_main_options',
        )));

        /*************************
         * Gradient 1
         ************************/
        $wp_customize->add_setting('color_gradient_1',
            array(
                'default' => '#1C99FE',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_gradient_1',
            array(
                'label' => esc_html__('Gradient Color - 1', 'imroz'),
                'settings' => 'color_gradient_1',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Gradient 2
         ************************/
        $wp_customize->add_setting('color_gradient_2',
            array(
                'default' => '#7644FF',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_gradient_2',
            array(
                'label' => esc_html__('Gradient Color - 2', 'imroz'),
                'settings' => 'color_gradient_2',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Gradient 3
         ************************/
        $wp_customize->add_setting('color_gradient_3',
            array(
                'default' => '#FD4766',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_gradient_3',
            array(
                'label' => esc_html__('Gradient Color - 3', 'imroz'),
                'settings' => 'color_gradient_3',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));





        /*************************
         * Header Color
         ************************/

        $wp_customize->add_section('rbt_colors_header_options',
            array(
                'title' => esc_html__('Header', 'imroz'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );
        // Link Color
        $wp_customize->add_setting('color_header_link_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_link_color',
            array(
                'label' => esc_html__('Navigation Link Color', 'imroz'),
                'settings' => 'color_header_link_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_header_link_color_after_sticky',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_link_color_after_sticky',
            array(
                'label' => esc_html__('Navigation Link Color After Sticky and Dropdown', 'imroz'),
                'settings' => 'color_header_link_color_after_sticky',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));
        // Sticky Header Background Color
        $wp_customize->add_setting('color_header_sticky_bg_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_sticky_bg_color',
            array(
                'label' => esc_html__('Navigation Background Color After Sticky', 'imroz'),
                'settings' => 'color_header_sticky_bg_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));
        // Dropdown Background Color
        $wp_customize->add_setting('color_header_dropdown_bg_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_dropdown_bg_color',
            array(
                'label' => esc_html__('Dropdown Background Color', 'imroz'),
                'settings' => 'color_header_dropdown_bg_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));


        /*************************
         * Footer Color
         ************************/
        $wp_customize->add_section('rbt_colors_footer_options',
            array(
                'title' => esc_html__('Footer', 'imroz'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_heading_color',
            array(
                // 'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_heading_color',
            array(
                'label' => esc_html__('Title Color', 'imroz'),
                'settings' => 'color_footer_heading_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Text Color
        $wp_customize->add_setting('color_footer_body_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_body_color',
            array(
                'label' => esc_html__('Text Color', 'imroz'),
                'settings' => 'color_footer_body_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_footer_link_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_link_color',
            array(
                'label' => esc_html__('Link Color', 'imroz'),
                'settings' => 'color_footer_link_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_copyright_color',
            array(
                // 'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_copyright_color',
            array(
                'label' => esc_html__('Copyright Color', 'imroz'),
                'settings' => 'color_footer_copyright_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));


    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since imroz 1.0
     */
    public static function rbt_custom_color_output()
    {
        $color_primary = get_theme_mod('color_primary', '#FD4766');
        $primary_rgba_01 = rbt_hex2rgba($color_primary, '0.1');
        ?>
        <!--Customizer CSS-->
        <style type="text/css">

            /************************************************************************************
             * General
             ************************************************************************************/
            /* Primary */
            <?php self::rbt_generate_css(':root', '--color-primary', 'color_primary'); ?>
            <?php self::rbt_generate_css(':root', '--color-primary-light', 'color_primary_light'); ?>
            <?php self::rbt_generate_css(':root', '--color-secondary', 'color_secondary'); ?>
            <?php self::rbt_generate_css(':root', '--color-secondary-light', 'color_secondary_light'); ?>

            <?php self::rbt_generate_css(':root', '--color-primary-from', 'color_gradient_1'); ?>
            <?php self::rbt_generate_css(':root', '--color-primary-to', 'color_gradient_3'); ?>

            <?php self::rbt_generate_box_shadow('button.rn-button-style--2:hover, a.rn-button-style--2:hover, a.wp-block-button__link:hover, input[type=submit]:hover, .im_box:hover, .service.service__style--2:hover', '0 10px 15px 0 '. $primary_rgba_01 .'!important'); ?>


            /* Gradient */
            <?php self::rbt_generate_gradient_multicolor_text('.theme-gradient, .section-title .sub-title, a.btn-transparent', '120deg', 'color_gradient_1', '20.69%', 'color_gradient_2', '50.19%', 'color_gradient_3', '79.69%'); ?>
            <?php self::rbt_generate_gradient_multicolor_shape('.bg-theme-gradient, a.btn-transparent::after, .im-hover::after, .footer-style-01 .ft-text p a::after', '120deg', 'color_gradient_1', '20.69%', 'color_gradient_2', '50.19%', 'color_gradient_3', '79.69%'); ?>
            <?php self::rbt_generate_gradient_multicolor_shape('.breadcrumb-area::before', '90deg', 'color_gradient_1', '20.69%', 'color_gradient_2', '50.19%', 'color_gradient_3', '79.69%'); ?>


            /************************************************************************************
            * Header
            ************************************************************************************/
            /* Link Color */
            <?php self::rbt_generate_css('.header-area.header--transparent .mainmenunav ul.mainmenu > li > a, .header-area.header-style-two.header--transparent .mainmenunav ul.mainmenu > li > a, ul.social-share.social-style--2.color-black li a, .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.header--transparent .header-wrapper a.rn-btn, .humberger-menu span svg, .active-dark .header-area.header-style-two.header--transparent .mainmenunav ul.mainmenu > li > a, .active-dark ul.social-share.social-style--2.color-black li a, .active-dark .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .color-black .mainmenunav ul.mainmenu > li > a, .header-area.color-black a.rn-btn', 'color  ', 'color_header_link_color'); ?>
            <?php self::rbt_generate_css('.header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.header--transparent .header-wrapper a.rn-btn, .active-dark .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.color-black a.rn-btn', 'border-color  ', 'color_header_link_color'); ?>

            /* Link Color after sticky and dropdown */
            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky .header-wrapper .mainmenunav ul.mainmenu > li > a, .header-area.sticky-bg-black.header--sticky.sticky .header-wrapper a.rn-btn, .mainmenunav ul.mainmenu > li ul.submenu li > a, .header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a, .header-area.header-style-two.header--sticky.sticky .mainmenunav ul.mainmenu > li > a,  .header-area.header-style-two.sticky .header-wrapper a.rn-btn, .active-dark .header-area.header--sticky.sticky .header-wrapper a.rn-btn, .header-area.header--sticky.sticky .mainmenunav ul.mainmenu > li > a', 'color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky .header-wrapper a.rn-btn, .header-area.header-style-two.sticky .header-wrapper a.rn-btn, .active-dark .header-area.header--sticky.sticky .header-wrapper a.rn-btn', 'border-color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area .header-wrapper .mainmenunav ul.mainmenu li.has-droupdown > a::after', 'border-top-color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a:hover, .header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a:hover, .header-area.header-style-two.header--sticky.sticky .mainmenunav ul.mainmenu > li:hover > a, .active-dark ul.social-share.social-style--2.color-black li a:hover', 'color  ', 'color_primary'); ?>

            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky, .active-dark .header-area.header--sticky.sticky, .header-area.header--sticky.sticky', 'background  ', 'color_header_sticky_bg_color'); ?>
            <?php self::rbt_generate_css('.mainmenunav ul.mainmenu > li ul.submenu, .imroz-active-onepage-navigation .header-area .mainmenu > li .submenu', 'background  ', 'color_header_dropdown_bg_color'); ?>


            /************************************************************************************
            * Footer
            ************************************************************************************/
            /* Heading Color */
            <?php self::rbt_generate_css('.footer-default .footer-right .footer-widget .title, .footer-style-01 .title, .footer-style-04 .footer-widget .title', 'color  ', 'color_footer_heading_color'); ?>

            /* Text Color */
            <?php self::rbt_generate_css('.footer-widget, .footer-widget p', 'color  ', 'color_footer_body_color'); ?>

            /* Link Color */
            <?php self::rbt_generate_css('.footer-widget ul li a, .footer-default .footer-right .footer-widget ul.ft-link li a, ul.social-share li a, .footer-style-2 p a, .footer-style-01 .ft-text p a, .footer-style-01 .footer-widget .menu li a, .footer-style-01 .footer-widget ul li a, .footer-style-04 .footer-widget .menu li a, .footer-style-04 .footer-widget ul li a, .footer-style-04 .copyright-area a', 'color  ', 'color_footer_link_color'); ?>
            <?php self::rbt_generate_css('ul.social-share li a', 'border-color  ', 'color_footer_link_color'); ?>

            /* Copyright Color */
            <?php self::rbt_generate_css('.copyright-text p, .footer-style-2 p, .footer-style-04 .copyright-area p, .footer-style-01 .ft-text p', 'color  ', 'color_footer_copyright_color'); ?>


        </style>
        <!--/Customizer CSS-->
        <?php
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since imroz 1.0
     */
    public static function rbt_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /***
     * @param $selector
     * @param $angle
     * @param $from_color
     * @param $to_color
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_gradient_angle($selector, $angle, $from_color, $to_color, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, '#f81f01');
        $to_color = get_theme_mod($to_color, '#ee076e');
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s, %s, %s); }',
                $selector,
                $angle,
                $from_color,
                $to_color
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * @param $selector
     * @param $from_color
     * @param $from_color_default
     * @param $from
     * @param $to_color
     * @param $to_color_default
     * @param $to
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_gradient_percentage($selector, $from_color, $from_color_default, $from,  $to_color, $to_color_default, $to, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, $from_color_default);
        $to_color = get_theme_mod($to_color, $to_color_default);
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s %s, %s %s); }',
                $selector,
                $from_color,
                $from,
                $to_color,
                $to
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * Undocumented function
     *
     * @param [type] $selector
     * @param [type] $angle
     * @param [type] $from_color
     * @param [type] $from_color_default
     * @param [type] $from
     * @param [type] $to_color
     * @param [type] $to_color_default
     * @param [type] $to
     * @param boolean $echo
     * @return void
     */
    public static function rbt_generate_gradient_angle_percentage($selector, $angle, $from_color, $from_color_default, $from,  $to_color, $to_color_default, $to, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, $from_color_default);
        $to_color = get_theme_mod($to_color, $to_color_default);
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s, %s %s, %s %s); }',
                $selector,
                $angle,
                $from_color,
                $from,
                $to_color,
                $to
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    
    /**
     * Undocumented function
     *
     * @param [type] $selector
     * @param [type] $angle
     * @param [type] $color_1
     * @param [type] $percentage_1
     * @param [type] $color_2
     * @param [type] $percentage_2
     * @param [type] $color_3
     * @param [type] $percentage_3
     * @param boolean $echo
     * @return void
     */
    public static function rbt_generate_gradient_multicolor_text($selector, $angle, $color_1, $percentage_1, $color_2, $percentage_2, $color_3, $percentage_3, $echo = true)
    {
        $return = '';
        $color_1 = get_theme_mod($color_1, '#1C99FE');
        $color_2 = get_theme_mod($color_2, '#7644FF');
        $color_3 = get_theme_mod($color_3, '#FD4766');
        if ($color_1 || $color_2 || $color_3) {
            $return = sprintf('%s { background: linear-gradient(%s, %s %s, %s %s, %s %s); -webkit-background-clip: text; }',
                $selector,
                $angle,
                $color_1,
                $percentage_1,
                $color_2,
                $percentage_2,
                $color_3,
                $percentage_3
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;

        
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $selector
     * @param [type] $angle
     * @param [type] $color_1
     * @param [type] $percentage_1
     * @param [type] $color_2
     * @param [type] $percentage_2
     * @param [type] $color_3
     * @param [type] $percentage_3
     * @param boolean $echo
     * @return void
     */
    public static function rbt_generate_gradient_multicolor_shape($selector, $angle, $color_1, $percentage_1, $color_2, $percentage_2, $color_3, $percentage_3, $echo = true)
    {
        $return = '';
        $color_1 = get_theme_mod($color_1, '#1C99FE');
        $color_2 = get_theme_mod($color_2, '#7644FF');
        $color_3 = get_theme_mod($color_3, '#FD4766');
        if ($color_1 || $color_2 || $color_3) {
            $return = sprintf('%s { background: linear-gradient(%s, %s %s, %s %s, %s %s); }',
                $selector,
                $angle,
                $color_1,
                $percentage_1,
                $color_2,
                $percentage_2,
                $color_3,
                $percentage_3
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;

        
    }

    /**
     * @param $selector
     * @param $attributes
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_box_shadow($selector, $attributes, $echo = true)
    {
        $return = '';
        if ($attributes) {
            $return = sprintf('%s { box-shadow: %s; }',
                $selector,
                $attributes
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('rbt_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('rbt_Customize', 'rbt_custom_color_output'));


