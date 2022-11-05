<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package keystrock
 */
class Helper
{
    use MenuAreaTrait;
    use LayoutTrait;
    use OptionsTrait;
    use PostMeta;
    use BannerTrait;
    // use MenuAreaTrait;


    /**
     * Generate Excerpt
     */
    public static function generate_excerpt($post, $length = 55, $dot = false)
    {
        if (has_excerpt($post)) {
            $final_content = wp_trim_words(get_the_excerpt($post), $length, '');
        }

        $post = get_post($post);
        $content = wp_strip_all_tags($post->post_content);
        $final_content = wp_trim_words($content, $length, '');

        if ($dot) {
            $final_content = "$final_content $dot";
        }
        return $final_content;
    }
    /**
     * File Requires
     */
    public static function file_requires($filename, $dir = false)
    {
        if ($dir) {
            $child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = get_template_directory() . '/' . $dir . '/' . $filename;
            }
        } else {
            $child_file = get_stylesheet_directory() . '/inc/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = RBT_FREAMWORK_DIRECTORY . $filename;
            }
        }

        require_once $file;
    }

    /**
     * Get Images Form Assets img folder
     */
    public static function get_img($img)
    {
        $img = get_template_directory_uri() . '/assets/img/' . $img;
        return $img;
    }
    /**
     * Get CSS Form Assets CSS Folder
     */
    public static function get_css($file)
    {
        $file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
        return $file;
    }
    /**
     * Convert hex2rgb
     */
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = "$r, $g, $b";
        return $rgb;
    }

}