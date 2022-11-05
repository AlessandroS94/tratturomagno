<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imroz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php $imroz_options = Helper::imroz_get_options(); ?>
    <meta name="theme-style-mode" content="<?php echo (int) ($imroz_options['active_dark_mode']); ?>">

    <?php wp_head(); ?>
</head>

<?php
$menu_type = rbt_get_acf_data( 'imroz_menu_type');
$onepage_atts = ($menu_type == 'onepage') ? 'data-spy=scroll data-target=.navbar-onepage data-offset=70' : '';

?>
<body <?php body_class(); ?> <?php echo esc_attr($onepage_atts); ?>>
<?php
if ($imroz_options['imroz_preloader'] !== 'no'){
    get_template_part('template-parts/header/preloader');
}
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
$page_skin = rbt_get_acf_data('imroz_select_page_skin');
$active_dark_screen = ($page_skin == 'dark') ? 'active-dark' : '';
?><div class="main-page <?php echo esc_attr($active_dark_screen); ?>"><?php
get_template_part('template-parts/header/header', 'main');

