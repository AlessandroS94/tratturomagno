<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Agency_Banner extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-agency-banner';
    }

    public function get_title()
    {
        return esc_html__('Agency Banner', 'imroz');
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
        return ['agency banner', 'banner', 'creative agency', 'imroz'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('title_and_content', 'Title & Content', '', 'CREATIVE', 'h1', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.', 'text-center', false, true);
        $this->rbt_link_controls('button', 'Button', 'Contact Us');

        $this->start_controls_section(
            'advanced_option',
            [
                'label' => esc_html__('Advanced Options', 'imroz'),
            ]
        );
        // Height Control
        $this->rbt_height_control();

        $this->add_control(
            'enable_parallax',
            [
                'label' => esc_html__( 'Enable Parallax', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'imroz' ),
                'label_off' => esc_html__( 'No', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'parallax_speed',
            [
                'label' => esc_html__( 'Parallax Speed', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => .1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0.3,
                ],
                'condition' => [
                    'enable_parallax' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_particles',
            [
                'label' => esc_html__( 'Enable Particles', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'imroz' ),
                'label_off' => esc_html__( 'No', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'particles_color',
            [
                'label' => esc_html__( 'Particles Color', 'imroz' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'enable_particles' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'particles_opacity',
            [
                'label' => esc_html__( 'Particles Opacity', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => .1,
                        'max' => 1,
                        'step' => .1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0.5,
                ],
                'condition' => [
                    'enable_particles' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('cb_before_title', 'Before Title', '.slide.slide-style-2  .inner .sub-title');
        $this->rbt_basic_style_controls('cb_title', 'Title', '.slide.slide-style-2 .inner .title');
        $this->rbt_basic_style_controls('cb_before_description', 'Description', '.slide.slide-style-2 .inner .description');

        // Link style
        $this->rbt_link_controls_style('button_style', 'Button', '.rbt-button', 'btn-size-lg', 'rn-button-style--2 btn_border');

        $this->rbt_section_style_controls('cb_area', 'Section Style', '.slide.slide-style-2 ');
        $this->rbt_section_style_controls('cb_area_overlay', 'Section Style Overlay', '.slide.slide-style-2.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title theme-gradient');

        $parallax_ratio = '';
        $parallax_class = '';

        $enable_parallax = $settings['enable_parallax'];
        $parallax_speed = ($settings['parallax_speed']) ? $settings['parallax_speed']['size'] : "";
        if ($enable_parallax){
            $parallax_ratio = "data-stellar-background-ratio=\"$parallax_speed\"";
            $parallax_class = 'parallax';
        }
        $area_args = [
            'parallax'          => ('yes' === $settings['enable_parallax']),
            'particles'         => ('yes' === $settings['enable_particles']),
            'particles_color'   => $settings['particles_color'],
            'particles_opacity' => ($settings['particles_opacity']) ? $settings['particles_opacity']['size'] : "",
            'id'                => 'particles-js-'. $this->get_id(),
        ];
        $this->add_render_attribute('imroz-agency-banner-data', 'data-settings', wp_json_encode($area_args));

        ?>
        <!-- Start Slider Area  -->
        <div class="rn-slider-area slider-creative-agency" <?php echo $this->get_render_attribute_string('imroz-agency-banner-data'); ?>>

            <?php if('yes' == $settings['enable_particles']){ ?> <div class="particles-js" id="particles-js-<?php echo esc_attr($this->get_id()) ?>"></div> <?php } ?>

            <!-- Start Single Slide  -->
            <div class="slide slide-style-2 d-flex align-items-center justify-content-center overlay rbt-height-control slider-paralax <?php echo esc_attr($parallax_class); ?>" <?php echo $parallax_ratio; ?>>
                <div class="container">
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
                                    <p class="description"><?php echo rbt_kses_intermediate( $settings['rbt_title_and_content_desctiption'] ); ?></p>
                                <?php } ?>
                                <?php if($settings['rbt_button_button_show'] === 'yes'){ ?>
                                    <div class="slide-btn">
                                        <?php $this->rbt_link_control_render('button', $this->get_settings()); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide  -->
        </div>
        <?php


    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Agency_Banner());


