<?php
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5bf3bc1b4e26c_test',
	'title' => esc_html__('Page Options', 'imroz'),
	'fields' => array(
		array(
			'key' => 'field_5bf3c134a081e',
			'label' => esc_html__('Header', 'imroz'),
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5c387546a3e4c',
			'label' => esc_html__('Show Header', 'imroz'),
			'name' => 'imroz_show_header',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
        array(
            'key' => 'field_5c3875f7a3e4e',
            'label' => esc_html__('Select Header Template', 'imroz'),
            'name' => 'imroz_select_header_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Header Layout 1',
                2 => 'Header Layout 2',
                3 => 'Header Layout 3',
                4 => 'Header Layout 4',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_5f3c1ed52db7e_nav_menu',
            'label' => esc_html__('Select Menu', 'imroz'),
            'name' => 'imroz_select_nav_menu',
            'type' => 'select',
            'instructions' => esc_html__('By default works primary location menu.', 'imroz'),
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => imroz_get_nav_menus(),
            'default_value' => false,
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
		array(
			'key' => 'field_menu_type',
			'label' => esc_html__('Menu Type', 'imroz'),
			'name' => 'imroz_menu_type',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'multipage' => 'Multi Page',
				'onepage' => 'One Page',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
		),
		array(
			'key' => 'field_5c52c42f6fdfc',
			'label' => esc_html__('Header Sticky', 'imroz'),
			'name' => 'imroz_header_sticky',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
		),
		array(
			'key' => 'field_5c52c47d6fdfd',
			'label' => esc_html__('Header Transparent', 'imroz'),
			'name' => 'imroz_header_transparent',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
		),
		array(
			'key' => 'field_5bf3c14ba081f',
			'label' => esc_html__('Page Banner Area', 'imroz'),
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bf3f6b20509a',
			'label' => esc_html__('Page Banner Area', 'imroz'),
			'name' => 'imroz_title_wrapper_show',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
        array(
            'key' => 'field_page_banner_template',
            'label' => esc_html__('Select Banner Template', 'imroz'),
            'name' => 'imroz_select_banner_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Banner Layout 1',
                2 => 'Banner Layout 2',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_5bf655966ed4b',
            'label' => esc_html__('Breadcrumbs Enable', 'imroz'),
            'name' => 'imroz_breadcrumbs_enable',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'allow_null' => 1,
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_page_banner_template',
                        'operator' => '==',
                        'value' => 1,
                    ),
                ),
            ),
        ),
		array(
			'key' => 'field_5bf3f6fc0509c',
			'label' => esc_html__('Custom Title', 'imroz'),
			'name' => 'imroz_custom_title',
			'type' => 'text',
			'instructions' => 'If this field is empty, then default page/post title will be showed',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_page_banner_template',
                        'operator' => '==',
                        'value' => 1,
                    ),
                ),
                array(
                    array(
                        'field' => 'field_page_banner_template',
                        'operator' => '==',
                        'value' => 2,
                    ),
                ),
            ),
		),
        array(
            'key' => 'field_page_banner_sub_title_text',
            'label' => esc_html__('Custom Sub Title', 'imroz'),
            'name' => 'imroz_custom_sub_title',
            'type' => 'text',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_page_banner_template',
                        'operator' => '==',
                        'value' => 2,
                    ),
                ),
            ),
        ),
		array(
			'key' => 'field_5bf3c169a0820',
			'label' => esc_html__('Footer', 'imroz'),
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bfe771692a07',
			'label' => esc_html__('Show Footer', 'imroz'),
			'name' => 'imroz_show_footer',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
        array(
            'key' => 'field_footer_template',
            'label' => esc_html__('Select Footer Template', 'imroz'),
            'name' => 'imroz_select_footer_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Footer Layout 1',
                2 => 'Footer Layout 2',
                3 => 'Footer Layout 3',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bfe771692a07',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_page_extra_options',
            'label' => esc_html__('Page Extra Option', 'imroz'),
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'field_page_skin',
            'label' => esc_html__('Select Page Skin', 'imroz'),
            'name' => 'imroz_select_page_skin',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'default' => 'Default Skin',
                'dark' => 'Dark Skin',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),

	),
    'location' => array(
//        array(
//            array(
//                'param' => 'post_type',
//                'operator' => '==',
//                'value' => 'post',
//            ),
//        ),
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
endif;