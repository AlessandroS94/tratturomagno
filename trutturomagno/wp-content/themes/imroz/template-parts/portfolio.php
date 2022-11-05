<?php
/**
 * Template part for displaying portfolio template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imroz
 */

$terms = get_the_terms($post->ID, 'portfolio-cat');
$imroz_options = Helper::imroz_get_options();

?>

<!-- Start Single Portfolio  -->
<div class="col-lg-4 col-md-6 col-sm-6 col-12">


    <div class="portfolio mt--40">
        <div class="thumbnail-inner">
            <div class="thumbnail image-1"
                 style="background-image: url(<?php the_post_thumbnail_url('imroz-portfolio-thumb'); ?>)"></div>
            <div class="bg-blr-image image-1"
                 style="background-image: url(<?php the_post_thumbnail_url('imroz-portfolio-thumb'); ?>)"></div>
        </div>
        <div class="content">
            <div class="inner">
                <?php if ($terms && !is_wp_error($terms)): ?>
                    <p><?php foreach ($terms as $term) { ?>
                            <span><?php echo esc_html($term->name); ?></span>
                        <?php } ?>
                    </p>
                <?php endif ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php if ($imroz_options['imroz_enable_case_study_button'] == 'yes') { ?>
                    <div class="portfolio-button">
                        <a class="rn-btn"
                           href="<?php the_permalink(); ?>"><?php echo esc_html($imroz_options['imroz_enable_case_study_button_text']); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <a class="transparent-link" href="<?php the_permalink(); ?>"></a>
    </div>
</div>

