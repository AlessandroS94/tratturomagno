<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Tabs extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-tabs';
    }

    public function get_title()
    {
        return esc_html__('Tabs', 'imroz');
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
        return ['tabs', 'imroz'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            '_tab',
            [
                'label' => esc_html__( 'Tab', 'imroz' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title', [
                'label' => esc_html__( 'Tab Item', 'imroz' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'This is tab item title' , 'imroz' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tab_description',
            [
                'label' => esc_html__('Description', 'imroz'),
                'description' => rbt_get_allowed_html_desc( 'advance' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam laudantium neque cumque, magni, modi aut a dolores deleniti recusandae dolor quod aliquid aperiam. Delectus voluptate quam deserunt expedita temporibus ab!',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Repeater Tab', 'imroz' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__( 'Our history', 'imroz' ),
                    ],
                    [
                        'tab_title' => esc_html__( 'Our mission', 'imroz' ),
                    ],
                    [
                        'tab_title' => esc_html__( 'Friendly Support', 'imroz' ),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->add_control(
            'space_tab_item',
            [
                'label' => esc_html__( 'Tab space gap', 'imroz' ),
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
                    '{{WRAPPER}} ul.nav.tab-style--1 li + li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('tabs_title', 'Title', 'ul.nav.tab-style--1 li a');
        $this->rbt_basic_style_controls('tabs_description', 'Description', '.single-tab-content');

        // Area Style
        $this->rbt_section_style_controls('tabs_area', 'Area Style', '.rbt-tabs-wrapper');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        ?>
        <div class="rbt-tabs-wrapper">
            <ul class="nav nav-tabs tab-style--1" id="myTab-<?php echo esc_attr($this->get_id()); ?>" role="tablist">
                <?php
                foreach ( $settings['tabs'] as $index => $item ){
                    $active = ($index == '0') ? "active" : "";
                    $aria_selected = ($index == '0' ) ? "true" : "false";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo esc_attr($active); ?>" id="tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" data-toggle="tab" href="#rn-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" aria-selected="<?php echo esc_attr($aria_selected); ?>"><?php echo esc_html($item['tab_title']); ?></a>
                    </li>
                <?php } ?>

            </ul>
            <div class="tab-content" id="myTabContent-<?php echo esc_attr($this->get_id()); ?>">
                <?php
                foreach ( $settings['tabs'] as $index => $item ){
                    $active = ($index == '0') ? "show active" : "";
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="rn-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($index); ?>" role="tabpanel">
                        <div class="single-tab-content">
                            <?php echo rbt_kses_advance($item['tab_description']); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Tabs());


