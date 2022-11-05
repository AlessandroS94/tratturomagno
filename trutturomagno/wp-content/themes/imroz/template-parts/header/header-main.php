<?php
/**
 * Template part for displaying main header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */
$imroz_options = Helper::imroz_get_options();
$header_layout = Helper::imroz_header_layout();
$header_area = $header_layout['header_area'];
$header_style = $header_layout['header_style'];


/**
 * Load Header
 */
if ("no" !== $header_area && "0" !== $header_area) {
    get_template_part('template-parts/header/header', $header_style);
}

/**
 * Load Mobile Menu
 */
get_template_part('template-parts/header/mobile-menu');

/**
 * Load Page Title Wrapper
 */
get_template_part('template-parts/title/title-wrapper');

?>
<!-- Start Page Wrapper  -->
<main class="page-wrapper">


