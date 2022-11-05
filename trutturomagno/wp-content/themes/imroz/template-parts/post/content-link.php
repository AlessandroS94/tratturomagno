<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

?>
<!-- Start Single Blog  -->
<div id="post-<?php the_ID(); ?>" <?php post_class('imroz-blog-list link-blog mt--50 mt_md--30 mt_sm--30 mt_lg--50'); ?>>
    <div class="blog-top">
        <div class="sticky">
            <i class="rbt feather-link"></i>
        </div>
        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
</div>
<!-- End Single Blog  -->