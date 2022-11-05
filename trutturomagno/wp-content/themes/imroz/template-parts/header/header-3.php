<?php
/**
 * Template part for displaying header layout three
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
<header class="header-area header-style-3 <?php echo esc_attr($header_transparent); ?> <?php echo esc_attr($header_sticky); ?>">
    <div class="header-wrapper">
        <div class="header-left d-flex align-items-center">
            <div class="logo">
                <?php if (isset($imroz_options['imroz_logo_type'])): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

                        <?php if ('image' == $imroz_options['imroz_logo_type']): ?>

                            <img class="logo-normal" src="<?php echo esc_url($imroz_options['imroz_symbol_logo']['url']); ?>"
                                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

                            <?php if(!empty($imroz_options['imroz_symbol_logo']['url'])){ ?>
                                <img class="logo-sticky" src="<?php echo esc_url($imroz_options['imroz_symbol_logo']['url']); ?>"
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
            <div class="ml--50">
                <?php if (has_nav_menu('primary') || $nav_menu) {
                    // Start Mainmanu Nav
                    wp_nav_menu($select_menu);
                } ?>
            </div>
        </div>
        <div class="header-right">
            <?php if(!empty($imroz_options['imroz_social_icons'])){ ?>
                <!-- Start Social Icons  -->
                <div class="social-share-inner d-none d-sm-block">
                    <ul class="social-share social-style--2 color-black d-flex justify-content-start liststyle">
                        <?php
                        foreach ($imroz_options['imroz_social_icons'] as $key => $value) {
                            if ($value != '') {
                                echo '<li><a class="' . esc_attr($key) . '" href="' . esc_url($value) . '" target="_blank"><i class="fab fa-' . esc_attr($key) . '"></i></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div><!-- End Social Icons  -->
            <?php } ?>

            <?php get_template_part('template-parts/header/mini-cart-icon'); ?>

            <?php get_template_part('template-parts/header/dark-light-switcher'); ?>
            
            <?php if($imroz_options['imroz_header_btn']){?>
                <div class="header-btn ml_md--20 ml_sm--0">
                    <a class="btn-default btn-border btn-opacity" href="<?php echo esc_url($imroz_options['imroz_header_buttonUrl']); ?>">
                        <span><?php echo esc_html( $imroz_options['imroz_header_buttontext'] ); ?></span>
                    </a>
                </div>
            <?php } ?>
            <!-- Start Humberger Menu  -->
            <div class="humberger-menu d-block d-lg-none pl--20 pl_sm--10">
                        <span class="menutrigger text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        </span>
            </div>
            <!-- End Humberger Menu  -->
        </div>
    </div>
</header>