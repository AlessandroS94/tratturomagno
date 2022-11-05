<?php

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;
use Elementor\REPEA;
use ImrozCore\Elementor\Controls\Group_Control_RBTGradient;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

function rbt_elementor_init()
{

    /**
     * Initialize EAE_Helper
     */
    new rbt_Helper;

}

add_action('elementor/init', 'Elementor\rbt_elementor_init');
/**
 * Get All Post Types
 */
function rbt_get_post_types()
{

    $rbt_cpts = get_post_types(array('public' => true, 'show_in_nav_menus' => true), 'object');
    $rbt_exclude_cpts = array('elementor_library', 'attachment');
    foreach ($rbt_exclude_cpts as $exclude_cpt) {
        unset($rbt_cpts[$exclude_cpt]);
    }
    $post_types = array_merge($rbt_cpts);
    foreach ($post_types as $type) {
        $types[$type->name] = $type->label;
    }
    return $types;
}

/**
 * Get all types of post.
 */
function rbt_get_all_types_post($post_type)
{

    $posts_args = get_posts(array(
        'post_type' => $post_type,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => 20,
    ));

    $posts = array();

    if (!empty($posts_args) && !is_wp_error($posts_args)) {
        foreach ($posts_args as $post) {
            $posts[$post->ID] = $post->post_title;
        }
    }

    return $posts;
}

/**
 * Get all Pages
 */
if (!function_exists('rbt_get_all_pages')) {
    function rbt_get_all_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    }
}

/**
 * Post Settings Parameter
 */
function rbt_get_post_settings($settings)
{
    foreach ($settings as $key => $value) {
        $post_args[$key] = $value;
    }
    $post_args['post_status'] = 'publish';

    return $post_args;
}

/**
 * Get Post Thumbnail Size
 */
function rbt_get_thumbnail_sizes()
{
    $sizes = get_intermediate_image_sizes();
    foreach ($sizes as $s) {
        $ret[$s] = $s;
    }
    return $ret;
}

/**
 * Post Orderby Options
 */
function rbt_get_orderby_options()
{
    $orderby = array(
        'ID' => 'Post ID',
        'author' => 'Post Author',
        'title' => 'Title',
        'date' => 'Date',
        'modified' => 'Last Modified Date',
        'parent' => 'Parent Id',
        'rand' => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order' => 'Menu Order',
    );
    return $orderby;
}

/**
 * Get Post Categories
 */
function rbt_get_categories($taxonomy)
{
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
    ));
    $options = array();
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }
    return $options;
}

/**
 * Get all Pages
 */
if (!function_exists('rbt_get_pages')) {
    function rbt_get_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    }
}


