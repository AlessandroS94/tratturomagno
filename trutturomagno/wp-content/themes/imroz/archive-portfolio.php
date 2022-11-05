<?php
/**
 * The template for displaying archive for portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imroz
 */

get_header();
?>
    <div class="rn-section-gap bg_color--1">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/portfolio' );

                    endwhile;

                    echo '<div class="col-12">';
                        imroz_blog_pagination();
                    echo '</div>';

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();