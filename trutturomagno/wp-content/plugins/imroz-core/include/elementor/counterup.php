<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Counterup extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-counterup';
    }

    public function get_title()
    {
        return esc_html__('Counterup', 'imroz');
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
        return ['counter', 'fun fact', 'funfact', 'counter up', 'imroz'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            '_counterup_icon',
            [
                'label' => esc_html__('Icon', 'imroz'),
            ]
        );
        $this->add_control(
            'counterup_icon_type',
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
            'counterup_image',
            [
                'label' => esc_html__('Upload Image', 'imroz'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'counterup_icon_type' => 'image'
                ]

            ]
        );
        if (rbt_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'counterup_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'counterup_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $this->add_control(
                'counterup_selected_icon',
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
                        'counterup_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $this->end_controls_section();

        $this->start_controls_section(
            'imroz_counterup',
            [
                'label' => esc_html__('Counterup', 'imroz'),
            ]
        );
        $this->add_control(
            'counterup_number',
            [
                'label' => esc_html__('Number', 'imroz'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '50',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counterup_number_sup',
            [
                'label' => esc_html__('Select Funfact Number Sup', 'imroz'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'counter',
                'options' => [
                    'counter-none' => esc_html__('None', 'imroz'),
                    'counter' => esc_html__('Plus(+)', 'imroz'),
                    'counter-percentage' => esc_html__('Percentage(%)', 'imroz'),
                    'counter-k' => esc_html__('Thousand(K)', 'imroz'),
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counterup_description', [
                'label' => esc_html__('Description', 'imroz'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Staticfied Customers', 'imroz'),
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'counterup_description_align',
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
            'custom_class',
            [
                'label' => esc_html__('Add Custom Class', 'imroz'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('counterup_number', 'Number', '.im_counterup .counter');
        $this->rbt_basic_style_controls('counterup_number_sup', 'Number Sup', '.im_counterup .counter::after');
        $this->rbt_basic_style_controls('counterup_description', 'Description', '.im_counterup .description');
        $this->rbt_icon_style('counterup_icon', 'Services - Icon/Image/SVG', '.im_counterup .icon');
        // Area
        $this->rbt_section_style_controls('counterup_box', 'Counter Box', '.im_counterup');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="im_single_counterup">
            <div class="im_counterup <?php echo esc_attr($settings['counterup_description_align']); ?> <?php echo esc_attr($settings['custom_class']); ?>">
                <div class="inner">
                    <?php if($settings['counterup_icon_type'] !== 'image'){ ?>
                        <?php if (!empty($settings['counterup_icon']) || !empty($settings['counterup_selected_icon']['value'])) : ?>
                            <div class="icon">
                                <?php rbt_render_icon($settings, 'counterup_icon', 'counterup_selected_icon'); ?>
                            </div>
                        <?php endif; ?>
                    <?php } else {
                        if (!empty($settings['counterup_image'])){ ?>
                            <div class="icon">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'counterup_image'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if(!empty($settings['counterup_number'])){ ?>
                        <h2 class="counter <?php echo $settings['counterup_number_sup'] ?>"><span><?php echo esc_html($settings['counterup_number']) ?></span></h2>
                    <?php } ?>
                    <?php if(!empty($settings['counterup_description'])){ ?>
                        <p class="description"><?php echo esc_html($settings['counterup_description']) ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Counterup());


