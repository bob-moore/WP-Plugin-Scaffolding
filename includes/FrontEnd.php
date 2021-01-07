<?php

/**
 * The plugin file that controls the frontend functions
 * @link    https://www.wpcodelabs.com
 * @since   1.0.0
 * @package plugin_scaffolding
 */

namespace wpcl\pluginscaffolding;

class FrontEnd extends Framework {
	/**
	 * Register actions
	 *
	 * Uses the subscriber class to ensure only actions of this instance are added
	 * and the instance can be referenced via subscriber
	 *
	 * @since 1.0.0
	 * @see  https://developer.wordpress.org/reference/functions/add_action/
	 */
	public function addActions() {
		$this->subscriber->addAction( 'wp_enqueue_scripts', [$this, 'enqueueScripts'] );
		$this->subscriber->addAction( 'wp_enqueue_scripts', [$this, 'enqueueStyles'] );
	}
	/**
	 * Register filters
	 *
	 * Uses the subscriber class to ensure only actions of this instance are added
	 * and the instance can be referenced via subscriber
	 *
	 * @since 1.0.0
	 * @see  https://developer.wordpress.org/reference/functions/add_filter/
	 */
	public function addFilters() {
		// $this->subscriber->addFilter( 'hook', [$this, 'function'], 10, 1 );
	}

	/**
	 * Register the javascript
	 *
	 * @since 1.0.0
	 */
	public function enqueueScripts() {
		/**
		 * Maybe use unminimized/mapped version if in development environment
		 */
		$prefix = $this->isDev() ? '' : '.min';

		wp_enqueue_script( __NAMESPACE__ . '\frontend', $this->url( 'assets/js/frontend' . $prefix . '.js' ), ['jquery'], VERSION, true );
	}

	/**
	 * Register the css
	 *
	 * @since 1.0.0
	 */
	public function enqueueStyles() {
		/**
		 * Maybe use unminimized/mapped version if in development environment
		 */
		$prefix = $this->isDev() ? '' : '.min';

		wp_enqueue_style( __NAMESPACE__ . '\frontend', $this->url( 'assets/css/frontend' . $prefix . '.css' ), [], VERSION, 'all' );
	}
}