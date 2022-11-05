<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

$rbt_options = Helper::imroz_get_options();
$imroz_blog_thumb = ( is_active_sidebar( 'sidebar-1' ) && $rbt_options['imroz_blog_sidebar'] != 'no') ? 'imroz-blog-thumb':'imroz-blog-thumb-full';
?>
<!-- Start Single Blog  -->
<div id="post-<?php the_ID(); ?>" <?php post_class('imroz-blog-list mt--50 mt_md--30 mt_sm--30 mt_lg--50'); ?>>
    <?php if(has_post_thumbnail()){ ?>
        <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail($imroz_blog_thumb, ['class' => 'w-100']) ?>
            </a>
        </div>
    <?php } ?>
    <div class="blog-content-wrapper">
        <div class="blog-top">
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
        <div class="content">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>
<!-- End Single Blog  -->
