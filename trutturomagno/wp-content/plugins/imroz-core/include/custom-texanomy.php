<?php
/*=======================================================
*    Register Custom Taxonomy
* =======================================================*/
/**
 * Portfolio Cat
 */
if ( ! function_exists('rbt_portfolio_taxonomy') ) {
	function rbt_portfolio_taxonomy() {
		/**
		 * Events
		 */
		$labels = array(
			'name'                       => esc_html_x( 'Portfolio Categories', 'Taxonomy General Name', 'imroz' ),
			'singular_name'              => esc_html_x( 'Portfolio Categories', 'Taxonomy Singular Name', 'imroz' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'imroz' ),
			'all_items'                  => esc_html__( 'All Portfolio Category', 'imroz' ),
			'parent_item'                => esc_html__( 'Parent Item', 'imroz' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'imroz' ),
			'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'imroz' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'imroz' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'imroz' ),
			'update_item'                => esc_html__( 'Update Portfolio Category', 'imroz' ),
			'view_item'                  => esc_html__( 'View Portfolio Category', 'imroz' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'imroz' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'imroz' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'imroz' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Category', 'imroz' ),
			'search_items'               => esc_html__( 'Search Portfolio Category', 'imroz' ),
			'not_found'                  => esc_html__( 'Not Found', 'imroz' ),
			'no_terms'                   => esc_html__( 'No Portfolio Category', 'imroz' ),
			'items_list'                 => esc_html__( 'Portfolio Category list', 'imroz' ),
			'items_list_navigation'      => esc_html__( 'Portfolio Category list navigation', 'imroz' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'portfolio-cat', array( 'portfolio' ), $args );

	}
	add_action( 'init', 'rbt_portfolio_taxonomy', 0 );
}