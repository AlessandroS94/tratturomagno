<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5e454ba98e66c',
        'title' => esc_html__( 'Audio Post Options', 'imroz' ),
        'fields' => array(
            array(
                'key' => 'field_5e454bb2daaf8',
                'label' => esc_html__( 'Upload Audio', 'imroz'),
                'name' => 'imroz_upload_audio',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'audio',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e4546ecb2591',
        'title' => esc_html__( 'Gallery Post Options', 'imroz' ),
        'fields' => array(
            array(
                'key' => 'field_5e45472694836',
                'label' => esc_html__( 'Gallery Image', 'imroz'),
                'name' => 'imroz_gallery_image',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'imroz-blog-thumb',
                'insert' => 'append',
                'library' => 'all',
                'min' => '',
                'max' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'gallery',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e452793df9dc',
        'title' => esc_html__( 'Link Post Options', 'imroz' ),
        'fields' => array(
            array(
                'key' => 'field_5e45279b191b8',
                'label' => esc_html__( 'Custom Link', 'imroz'),
                'name' => 'imroz_custom_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'link',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e452cd712b56',
        'title' => esc_html__( 'Quote Post Options', 'imroz' ),
        'fields' => array(
            array(
                'key' => 'field_5e452cea0e636',
                'label' => esc_html__( 'Quote Author Name', 'imroz'),
                'name' => 'imroz_quote_author_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
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
            ),
            array(
                'key' => 'field_5e452ec00e637',
                'label' => esc_html__( 'Quote Author Name Designation', 'imroz'),
                'name' => 'imroz_quote_author_name_designation',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
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
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'quote',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e4522ac9efa3',
        'title' => esc_html__( 'Video Post	Options', 'imroz' ),
        'fields' => array(
            array(
                'key' => 'field_5e4522b60b4a5',
                'label' => esc_html__( 'Video Link', 'imroz'),
                'name' => 'imroz_video_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'video',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;