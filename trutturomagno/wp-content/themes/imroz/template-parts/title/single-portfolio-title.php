<?php
/**
 * Template part for displaying header portfolio title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();
$bg_image_class = has_post_thumbnail() ? '' : 'bg_image--4';
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<!-- Start Breadcrump Area  -->
<div class="title-layout-2 rn-page-title-area pt--120 pb--190 bg_image <?php echo esc_attr($bg_image_class); ?>" data-black-overlay="7" style="background-image: url(<?php echo esc_url($featured_img_url); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner rn-page-title text-center pt--100">
                    <h1 class="title theme-gradient"><?php the_title(); ?></h1>
                    <?php
                    if('excerpt' == $imroz_options['select_title_bellow_content']){ ?>
                        <?php the_excerpt(); ?>
                    <?php } elseif('breadcrumbs' == $imroz_options['select_title_bellow_content']) {
                        imroz_breadcrumbs();
                    } elseif('both' == $imroz_options['select_title_bellow_content']) {
                        the_excerpt();
                        ?>
                        <hr class="mt--20"><?php
                        imroz_breadcrumbs();
                    } else {
                        // Nothing
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->
