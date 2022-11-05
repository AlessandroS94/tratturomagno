<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Addonname extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-addonname';
    }

    public function get_title()
    {
        return esc_html__('Addonname', 'imroz');
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
        return ['addonname', 'imroz'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'imroz_addonname',
            [
                'label' => esc_html__('Addonname', 'imroz'),
            ]
        );

        $this->end_controls_section();

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>

        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Addonname());


