<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Blog extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-blog';
    }

    public function get_title()
    {
        return esc_html__('Blog', 'imroz');
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
        return ['blog', 'news', 'post', 'imroz'];
    }

    protected function register_controls()
    {


        // Section Title
        $this->rbt_section_title('blog', 'Section - Title and Content', '', 'Latest News', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.');

        // Blog Query
        $this->rbt_query_controls('blog', 'Blog - ');


        // layout Panel
        $this->start_controls_section(
            'imroz_blog',
            [
                'label' => esc_html__('Blog - Layout', 'imroz'),
            ]
        );
        $this->add_control(
            'imroz_blog_layout',
            [
                'label' => esc_html__('Select Layout', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => esc_html__('Default', 'imroz'),
                    'layout-2' => esc_html__('Carousel', 'imroz'),
                ]
            ]
        );
        $this->add_control(
            'imroz_blog_height',
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
                    '{{WRAPPER}} .blog' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'imroz_blog_dots',
            [
                'label' => esc_html__('Dots?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'imroz'),
                'label_off' => esc_html__('Hide', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_blog_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_blog_arrow',
            [
                'label' => esc_html__('Arrow Icons?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'imroz'),
                'label_off' => esc_html__('Hide', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_blog_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_blog_infinite',
            [
                'label' => esc_html__('Infinite?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_blog_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_blog_autoplay',
            [
                'label' => esc_html__('Autoplay?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'imroz_blog_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'imroz_blog_autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed', 'imroz'),
                'type' => Controls_Manager::TEXT,
                'default' => '2500',
                'title' => esc_html__('Enter autoplay speed', 'imroz'),
                'label_block' => true,
                'condition' => array(
                    'imroz_blog_autoplay' => 'yes',
                    'imroz_blog_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'blog_thumb_size', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'default' => 'imroz-portfolio-thumb',
            ]
        );

        $this->add_control(
            'imroz_blog_category',
            [
                'label' => esc_html__( 'Category', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'imroz_blog_pagination',
            [
                'label' => esc_html__( 'Pagination', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('blog_columns', 'Blog - Columns', '4', '6', '6', '12');
        $this->rbt_columns_carousel('blog_carousel_columns', 'Blog - Columns for Carousel Layout', '3', '3', '2', '2', '1');
        // Style Component
        $this->rbt_basic_style_controls('blog_section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('blog_section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('blog_section_title_description', 'Section - Description', '.section-title p');

        // Gallery
        $this->rbt_basic_style_controls('blog_title', 'Blog - Title', '.im_box .content .title a');
        $this->rbt_basic_style_controls('blog_description', 'Blog - Category', '.im_box .content .category_list span');

        // Area
        $this->rbt_section_style_controls('blog_area', 'Section Style', '.rn-blog-area');


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        $Helper = new \Helper();
        $imroz_options = $Helper->imroz_get_options();
        /**
         * Setup the post arguments.
         */
        $query_args = RBT_Helper::get_query_args('post', 'category', $this->get_settings());

        // The Query
        $query = new \WP_Query($query_args);

        $carousel_args = [
            'arrows' => ('yes' === $settings['imroz_blog_arrow']),
            'dots' => ('yes' === $settings['imroz_blog_dots']),
            'autoplay' => ('yes' === $settings['imroz_blog_autoplay']),
            'autoplay_speed' => absint($settings['imroz_blog_autoplay_speed']),
            'infinite' => ('yes' === $settings['imroz_blog_infinite']),
            'for_xl_desktop' => absint($settings['rbt_blog_carousel_columns_for_xl_desktop']),
            'slidesToShow' => absint($settings['rbt_blog_carousel_columns_for_desktop']),
            'for_laptop' => absint($settings['rbt_blog_carousel_columns_for_laptop']),
            'for_tablet' => absint($settings['rbt_blog_carousel_columns_for_tablet']),
            'for_mobile' => absint($settings['rbt_blog_carousel_columns_for_mobile']),
            'for_xs_mobile' => absint($settings['rbt_blog_carousel_columns_for_xs_mobile']),
        ];
        $this->add_render_attribute('imroz-carousel-blog-data', 'data-settings', wp_json_encode($carousel_args));
        $this->add_render_attribute('imroz-blog', 'class', 'rn-blog-area rn-section-gap bg_color--1');
        $this->add_render_attribute('imroz-blog', 'id', 'imroz-blog-' . esc_attr($this->get_id()));

        $section_class = ($settings['imroz_blog_layout'] == 'layout-1') ? "bg_color--1" : "bg_color--5";

        ?>
        <!-- Start blog Area  -->
        <div class="rn-blog-area ptb--120 bg_color--5 <?php echo esc_attr($section_class); ?>" id="imroz-blog-<?php echo esc_attr($this->get_id()) ?>">
            <div class="container">

                <?php if($settings['rbt_blog_section_title_show'] == 'yes'){ ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title section-title--2 <?php echo esc_attr($settings['rbt_blog_align']) ?>">
                                <?php $this->rbt_section_title_render('blog', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if($settings['imroz_blog_layout'] == 'layout-2'){ ?>
                    <?php if ($query->have_posts()) { ?>
                        <div class="row  mt--30 mt_sm--20 rn-slick-activation rn-slick-dot pb--25 slick-gutter-15 portfolio-slick-activation layout-2" <?php echo $this->get_render_attribute_string('imroz-carousel-blog-data'); ?>>


                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'category'); ?>
                                <div class="im_box mt--30">
                                    <?php if(has_post_thumbnail()){ ?>
                                        <div class="thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo get_the_post_thumbnail( $post->ID, $settings['blog_thumb_size_size'], array( 'class' => 'w-100' ) ); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content">
                                        <div class="inner">
                                            <div class="content_heading">
                                                <?php if($settings['imroz_blog_category'] !== 'no'){ ?>
                                                    <?php if ($terms && !is_wp_error($terms)): ?>
                                                        <div class="category_list">
                                                            <?php foreach ($terms as $term) { ?>
                                                                <span><?php echo esc_html($term->name); ?></span>
                                                            <?php } ?>
                                                        </div>
                                                    <?php endif ?>
                                                <?php } ?>
                                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                            <?php if ($imroz_options['imroz_enable_readmore_btn'] == 'yes') { ?>
                                                <div class="content_footer">
                                                    <div class="blog-btn">
                                                        <a class="rn-btn btn-opacity"
                                                           href="<?php the_permalink(); ?>"><?php echo esc_html($imroz_options['imroz_readmore_text']); ?></a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php if ($query->have_posts()) { ?>
                        <div class="row mt--30 mt_sm--40">
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'category'); ?>
                                <!-- Start Blog Area  -->
                                <div class="mt--30 col-lg-<?php echo esc_attr($settings['rbt_blog_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_blog_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_blog_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_blog_columns_for_mobile']); ?>">
                                    <div class="im_box">
                                        <?php if(has_post_thumbnail()){ ?>
                                            <div class="thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo get_the_post_thumbnail( $post->ID, $settings['blog_thumb_size_size'], array( 'class' => 'w-100' ) ); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="content">
                                            <div class="inner">
                                                <div class="content_heading">
                                                    <?php if($settings['imroz_blog_category'] !== 'no'){ ?>
                                                        <?php if ($terms && !is_wp_error($terms)): ?>
                                                            <div class="category_list">
                                                                <?php foreach ($terms as $term) { ?>
                                                                    <span><?php echo esc_html($term->name); ?></span>
                                                                <?php } ?>
                                                            </div>
                                                        <?php endif ?>
                                                    <?php } ?>
                                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                </div>
                                                <?php if ($imroz_options['imroz_enable_readmore_btn'] == 'yes') { ?>
                                                    <div class="content_footer">
                                                        <div class="blog-btn">
                                                            <a class="rn-btn btn-opacity"
                                                               href="<?php the_permalink(); ?>"><?php echo esc_html($imroz_options['imroz_readmore_text']); ?></a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Blog Area  -->
                            <?php } ?>
                            <?php
                            if($settings['imroz_blog_pagination'] == 'yes' && '-1' != $settings['posts_per_page'] ){ ?>
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
                <?php } ?>
            </div>
        </div>
        <!-- Start blog Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Blog());