/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function rbt_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [
            'class' => [],
        ],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    if ($level === 'advance') {
        $allowed_html['ul'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['ol'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['li'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];

    }

    return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function rbt_kses_advance($string = '')
{
    return wp_kses($string, rbt_get_allowed_html_tags('advance'));
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function rbt_kses_intermediate($string = '')
{
    return wp_kses($string, rbt_get_allowed_html_tags('intermediate'));
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function rbt_kses_basic($string = '')
{
    return wp_kses($string, rbt_get_allowed_html_tags('basic'));
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function rbt_get_allowed_html_desc($level = 'basic')
{
    if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
        $level = 'basic';
    }

    $tags_str = '<' . implode('>,<', array_keys(rbt_get_allowed_html_tags($level))) . '>';
    return sprintf(__('This input field has support for the following HTML tags: %1$s', 'imroz'), '<code>' . esc_html($tags_str) . '</code>');
}

/**
 * Element Common Functions
 */
trait ImrozElementCommonFunctions
{

    /**
     * Create section title fields
     *
     * @param null $control_id
     * @param string $before_title
     * @param string $title
     * @param string $default_title_tag
     * @param string $description
     */
    protected function rbt_section_title($control_id = null, $section_name = 'Section Title',  $before_title = 'Before Title', $title = 'Your Section Title', $default_title_tag = 'h2', $description = 'There are many variations of passages of Lorem Ipsum available, <br /> but the majority have suffered alteration.', $align = 'text-center',  $enable_title_show_hide = true, $default_enable = 'yes')
    {
        $this->start_controls_section(
            'rbt_' . $control_id . '_section_title',
            [
                'label' => esc_html__($section_name, 'imroz'),
            ]
        );
        if ($enable_title_show_hide){
            $this->add_control(
                'rbt_' . $control_id . '_section_title_show',
                [
                    'label' => esc_html__( 'Section Title & Content', 'imroz' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'imroz' ),
                    'label_off' => esc_html__( 'Hide', 'imroz' ),
                    'return_value' => 'yes',
                    'default' => $default_enable,
                ]
            );
        }

        $this->add_control(
            'rbt_' . $control_id . '_before_title',
            [
                'label' => esc_html__('Before Title', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'basic' ),
                'type' => Controls_Manager::TEXT,
                'default' => $before_title,
                'placeholder' => esc_html__('Type Before Heading Text', 'imroz'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_title',
            [
                'label' => esc_html__('Title', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => $title,
                'placeholder' => esc_html__('Type Heading Text', 'imroz'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'imroz'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'imroz'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'imroz'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'imroz'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'imroz'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'imroz'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'imroz'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => $default_title_tag,
                'toggle' => false,
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_desctiption',
            [
                'label' => esc_html__('Description', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => $description,
                'placeholder' => esc_html__('Type section description here', 'imroz'),
            ]
        );
        if($align) {
            $this->add_responsive_control(
                'rbt_' . $control_id . '_align',
                [
                    'label' => esc_html__('Alignment', 'imroz'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__('Left', 'imroz'),
                            'icon' => 'fa fa-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__('Center', 'imroz'),
                            'icon' => 'fa fa-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__('Right', 'imroz'),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => $align,
                    'toggle' => false,
                ]
            );
        }
        $this->end_controls_section();
    }

    /**
     * Render Section Title
     *
     * @param null $control_id
     * @param $settings
     */
    protected function rbt_section_title_render($control_id = null, $settings)
    {

        if (!$settings['rbt_'.$control_id.'_section_title_show']){
            return;
        }
        $this->add_render_attribute('title_args', 'class', 'title rbt-section-title');
        ?>
            <?php if (!empty($settings['rbt_'.$control_id.'_before_title'])) { ?>
                <span class="sub-title"><?php echo rbt_kses_basic( $settings['rbt_'.$control_id.'_before_title'] ); ?></span>
            <?php } ?>
            <?php
            if ($settings['rbt_'.$control_id.'_title_tag']) :
                printf('<%1$s %2$s><span>%3$s</span></%1$s>',
                    tag_escape($settings['rbt_'.$control_id.'_title_tag']),
                    $this->get_render_attribute_string('title_args'),
                    rbt_kses_intermediate($settings['rbt_'.$control_id.'_title'])
                );
            endif;
            ?>
            <?php if (!empty($settings['rbt_'.$control_id.'_desctiption'])) { ?>
                <p><?php echo rbt_kses_intermediate( $settings['rbt_'.$control_id.'_desctiption'] ); ?></p>
            <?php } ?>
        <?php
    }

    /**
     * @param null $control_id
     * @param $settings
     */
    protected function rbt_link_control_render($control_id = null, $settings){

        // Link
        if ('2' == $settings['rbt_'.$control_id.'_link_type']) {
            $this->add_render_attribute('rbt_'.$control_id.'_link', 'href', get_permalink($settings['rbt_'.$control_id.'_page_link']));
            $this->add_render_attribute('rbt_'.$control_id.'_link', 'target', '_self');
            $this->add_render_attribute('rbt_'.$control_id.'_link', 'rel', 'nofollow');
        } else {
            if (!empty($settings['rbt_'.$control_id.'_link']['url'])) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'href', $settings['rbt_'.$control_id.'_link']['url']);
            }
            if ($settings['rbt_'.$control_id.'_link']['is_external']) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'target', '_blank');
            }
            if (!empty($settings['rbt_'.$control_id.'_link']['nofollow'])) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'rel', 'nofollow');
            }
        }

        // Button
        if (!empty($settings['rbt_'.$control_id.'_link']['url']) || isset($settings['rbt_'.$control_id.'_link_type'])) {

            $this->add_render_attribute('rbt_'.$control_id.'_link', 'class', ' rbt-button ');
            // Style
            if (!empty($settings['rbt_'.$control_id.'_style_button_style'])) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'class', '' . $settings['rbt_'.$control_id.'_style_button_style'] . '');
            }
            // Size
            if (!empty($settings['rbt_'.$control_id.'_style_button_size'])) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'class', $settings['rbt_'.$control_id.'_style_button_size']);
            }
            // Color
            if (!empty($settings['rbt_'.$control_id.'_style_button_color'])) {
                $this->add_render_attribute('rbt_'.$control_id.'_link', 'class', $settings['rbt_'.$control_id.'_style_button_color']);
            }
            // Link
            $button_html = '<a ' . $this->get_render_attribute_string('rbt_'.$control_id.'_link') . '>' . '<span class="button-text">' . $settings['rbt_'.$control_id.'_text'] . '</span></a>';
        }
        if (!empty($settings['rbt_'.$control_id.'_text'])) {
            echo $button_html;
        }

    }

    /**
     * [rbt_query_controls description]
     * @param  [type] $control_id     [description]
     * @param  [type] $control_name   [description]
     * @param string $post_type [description]
     * @param string $taxonomy [description]
     * @param string $posts_per_page [description]
     * @param string $offset [description]
     * @param string $orderby [description]
     * @param string $order [description]
     * @return [type]                 [description]
     */
    protected function rbt_query_controls($control_id = null, $control_name = null, $post_type = 'any', $taxonomy = 'category', $posts_per_page = '6', $offset = '0', $orderby = 'date', $order = 'desc')
    {

        $this->start_controls_section(
            'imroz' . $control_id . '_query',
            [
                'label' => sprintf(esc_html__('%s Query', 'imroz'), $control_name),
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'imroz'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'imroz'),
                'type' => Controls_Manager::NUMBER,
                'default' => $posts_per_page,
            ]
        );
        $this->add_control(
            'category',
            [
                'label' => esc_html__('Include Categories', 'imroz'),
                'description' => esc_html__('Select a category to include or leave blank for all.', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => rbt_get_categories($taxonomy),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Categories', 'imroz'),
                'description' => esc_html__('Select a category to exclude', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => rbt_get_categories($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude Item', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'options' => rbt_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'imroz'),
                'type' => Controls_Manager::NUMBER,
                'default' => $offset,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => rbt_get_orderby_options(),
                'default' => $orderby,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'imroz' ),
                    'desc' 	=> esc_html__( 'Descending', 'imroz' )
                ],
                'default' => $order,

            ]
        );
        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__( 'Ignore Sticky Posts', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'imroz' ),
                'label_off' => esc_html__( 'No', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * [rbt_basic_style_controls description]
     * @param  [string] $control_id       [description]
     * @param  [string] $control_name     [description]
     * @param  [string] $control_selector [description]
     * @return [styleing control]                   [ color, typography, padding, margin ]
     */
    protected function rbt_basic_style_controls($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'rbt_' . $control_id . '_styling',
            [
                'label' => esc_html__($control_name, 'imroz'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_RBTGradient::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_advs',
                'label' => esc_html__('Color', 'imroz'),
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
//        $this->add_control(
//            'rbt_' . $control_id . '_color',
//            [
//                'label' => esc_html__('Color', 'imroz'),
//                'type' => Controls_Manager::COLOR,
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'color: {{VALUE}} !important;',
//                ],
//            ]
//        );
//        $this->add_control(
//            'rbt_' . $control_id . '_bg_color',
//            [
//                'label' => esc_html__('Background Color', 'imroz'),
//                'type' => Controls_Manager::COLOR,
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'background: {{VALUE}} !important;',
//                ],
//            ]
//        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_typography',
                'label' => esc_html__('Typography', 'imroz'),
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_padding',
            [
                'label' => esc_html__('Padding', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * [rbt_section_style_controls description]
     * @param  [type] $control_id       [description]
     * @param  [type] $control_name     [description]
     * @param  [type] $control_selector [description]
     * @return [type]                   [description]
     */
    protected function rbt_section_style_controls($control_id = null, $control_name = null, $control_selector = null)
    {
        $this->start_controls_section(
            'rbt_' . $control_id . '_area_styling',
            [
                'label' => esc_html__($control_name, 'imroz'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'rbt_' . $control_id . 'area_background',
                'label' => esc_html__('Background', 'imroz'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * [rbt_link_controls description]
     * @param string $control_id [description]
     * @param string $control_name [description]
     * @return [type]               [description]
     */
    protected function rbt_link_controls($control_id = 'button', $control_name = 'Button', $default = 'Read More', $default_enable = 'yes')
    {

        $this->start_controls_section(
            'rbt_' . $control_id . '_button_group',
            [
                'label' => esc_html__($control_name, 'imroz'),
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_button_show',
            [
                'label' => esc_html__( 'Show Button', 'imroz' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => $default_enable,
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_text',
            [
                'label' => esc_html__($control_name . ' Text', 'imroz'),
                'type' => Controls_Manager::TEXT,
                'default' => $default,
                'title' => esc_html__('Enter button text', 'imroz'),
                'label_block' => true,
                'condition' => [
                    'rbt_' . $control_id . '_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_link_type',
            [
                'label' => esc_html__($control_name . ' Link Type', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'rbt_' . $control_id . '_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_link',
            [
                'label' => esc_html__($control_name . ' link', 'imroz'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'imroz'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'rbt_' . $control_id . '_link_type' => '1',
                    'rbt_' . $control_id . '_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_page_link',
            [
                'label' => esc_html__('Select ' . $control_name . ' Page', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => rbt_get_all_pages(),
                'condition' => [
                    'rbt_' . $control_id . '_link_type' => '2',
                    'rbt_' . $control_id . '_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

    }

    /**
     * [rbt_link_controls_style description]
     * @param string $control_id [description]
     * @param string $control_selector [description]
     * @return [type]                   [description]
     */
    protected function rbt_link_controls_style($control_id = 'button_style', $control_name = 'Button', $control_selector = 'a', $default_size = 'btn-large', $default_style = 'rn-button-style--2 btn_solid')
    {
        /**
         * Button One
         */
        $this->start_controls_section(
            'rbt_' . $control_id . '_button',
            [
                'label' => esc_html__($control_name, 'imroz'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_button_style',
            [
                'label' => esc_html__('Button Style', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'rn-button-style--2 btn_border' => esc_html__('Outline', 'imroz'),
                    'rn-button-style--2 btn_solid' => esc_html__('Solid', 'imroz'),
                    'btn-transparent' => esc_html__('Naked', 'imroz'),
                ],
                'default' => $default_style
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_button_size',
            [
                'label' => esc_html__('Button Size', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-size-lg' => esc_html__('Large', 'imroz'),
                    'btn-size-md' => esc_html__('Medium', 'imroz'),
                    'btn-size-sm' => esc_html__('Small', 'imroz'),
                ],
                'default' => $default_size,
                'condition' => [
                    'rbt_' . $control_id . '_button_style!' => 'btn-transparent'
                ],
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_button_color',
            [
                'label' => esc_html__('Button Color', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'rbt-btn-theme' => esc_html__('Theme Color', 'imroz'),
                    'rbt-btn-dark' => esc_html__('Dark Color', 'imroz'),
                    'rbt-btn-gray' => esc_html__('Gray Color', 'imroz'),
                    'rbt-btn-white' => esc_html__('White Color', 'imroz'),
                ],
                'default' => 'btn-theme'
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_padding',
            [
                'label' => esc_html__('Padding', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_' . $control_id . '_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_typography',
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );


        $this->start_controls_tabs('rbt_' . $control_id . '_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('rbt_' . $control_id . '_btn_normal', ['label' => esc_html__('Normal', 'imroz')]);

        $this->add_control(
            'rbt_' . $control_id . '_btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_btn_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_btn_normal_border_color',
            [
                'label' => esc_html__('Border Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-color: {{VALUE}} !important;;',
                ],
            ]

        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_btn_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'imroz' ),
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'imroz'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('rbt_' . $control_id . '_btn_hover', ['label' => esc_html__('Hover', 'imroz')]);

        $this->add_control(
            'rbt_' . $control_id . '_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'imroz'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_btn_hover_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'imroz' ),
                'selector' => '{{WRAPPER}} ' . $control_selector . ':hover',
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    /**
     * @param string $control_id
     * @param string $control_name
     * @param string $default_for_lg
     * @param string $default_for_md
     * @param string $default_for_sm
     * @param string $default_for_all
     */
    protected function rbt_columns($control_id = 'columns_options', $control_name = 'Select Columns', $default_for_lg = '4', $default_for_md = '6', $default_for_sm = '6', $default_for_all = '12'){
        $this->start_controls_section(
            'rbt_' . $control_id . 'columns_section',
            [
                'label' => esc_html__($control_name, 'imroz'),
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_for_desktop',
            [
                'label' => esc_html__( 'Columns for Desktop', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 992px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__( '1 Columns', 'imroz' ),
                    6 => esc_html__( '2 Columns', 'imroz' ),
                    4 => esc_html__( '3 Columns', 'imroz' ),
                    3 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns (For Carousel Item)', 'imroz' ),
                    2 => esc_html__( '6 Columns', 'imroz' ),
                    1 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_lg,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_laptop',
            [
                'label' => esc_html__( 'Columns for Laptop', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 768px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__( '1 Columns', 'imroz' ),
                    6 => esc_html__( '2 Columns', 'imroz' ),
                    4 => esc_html__( '3 Columns', 'imroz' ),
                    3 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns (For Carousel Item)', 'imroz' ),
                    2 => esc_html__( '6 Columns', 'imroz' ),
                    1 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_md,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_tablet',
            [
                'label' => esc_html__( 'Columns for Tablet', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 576px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__( '1 Columns', 'imroz' ),
                    6 => esc_html__( '2 Columns', 'imroz' ),
                    4 => esc_html__( '3 Columns', 'imroz' ),
                    3 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns (For Carousel Item)', 'imroz' ),
                    2 => esc_html__( '6 Columns', 'imroz' ),
                    1 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_sm,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_mobile',
            [
                'label' => esc_html__( 'Columns for Mobile', 'imroz' ),
                'description' => esc_html__( 'Screen width less than 576px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__( '1 Columns', 'imroz' ),
                    6 => esc_html__( '2 Columns', 'imroz' ),
                    4 => esc_html__( '3 Columns', 'imroz' ),
                    3 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns (For Carousel Item)', 'imroz' ),
                    2 => esc_html__( '6 Columns', 'imroz' ),
                    1 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_all,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * @param string $control_id
     * @param string $control_name
     * @param string $default_for_lg
     * @param string $default_for_md
     * @param string $default_for_sm
     * @param string $default_for_all
     */
    protected function rbt_columns_carousel($control_id = 'carousel_columns_options', $control_name = 'Select Columns', $default_for_xl = '4', $default_for_lg = '4', $default_for_md = '3', $default_for_sm = '2', $default_for_all = '1', $default_for_xs = '1'){
        $this->start_controls_section(
            'rbt_' . $control_id . 'columns_section',
            [
                'label' => esc_html__($control_name, 'imroz'),
            ]
        );

        $this->add_control(
            'rbt_' . $control_id . '_for_xl_desktop',
            [
                'label' => esc_html__( 'Columns for Extra Large Desktop', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 1920px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_xl,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_desktop',
            [
                'label' => esc_html__( 'Columns for Desktop', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 1200px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_lg,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_laptop',
            [
                'label' => esc_html__( 'Columns for Laptop', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 992px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_md,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_tablet',
            [
                'label' => esc_html__( 'Columns for Tablet', 'imroz' ),
                'description' => esc_html__( 'Screen width equal to or greater than 768px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_sm,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_mobile',
            [
                'label' => esc_html__( 'Columns for Mobile', 'imroz' ),
                'description' => esc_html__( 'Screen width less than 767', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_all,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rbt_' . $control_id . '_for_xs_mobile',
            [
                'label' => esc_html__( 'Columns for Extra Small Mobile', 'imroz' ),
                'description' => esc_html__( 'Screen width less than 575px', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    1 => esc_html__( '1 Columns', 'imroz' ),
                    2 => esc_html__( '2 Columns', 'imroz' ),
                    3 => esc_html__( '3 Columns', 'imroz' ),
                    4 => esc_html__( '4 Columns', 'imroz' ),
                    5 => esc_html__( '5 Columns', 'imroz' ),
                    6 => esc_html__( '6 Columns', 'imroz' ),
                    7 => esc_html__( '7 Columns', 'imroz' ),
                    8 => esc_html__( '8 Columns', 'imroz' ),
                    9 => esc_html__( '9 Columns', 'imroz' ),
                    10 => esc_html__( '10 Columns', 'imroz' ),
                    11 => esc_html__( '10 Columns', 'imroz' ),
                    12 => esc_html__( '12 Columns', 'imroz' ),
                ],
                'separator' => 'before',
                'default' => $default_for_xs,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * @param null $control_id
     * @param string $control_name
     * @param string $selector
     */
    protected function rbt_icon_style($control_id = null, $control_name = 'Icon/Image Style', $selector = '.single-service .icon'){
        $this->start_controls_section(
            'rbt_'.$control_id.'_media_style',
            [
                'label' => esc_html__($control_name, 'imroz'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_RBTGradient::get_type(),
            [
                'name' => 'rbt_' . $control_id . '_color',
                'label' => esc_html__('Color', 'imroz'),
                'selector' => '{{WRAPPER}} '. $selector .' i, {{WRAPPER}} '. $selector .' svg',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'rbt_' . $control_id . 'area_background',
                'label' => esc_html__('Background', 'imroz'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} '. $selector,
            ]
        );
        $this->add_responsive_control(
            'rbt_'.$control_id.'_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} '. $selector .' i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'rbt_'.$control_id.'_image_width',
            [
                'label' => esc_html__( 'Image/SVG Width', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} '. $selector .' img, {{WRAPPER}} '. $selector .' svg' => 'width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'rbt_'.$control_id.'_image_height',
            [
                'label' => esc_html__( 'Image/SVG Height', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} '. $selector .' img, {{WRAPPER}} '. $selector .' svg' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'rbt_'.$control_id.'_image_spacing',
            [
                'label' => esc_html__( 'Bottom Spacing', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} '. $selector .' img, {{WRAPPER}} '. $selector .' i, {{WRAPPER}} '. $selector .' svg' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_'.$control_id.'_image_padding',
            [
                'label' => esc_html__( 'Padding', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} '. $selector .' img, {{WRAPPER}} '. $selector .' i, {{WRAPPER}} '. $selector .' svg' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function rbt_height_control($control_id = 'height', $control_name = 'Height', $selector = '.rbt-height-control'){
        $this->add_control(
            'rbt_' . $control_id,
            [
                'label' =>esc_html__( $control_name, 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' =>esc_html__( 'Default', 'imroz' ),
                    'full' =>esc_html__( 'Fit To Screen', 'imroz' ),
                    'min-height' =>esc_html__( 'Min Height', 'imroz' ),
                ],
                'prefix_class' => 'rbt-section-height-',
            ]
        );
        $this->add_responsive_control(
            'rbt_custom_' . $control_id,
            [
                'label' =>esc_html__( 'Minimum '. $control_name, 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 400,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1440,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => [ 'px', 'vh', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'min-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} ' . $selector => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'rbt_' . $control_id => [ 'min-height' ],
                ],
            ]
        );
    }


}

/**
 * rbt_Helper
 */
class RBT_Helper
{

    public static function get_query_args($posttype = 'post', $taxonomy = 'category', $settings)
    {

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } else if (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        // include_categories
        $category_list = '';
        if (!empty($settings['category'])) {
            $category_list = implode(", ", $settings['category']);
        }
        $category_list_value = explode(" ", $category_list);

        // exclude_categories
        $exclude_categories = '';
        if(!empty($settings['exclude_category'])){
            $exclude_categories = implode(", ", $settings['exclude_category']);
        }
        $exclude_category_list_value = explode(" ", $exclude_categories);

        $post__not_in = '';
        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $args['post__not_in'] = $post__not_in;
        }
        $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
        $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
        $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
        $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';
        $ignore_sticky_posts = (! empty( $settings['ignore_sticky_posts'] ) && 'yes' == $settings['ignore_sticky_posts']) ? true : false ;


        // number
        $off = (!empty($offset_value)) ? $offset_value : 0;
        $offset = $off + (($paged - 1) * $posts_per_page);
        $p_ids = array();

        // build up the array
        if (!empty($settings['post__not_in'])) {
            foreach ($settings['post__not_in'] as $p_idsn) {
                $p_ids[] = $p_idsn;
            }
        }

        $args = array(
            'post_type' => $posttype,
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'offset' => $offset,
            'paged' => $paged,
            'post__not_in' => $p_ids,
            'ignore_sticky_posts' => $ignore_sticky_posts
        );

        // exclude_categories
        if ( !empty($settings['exclude_category'])) {

            // Exclude the correct cats from tax_query
            $args['tax_query'] = array(
                array(
                    'taxonomy'	=> $taxonomy,
                    'field'	 	=> 'slug',
                    'terms'		=> $exclude_category_list_value,
                    'operator'	=> 'NOT IN'
                )
            );

            // Include the correct cats in tax_query
            if ( !empty($settings['category'])) {
                $args['tax_query']['relation'] = 'AND';
                $args['tax_query'][] = array(
                    'taxonomy'	=> $taxonomy,
                    'field'		=> 'slug',
                    'terms'		=> $category_list_value,
                    'operator'	=> 'IN'
                );
            }

        } else {
            // Include the cats from $cat_slugs in tax_query
            if (!empty($settings['category'])) {
                $args['tax_query'][] = [
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $category_list_value,
                ];
            }
        }



        return $args;
    }
}



