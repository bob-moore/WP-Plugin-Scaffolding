<?php

/**
 * Sample Post Type
 *
 * @link    https://www.wpcodelabs.com
 * @since   1.0.0
 * @package plugin_scaffolding
 */

namespace wpcl\pluginscaffolding\posttypes;

use \wpcl\pluginscaffolding\Framework;

class SamplePostType extends Framework {
	/**
	 * Name of the custom taxonomy
	 * @since 1.0.0
	 */
	const NAME = 'sample-post-type';
	/**
	 * Register custom post type
	 *
	 * I recommend using a tool such as GenerateWP to easily generate post type arguments
	 *
	 * @see https://generatewp.com/post-type/
	 * @since 1.0.0
	 */
	public function register() {
		$labels = array(
			'name'                  => _x( 'Samples', 'Post Type General Name', 'plugin_scaffolding' ),
			'singular_name'         => _x( 'Sample', 'Post Type Singular Name', 'plugin_scaffolding' ),
			'menu_name'             => __( 'Sample Post Type', 'plugin_scaffolding' ),
			'name_admin_bar'        => __( 'Sample Post Type', 'plugin_scaffolding' ),
			'archives'              => __( 'Item Archives', 'plugin_scaffolding' ),
			'attributes'            => __( 'Item Attributes', 'plugin_scaffolding' ),
			'parent_item_colon'     => __( 'Parent Item:', 'plugin_scaffolding' ),
			'all_items'             => __( 'All Items', 'plugin_scaffolding' ),
			'add_new_item'          => __( 'Add New Item', 'plugin_scaffolding' ),
			'add_new'               => __( 'Add New', 'plugin_scaffolding' ),
			'new_item'              => __( 'New Item', 'plugin_scaffolding' ),
			'edit_item'             => __( 'Edit Item', 'plugin_scaffolding' ),
			'update_item'           => __( 'Update Item', 'plugin_scaffolding' ),
			'view_item'             => __( 'View Item', 'plugin_scaffolding' ),
			'view_items'            => __( 'View Items', 'plugin_scaffolding' ),
			'search_items'          => __( 'Search Item', 'plugin_scaffolding' ),
			'not_found'             => __( 'Not found', 'plugin_scaffolding' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'plugin_scaffolding' ),
			'featured_image'        => __( 'Featured Image', 'plugin_scaffolding' ),
			'set_featured_image'    => __( 'Set featured image', 'plugin_scaffolding' ),
			'remove_featured_image' => __( 'Remove featured image', 'plugin_scaffolding' ),
			'use_featured_image'    => __( 'Use as featured image', 'plugin_scaffolding' ),
			'insert_into_item'      => __( 'Insert into item', 'plugin_scaffolding' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'plugin_scaffolding' ),
			'items_list'            => __( 'Items list', 'plugin_scaffolding' ),
			'items_list_navigation' => __( 'Items list navigation', 'plugin_scaffolding' ),
			'filter_items_list'     => __( 'Filter items list', 'plugin_scaffolding' ),
		);
		$rewrite = array(
			'slug'                  => 'samples',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Sample', 'plugin_scaffolding' ),
			'description'           => __( 'Post Type Description', 'plugin_scaffolding' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'excerpt', 'genesis-seo', 'genesis-cpt-archives-settings', 'genesis-layouts', 'genesis-scripts' ),
			'taxonomies'            => array( 'category', 'post_tag', 'sample-taxonomy' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite'               => $rewrite,
		);

		register_post_type( self::NAME, $args );
	}
}