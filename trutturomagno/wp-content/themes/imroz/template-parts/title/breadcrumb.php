<?php
/**
* This partial is used for displaying the Breadcrumbs
*
* @package axil
*
* Add this to any template file by calling imroz_breadcrumbs()
*/

/**
 * Breadcrumb
 */
function imroz_breadcrumbs() {

    $imroz_option = imroz_get_opt();
    
    /**
    * Settings
    */
    $separator          = '';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'page-list';
    $home_title         = esc_html__('Home', 'imroz');

    $term_axil = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = '';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . esc_html($separator) . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            ?>
            <li class="item-current item-archive"><span class="bread-current bread-archive"><?php the_archive_title() ?></span></li>
            <?php
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag()) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            // if( $post_type != 'post' ) {

            //     $post_type_object = get_post_type_object($post_type);
            //     $post_type_archive = get_post_type_archive_link($post_type);

            //     echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive) . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            //     echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

            // }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</span></li>';

        } else if ( is_single() && empty($term_axil->name)) {
            ///echo 999;
            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end($category);
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . esc_html($separator) . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses_post($cat_display);
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . rbt_short_title(get_the_title()) . '</span></li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . rbt_short_title(get_the_title()) . '</span></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . rbt_short_title(get_the_title()) . '</span></li>';

            }

        } else if ( is_category() || !empty($term_axil->name)) {
            // Category page
            if(is_category()){
                echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . esc_html( single_cat_title('', false) ) . '</span></li>';
            }else{
                echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . esc_html($term_axil->name ) . '</span></li>';
            }

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents = '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . esc_html($separator) . ' </li>';
                }

                // Display parent pages
                echo wp_kses_post($parents);

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . rbt_short_title(get_the_title()) . '</span></li>';

            } else {
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . rbt_short_title(get_the_title()) . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'imroz') .'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__('Archives', 'imroz') .'</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_html($separator) . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__('Archives', 'imroz') .'</span></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'imroz') .'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__('Archives', 'imroz') .'</span></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives', 'imroz') .'</span></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><span class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr( $userdata->display_name ) . '">' . esc_html__('Author: ', 'imroz') . esc_html( $userdata->display_name ) . '</span></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page', 'imroz') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">' . esc_html__('Search results for: ', 'imroz') . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . esc_html__('Error 404', 'imroz') . '</li>';
        }

        echo '</ul>';

    }

}