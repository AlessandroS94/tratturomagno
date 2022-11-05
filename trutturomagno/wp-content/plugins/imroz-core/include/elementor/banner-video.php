<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Video_Banner extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-video-banner';
    }

    public function get_title()
    {
        return esc_html__('Video Banner', 'imroz');
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
        return ['video-banner', 'popup video', 'banner', 'video background', 'studio agency banner', 'studio banner', 'imroz'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('title_and_content', 'Title & Content', '', 'WELCOME VIDEO STUDIO', 'h1', 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.', 'text-left', false);

        $this->start_controls_section(
            'imroz_video_banner',
            [
                'label' => esc_html__('Video popup video', 'imroz'),
            ]
        );

        $this->add_control(
            'rbt_video_banner_video_url',
            [
                'label' => esc_html__( 'Video Link', 'imroz' ),
                'description' => 'Video url example: https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'placeholder' => esc_html__( 'Enter your youtube video url hare', 'imroz' ),
            ]
        );
        $this->add_control(
            'rbt_video_banner_button_size',
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
            'rbt_video_banner_button_color',
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
            'rbt_video_banner_button_radius',
            [
                'label' => esc_html__('Button Border Radius', 'imroz'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-popup.play__btn' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_banner_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-popup.play__btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_banner_padding',
            [
                'label' => esc_html__('Padding', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-popup.play__btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Style Component
        $this->rbt_basic_style_controls('vb_before_title', 'Before Title', '.slide.slide-style-2  .inner .sub-title');
        $this->rbt_basic_style_controls('vb_title', 'Title', '.slide.slide-style-2.slider-video-bg .inner .title');
        $this->rbt_basic_style_controls('vb_before_description', 'Description', '.slide.slide-style-2 .inner .description');

        $this->rbt_section_style_controls('vb_area', 'Section Style', '.slide.slide-style-2 ');
        $this->rbt_section_style_controls('vb_area_overlay', 'Section Style Overlay', '.slide.slide-style-2.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title');
        $col_class = (!empty($settings['rbt_video_banner_video_url'])) ? "col-lg-8" : "col-lg-12";

        ?>
        <!-- Start Slider Area  -->
        <div  id="imroz-video-banner-<?php echo esc_attr($this->get_id()) ?>"  class="slide slide-style-2 slider-video-bg d-flex align-items-center justify-content-center overlay" data-black-overlay="6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="<?php echo esc_attr($col_class); ?>">
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
                        </div>
                    </div>
                    <?php if(!empty($settings['rbt_video_banner_video_url'])){ ?>
                        <div class="col-lg-4">
                            <div class="video-inner mt_sm--30 mt_md--30">
                                <a class="video-popup play__btn <?php echo esc_attr($settings['rbt_video_banner_button_size']); ?> <?php echo esc_attr($settings['rbt_video_banner_button_color']); ?>" href="<?php echo esc_url($settings['rbt_video_banner_video_url']); ?>"><span
                                                class="play-icon"></span></a>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Video_Banner());


