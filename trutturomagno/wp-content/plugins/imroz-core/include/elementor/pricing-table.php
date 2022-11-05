<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Imroz_Elementor_Widget_Pricing extends Widget_Base
{

    use \Elementor\ImrozElementCommonFunctions;

    public function get_name()
    {
        return 'imroz-pricing';
    }

    public function get_title()
    {
        return esc_html__('Pricing', 'imroz');
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
        return ['pricing', 'imroz'];
    }

    protected function register_controls()
    {
        // Title and content
        $this->rbt_section_title('pricing', 'Section - Title and Content', '', 'Pricing Plan', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.');

        $this->start_controls_section(
            'imroz_pricing',
            [
                'label' => esc_html__( 'Pricing Plan', 'imroz' ),
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'pricing_title', [
                'label' => esc_html__( 'Title', 'imroz' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Free' , 'imroz' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'pricing_price',
            [
                'label' => esc_html__( 'Price', 'imroz' ),
                'type' => Controls_Manager::TEXT,
                'default' => '50',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );
        $repeater->add_control(
            'pricing_sub_title', [
                'label' => esc_html__( 'Sub Title', 'imroz' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'USD Per Month' , 'imroz' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'pricing_features_list', [
                'label' => esc_html__( 'Features List', 'imroz' ),
                'description' => esc_html__( 'Create new line by Enter', 'imroz' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '5 PPC Campaigns Per Day
Unlimited Digital Marketing
Unlimited Marketing Agency
Unlimited Facebook Marketing
Unlimited Video Camplaigns',
                'label_block' => true,
            ]
        );

        // Start Button
        $repeater->add_control(
            'rbt_pricing_button_button_show',
            [
                'label' => esc_html__( 'Show Button', 'imroz' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'imroz' ),
                'label_off' => esc_html__( 'Hide', 'imroz' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'rbt_pricing_button_text',
            [
                'label' => esc_html__('Button Text', 'imroz'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Purchase Now',
                'title' => esc_html__('Enter button text', 'imroz'),
                'label_block' => true,
                'condition' => [
                    'rbt_pricing_button_button_show' => 'yes'
                ],
            ]
        );
        $repeater->add_control(
            'rbt_pricing_button_link_type',
            [
                'label' => esc_html__('Button Link Type', 'imroz'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'rbt_pricing_button_button_show' => 'yes'
                ],
            ]
        );
        $repeater->add_control(
            'rbt_pricing_button_link',
            [
                'label' => esc_html__('Button link', 'imroz'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'imroz'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'rbt_pricing_button_link_type' => '1',
                    'rbt_pricing_button_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'rbt_pricing_button_page_link',
            [
                'label' => esc_html__('Select Button Page', 'imroz'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => rbt_get_all_pages(),
                'condition' => [
                    'rbt_pricing_button_link_type' => '2',
                    'rbt_pricing_button_button_show' => 'yes'
                ]
            ]
        );
        // End Button
        $repeater->add_control(
            'pricing_featured',
            [
                'label' => esc_html__('Featured', 'imroz'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'imroz'),
                'label_off' => esc_html__('No', 'imroz'),
                'return_value' => 'yes',
            ]
        );
        // End Link

        // Repeater Control
        $this->add_control(
            'pricing_table',
            [
                'label' => esc_html__( 'Pricing table', 'imroz' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'pricing_title' => esc_html__( 'Basic', 'imroz' ),
                        'pricing_featured' => 'no',
                    ],
                    [
                        'pricing_title' => esc_html__( 'Medium', 'imroz' ),
                        'pricing_price' => esc_html__( '99', 'imroz' ),
                        'pricing_featured' => 'yes',
                    ],
                    [
                        'pricing_title' => esc_html__( 'Advanced', 'imroz' ),
                        'pricing_price' => esc_html__( '199', 'imroz' ),
                        'pricing_featured' => 'no',
                    ],
                ],
                'title_field' => '{{{ pricing_title }}}',
            ]
        );
        $this->add_control(
            'pricing_style',
            [
                'label' => esc_html__( 'Style', 'imroz' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    'one' => esc_html__('Style One', 'imroz'),
                    'two' => esc_html__('Style Two', 'imroz'),
                ],
                'default' => 'one',
            ]
        );
        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('pricing_columns', 'Columns', '4', '6', '12', '12');


        // Style Component
        $this->rbt_basic_style_controls('pricing_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('pricing_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('pricing_description', 'Section - Description', '.section-title p');

        $this->rbt_basic_style_controls('pricing_table_title', 'Table - Title', '.rn-pricing .pricing-table-inner .pricing-header .title');
        $this->rbt_basic_style_controls('pricing_table_price', 'Table - Price', '.rn-pricing .pricing-table-inner .pricing-header .pricing span.price');
        $this->rbt_basic_style_controls('pricing_table_sub_title', 'Table - Sub Title', '.rn-pricing .pricing-table-inner .pricing-header .pricing span.subtitle');
        $this->rbt_basic_style_controls('pricing_table_fet_list', 'Table - Features List', '.rn-pricing .list-style--1 li');
        $this->rbt_basic_style_controls('pricing_table_fet_list_icon', 'Table - Features List Icon', '.rn-pricing .list-style--1 li i, .rn-pricing .list-style--1 li svg');

        $this->rbt_section_style_controls('pricing_table_area', 'Section Style', '.rn-pricing-plan-area');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $pricing_style = ($settings['pricing_style'] == 'two') ? "prcing-style-2" : "";

        ?>
        <!-- Start Pricing Plan Area  -->
        <div class="rn-pricing-plan-area rn-section-gap bg_color--5 <?php echo esc_attr($pricing_style); ?>">
            <div class="container">
                <?php if ($settings['rbt_pricing_section_title_show'] == 'yes'){ ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title <?php echo esc_attr($settings['rbt_pricing_align']); ?>">
                                <?php $this->rbt_section_title_render('pricing', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($settings['pricing_table']){ ?>
                    <div class="row mt--30">
                        <?php foreach ($settings['pricing_table'] as $table ){
                            $active = ($table['pricing_featured'] === 'yes') ? 'active' : ''; ?>
                            <div  data-unique-id="rbt-pricing-table-<?php echo $table['_id']; ?>" class="mt--30 rbt-pricing-table-<?php echo $table['_id']; ?> col-lg-<?php echo esc_attr($settings['rbt_pricing_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_pricing_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_pricing_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_pricing_columns_for_mobile']); ?> elementor-repeater-item-<?php echo $table['_id']; ?>">
                                <div class="rn-pricing <?php echo esc_attr($active); ?>">
                                    <div class="pricing-table-inner">

                                        <div class="pricing-header">
                                            <?php if($table['pricing_title']){ ?>
                                                <h5 class="title"><?php echo esc_html($table['pricing_title']); ?></h5>
                                            <?php } ?>
                                            <?php if($table['pricing_price'] || $table['pricing_sub_title']){ ?>
                                                <div class="pricing">
                                                    <?php if($table['pricing_price']){ ?>
                                                        <span class="price"><?php echo esc_html($table['pricing_price']); ?></span>
                                                    <?php } ?>
                                                    <?php if($table['pricing_sub_title']){ ?>
                                                        <span class="subtitle"><?php echo esc_html($table['pricing_sub_title']); ?></span>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php  $lines = explode("\n", $table['pricing_features_list']); // or use PHP PHP_EOL constant ?>
                                        <?php if(!empty($lines)){ ?>
                                            <div class="pricing-body">
                                                <ul class="list-style--1">
                                                    <?php foreach ( $lines as $line ) {
                                                        echo '<li><i class="fas fa-check"></i>'. trim( $line ) .'</li>';
                                                    } ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <?php if($table['rbt_pricing_button_button_show'] == 'yes'){ ?>
                                            <div class="pricing-footer">
                                                <?php
                                                // Link
                                                $href = "#";
                                                $target = "_self";
                                                $rel = "nofollow";
                                                if ('2' == $table['rbt_pricing_button_link_type']) {
                                                    $href = get_permalink($table['rbt_pricing_button_page_link']);
                                                    $target = "_self";
                                                    $rel = "nofollow";
                                                } else {
                                                    if (!empty($table['rbt_pricing_button_link']['url'])) {
                                                        $href = $table['rbt_pricing_button_link']['url'];
                                                    }
                                                    if ($table['rbt_pricing_button_link']['is_external']) {
                                                        $target = "_blank";
                                                    }
                                                    if (!empty($table['rbt_pricing_button_link']['nofollow'])) {
                                                        $rel = "nofollow";
                                                    }
                                                }
                                                // Button
                                                if (!empty($table['rbt_pricing_button_link']['url']) || isset($table['rbt_pricing_button_link_type'])) {
                                                    $button_html = '<a class="rn-button-style--2 btn_border btn-size-md" href="'. $href .'" target="'. $target .'" rel="'.$rel.'">' . '<span class="button-text">' . $table['rbt_pricing_button_text'] . '</span></a>';
                                                }
                                                if (!empty($table['rbt_pricing_button_text'])) {
                                                    echo $button_html;
                                                }
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?> <!-- End Foreach  -->
                    </div> <!-- End Row  -->
                <?php } ?>
            </div>
        </div>
        <!-- End Pricing Plan Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Imroz_Elementor_Widget_Pricing());


