<?php
/**
 * Sample Taxonomy
 *
 * @link    https://www.wpcodelabs.com
 * @since   1.0.0
 * @package plugin_scaffolding
 */

namespace wpcl\pluginscaffolding\taxonomies;

use \wpcl\pluginscaffolding\Framework;

class SampleTaxonomy extends Framework {
	/**
	 * Name of the custom taxonomy
	 * @since 1.0.0
	 */
	const NAME = 'sample-taxonomy';
	/**
	 * Name of the custom taxonomy
	 * @since 1.0.0
	 */
	const POST_TYPES = ['sample-post-type'];
	/**
	 * Register custom taxonomy
	 *
	 * I recommend using a tool such as GenerateWP to easily generate taxonomy arguments
	 *
	 * @see  https://generatewp.com/taxonomy/
	 * @since 1.0.0
	 */
	public function register() {
		$labels = array(
			'name'                       => _x( 'Sample Taxnomies', 'Taxonomy General Name', 'plugin_scaffolding' ),
			'singular_name'              => _x( 'Sample Taxonomy', 'Taxonomy Singular Name', 'plugin_scaffolding' ),
			'menu_name'                  => __( 'Sample Taxnomies', 'plugin_scaffolding' ),
			'all_items'                  => __( 'All Items', 'plugin_scaffolding' ),
			'parent_item'                => __( 'Parent Item', 'plugin_scaffolding' ),
			'parent_item_colon'          => __( 'Parent Item:', 'plugin_scaffolding' ),
			'new_item_name'              => __( 'New Item Name', 'plugin_scaffolding' ),
			'add_new_item'               => __( 'Add New Item', 'plugin_scaffolding' ),
			'edit_item'                  => __( 'Edit Item', 'plugin_scaffolding' ),
			'update_item'                => __( 'Update Item', 'plugin_scaffolding' ),
			'view_item'                  => __( 'View Item', 'plugin_scaffolding' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'plugin_scaffolding' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'plugin_scaffolding' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'plugin_scaffolding' ),
			'popular_items'              => __( 'Popular Items', 'plugin_scaffolding' ),
			'search_items'               => __( 'Search Items', 'plugin_scaffolding' ),
			'not_found'                  => __( 'Not Found', 'plugin_scaffolding' ),
			'no_terms'                   => __( 'No items', 'plugin_scaffolding' ),
			'items_list'                 => __( 'Items list', 'plugin_scaffolding' ),
			'items_list_navigation'      => __( 'Items list navigation', 'plugin_scaffolding' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'post_types'                 => array( 'page' ),
		);

		register_taxonomy( self::NAME, self::POST_TYPES, $args );

		foreach ( self::POST_TYPES as $type ) {
			register_taxonomy_for_object_type( self::NAME, $type );
		}
	}
}