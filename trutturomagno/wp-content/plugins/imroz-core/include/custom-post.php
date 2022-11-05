<?php
/*=======================================================
*    Register Post type
* =======================================================*/
/**
 * Portfolio
 */
if ( ! function_exists('rbt_portfolio') ) {
	function rbt_portfolio() {
	
		$labels = array(
			'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'imroz' ),
			'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'imroz' ),
			'menu_name'             => esc_html__( 'Portfolio', 'imroz' ),
			'name_admin_bar'        => esc_html__( 'Portfolio', 'imroz' ),
			'archives'              => esc_html__( 'Item Archives', 'imroz' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'imroz' ),
			'all_items'             => esc_html__( 'All Items', 'imroz' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'imroz' ),
			'add_new'               => esc_html__( 'Add New', 'imroz' ),
			'new_item'              => esc_html__( 'New Item', 'imroz' ),
			'edit_item'             => esc_html__( 'Edit Item', 'imroz' ),
			'update_item'           => esc_html__( 'Update Item', 'imroz' ),
			'view_item'             => esc_html__( 'View Item', 'imroz' ),
			'search_items'          => esc_html__( 'Search Item', 'imroz' ),
			'not_found'             => esc_html__( 'Not found', 'imroz' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'imroz' ),
			'featured_image'        => esc_html__( 'Featured Image', 'imroz' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'imroz' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'imroz' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'imroz' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'imroz' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'imroz' ),
			'items_list'            => esc_html__( 'Items list', 'imroz' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'imroz' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'imroz' ),
		);
		$args = array(
			'label'                 => esc_html__( 'Portfolio', 'imroz' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'portfolio', $args );
	}
	add_action( 'init', 'rbt_portfolio', 0 );

}






