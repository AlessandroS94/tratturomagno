<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Portfolio extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-portfolio';
    }

    public function get_title()
    {
        return esc_html__('Portfolio', 'imroz');
    }

    public function get_icon()
    {
        return 'rt-icon';
    }

    public function get_categories()
    {
        return ['imroz'];
    }

    public function get_keywords()
    {
        return ['portfolio', 'works', 'project', 'imroz'];
    }

    protected function register_controls()
    {

        // Section Title
        $this->rbt_section_title('portfolio', 'Section - Title and Content', '', 'Featured', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.');

        // Portfolio Query
        $this->rbt_query_controls('portfolio', 'Portfolio - ', 'portfolio', 'portfolio-cat');

        // layout Panel
        $this->start_controls_section(
            'imroz_portfolio',
            [
                'label' => esc_html__('Portfolio - Layout', 'imroz'),
            ]
        );
        $this->add_control(
            'imroz_portfolio_layout',
            [
                'label' => esc_html__('Select Layout', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => esc_html__('Default', 'imroz'),
                    'layout-2' => esc_html__('Carousel', 'imroz'),
                    'layout-3' => esc_html__('Carousel Full Width', 'imroz'),
                ]
            ]
        );
        $this->add_control(
            'imroz_portfolio_height',
            [
                'label' => esc_html__( 'Height', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'imroz_portfolio_dots',
            [
                'label' => esc_html__('Dots?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'imroz'),
                'label_off' => esc_html__('Hide', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_arrow',
            [
                'label' => esc_html__('Arrow Icons?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'imroz'),
                'label_off' => esc_html__('Hide', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_infinite',
            [
                'label' => esc_html__('Infinite?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_autoplay',
            [
                'label' => esc_html__('Autoplay?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed', 'imroz'),
                'type' => Controls_Manager::TEXT,
                'default' => '2500',
                'title' => esc_html__('Enter autoplay speed', 'imroz'),
                'label_block' => true,
                'condition' => array(
                    'imroz_portfolio_autoplay' => 'yes',
                    'imroz_portfolio_layout!' => 'layout-1',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'portfolio_thumb_size', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'default' => 'imroz-portfolio-thumb',
            ]
        );
        $this->add_control(
            'imroz_portfolio_pagination',
            [
                'label' => esc_html__( 'Pagination', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array(
                    'imroz_portfolio_layout' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_view_more_item_button',
            [
                'label' => esc_html__( 'View More Item Button', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array(
                    'imroz_portfolio_layout' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_portfolio_view_more_item_button_text',
            [
                'label' => esc_html__('Button Text', 'imroz'),
                'type' => Controls_Manager::TEXT,
                'default' => 'View More Project',
                'title' => esc_html__('Enter button text', 'imroz'),
                'label_block' => true,
                'condition' => [
                    'imroz_portfolio_view_more_item_button' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'imroz_portfolio_view_more_item_button_link_type',
            [
                'label' => esc_html__('Button Link Type', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'imroz_portfolio_view_more_item_button' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'imroz_portfolio_view_more_item_button_link',
            [
                'label' => esc_html__('Button link', 'imroz'),
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
                    'imroz_portfolio_view_more_item_button_link_type' => '1',
                    'imroz_portfolio_view_more_item_button' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'imroz_portfolio_view_more_item_button_page_link',
            [
                'label' => esc_html__('Select Button Page', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => rbt_get_all_pages(),
                'condition' => [
                    'imroz_portfolio_view_more_item_button_link_type' => '2',
                    'imroz_portfolio_view_more_item_button' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('portfolio_columns', 'Portfolio - Columns', '4', '6', '6', '12');

        $this->rbt_columns_carousel('portfolio_carousel_columns', 'Portfolio - Columns for Carousel Layout', '5', '3', '2', '2', '1');

        // Style Component
        $this->rbt_basic_style_controls('portfolio_section_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('portfolio_section_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('portfolio_section_description', 'Section - Description', '.section-title p');

        // Portfolio Style
        $this->rbt_basic_style_controls('portfolio_cat', 'Portfolio Category', '.portfolio .content .inner p');
        $this->rbt_basic_style_controls('portfolio_title', 'Portfolio Title', '.portfolio .content .inner h4');

        // Area Style
        $this->rbt_section_style_controls('portfolio_area', 'Section Style', '.rn-portfolio-area');


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $Helper = New \Helper();
        $imroz_options = $Helper->imroz_get_options();
        /**
         * Setup the post arguments.
         */
        $query_args = RBT_Helper::get_query_args('portfolio', 'portfolio-cat', $this->get_settings());

        // The Query
        $query = new \WP_Query($query_args);

        $carousel_args = [
            'arrows' => ('yes' === $settings['imroz_portfolio_arrow']),
            'dots' => ('yes' === $settings['imroz_portfolio_dots']),
            'autoplay' => ('yes' === $settings['imroz_portfolio_autoplay']),
            'autoplay_speed' => absint($settings['imroz_portfolio_autoplay_speed']),
            'infinite' => ('yes' === $settings['imroz_portfolio_infinite']),
            'for_xl_desktop' => absint($settings['rbt_portfolio_carousel_columns_for_xl_desktop']),
            'slidesToShow' => absint($settings['rbt_portfolio_carousel_columns_for_desktop']),
            'for_laptop' => absint($settings['rbt_portfolio_carousel_columns_for_laptop']),
            'for_tablet' => absint($settings['rbt_portfolio_carousel_columns_for_tablet']),
            'for_mobile' => absint($settings['rbt_portfolio_carousel_columns_for_mobile']),
            'for_xs_mobile' => absint($settings['rbt_portfolio_carousel_columns_for_xs_mobile']),
        ];
        $this->add_render_attribute('imroz-carousel-portfolio-data', 'data-settings', wp_json_encode($carousel_args));
        $this->add_render_attribute('imroz-portfolio', 'class', 'rn-portfolio-area rn-section-gap bg_color--1');
        $this->add_render_attribute('imroz-portfolio', 'id', 'imroz-portfolio-' . esc_attr($this->get_id()));


        if ($settings['imroz_portfolio_layout'] == 'layout-2') { ?>
            <!-- Start Portfolio Area  -->
            <div class="portfolio-area rn-portfolio-area pt--120 pb--140">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title mb--20 mb_sm--0 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio  -->
                    <?php if ($query->have_posts()) { ?>
                        <div class="rn-slick-activation rn-slick-dot mt--10 slick-gutter-15 portfolio-slick-activation layout-2" <?php echo $this->get_render_attribute_string('imroz-carousel-portfolio-data'); ?>>
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="portfolio mt--30 mb--20">
                                    <div class="thumbnail-inner">
                                        <div class="thumbnail image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                        <div class="bg-blr-image image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
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
                                <!-- End Single Portfolio  -->
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Start Portfolio Area  -->
        <?php } elseif ($settings['imroz_portfolio_layout'] == 'layout-3') { ?>
            <!-- Start Portfolio Area  -->
            <div class="rn-portfolio-area rn-section-gap" id="imroz-portfolio-<?php echo esc_attr($this->get_id()) ?>">
                <div class="portfolio-sacousel-inner pb--30">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title mb--20 mb_sm--0 mb_md--0 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                    <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio  -->
                    <?php if ($query->have_posts()) { ?>
                        <div class="portfolio-slick-activation rn-slick-activation item-fluid rn-slick-dot mt--40 mt_sm--40 slick-gutter-15" <?php echo $this->get_render_attribute_string('imroz-carousel-portfolio-data'); ?>>
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="portfolio">
                                    <div class="thumbnail-inner">
                                        <div class="thumbnail image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                        <div class="bg-blr-image image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
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
                                <!-- End Single Portfolio  -->
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Portfolio Area  -->
        <?php } else { ?>
            <!-- Start Portfolio Area  -->
            <div class="portfolio-area rn-portfolio-area ptb--120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title mb--30 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($query->have_posts()) { ?>
                        <div class="row">
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="mt--30 col-lg-<?php echo esc_attr($settings['rbt_portfolio_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_portfolio_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_portfolio_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_portfolio_columns_for_mobile']); ?>">
                                    <div class="portfolio">
                                        <div class="thumbnail-inner">
                                            <div class="thumbnail image-1"
                                                 style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                            <div class="bg-blr-image image-1"
                                                 style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
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
                            <?php } ?> <!-- End While  -->

                            <?php if($settings['imroz_portfolio_view_more_item_button'] == 'yes'){ ?>
                                <div class="col-lg-12">
                                    <div class="view-more-btn mt--60 text-center">
                                        <?php
                                        // Link
                                        $href = "#";
                                        $target = "_self";
                                        $rel = "nofollow";
                                        if ('2' == $settings['imroz_portfolio_view_more_item_button_link_type']) {
                                            $href = get_permalink($settings['imroz_portfolio_view_more_item_button_page_link']);
                                            $target = "_self";
                                            $rel = "nofollow";
                                        } else {
                                            if (!empty($settings['imroz_portfolio_view_more_item_button_link']['url'])) {
                                                $href = $settings['imroz_portfolio_view_more_item_button_link']['url'];
                                            }
                                            if ($settings['imroz_portfolio_view_more_item_button_link']['is_external']) {
                                                $target = "_blank";
                                            }
                                            if (!empty($settings['imroz_portfolio_view_more_item_button_link']['nofollow'])) {
                                                $rel = "nofollow";
                                            }
                                        }
                                        // Button
                                        if (!empty($settings['imroz_portfolio_view_more_item_button_link']['url']) || isset($settings['imroz_portfolio_view_more_item_button_link_type'])) {
                                            $button_html = '<a class="btn-default" href="'. $href .'" target="'. $target .'" rel="'.$rel.'">' . '<span class="button-text">' . $settings['imroz_portfolio_view_more_item_button_text'] . '</span></a>';
                                        }
                                        if (!empty($settings['imroz_portfolio_view_more_item_button_text'])) {
                                            echo $button_html;
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php
                            if($settings['imroz_portfolio_pagination'] == 'yes' && '-1' != $settings['posts_per_page'] ){ ?>
                                <div class="col-lg-12">
                                    <div class="rn-pagination text-center mt--60 mt_sm--30">
                                        <?php
                                        $big = 999999999; // need an unlikely integer

                                        if (get_query_var('paged')) {
                                            $paged = get_query_var('paged');
                                        } else if (get_query_var('page')) {
                                            $paged = get_query_var('page');
                                        } else {
                                            $paged = 1;
                                        }
                                        echo paginate_links( array(
                                            'base'       => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                            'format'     => '?paged=%#%',
                                            'current'    => $paged,
                                            'total'      => $query->max_num_pages,
                                            'type'       =>'list',
                                            'prev_text'  =>'<i class="fas fa-angle-left"></i>',
                                            'next_text'  =>'<i class="fas fa-angle-right"></i>',
                                            'show_all'   => false,
                                            'end_size'   => 1,
                                            'mid_size'   => 4,
                                        ) );
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Start Portfolio Area  -->
        <?php }

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Portfolio());


