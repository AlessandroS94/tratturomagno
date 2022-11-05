<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Accordion extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-accordion';
    }

    public function get_title()
    {
        return esc_html__('Accordion', 'imroz');
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
        return ['accordion', 'tab', 'imroz'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            '_accordion',
            [
                'label' => esc_html__( 'Accordion', 'imroz' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title', [
                'label' => esc_html__( 'Accordion Item', 'imroz' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'This is accordion item title' , 'imroz' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Description', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Facilis fugiat hic ipsam iusto laudantium libero maiores minima molestiae mollitia repellat rerum sunt ullam voluptates? Perferendis, suscipit.',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'accordions',
            [
                'label' => esc_html__( 'Repeater Accordion', 'imroz' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__( 'This is accordion item title #1', 'imroz' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'This is accordion item title #2', 'imroz' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'This is accordion item title #3', 'imroz' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'This is accordion item title #4', 'imroz' ),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );

        $this->add_control(
            'space_accordion_item',
            [
                'label' => esc_html__( 'Accordion space gap', 'imroz' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rn-card + .rn-card' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('accordion_title', 'Title', '.rn-card .rn-card-header a.btn');
        $this->rbt_basic_style_controls('accordion_description', 'Description', '.rn-card .rn-card-body');

        // Area Style
        $this->rbt_section_style_controls('accordion_area', 'Area Style', '.rn-accordion');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        if($settings['accordions']){ ?>
        <div class="rn-accordion accodion-style--1">
            <div id="accordion-<?php echo esc_attr($this->get_id()); ?>">

                <?php foreach ( $settings['accordions'] as $index => $item){
                    $collapsed = ($index !== '0' ) ? 'collapsed' : '';
                    $aria_expanded = ($index == '0' ) ? "true" : "false";
                    $show = ($index == '0' ) ? "show" : "";
                    ?>
                    <!-- Start Single Card  -->
                    <div class="rn-card">
                        <div class="rn-card-header" id="heading-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>">
                            <a href="#" class="btn <?php echo esc_attr($collapsed); ?>" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" aria-expanded=<?php echo esc_attr($aria_expanded); ?> aria-controls="collapse-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>">
                                <?php echo esc_html($item['accordion_title']); ?>
                            </a>
                        </div>
                        <div id="collapse-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" class="collapse <?php echo esc_attr($show); ?>"  data-parent="#accordion-<?php echo esc_attr($this->get_id()); ?>">
                            <div class="rn-card-body">
                                <?php echo rbt_kses_intermediate($item['accordion_description']); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                <?php } ?>

            </div>
        </div>
        <?php
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Accordion());


