<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package imroz
 */

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('imroz_content_estimated_reading_time')) {
    /**
     * Function that estimates reading time for a given $content.
     * @param string $content Content to calculate read time for.
     * @paramint $wpm Estimated words per minute of reader.
     * @returns int $time Esimated reading time.
     */
    function imroz_content_estimated_reading_time($content = '', $wpm = 200)
    {
        $clean_content = strip_shortcodes($content);
        $clean_content = strip_tags($clean_content);
        $word_count = str_word_count($clean_content);
        $time = ceil($word_count / $wpm);
        $output = $time . esc_attr__(' min read', 'imroz');
        return $output;
    }
}
/**
 * Escapeing
 */
if ( !function_exists('awescapeing') ) {
    function awescapeing($html){
        return $html;
    }
}

/**
 *  Convert Get Theme Option global to function
 */
if(!function_exists('imroz_get_opt')){
    function imroz_get_opt(){
        global $imroz_option;
        return $imroz_option;
    }
}
/**
 * Get terms
 */
if (function_exists('imroz_get_terms_gb')){
    function imroz_get_terms_gb( $term_type = null, $hide_empty = false ) {
        if(!isset( $term_type )){
            return;
        }
        $imroz_custom_terms = array();
        $terms = get_terms( $term_type, array( 'hide_empty' => $hide_empty ) );
        array_push( $imroz_custom_terms, esc_html__( '--- Select ---', 'imroz' ) );
        if ( is_array( $terms ) && ! empty( $terms ) ) {
            foreach ( $terms as $single_term ) {
                if ( is_object( $single_term ) && isset( $single_term->name, $single_term->slug ) ) {
                    $imroz_custom_terms[ $single_term->slug ] = $single_term->name;
                }
            }
        }
        return $imroz_custom_terms;
    }
}
/**
 * Blog Pagination
 */
if(!function_exists('imroz_blog_pagination')){
    function imroz_blog_pagination(){
        GLOBAL $wp_query;
        if ($wp_query->post_count < $wp_query->found_posts) {
            ?>
            <div class="rn-pagination text-center mt--60 mt_sm--30"> <?php
                the_posts_pagination(array(
                    'prev_text'          => '<i class="rbt feather-arrow-left"></i>',
                    'next_text'          => '<i class="rbt feather-arrow-right"></i>',
                    'type'               => 'list',
                    'show_all'  	     => false,
                    'end_size'           => 1,
                    'mid_size'           => 8,
                )); ?>
            </div>
            <?php
        }
    }
}
/**
 * Short Title
 */
if (!function_exists('rbt_short_title')){
    function rbt_short_title($title, $length = 30) {
        if (strlen($title) > $length) {
            return substr($title, 0, $length) . ' ...';
        }else {
            return $title;
        }
    }
}
/**
 * Get ACF data conditionally
 */
if( !function_exists('rbt_get_acf_data') ){
    function rbt_get_acf_data($fields){
        return (class_exists('ACF') && get_field_object($fields)) ? get_field($fields) : false;
    }

}
/**
 * imroz_get_nav_menus
 */
if (!function_exists('imroz_get_nav_menus')){
    function imroz_get_nav_menus(){

        $menus = wp_get_nav_menus();
        $menus_data = array(
                '0' => esc_html__('Select a Menu', 'imroz')
        );
        if (!empty($menus) && !is_wp_error($menus)){
            foreach ( $menus as $item ) {
                $menus_data[ $item->slug ] = $item->name;
            }
        }
        return $menus_data;
    }
}

/**
 * Convert hexdec color string to rgb(a) string
 * @param $color
 * @param bool $opacity
 * @return string
 */
if(!function_exists('rbt_hex2rgba')){
    function rbt_hex2rgba($color, $opacity = false) {

        $default = 'rgba(249, 0, 77, 0.1)';

        //Return default if no color provided
        if(empty($color)) {
            return $default;
        }

        //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
    }
}