<?php
/**
 * The plugin bootstrap file
 * This file is read by WordPress to generate the plugin information in the plugin admin area.
 * This file also defines plugin parameters, registers the activation and deactivation functions, and defines a function that starts the plugin.
 * @link    https://www.wpcodelabs.com
 * @since   1.0.0
 * @package plugin_scaffolding
 *
 * @wordpress-plugin
 * Plugin Name: Plugin Scaffolding
 * Plugin URI:  https://github.com/bob-moore/WP-Plugin-Scaffolding
 * Description: Plugin scaffolding for rapid plugin development
 * Version:     1.0.0
 * Author:      WP Code Labs
 * Author URI:  https://www.wpcodelabs.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: plugin_scaffolding
 */

namespace wpcl\pluginscaffolding;

/**
 * If this file is called directly, abort
 */
if ( !defined( 'WPINC' ) ) {
	die( 'Abort' );
}

if( !class_exists( 'PluginScaffolding' ) ) {

	require_once __DIR__ . '/vendor/autoload.php';

	class PluginScaffolding extends Framework {

		public function __construct() {
			/**
			 * Register the text domain
			 */
			load_plugin_textdomain( 'plugin_scaffolding', false, basename( dirname( __FILE__ ) ) . '/languages' );
			/**
			 * Register activation hook
			 */
			register_activation_hook( __FILE__, [$this, 'activate'] );
			/**
			 * Register deactivation hook
			 */
			register_deactivation_hook( __FILE__, [$this, 'deactivate'] );
			/**
			 * Kickoff the plugin
			 */
			$this->burnBabyBurn();
			/**
			 * Construct parent
			 */
			parent::__construct();
		}

		/**
		 * Register actions
		 *
		 * Uses the subscriber class to ensure only actions of this instance are added
		 * and the instance can be referenced via subscriber
		 *
		 * @since 1.0.0
		 */
		public function addActions() {
			$this->subscriber->addAction( 'init', [$this, 'registerPostTypes'] );
			$this->subscriber->addAction( 'init', [$this, 'registerTaxonomies'] );
			$this->subscriber->addAction( 'widgets_init', [$this, 'registerWidgets'] );

			/**
			 * Debugging scripts specific to development environments
			 */
			if ( $this->isDev() ) {
				$this->subscriber->addAction( 'wp_footer', [$this, 'displayLog'], 999 );
				$this->subscriber->addAction( 'admin_footer', [$this, 'displayLog'], 999 );
			}
		}

		private function burnBabyBurn() {
			/**
			 * Define the plugin version, for scripts and styles
			 */
			define( __NAMESPACE__ . '\VERSION', '1.0.0' );
			/**
			 * Register the admin functions
			 */
			new Admin();
			/**
			 * Register the front end functions
			 */
			new FrontEnd();
		}

		/**
		 * Activate Plugin
		 *
		 * Register Post Types, Register Taxonomies, and Flush Permalinks
		 * @since 1.0.0
		 */
		public function activate() {
			/**
			 * Register custom post types
			 */
			$this->registerPostTypes();
			/**
			 * Register custom taxonomies
			 */
			$this->registerTaxonomies();
			/**
			 * Flush permalinks
			 */
			$this->flushPermalinks();
		}
		/**
		 * Deactivate Plugin
		 *
		 * Remove unecessary data from database
		 * @since 1.0.0
		 */
		public function deactivate() {
			/**
			 * Remove stored error log
			 */
			delete_transient( __NAMESPACE__ . '_error_log' );
			/**
			 * Flush permalinks
			 */
			$this->flushPermalinks();
		}

		/**
		 * Flush permalinks
		 */
		private function flushPermalinks() {
			global $wp_rewrite;
			$wp_rewrite->init();
			$wp_rewrite->flush_rules();
		}

		/**
		 * Register custom post types
		 */
		public function registerPostTypes() {

			$post_types = $this->getClasses( 'posttypes' );

			foreach( $post_types as $post_type_name ) {

				$post_type = __NAMESPACE__ . '\\posttypes\\' . $post_type_name;

				$post_type = new $post_type();

				$post_type->register();

			}
		}
		/**
		 * Register custom taxonomies
		 */
		public function registerTaxonomies() {

			$taxonomies = $this->getClasses( 'taxonomies' );

			foreach( $taxonomies as $taxonomy_name ) {

				$taxonomy =  __NAMESPACE__ . '\\taxonomies\\' . $taxonomy_name;

				$taxonomy = new $taxonomy();

				$taxonomy->register();
			}
		}
		/**
		 * Register custom widgets
		 */
		public function registerWidgets() {

			$widgets = $this->getClasses( 'widgets' );

			foreach( $widgets as $widget_name ) {

				$widget = __NAMESPACE__ . '\\widgets\\' . $widget_name;

				register_widget( $widget );
			}
		}
	}
}

$PluginScaffolding = new PluginScaffolding();
