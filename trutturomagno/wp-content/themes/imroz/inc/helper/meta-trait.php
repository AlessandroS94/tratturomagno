<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package imroz
 */

trait PostMeta
{
    // Post Meta
    public static function postmeta()
    {
        $imroz_options = Helper::imroz_get_options();
        ?>
        <div class="author">
            
            <div class="info">
                <ul class="blog-meta">
                    <?php
                    if ($imroz_options['imroz_show_post_author_meta'] != 'no') { ?>
                        <li><i data-feather="user"></i><?php the_author(); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_post_publish_date_meta'] !== 'no') { ?>
                        <li><i data-feather="clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_post_updated_date_meta'] !== 'no') { ?>
                        <li><i data-feather="edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_post_reading_time_meta'] !== 'no') { ?>
                        <li><i data-feather="watch"></i><?php echo imroz_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_post_comments_meta'] !== 'no') { ?>
                        <li class="single-post-meta-comment"><i data-feather="message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'imroz'), esc_html__('1 Comment', 'imroz'), esc_html__('% Comments', 'imroz'), 'post-comment', esc_html__('Comments off', 'imroz')); ?></li>
                    <?php } ?>
                    <?php if (($imroz_options['imroz_show_post_categories_meta'] !== 'no') && has_category()) { ?>
                        <li class="single-post-meta-categories"><i data-feather="folder"></i><?php the_category(' '); ?></li>
                    <?php } ?>
                    <?php if (($imroz_options['imroz_show_post_tags_meta'] !== 'no') && has_tag()) { ?>
                        <li class="single-post-meta-tag"><i data-feather="tag"></i><?php the_tags(' ', ' '); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php }


    // Single post meta
    public static function singlepostmeta()
    {
        $imroz_options = Helper::imroz_get_options();
        ?>
        <div class="author">
            <div class="info">
                <ul class="blog-meta d-flex justify-content-center align-items-center">
                    <?php if ($imroz_options['imroz_show_blog_details_publish_date_meta'] !== 'no') { ?>
                        <li><i data-feather="clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_blog_details_updated_date_meta'] !== 'no') { ?>
                        <li><i data-feather="edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_blog_details_author_meta'] != 'no') { ?>
                        <li><i data-feather="user"></i><?php the_author(); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_blog_details_reading_time_meta'] !== 'no') { ?>
                        <li><i data-feather="watch"></i><?php echo imroz_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($imroz_options['imroz_show_blog_details_comments_meta'] !== 'no') { ?>
                        <li class="single-post-meta-comment"><i data-feather="message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'imroz'), esc_html__('1 Comment', 'imroz'), esc_html__('% Comments', 'imroz'), 'post-comment', esc_html__('Comments off', 'imroz')); ?></li>
                    <?php } ?>
                    <?php if (($imroz_options['imroz_show_blog_details_categories_meta'] !== 'no') && has_category()) { ?>
                        <li class="single-post-meta-categories"><i data-feather="folder"></i><?php the_category(','); ?></li>
                    <?php } ?>
                    <?php if (($imroz_options['imroz_show_blog_details_tags_meta'] !== 'no') && has_tag()) { ?>
                        <li class="single-post-meta-tag"><i data-feather="tag"></i><?php the_tags('', ','); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php }

    public static function imroz_read_more()
    {
        $imroz_options = Helper::imroz_get_options();
        if ($imroz_options['imroz_enable_readmore_btn'] !== 'no') { ?>
            <a class="btn-read-more" href="<?php the_permalink(); ?>"><span
                        class="button-text"><?php echo esc_html($imroz_options['imroz_readmore_text'], 'imroz') ?></span><span
                        class="button-icon"></span></a>
        <?php }
    }


}



