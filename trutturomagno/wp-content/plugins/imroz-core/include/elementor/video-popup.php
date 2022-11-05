<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_VideoPopup extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-video-popup';
    }

    public function get_title()
    {
        return esc_html__('Video Popup', 'imroz');
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
        return ['video popup', 'imroz'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'imroz_video_popup',
            [
                'label' => esc_html__('Video Popup', 'imroz'),
            ]
        );
        $this->add_control(
            'rbt_video_popup_image',
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
                'name' => 'rbt_video_popup_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'rbt_video_popup_image_radius',
            [
                'label' => esc_html__('Image Border Radius', 'imroz'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumb img, {{WRAPPER}} .thumbnail img' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_control(
            'rbt_video_popup_video_url',
            [
                'label' => esc_html__( 'Video Link', 'imroz' ),
                'description' => 'Video url example: https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'placeholder' => esc_html__( 'Enter your youtube video url hare', 'imroz' ),
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_size',
            [
                'label' => esc_html__('Button Size', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'size-large' => esc_html__('Large', 'imroz'),
                    'size-medium' => esc_html__('Small', 'imroz'),
                ],
                'default' => 'size-large',
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_color',
            [
                'label' => esc_html__('Button Color', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'theme-color' => esc_html__('Theme Color', 'imroz'),
                    'white-color' => esc_html__('White Color', 'imroz'),
                    'black-color' => esc_html__('Dark Color', 'imroz'),
                ],
                'default' => 'theme-color'
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_radius',
            [
                'label' => esc_html__('Button Border Radius', 'imroz'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_popup_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_popup_padding',
            [
                'label' => esc_html__('Padding', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display(); ?>
            <div class="thumbnail position-relative text-center">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'rbt_video_popup_image_size', 'rbt_video_popup_image' );?>
                <?php if(!empty($settings['rbt_video_popup_video_url'])){ ?>
                    <a class="video-popup position-top-center play__btn <?php echo esc_attr($settings['rbt_video_popup_button_size']); ?> <?php echo esc_attr($settings['rbt_video_popup_button_color']); ?>" href="<?php echo esc_url($settings['rbt_video_popup_video_url']); ?>"><span
                        class="play-icon"></span></a>

                <?php } ?>
            </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_VideoPopup());


