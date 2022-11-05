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
$thumbnail_url  = '';
if (is_home() && get_option('page_for_posts') ) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
    if($img){
        $thumbnail_url  = $img[0];
    }
}

$themeoption_banner_bg_image = (!empty($imroz_options['imroz_select_banner_image']['url'])) ? $imroz_options['imroz_select_banner_image']['url'] : $default_banner_image;
$banner_bg_image = ($thumbnail_url) ? $thumbnail_url : $themeoption_banner_bg_image;




?>
<!-- Start Breadcrump Area  -->
<div class="title-layout-1 breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1" data-black-overlay="6" style="background-image: url('<?php echo esc_url($banner_bg_image); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100 pt_sm--40 pt_md--50">
                    <?php if ( is_archive() ): ?>
                        <h1 class="title"><?php the_archive_title(); ?></h1>
                    <?php elseif( is_search() ): ?>
                        <h1 class="title"><?php esc_html_e( 'Search results for: ', 'imroz' ) ?><?php echo get_search_query(); ?></h1>
                    <?php else: ?>
                        <h1 class="title">
                            <?php  if ( isset( $imroz_options['imroz_blog_text'] ) && !empty( $imroz_options['imroz_blog_text'] ) ){
                                echo esc_html( $imroz_options['imroz_blog_text'] );
                            }
                            else{
                                echo esc_html__('Latest Posts', 'imroz');
                            }  ?>
                        </h1>
                    <?php endif ?>
                    <?php
                    if(! is_home()){
                        imroz_breadcrumbs();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->