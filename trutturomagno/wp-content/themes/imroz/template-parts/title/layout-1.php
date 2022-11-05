<?php
/**
 * Template part for displaying header page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

// Get Value
$imroz_options = Helper::imroz_get_options();
$banner_layout = Helper::imroz_banner_layout();
$banner_area = $banner_layout['banner_area'];
$banner_style = $banner_layout['banner_style'];
$banner_title = rbt_get_acf_data("imroz_custom_title");
$banner_sub_title = rbt_get_acf_data("imroz_custom_sub_title");
$imroz_breadcrumbs_enable = rbt_get_acf_data("imroz_breadcrumbs_enable");

$page_breadcrumb = Helper::imroz_page_breadcrumb();
$page_breadcrumb_enable = $page_breadcrumb['breadcrumbs'];


$default_banner_image = get_template_directory_uri() . "/assets/images/bg/bg-image-1.jpg";
$thumbnail_url  = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$themeoption_banner_bg_image = (!empty($imroz_options['imroz_select_banner_image']['url'])) ? $imroz_options['imroz_select_banner_image']['url'] : $default_banner_image;
$banner_bg_image = ($thumbnail_url) ? $thumbnail_url : $themeoption_banner_bg_image;
?>
<!-- Start Breadcrump Area  -->
<div class="title-layout-1 breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1" data-black-overlay="6" style="background-image: url('<?php echo esc_url($banner_bg_image); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100 pt_sm--40 pt_md--50">
                    <?php if($banner_title){ ?>
                        <h1 class="title"><?php echo esc_html( $banner_title ); ?></h1>
                    <?php  } else { ?>
                        <?php the_title( '<h1 class="title">', '</h1>' ); ?>
                    <?php  }  ?>
                    <?php if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
                        imroz_breadcrumbs();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->