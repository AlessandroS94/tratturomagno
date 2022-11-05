<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package imroz
 */
trait MenuAreaTrait
{

    // Nav Menu Call
    public static function nav_menu_args()
    {
        $nav_menu = rbt_get_acf_data( "imroz_select_nav_menu");
        $nav_menu_args = array(
            'menu' => $nav_menu,
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mainmenunav d-none d-lg-block ',
            'menu_class' => 'mainmenu',
            'menu_id' => 'mainmenu',
            'fallback_cb' => false,
            'walker' => new ImrozNavWalker(),
        );

        return $nav_menu_args;
    }
    // Mobile Menu
    public static function mobile_menu_args()
    {
        $nav_menu = rbt_get_acf_data( "imroz_select_nav_menu");
        $nav_menu_args = array(
            'menu' => $nav_menu,
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'menu-item',
            'menu_class' => 'mainmenu-item',
            'menu_id' => 'mobile-menu',
            'fallback_cb' => false,
            'walker' => new ImrozMobileWalker(),
        );

        return $nav_menu_args;
    }
    // One Page Menu
    public static function onepage_menu_args()
    {
        $nav_menu = rbt_get_acf_data( "imroz_select_nav_menu");
        $nav_menu_args = array(
            'menu' => $nav_menu,
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'navbar-onepage mainmenunav d-none d-lg-block',
            'menu_class' => 'mainmenu nav nav-pills',
            'menu_id' => 'mainmenu',
            'fallback_cb' => false,
            'walker' => new ImrozOnepageNavWalker(),
        );

        return $nav_menu_args;
    }

    // Footer bottom Menu args
    public static function footer_bottom_menu_args()
    {
        $footer_bottom_menu_args = array(
            'theme_location' => 'footerbottom',
            'container' => 'div',
            'container_class' => 'quick-contact',
            'menu_class' => "link-hover d-flex justify-content-center justify-content-md-end liststyle",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $footer_bottom_menu_args;
    }



}
