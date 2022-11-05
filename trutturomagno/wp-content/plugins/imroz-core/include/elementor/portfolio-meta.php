<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class Imroz_Elementor_Widget_PortfolioMeta extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-portfolio-meta';
    }

    public function get_title()
    {
        return esc_html__('Portfolio Meta', 'imroz');
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
        return ['meta', 'portfolio', 'portfolio meta', 'imroz'];
    }

    protected function register_controls()
    {

//        $this->start_controls_section(
//            'imroz_portfolio_meta',
//            [
//                'label' => esc_html__('Portfolio Meta', 'imroz'),
//            ]
//        );
//
//        $this->end_controls_section();

    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();
        $Helper = new \Helper();
        $imroz_options = $Helper->imroz_get_options();

        ?>
        <div class="portfolio-view-list d-flex flex-wrap">
            <?php if( !empty(get_field( "client" )) && $imroz_options['imroz_enable_client_name_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($imroz_options['imroz_client_name_text']); ?></span>
                    <h4><?php echo get_field( "client" ); ?></h4>
                </div>
            <?php } ?>
            <?php if( !empty(get_field( "release_date" ))  && $imroz_options['imroz_enable_release_date_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($imroz_options['imroz_release_date_text']); ?></span>
                    <h4>
                        <?php
                        $format_in = 'Y-m-d'; // the format your value is saved in (set in the field options)
                        $format_out = get_option('date_format'); // the format you want to end up with
                        $date = \DateTime::createFromFormat($format_in, get_field( "release_date" ));
                        echo $date->format( $format_out );
                        ?>
                    </h4>
                </div>
            <?php } ?>

            <?php if( !empty(get_field( "project_types" ))  && $imroz_options['imroz_enable_project_types_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($imroz_options['imroz_project_types_text']); ; ?></span>
                    <h4><?php echo get_field( "project_types" ); ?></h4>
                </div>
            <?php } ?>
            <?php if( !empty(get_field( "live_link" )) && $imroz_options['imroz_enable_live_preview_meta'] == 'yes'){ ?>
                <div class="port-view w-100"><span class="d-none"><?php echo esc_html($imroz_options['imroz_live_preview_text']); ; ?></span>
                    <a class="rn-button-style--2 btn_border w-100 text-center" href="<?php echo esc_url(get_field( "live_link" )); ?>"><?php echo esc_html($imroz_options['imroz_live_preview_button_text']); ; ?></a>
                </div>
            <?php } ?>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_PortfolioMeta());