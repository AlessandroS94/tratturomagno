<?php
// Get Value
$imroz_options = Helper::imroz_get_options();

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

$imroz_mobile_menu_args = Helper::mobile_menu_args();

?>


<!-- Start Popup Mobile Menu -->
<div class="rn-popup-mobile-menu">
    <div class="inner">
        <div class="popup-menu-top">
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
            <div class="close-menu d-block d-lg-none">
                <span class="closeTrigger">
                <i data-feather="x"></i>
            </span>
            </div>
        </div>
    
        <?php if (has_nav_menu('primary')) {
            wp_nav_menu($imroz_mobile_menu_args);
        } ?>

    </div>
</div>
<!-- End Popup Mobile Menu -->