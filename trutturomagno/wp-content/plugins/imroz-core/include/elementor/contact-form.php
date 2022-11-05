<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Contact extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-contact';
    }

    public function get_title()
    {
        return esc_html__('Contact', 'imroz');
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
        return ['contact', 'contact form 7', 'hire me', 'say hello', 'imroz'];
    }
    public function get_rbt_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $rbt_cfa         = array();
        $rbt_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $rbt_forms       = get_posts( $rbt_cf_args );
        $rbt_cfa         = ['0' => esc_html__( 'Select Form', 'imroz' ) ];
        if( $rbt_forms ){
            foreach ( $rbt_forms as $rbt_form ){
                $rbt_cfa[$rbt_form->ID] = $rbt_form->post_title;
            }
        }else{
            $rbt_cfa[ esc_html__( 'No contact form found', 'imroz' ) ] = 0;
        }
        return $rbt_cfa;
    }
    protected function register_controls()
    {
        // Title and content
        $this->rbt_section_title('contact', 'Title and Content', '', 'Contact Us', 'h2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto cupiditate aperiam neque', false);

        $this->start_controls_section(
            'imroz_contact',
            [
                'label' => esc_html__('Contact Form', 'imroz'),
            ]
        );

        $this->add_control(
            'imroz_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'imroz' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_rbt_contact_form(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'imroz_contact_form_image',
            [
                'label' => esc_html__('Image', 'imroz'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'imroz'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'separator' => 'none',
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__('Height', 'imroz'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumbnail img' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('contact_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('contact_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('contact_description', 'Section - Description', '.section-title p');

        // Area
        $this->rbt_section_style_controls('contact_area', 'Area Style', '.rn-contact-area.bg_color--5');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <!-- Start Contact Area  -->
        <div class="rn-contact-area rn-section-gap bg_color--5">
            <div class="contact-form--1">
                <div class="container">
                    <div class="row row--35 align-items-start">
                        <div class="col-lg-6 order-2 order-lg-1">
                            <div class="section-title text-left mb--50 mb_sm--30 mb_md--30">
                                <?php $this->rbt_section_title_render('contact', $this->get_settings()); ?>
                            </div>

                            <!-- Start Contact Form -->
                            <?php if( !empty($settings['imroz_select_contact_form']) ){ ?> <div class="form-wrapper"> <?php
                                echo do_shortcode( '[contact-form-7  id="'.$settings['imroz_select_contact_form'].'"]' );
                                ?> </div> <?php
                            } else {
                                echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'imroz' ). '</p></div>';
                            } ?>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2">
                            <?php if ($settings['image']['url'] || $settings['image']['id']) :
                                $this->add_render_attribute('image', 'src', $settings['image']['url']);
                                $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                                $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                                $settings['hover_animation'] = 'disable-animation';
                                ?>
                                <div class="thumbnail mb_md--40 mb_sm--40">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Contact());


