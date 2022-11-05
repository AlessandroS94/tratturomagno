<?php
/*
***************************************************************
*  Social sharing icons
***************************************************************
*/

if (!function_exists('rbt_sharing_icon_links')) {
    function rbt_sharing_icon_links()
    {

        global $post;
        $rbt_options = Helper::rbt_get_options();

        $html = '<div class="blog-share d-flex flex-wrap align-items-center mb--80">';
        $html .= '<span class="text">' . esc_html($rbt_options['rbt_blog_details_social_share_label']) . '</span>';
        $html .= '<ul class="social-share d-flex">';

        // facebook
        $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
        $html .= '<li><a href="' . esc_url($facebook_url) . '" target="_blank" class="aw-facebook"><i class="fab fa-facebook-f"></i> ' . esc_html__("Facebook", "imroz") . '</a></li>';

        // twitter
        $twitter_url = 'https://twitter.com/share?' . esc_url(get_permalink()) . '&amp;text=' . get_the_title();
        $html .= '<li><a href="' . esc_url($twitter_url) . '" target="_blank" class="aw-twitter"><i class="fab fa-twitter"></i> ' . esc_html__("Twitter", "imroz") . '</a></li>';

        // linkedin
        $linkedin_url = 'http://www.linkedin.com/shareArticle?url=' . esc_url(get_permalink()) . '&amp;title=' . get_the_title();
        $html .= '<li><a href="' . esc_url($linkedin_url) . '" target="_blank" class="aw-linkdin"><i class="fab fa-linkedin-in"></i> ' . esc_html__("Linkedin", "imroz") . '</a></li>';

        $html .= '</ul></div>';

        echo wp_kses_post($html);

    }
}

/*
***************************************************************
*  Portfolio sharing icons
***************************************************************
*/

if (!function_exists('rbt_portfolio_sharing_icon_links')) {
    function rbt_portfolio_sharing_icon_links()
    {
        $Helper = new \Helper();
        $imroz_options = $Helper->imroz_get_options();


        $html = '<div class="portfolio-share-link">';
        $html .= '<ul class="social-share rn-lg-size d-flex justify-content-start liststyle mt--15">';

        if ($imroz_options['imroz_enable_portfolio_share_facebook'] == 'yes') {
            // facebook
            $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
            $html .= '<li><a href="' . esc_url($facebook_url) . '" target="_blank" class="aw-facebook"><i class="feather-facebook"></i></a></li>';
        }
        if ($imroz_options['imroz_enable_portfolio_share_twitter'] == 'yes') {
            // twitter
            $twitter_url = 'https://twitter.com/share?' . esc_url(get_permalink()) . '&amp;text=' . get_the_title();
            $html .= '<li><a href="' . esc_url($twitter_url) . '" target="_blank" class="aw-twitter"><i class="feather-twitter"></i></a></li>';
        }
        if ($imroz_options['imroz_enable_portfolio_share_linkedin'] == 'yes') {
            // linkedin
            $linkedin_url = 'http://www.linkedin.com/shareArticle?url=' . esc_url(get_permalink()) . '&amp;title=' . get_the_title();
            $html .= '<li><a href="' . esc_url($linkedin_url) . '" target="_blank" class="aw-linkdin"><i class="feather-linkedin"></i></a></li>';
        }

        $html .= '</ul></div>';

        if ($imroz_options['imroz_enable_portfolio_share'] == 'yes') {
            echo wp_kses_post($html);
        }

    }
}



