<?php
/**
 * @param $options
 * dialog
 */
function imroz_confirmation_dialog_options($options)
{
    return array_merge($options, array(
        'width' => 500,
        'dialogClass' => 'wp-dialog',
        'resizable' => false,
        'height' => 'auto',
        'modal' => true,
    ));
}

add_filter('pt-ocdi/confirmation_dialog_options', 'imroz_confirmation_dialog_options', 10, 1);

/**
 * imroz_import_files
 * @return array
 */
function imroz_import_files()
{
    $demo_location = 'http://rainbowit.net/themes/imroz/demo/';
    $preview_url = 'http://rainbowit.net/themes/imroz';
    $import_notice = esc_html__('Importing may take 5-10 minutes.', 'imroz');
    return array(
        array(
            'import_file_name' => 'Main Demo',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/main-demo.png',
            'preview_url' => $preview_url,
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Personal Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/personal-portfolio.png',
            'preview_url' => $preview_url . '/personal-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Personal Portfolio 02',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/personal-portfolio-02.png',
            'preview_url' => $preview_url . '/personal-portfolio-02/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Insurance',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/insurance.png',
            'preview_url' => $preview_url . '/insurance/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Corporate Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/corporate-agency.png',
            'preview_url' => $preview_url . '/corporate-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Minimal Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/minimal-portfolio.png',
            'preview_url' => $preview_url . '/minimal-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Digital Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/digital-agency.png',
            'preview_url' => $preview_url . '/digital-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-agency.png',
            'preview_url' => $preview_url . '/creative-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Imroz Classic',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/imroz-classic.png',
            'preview_url' => $preview_url . '/imroz-classic/',
            'import_notice' => $import_notice,
        ),

        array(
            'import_file_name' => 'Corporate Business',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/corporate-business.png',
            'preview_url' => $preview_url . '/corporate-business/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Portfolio One Page',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/portfolio-one-page.png',
            'preview_url' => $preview_url . '/portfolio-one-page/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Agency Landing',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-agency-landing.png',
            'preview_url' => $preview_url . '/creative-agency-landing/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Business',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/business.png',
            'preview_url' => $preview_url . '/business/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Designer Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/designer-portfolio.png',
            'preview_url' => $preview_url . '/designer-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Studio Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/studio-agency.png',
            'preview_url' => $preview_url . '/studio-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Startup',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/startup.png',
            'preview_url' => $preview_url . '/startup/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Home Particle',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/home-particle.png',
            'preview_url' => $preview_url . '/home-particle/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'imroz_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-portfolio.png',
            'preview_url' => $preview_url . '/creative-portfolio/',
            'import_notice' => $import_notice,
        ),

    );
}

add_filter('pt-ocdi/import_files', 'imroz_import_files');

/**
 * imroz_before_widgets_import
 * @param $selected_import
 */
function imroz_before_widgets_import($selected_import)
{

    // Remove 'Hello World!' post
    wp_delete_post(1, true);
    // Remove 'Sample page' page
    wp_delete_post(2, true);

    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);

}

add_action('pt-ocdi/before_widgets_import', 'imroz_before_widgets_import');

/*
 * Automatically assign
 * "Front page",
 * "Posts page" and menu
 * locations after the importer is done
 */
function imroz_after_import_setup($selected_import)
{

    $demo_imported = get_option('imroz_demo_imported');


    $cpt_support = get_option('elementor_cpt_support');
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
    $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
    $elementor_container_width = get_option('elementor_container_width');


    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'portfolio', 'elementor_disable_color_schemes']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }
    if (empty($elementor_disable_color_schemes)) {
        update_option('elementor_disable_color_schemes', 'yes'); //update database
    }
    if (empty($elementor_disable_typography_schemes)) {
        update_option('elementor_disable_typography_schemes', 'yes'); //update database
    }
    if (empty($elementor_container_width)) {
        update_option('elementor_container_width', '1260'); //update database
    }

    $elementor_general_settings = array(
        'container_width' => (!empty($elementor_container_width)) ? $elementor_container_width : '1260',
    );
    update_option('_elementor_general_settings', $elementor_general_settings); //update database

    // Update Global Css Options For Elementor
    $currentTime = strtotime("now");
    $elementor_global_css = array(
        'time' => $currentTime,
        'fonts' => array()
    );
    update_option('_elementor_global_css', $elementor_global_css); //update database

    update_option('imroz_elementor_custom_setting_imported', 'elementor_custom_setting_imported');



    //  Update URL 
    $rbt_options_old_url = get_option('imroz_options');
    $site_url = get_site_url();
    foreach($rbt_options_old_url as $key => $val) {
        if(isset($rbt_options_old_url[$key]['url'])) {
            if (str_contains($rbt_options_old_url[$key]['url'], 'http://rainbowit.net/themes/imroz')) {
                $rbt_options_old_url[$key]['url'] = str_replace('http://rainbowit.net/themes/imroz', $site_url, $rbt_options_old_url[$key]['url']);
            }
        }
    }
    update_option('imroz_options', $rbt_options_old_url); //update database



    if (empty($demo_imported)) {

        // Home page selected
        if ('Main Demo' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Main Demo');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Personal Portfolio');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal Portfolio 02' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Personal Portfolio 02');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Insurance' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Insurance');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Corporate Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Corporate Agency');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Minimal Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Minimal Portfolio');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Digital Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Digital Agency');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Agency');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Imroz Classic' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Imroz Classic');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Corporate Business' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Corporate Business');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Portfolio One Page' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Portfolio One Page');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Agency Landing' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Agency Landing');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Business' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Business');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Designer Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Portfolio');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Studio Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Studio Agency');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Startup' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Startup');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home Particle' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Particle');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Portfolio');
            update_option('imroz_theme_active_demo', $selected_import['import_file_name']);
        }
        $blog_page_id = get_page_by_title('Blog');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);
        update_option('page_for_posts', $blog_page_id->ID);

        update_option('imroz_demo_imported', 'imported');
    }

    // Set Menu As Primary && Off Canvus Menu
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id
    ));

}

add_action('pt-ocdi/after_import', 'imroz_after_import_setup');


/**
 * time_for_one_ajax_call
 * @return int
 */
function imroz_change_time_of_single_ajax_call()
{
    return 20;
}

add_action('pt-ocdi/time_for_one_ajax_call', 'imroz_change_time_of_single_ajax_call');


// To make demo imported items selected
add_action('admin_footer', 'imroz_pt_ocdi_add_scripts');
function imroz_pt_ocdi_add_scripts()
{
    $demo_imported = get_option('imroz_theme_active_demo');

    if (!empty($demo_imported)) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('.ocdi__gl-item.js-ocdi-gl-item').each(function () {
                    var ocdi_theme_title = $(this).data('name');
                    var current_ocdi_theme_title = '<?php echo strtolower($demo_imported); ?>';

                    if (ocdi_theme_title == current_ocdi_theme_title) {
                        $(this).addClass('active_demo');
                        return false;
                    }
                });
            });
        </script>
        <?php
    }
}

/**
 * Remove ads
 */
add_filter('pt-ocdi/disable_pt_branding', '__return_true');



