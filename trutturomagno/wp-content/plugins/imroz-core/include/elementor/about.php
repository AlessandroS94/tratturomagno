<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_About extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-about';
    }

    public function get_title()
    {
        return esc_html__('About', 'imroz');
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
        return ['about', 'imroz'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            '_about_thumbnail',
            [
                'label' => esc_html__('Thumbnail', 'imroz'),
            ]
        );
        $this->add_control(
            'about_thumbnail',
            [
                'label' => esc_html__( 'Choose Image', 'imroz' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'about_thumbnail_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'about_thumbnail_overlap',
            [
                'label' => esc_html__('Image overlap to top?', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_height',
            [
                'label' => esc_html__( 'Image Height', 'imroz' ),
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
                    '{{WRAPPER}} .about-area .thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_overlap_x',
            [
                'label' => esc_html__( 'Image overlap position', 'imroz' ),
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
                    '{{WRAPPER}} .about-position-top .thumbnail' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => array(
                    'about_thumbnail_overlap' => 'yes',
                ),
            ]
        );
        $this->end_controls_section();
        

        $this->start_controls_section(
            '_about_icon',
            [
                'label' => esc_html__('Icon', 'imroz'),
            ]
        );
        $this->add_control(
            'about_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'imroz'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'imroz'),
                    'icon' => esc_html__('Icon', 'imroz'),
                ],
            ]
        );

        $this->add_control(
            'about_image',
            [
                'label' => esc_html__('Upload Image', 'imroz'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'about_icon_type' => 'image'
                ]

            ]
        );
        if (rbt_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'about_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'about_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $this->add_control(
                'about_selected_icon',
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
                        'about_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $this->end_controls_section();

        // Section Title
        $this->rbt_section_title('about_section_title', 'Title and Content', '', 'Refreshingly Unique Company About.', 'h2', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. <br><br> A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences', 'text-left');

        $this->rbt_link_controls('about_button', 'Link', 'PURCHASE IMROZ');


        // Style Component
        $this->rbt_icon_style('about_section_icon', 'Icon/Image/SVG', '.about-wrapper .about-inner .icon');
        $this->rbt_basic_style_controls('about_section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('about_section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('about_section_title_description', 'Section - Description', '.section-title p');

        // Link Style
        $this->rbt_link_controls_style('about_button_style', 'Section - Link', '.rbt-button', 'btn-extra-large', 'btn-transparent');

        // Area Style
        $this->rbt_section_style_controls('about_area', 'Section Style', '.about-area');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $image_overlap = ( $settings['about_thumbnail_overlap'] == 'yes') ? "about-position-top" : "pt--120";


        get_template_directory_uri()

        ?>
        <!-- Start About Area  -->
        <div class="about-area pb--120 <?php echo esc_attr($image_overlap); ?>">
            <div class="about-wrapper">
                <div class="container">
                    <div class="row row--35 align-items-center">
                        <?php if ($settings['about_thumbnail']['url'] || $settings['about_thumbnail']['id']) : ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="thumbnail">
                                <?php
                                $this->add_render_attribute('about_thumbnail', 'src', $settings['about_thumbnail']['url']);
                                $this->add_render_attribute('about_thumbnail', 'alt', Control_Media::get_image_alt($settings['about_thumbnail']));
                                $this->add_render_attribute('about_thumbnail', 'title', Control_Media::get_image_title($settings['about_thumbnail']));
                                $this->add_render_attribute('about_thumbnail', 'class', 'w-100');
                                ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'about_thumbnail_size', 'about_thumbnail'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-7 col-md-12">
                            <div class="about-inner inner">


                                <div class="section-title <?php echo esc_attr($settings['rbt_about_section_title_align']) ?>">

                                    <?php if($settings['about_icon_type'] !== 'image'){ ?>
                                        <?php if (!empty($settings['about_icon']) || !empty($settings['about_selected_icon']['value'])) : ?>
                                            <div class="icon">
                                                <?php rbt_render_icon($settings, 'icon', 'about_selected_icon'); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php } else {
                                        if (!empty($settings['about_image'])){ ?>
                                            <div class="icon">
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'about_image'); ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php $this->rbt_section_title_render('about_section_title', $this->get_settings()); ?>
                                </div>
                                <?php if($settings['rbt_about_button_button_show'] === 'yes'){ ?>
                                    <div class="service-btn mt--30">
                                        <?php $this->rbt_link_control_render('about_button', $this->get_settings()); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start About Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_About());


