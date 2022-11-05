<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Personal_Banner extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-personal-banner';
    }

    public function get_title()
    {
        return esc_html__('Personal Banner', 'imroz');
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
        return ['personal_banner', 'imroz'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('title_and_content', 'Title & Content', 'FREELANCE DIGITAL DESIGNER', 'Hello, I’m Nancy Welcome to my World.', 'h1', '', 'text-left', false);

        $this->rbt_link_controls('button', 'Button', 'Download My CV');

        $this->start_controls_section(
            'imroz_personal_banner',
            [
                'label' => esc_html__('Advanced Options', 'imroz'),
            ]
        );
            // Height Control
            $this->rbt_height_control('personal_banner');

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('pb_before_title', 'Before Title', '.slide.slider-style-3 .inner > span');
        $this->rbt_basic_style_controls('pb_title', 'Title', '.slide.slider-style-3 .inner .title');
        $this->rbt_basic_style_controls('pb_title_span', 'Title Span', '.slide.slider-style-3 .inner .title span');
        $this->rbt_basic_style_controls('pb_before_description', 'Description', '.slide.slider-style-3 .inner .description');

         // Link style
         $this->rbt_link_controls_style('button_style', 'Button', '.rbt-button', 'btn-size-md', 'rn-button-style--2 btn_border');


        $this->rbt_section_style_controls('pb_area', 'Section Style', '.slide.slider-style-3.bg_image');
        $this->rbt_section_style_controls('pb_area_overlay', 'Section Style Overlay', '.slide.slider-style-3.bg_image.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title theme-gradient');

        ?>
        <!-- Start Slider Area  -->
        <div class="rn-slider-area">
            <!-- Start Single Slide  -->
            <div class="slide personal-portfolio-slider slider-paralax slider-style-3 d-flex align-items-center justify-content-center bg_image overlay rbt-height-control">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner <?php echo esc_attr($settings['rbt_title_and_content_align']) ?>">
                                <?php if (!empty($settings['rbt_title_and_content_before_title'])) { ?>
                                    <span class="font-700"><?php echo rbt_kses_basic( $settings['rbt_title_and_content_before_title'] ); ?></span>
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
                                    <div class="slide-btn mt--20">
                                        <?php $this->rbt_link_control_render('button', $this->get_settings()); ?>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide  -->
            </div>
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Personal_Banner());


