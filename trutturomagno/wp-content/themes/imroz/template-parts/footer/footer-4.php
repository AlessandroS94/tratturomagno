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
<footer class="footer-area footer-style-04 bg_color--1">
    <div class="footer-wrapper ptb--70">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer-1')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

                <?php if (is_active_sidebar('footer-2')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

                <?php if (is_active_sidebar('footer-3')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

                <?php if (is_active_sidebar('footer-4')) { ?>
                    <!-- Start Single Widget -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div><!-- End Single Widget -->
                <?php } ?>

            </div>
        </div>
    </div>

    <div class="copyright-area ptb--20">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <?php if(!empty($imroz_options['imroz_copyright_contact'])){ ?>
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            <div class="text">
                                <p><?php echo wp_kses_post($imroz_options['imroz_copyright_contact']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

