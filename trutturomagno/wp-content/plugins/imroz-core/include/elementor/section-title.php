<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_SectionTitle extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-section-title';
    }

    public function get_title()
    {
        return esc_html__('Section Title', 'imroz');
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
        return ['section_title', 'imroz'];
    }

    protected function register_controls()
    {


        // Section Title
        $this->rbt_section_title('section_title', 'Section - Title and Content', '', 'Featured', 'h2');

        // Style Component
        $this->rbt_basic_style_controls('section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('section_title_description', 'Section - Description', '.section-title p');

        // Area Style
        $this->rbt_section_style_controls('section_title_area', 'Section Style', '.section-title');
    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="section-title mb--20 mb_sm--0 <?php echo esc_attr($settings['rbt_section_title_align']) ?>">
            <?php $this->rbt_section_title_render('section_title', $this->get_settings()); ?>
        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_SectionTitle());