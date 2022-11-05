<?php
/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();
$footer_bottom_menu_args = Helper::footer_bottom_menu_args();
?>
<!-- Start Footer Style Two  -->
<div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="10">
    <div class="wrapper plr--50 plr_sm--20">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="inner">
                    <div class="logo text-center text-md-left mb_sm--20">
                        
                        <?php if (isset($imroz_options['imroz_logo_type'])): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                                title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

                                <?php if ('image' == $imroz_options['imroz_logo_type']): ?>

                                    <img src="<?php echo esc_url($imroz_options['imroz_footer_logo']['url']); ?>"
                                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

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
            </div>
            <?php if(!empty($imroz_options['imroz_social_icons'])){ ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="inner text-center">
                        <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">
                            <?php foreach ($imroz_options['imroz_social_icons'] as $key => $value) {
                                if ($value != '') {
                                    echo '<li><a class="' . esc_attr($key) . '" href="' . esc_url($value) . '" target="_blank"><i class="fab fa-' . esc_attr($key) . '"></i></a></li>';
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <?php if(!empty($imroz_options['imroz_copyright_contact'])){ ?>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="inner text-lg-right text-center mt_md--20 mt_sm--20">
                        <div class="text">
                            <p><?php echo wp_kses_post($imroz_options['imroz_copyright_contact']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Footer Style Two  -->
