<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait LayoutTrait
{
    public static function imroz_left_get_sidebar()
    {
        $layout_abj = Helper::imroz_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'left-sidebar') {
            get_sidebar();
        }
        return;
    }

    public static function imroz_right_get_sidebar()
    {
        $layout_abj = Helper::imroz_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'right-sidebar') {
            get_sidebar();
        }
        return;
    }

    /**
     * @return array
     * Header Layout
     */
    public static function imroz_header_layout()
    {
        $imroz_options = Helper::imroz_get_options();
        $themepfix = RBT_THEME_PREFIX;
        $condipfix = Helper::layout_settings();

        /**
         * Get Page Options value
         */
        $header_area = rbt_get_acf_data($themepfix .  '_show_header');
        $header_style = rbt_get_acf_data( $themepfix . "_select_header_style");
        $header_sticky = rbt_get_acf_data( $themepfix . "_header_sticky");
        $header_transparent = rbt_get_acf_data( $themepfix . "_header_transparent");

        /**
         * Set Condition
         */
        $header_area = (empty($header_area)) ? $imroz_options['imroz_enable_header'] : $header_area;
        $header_style = (empty($header_style) ||  $header_style == "0") ? $imroz_options['imroz_select_header_template'] : $header_style;
        $header_sticky = (empty($header_sticky)) ? $imroz_options['imroz_header_sticky'] : $header_sticky;
        $header_transparent = (empty($header_transparent)) ? $imroz_options['imroz_header_transparent'] : $header_transparent;
        /**
         * Load Value
         */
        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,
            'header_transparent' => $header_transparent,
        ];
        return $header_layout;

    }
    /**
     * @return array
     * Footer Layout
     */
    public static function imroz_footer_layout()
    {
        $imroz_options = Helper::imroz_get_options();
        /**
         * Get Page Options value
         */
        $footer_area = rbt_get_acf_data('imroz_show_footer');
        $footer_style = rbt_get_acf_data('imroz_select_footer_style');
        /**
         * Set Condition
         */
        $footer_area = (empty($footer_area)) ? $imroz_options['imroz_footer_enable'] : $footer_area;
        $footer_style = (empty($footer_style) ||  $footer_style == "0") ? $imroz_options['imroz_select_footer_template'] : $footer_style;

        /**
         * Load Value
         */
        $footer_layout = [
            'footer_area' => $footer_area,
            'footer_style' => $footer_style,
        ];
        return $footer_layout;

    }

    // Sidebar
    public static function imroz_sidebar_options()
    {
        $themepfix = RBT_THEME_PREFIX;
        $imroz_options = self::imroz_get_options();
        $condipfix = self::layout_settings();
        $sidebar = get_post_meta(get_the_ID(), $themepfix . "_sidebar", true);
        $sidebar = (empty($sidebar) || $sidebar == 'default') ? $imroz_options[$condipfix . '_sidebar'] : $sidebar;
        return $sidebar;
    }

    // Menu Option
    public static function imroz_logos()
    {
        $imroz_options = self::imroz_get_options();
        // Logo
        $imroz_dark_logo = empty($imroz_options['logo']['url']) ? self::get_img('logo-black.svg') : $imroz_options['logo']['url'];
        $imroz_light_logo = empty($imroz_options['logo_light']['url']) ? self::get_img('logo-white.svg') : $imroz_options['logo_light']['url'];
        $imroz_logo_symbol = empty($imroz_options['logo_symbol']['url']) ? self::get_img('logo-symbol.svg') : $imroz_options['logo_symbol']['url'];

        $menu_option = [
            'imroz_dark_logo' => $imroz_dark_logo,
            'imroz_light_logo' => $imroz_light_logo,
            'imroz_logo_symbol' => $imroz_logo_symbol
        ];
        return $menu_option;
    }

    // Page layout style
    public static function imroz_layout_style()
    {
        $themepfix = RBT_THEME_PREFIX;
        $imroz_options = self::imroz_get_options();
        $condipfix = self::layout_settings();

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $imroz_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $imroz_options[$condipfix . "_layout"] : $layout;
        }

        return $layout;
    }

    // layout style
    public static function imroz_layout_style_all()
    {
        $themepfix = RBT_THEME_PREFIX;
        $imroz_options = self::imroz_get_options();
        $condipfix = self::layout_settings();
        $sidebar 	= Helper::imroz_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 imroz-main' : 'col-xl-12 imroz-main';

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $imroz_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $imroz_options[$condipfix . "_layout"] : $layout;
        }

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-item';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-12';
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    // layout style
    public static function imroz_layout_custom_taxonomy()
    {
        $themepfix = RBT_THEME_PREFIX;
        $imroz_options = self::imroz_get_options();
        $condipfix = self::layout_settings();
        $layout = $imroz_options[$condipfix . "_layout"];
        $sidebar 	= Helper::imroz_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 imroz-main' : 'col-xl-12 imroz-main';

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-4';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-lg-6';
        }
        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    /**  Footer Options */
    public static function imroz_active_footer()
    {
        $imroz_options = Helper::imroz_get_options();
        if (!$imroz_options['footer_area']) {
            return false;
        }
        $footer_column = $imroz_options['footer_column'];
        for ($i = 1; $i <= $footer_column; $i++) {
            if (is_active_sidebar('footer-' . $i)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Custom Sidebar
     */
    public static function get_custom_sidebar_fields()
    {
        $themepfix = RBT_WIDGET_PREFIX;
        $sidebar_fields = array();
        $sidebar_fields['sidebar'] = esc_html__('Sidebar', 'imroz');
        $sidebars = get_option("{$themepfix}_custom_sidebars", array());
        if ($sidebars) {
            foreach ($sidebars as $sidebar) {
                $sidebar_fields[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_fields;
    }

    /** layout settings */
    public static function layout_settings()
    {
        $themepfix = RBT_THEME_PREFIX;
        $condipfix = RBT_THEME_PREFIX;
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id = get_the_id();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                    break;
                case 'post':
                    $themepfix = 'single_post';
                    break;
                case "team":
                    $themepfix = 'team';
                    break;
                case 'product':
                    $themepfix = 'product';
                    break;
                default:
                    $themepfix = 'single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'author';
            } elseif (is_search()) {
                $themepfix = 'search';
            } elseif (is_post_type_archive("team") || is_tax("team_category")) {
                $themepfix = 'team_archive';
            } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
                $themepfix = 'shop';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }

}
