<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
        <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'imroz' ),
            'after'  => '</div>',
        ) );
        ?>
	</div><!-- .entry-content -->
    <div class="page-entry-content-footer-wrapper">
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            echo '<div class="comments-wrapper section-inner">';
            comments_template();
            echo '</div>';
        }
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
