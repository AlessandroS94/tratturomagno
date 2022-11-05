<?php

namespace Elementor;

use ImrozCore\Elementor\Controls\Group_Control_RBTGradient;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Main_Demo_Banner extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-main-demo-banner';
    }

    public function get_title()
    {
        return esc_html__('Main Demo Banner', 'imroz');
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
        return ['banner', 'service', 'slider', 'main home banner'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('title_and_content', 'Title & Content', '', 'Design Driven Development Your Web Products.', 'h1', '', 'text-center', false);

        // Services.
        // Service group
        $this->start_controls_section(
            'bws_services',
            [
                'label' => esc_html__('Services List', 'imroz'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'imroz' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'service_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'imroz'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'imroz'),
                    'icon' => esc_html__('Icon', 'imroz'),
                ],
            ]
        );

        $repeater->add_control(
            'service_image',
            [
                'label' => esc_html__('Upload Image', 'imroz'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'service_icon_type' => 'image'
                ]

            ]
        );
        if (rbt_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'service_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'service_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'service_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'service_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $repeater->add_control(
            'service_title', [
                'label' => esc_html__('Title', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'imroz'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'service_link',
            [
                'label' => esc_html__( 'Link', 'imroz' ),
                'type' => Controls_Manager::URL,
                'separator' => 'before',
                'placeholder' => 'https://rainbowit.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'service_description',
            [
                'label' => esc_html__('Description', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );
        $repeater->add_responsive_control(
            'service_align',
            [
                'label' => esc_html__( 'Alignment', 'imroz' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'imroz' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'imroz' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'imroz' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text-center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'service_list',
            [
                'label' => esc_html__('Services List', 'imroz'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Awarded Design', 'imroz')
                    ],
                    [
                        'service_title' => esc_html__('Design & Creative', 'imroz')
                    ],
                    [
                        'service_title' => esc_html__('App Development', 'imroz')
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );
        $this->end_controls_section();


        // Style Component
        $this->rbt_basic_style_controls('bws_before_title', 'Before Title', '.rt-dev-slider-1 .slide .inner .sub-title');
        $this->rbt_basic_style_controls('bws_title', 'Title', '.slide .inner .title');
        $this->rbt_basic_style_controls('bws_before_description', 'Description', '.rt-dev-slider-1 .slide .inner .subtitle-2');
        $this->rbt_icon_style('bws_service', 'Services - Icon/Image/SVG', '.single-service.service__style--3 .icon');
        $this->rbt_basic_style_controls('bws_service_title', 'Service - Title', '.single-service.service__style--3 .content h3.title');
        $this->rbt_basic_style_controls('bws_service_description', 'Service - Description', '.single-service.service__style--3.text-white .content p');
        $this->rbt_columns('service_columns', 'Service - Columns');
        $this->rbt_section_style_controls('bws_area', 'Section Style', '.rt-dev-slider-1 .slide.slide-style-1');
        $this->rbt_section_style_controls('bws_area_overlay', 'Section Style Overlay', '.rt-dev-slider-1 .slide.slide-style-1:before');



    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title theme-gradient');


        ?>
        <!-- Start Slider Area  -->
        <div class="rn-slider-area rt-dev-slider-1">
            <!-- Start Single Slide  -->
            <div class="slide slide-style-1 slider-fixed--height d-flex align-items-center bg_image">
                <div class="container position-relative">
                    <?php if(!empty($settings['rbt_title_and_content_before_title']) || !empty($settings['rbt_title_and_content_title']) || !empty($settings['rbt_title_and_content_desctiption'])){ ?> <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner <?php echo esc_attr($settings['rbt_title_and_content_align']) ?>">
                                <?php if (!empty($settings['rbt_title_and_content_before_title'])) { ?>
                                    <span class="sub-title"><?php echo rbt_kses_basic( $settings['rbt_title_and_content_before_title'] ); ?></span>
                                <?php } ?>
                                <?php
                                if ($settings['rbt_title_and_content_title_tag']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['rbt_title_and_content_title_tag']),
                                        $this->get_render_attribute_string('title_args'),
                                        rbt_kses_intermediate($settings['rbt_title_and_content_title'])
                                    );
                                endif;
                                ?>
                                <?php if (!empty($settings['rbt_title_and_content_desctiption'])) { ?>
                                    <p class="subtitle-2"><?php echo rbt_kses_intermediate( $settings['rbt_title_and_content_desctiption'] ); ?></p>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php if(!empty($settings['service_list'])){ ?>
                        <div class="service-wrapper service-white">
                            <div class="row">
                                <?php foreach ($settings['service_list'] as $item){ ?>
                                    <!-- Start Single Service  -->
                                    <div class="service-item col-lg-<?php echo esc_attr($settings['rbt_service_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_service_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_service_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_service_columns_for_mobile']); ?> elementor-repeater-item-<?php echo $item['_id']; ?>">
                                        <div class="single-service service service__style--1 text-white <?php echo esc_attr($item['service_align']); ?>">
                                            <?php if($item['service_icon_type'] !== 'image'){ ?>
                                                <?php if (!empty($item['service_icon']) || !empty($item['service_selected_icon']['value'])) : ?>
                                                    <div class="icon">
                                                        <?php rbt_render_icon($item, 'service_icon', 'service_selected_icon'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } else {
                                                if (!empty($item['service_image'])){ ?>
                                                    <div class="icon">
                                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($item, 'full', 'service_image'); ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if(!empty($item['service_title']) || !empty($item['service_description'])){

                                                $link = $item['service_link']['url'];
                                                $target = $item['service_link']['is_external'] ? ' target="_blank"' : '';
                                                $rel = $item['service_link']['nofollow'] ? ' rel="nofollow"' : '';

                                                ?>
                                                <div class="content">
                                                    <?php if(!empty($item['service_title'])){ ?>
                                                        <h4 class="title">
                                                            <?php if (!empty($link)){ ?>  <a href="<?php echo esc_url($link); ?>" <?php echo esc_attr($target); ?><?php echo esc_attr($rel); ?>> <?php } ?>
                                                                <?php echo rbt_kses_basic( $item['service_title' ] ); ?>
                                                            <?php if (!empty($link)){ ?> </a> <?php } ?>
                                                        </h4>
                                                    <?php } ?>
                                                    <?php if(!empty($item['service_description'])){ ?>
                                                        <p><?php echo rbt_kses_intermediate($item['service_description']); ?></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <!-- End Single Service  -->
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Single Slide  -->
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Main_Demo_Banner());


