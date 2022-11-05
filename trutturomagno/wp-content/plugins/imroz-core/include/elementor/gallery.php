<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Gallery extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-gallery';
    }

    public function get_title()
    {
        return esc_html__('Gallery', 'imroz');
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
        return ['gallery', 'portfolio', 'imroz'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('gallery', 'Section - Title and Content', '', '', 'h2', '', 'text-center', true, 'no');

        $this->start_controls_section(
            '_section_gallery',
            [
                'label' => esc_html__( 'Gallery - Content', 'imroz' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'images',
            [
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'imroz' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type gallery title', 'imroz' ),
                'default' => esc_html__( 'Gallery Title', 'imroz' ),
            ]
        );
        $repeater->add_control(
            'filter',
            [
                'label' => esc_html__( 'Filter Name (Category)', 'imroz' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type gallery filter name', 'imroz' ),
                'description' => esc_html__( 'Filter name will be used in filter menu. Added more category by , separator.', 'imroz' ),
                'default' => esc_html__( 'Filter Name', 'imroz' ),
            ]
        );

        $this->add_control(
            'gallery',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'title_field' => sprintf( esc_html__( 'Filter Group: %1$s', 'imroz' ), '{{filter}}' ),
                'default' => [
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Web Design', 'imroz' ),
                        'title' => esc_html__( 'T-shirt design is the part of design', 'imroz' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Logo Design', 'imroz' ),
                        'title' => esc_html__( 'The service provide for designer', 'imroz' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Mobile App', 'imroz' ),
                        'title' => esc_html__( 'Mobile App landing Design', 'imroz' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Mobile App', 'imroz' ),
                        'title' => esc_html__( 'Logo Design creativity', 'imroz' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Web Design', 'imroz' ),
                        'title' => esc_html__( 'Getting tickets to the big show', 'imroz' ),

                    ],
                    [
                        'images' => Utils::get_placeholder_image_src(),
                        'filter' => esc_html__( 'Web Design', 'imroz' ),
                        'title' => esc_html__( 'T-shirt design is the part of design', 'imroz' ),

                    ]
                ]
            ]
        );

        $this->add_control(
            'title_tag',
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
                'default' => 'h4',
                'toggle' => false,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'gallery_thumbnail',
                'default' => 'imroz-gallery-thumb',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'show_filter',
            [
                'label' => esc_html__( 'Show Filter', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'imroz' ),
                'label_off' => esc_html__( 'No', 'imroz' ),
                'separator' => 'before',
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'show_all_filter',
            [
                'label' => esc_html__( 'Show "All Project" Filter?', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'imroz' ),
                'label_off' => esc_html__( 'No', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__( 'Enable to display "All Project" filter in filter menu.', 'imroz' ),
                'condition' => [
                    'show_filter' => 'yes'
                ],
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'all_filter_label',
            [
                'label' => esc_html__( 'Filter Label', 'imroz' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'All Project', 'imroz' ),
                'placeholder' => esc_html__( 'Type filter label', 'imroz' ),
                'description' => esc_html__( 'Type "All Project" filter label.', 'imroz' ),
                'condition' => [
                    'show_all_filter' => 'yes',
                    'show_filter' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('gallery_columns', 'Gallery - Columns', '4', '6', '6', '12');


        // Style Component
        $this->rbt_basic_style_controls('section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('section_title_description', 'Section - Description', '.section-title p');

        // Filter
        $this->rbt_basic_style_controls('gallery_filter_text', 'Filter - Text', '.pv-tab-button button');
        $this->rbt_section_style_controls('gallery_filter_area', 'Filter Box', '.pv-tab-button');

        // Gallery
        $this->rbt_basic_style_controls('gallery_title', 'Gallery - Title', '.item-portfolio-static .inner .gallery-title');
        $this->rbt_basic_style_controls('gallery_description', 'Gallery - Category', '.item-portfolio-static .inner .gallery-category');

        // Area
        $this->rbt_section_style_controls('gallery_area', 'Section Style', '.rn-gallery-area');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        if ( empty( $settings['gallery'] ) ) {
            return;
        }


        $categories = array();
        $cats = array();
        foreach ($settings['gallery'] as $index => $gallery) :

            $cats = explode(",", $gallery['filter']);

            foreach ($cats as $i => $cat){
                $categories[rbt_slugify( $cat )] = $cat;
            }
        endforeach;

        $id_int     = substr( $this->get_id_int(), 0, 3 );
        $gallery_settings = [
            'arrows'            => true,
        ];
        $this->add_render_attribute( 'rbt-gallery-data', 'data-settings', wp_json_encode( $gallery_settings ) );
        $this->add_render_attribute( 'rbt-gallery', 'class', 'rn-gallery-area rn-section-gap bg_color--1 position-relative' );
        $this->add_render_attribute( 'rbt-gallery', 'id', 'rbt-gallery-'.esc_attr( $this->get_id() ));

        ?>
        <!-- Start Gallery Area  -->
        <div <?php echo $this->get_render_attribute_string('rbt-gallery'); ?> <?php echo $this->get_render_attribute_string('rbt-gallery-data'); ?>>
            <div class="rn-masonary-wrapper">

                <?php if($settings['rbt_gallery_section_title_show'] == 'yes'){ ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title mb--60 <?php echo esc_attr($settings['rbt_gallery_align']) ?>">
                                    <?php $this->rbt_section_title_render('gallery', $this->get_settings()); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if ( $settings['show_filter'] === 'yes' ) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tablist-inner text-center">
                                <div class="messonry-button pv-tab-button justify-content-center">
                                    <?php if ( $settings['show_all_filter'] === 'yes' ) : ?>
                                        <button data-filter="*" class="is-checked"><span class="filter-text"><?php echo esc_html( $settings['all_filter_label'] ); ?></span></button>
                                    <?php endif; ?>
                                    <?php foreach ( $categories as $key => $val ) :?>
                                        <button type="button" data-filter=".<?php echo esc_attr($key); ?>"><span class="filter-text"><?php echo esc_html( $val ); ?></span></button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="wrapper plr--70 plr_sm--30 plr_md--30">
                    <div class="gallery-wrapper gallery-grid mesonry-list grid-metro3 grid-lg-<?php echo esc_attr($settings['rbt_gallery_columns_for_desktop']); ?> grid-md-<?php echo esc_attr($settings['rbt_gallery_columns_for_laptop']); ?> grid-sm-<?php echo esc_attr($settings['rbt_gallery_columns_for_tablet']); ?> grid-<?php echo esc_attr($settings['rbt_gallery_columns_for_mobile']); ?>" id="animated-thumbnials-rbt-gallery-<?php echo esc_attr($this->get_id()); ?>">
                        <?php
                        $cars = array();
                        foreach ($settings['gallery'] as $index => $gallery){
                            $cars = explode(",",  $gallery['filter']);
                            $big_image  = (!empty(wp_get_attachment_image_url( $gallery['images']['id'], 'full'))) ? wp_get_attachment_image_url( $gallery['images']['id'], 'full') : Utils::get_placeholder_image_src();
                            ?>
                            <!-- Start Single Gallery -->
                            <a class="item-portfolio-static gallery masonry_item portfolio-33-33
                            <?php
                            foreach ($cars as $key => $value){echo rbt_slugify($value) . ' ';}
                            ?>" href="<?php echo esc_url($big_image); ?>">
                                <div class="portfolio-static">
                                    <div class="thumbnail-inner">
                                        <div class="thumbnail">
                                            <?php if(!empty(wp_get_attachment_image( $gallery['images']['id']))){ ?>
                                                <?php echo wp_get_attachment_image( $gallery['images']['id'], $settings['gallery_thumbnail_size'] ); ?>
                                            <?php } else { ?>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($gallery, 'full', 'images') ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="inner">
                                            <?php if(!empty($gallery['filter'])){ ?>
                                                <p class="gallery-category"><?php echo esc_html($gallery['filter']); ?></p>
                                            <?php } ?>
                                            <?php if ($gallery['title']) :
                                                printf('<%1$s class="gallery-title">%2$s</%1$s>',
                                                    tag_escape($settings['title_tag']),
                                                    rbt_kses_basic($gallery['title'])
                                                );
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- End Single Gallery -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Gallery Area  -->
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Gallery());


