<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

get_header();
?>
<div class="rn-section-gap bg_color--1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
