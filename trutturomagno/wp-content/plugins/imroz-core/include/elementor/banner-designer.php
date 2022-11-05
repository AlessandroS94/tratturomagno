<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Designer_Banner extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-designer-banner';
    }

    public function get_title()
    {
        return esc_html__('Designer Banner', 'imroz');
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
        return ['designer banner', 'banner', 'banner with image', 'image with banner', 'imroz'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('imroz_designer_title_and_content', 'Title & Content', 'WELCOME TO MY WORLD', 'Hi, I’m Jone Doe <br> <span> UX Designer.</span>', 'h1', 'based in USA.', 'text-left', false);

        $this->start_controls_section(
            '_imroz_designer_thumbnail',
            [
                'label' => esc_html__('Thumbnail', 'imroz'),
            ]
        );
        $this->add_control(
            'imroz_designer_thumbnail',
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
                'name' => 'imroz_designer_thumbnail_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'imroz_designer_video',
            [
                'label' => esc_html__('Video Button', 'imroz'),
            ]
        );

        $this->add_control(
            'imroz_designer_video_url',
            [
                'label' => esc_html__( 'Video Link', 'imroz' ),
                'description' => 'Video url example: https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'placeholder' => esc_html__( 'Enter your youtube video url hare', 'imroz' ),
            ]
        );
        $this->add_control(
            'imroz_designer_video_button_size',
            [
                'label' => esc_html__('Button Size', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'lg-size' => esc_html__('Large', 'imroz'),
                    'md-size' => esc_html__('Small', 'imroz'),
                ],
                'default' => 'md-size',
            ]
        );
        $this->add_control(
            'imroz_designer_video_button_color',
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
            'imroz_designer_video_button_radius',
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
            'imroz_designer_video_button_margin',
            [
                'label' => esc_html__('Margin', 'imroz'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-popup.play__btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'imroz_designer_banner',
            [
                'label' => esc_html__('Advanced Options', 'imroz'),
            ]
        );
        // Height Control
        $this->rbt_height_control('designer_banner');

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('designer_portfolio_before_title', 'Before Title', '.slide.designer-portfolio.slider-style-3 .inner > span');
        $this->rbt_basic_style_controls('designer_portfolio_title', 'Title', '.slide.designer-portfolio.slider-style-3 .inner .title');
        $this->rbt_basic_style_controls('designer_portfolio_title_span', 'Title Span', '.slide.designer-portfolio.slider-style-3 .inner .title span');
        $this->rbt_basic_style_controls('designer_portfolio_before_description', 'Description', '.slide.designer-portfolio.slider-style-3 .inner .description');

        $this->rbt_section_style_controls('designer_portfolio_area', 'Section Style', '.slide.designer-portfolio');
        $this->rbt_section_style_controls('designer_portfolio_area_overlay', 'Section Style Overlay', '.slide.designer-portfolio.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title');

        ?>
        <!-- Start Slider Area  -->
        <div class="slider-wrapper">
            <div class="slide designer-portfolio slider-style-3  d-flex align-items-center justify-content-center bg_color--5 rn-slider-height overlay rbt-height-control">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ($settings['imroz_designer_thumbnail']['url'] || $settings['imroz_designer_thumbnail']['id']) : ?>
                            <div class="col-lg-5">
                                <div class="designer-thumbnail">
                                    <?php
                                    $this->add_render_attribute('imroz_designer_thumbnail', 'src', $settings['imroz_designer_thumbnail']['url']);
                                    $this->add_render_attribute('imroz_designer_thumbnail', 'alt', Control_Media::get_image_alt($settings['imroz_designer_thumbnail']));
                                    $this->add_render_attribute('imroz_designer_thumbnail', 'title', Control_Media::get_image_title($settings['imroz_designer_thumbnail']));
                                    ?>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'imroz_designer_thumbnail_size', 'imroz_designer_thumbnail'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-7 mt_md--40 mt_sm--40">
                            <div class="inner <?php echo esc_attr($settings['rbt_imroz_designer_title_and_content_align']) ?>">
                                <?php if (!empty($settings['rbt_imroz_designer_title_and_content_before_title'])) { ?>
                                    <span><?php echo rbt_kses_basic( $settings['rbt_imroz_designer_title_and_content_before_title'] ); ?></span>
                                <?php } ?>
                                <?php
                                if ($settings['rbt_imroz_designer_title_and_content_title_tag']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['rbt_imroz_designer_title_and_content_title_tag']),
                                        $this->get_render_attribute_string('title_args'),
                                        rbt_kses_intermediate($settings['rbt_imroz_designer_title_and_content_title'])
                                    );
                                endif;
                                ?>
                                <?php if (!empty($settings['rbt_imroz_designer_title_and_content_desctiption'])) { ?>
                                    <h2 class="description"><?php echo rbt_kses_intermediate( $settings['rbt_imroz_designer_title_and_content_desctiption'] ); ?></h2>
                                <?php } ?>

                                <?php if(!empty($settings['imroz_designer_video_url'])){ ?>
                                    <div class="d-flex align-items-center mt--20">
                                        <a class="video-popup play__btn <?php echo esc_attr($settings['imroz_designer_video_button_size']); ?> <?php echo esc_attr($settings['imroz_designer_video_button_color']); ?>" href="<?php echo esc_url($settings['imroz_designer_video_url']); ?>"><span
                                                        class="play-icon"></span></a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Designer_Banner());


