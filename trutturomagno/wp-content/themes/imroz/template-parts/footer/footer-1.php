<?php
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();
$footer_bottom_menu_args = Helper::footer_bottom_menu_args();
?>
<footer class="footer-area footer-style-01 bg_color--6">
    <div class="im-call-to-action-area ptb--70 im-separator">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-xl-6 col-md-12 col-sm-12 col-12">
                    <div class="inner">
                        <?php if(!empty($imroz_options['cta_pre_title'])){ ?>
                            <span><?php echo esc_html($imroz_options['cta_pre_title']) ?></span>
                        <?php } ?>
                        <?php if(!empty($imroz_options['cta_title'])){ ?>
                            <h2 class="text-white mb--0"><?php echo esc_html($imroz_options['cta_title']) ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php if(!empty($imroz_options['cta_btn_title']) && !empty($imroz_options['cta_btn_url'])){ ?>
                <div class="col-lg-4 col-xl-4 offset-xl-2 col-md-12 col-sm-12 col-12">
                    <div class="call-to-cation-tbn text-left text-lg-right mt_md--20 mt_sm--20">
                        <a class="btn-default btn-large btn-border btn-opacity" href="<?php echo esc_url($imroz_options['cta_btn_url']) ?>">
                            <?php echo esc_html($imroz_options['cta_btn_title']) ?>
                        </a>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="footer-wrapper ptb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="ft-text">
                        <div class="logo">
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

                        <?php if(!empty($imroz_options['imroz_copyright_contact'])){ ?>
                            <p><?php echo wp_kses_post($imroz_options['imroz_copyright_contact']); ?></p>
                        <?php } ?>

                    </div>
                </div>

                <?php if (is_active_sidebar('footer-1')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-2 col-xl-2 offset-xl-1 col-md-6 col-sm-6 col-12 mt_mobile--40">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

                <?php if (is_active_sidebar('footer-2')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

                <?php if (is_active_sidebar('footer-3')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

            </div>
        </div>
    </div>
</footer>

