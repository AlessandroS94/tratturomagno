<?php
// Get Value
$imroz_options = Helper::imroz_get_options();
$banner_layout = Helper::imroz_banner_layout();
$banner_area = $banner_layout['banner_area'];
$banner_style = $banner_layout['banner_style'];
$banner_title = rbt_get_acf_data("imroz_custom_title");
$banner_sub_title = rbt_get_acf_data("imroz_custom_sub_title");
// Get $post if you're inside a function.
global $post;

$default_banner_image = get_template_directory_uri() . "/assets/images/bg/bg-image-1.jpg";
$thumbnail_url  = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$themeoption_banner_bg_image = (!empty($imroz_options['imroz_select_banner_image']['url'])) ? $imroz_options['imroz_select_banner_image']['url'] : $default_banner_image;
$banner_bg_image = ($thumbnail_url) ? $thumbnail_url : $themeoption_banner_bg_image;


?>
<!-- Start Breadcrump Area  -->
<div class="title-layout-2 rn-page-title-area pt--120 pb--190 bg_image bg_image--5" data-black-overlay="5"  style="background-image: url('<?php echo esc_url($banner_bg_image); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rn-page-title text-center pt--100">
                    <?php
                    if ($banner_title) { ?>
                        <h1 class="title theme-gradient"><?php echo wp_kses_post($banner_title); ?></h1>
                    <?php } else { ?>
                        <?php the_title( '<h1 class="title theme-gradient">', '</h1>' ); ?>
                    <?php } ?>
                    <?php if ($banner_sub_title) { ?>
                        <p><?php echo wp_kses_post($banner_sub_title); ?></p>
                    <?php } elseif (has_excerpt($post->ID)) { ?>
                        <p><?php the_excerpt(); ?></p>
                    <?php } else {
                        //Noting
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->