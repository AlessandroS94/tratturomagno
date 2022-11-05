<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();
$header_layout 			= Helper::imroz_header_layout();
$header_sticky 			= $header_layout['header_sticky'];
$header_transparent 	= $header_layout['header_transparent'];
// Condition

$header_sticky = ("no" !== $header_sticky && "0" !== $header_sticky) ? " header--sticky " : "";
$header_transparent = ("no" !== $header_transparent && "0" !== $header_transparent) ? " header--transparent " : "header-not-transparent";

// Menu
$nav_menu_args = Helper::nav_menu_args();
$onepage_menu_args = Helper::onepage_menu_args();
$nav_menu = rbt_get_acf_data( "imroz_select_nav_menu");
$menu_type = rbt_get_acf_data( "imroz_menu_type");

$select_menu = $nav_menu_args;
if ($menu_type == "onepage"){
    $select_menu = $onepage_menu_args;
} else {
    $select_menu = $nav_menu_args;
}

?>
<header class="header-area header-style-one <?php echo esc_attr($header_sticky); ?> <?php echo esc_attr($header_transparent); ?>">
    <div class="header-wrapper" id="header-wrapper">
        <div class="header-left">
            <div class="logo">
                <?php if (isset($imroz_options['imroz_logo_type'])): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                        title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

                        <?php if ('image' == $imroz_options['imroz_logo_type']): ?>

                            <img class="logo-normal" src="<?php echo esc_url($imroz_options['imroz_head_logo']['url']); ?>"
                                    alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

                            <?php if(!empty($imroz_options['imroz_head_logo_dark']['url'])){ ?>
                                <img class="logo-sticky" src="<?php echo esc_url($imroz_options['imroz_head_logo_dark']['url']); ?>"
                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php } ?>
                            
                        <?php else: ?>

                            <?php if ('text' == $imroz_options['imroz_logo_type']): ?>

                                <?php echo esc_html($imroz_options['imroz_logo_text']); ?>

                            <?php endif ?>

                        <?php endif ?>

                    </a>
                <?php else: ?>

                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                            title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php if (isset($imroz_options['imroz_logo_text']) ? $imroz_options['imroz_logo_text'] : '') {
                                echo esc_html($imroz_options['imroz_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>

                    <?php $description = get_bloginfo('description', 'display');

                    if ($description || is_customize_preview()) { ?>

                        <p class="site-description"><?php echo esc_html($description); ?> </p>

                    <?php } ?>

                <?php endif ?>
            </div>
        </div>
        <div class="header-right">
            
            <?php if (has_nav_menu('primary') || $nav_menu) {
                // Start Mainmanu Nav
                wp_nav_menu($select_menu);
            } ?>

            <?php get_template_part('template-parts/header/mini-cart-icon'); ?>
            <?php get_template_part('template-parts/header/dark-light-switcher'); ?>

            <?php if($imroz_options['imroz_header_btn']){?>
                <div class="header-btn">
                    <a class="btn-default btn-border btn-opacity" href="<?php echo esc_url($imroz_options['imroz_header_buttonUrl']); ?>">
                        <span><?php echo esc_html( $imroz_options['imroz_header_buttontext'] ); ?></span>
                    </a>
                </div>
            <?php } ?>
            
            <?php if (has_nav_menu('primary') || $nav_menu) { ?>
                <!-- Start Humberger Menu  -->
                <div class="humberger-menu d-block d-lg-none pl--20">
                    <span class="menutrigger text-white">
                        <i data-feather="menu"></i>
                    </span>
                </div>
                <!-- End Humberger Menu  -->
            <?php } ?>
            

        </div>
    </div>
</header>