<?php
/**
 * Sample Widget File
 *
 * @link    https://www.wpcodelabs.com
 * @since   1.0.0
 * @package plugin_scaffolding
 */

namespace wpcl\pluginscaffolding\widgets;

use \wpcl\pluginscaffolding\Widget;

class SampleWidget extends Widget {

	/**
	 * Root ID for all widgets of this type.
	 *
	 * @since 1.0.0
	 * @var mixed|string
	 */
	public $id_base = 'sample_widget_id';
	/**
	 * Name for this widget type.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $name = 'Sample Widget';

	/**
	 * Constructor, initialize the widget
	 * @param $id_base, $name, $widget_options, $control_options ( ALL optional )
	 * @since 1.0.0
	 */
	public function __construct() {
		/**
		 * Set options
		 */
		$this->widget_options = [
			'classname' => 'sample_widget_class',
			'description' => 'Sample Widget',
			'customize_selective_refresh' => false
		];
		parent::__construct();
	}
	/**
	 * Get fields for settings form
	 *
	 * Has to be ran late, because not all fields are available during widgets_init
	 *
	 * @return [type] [description]
	 */
	public function getFields() {
		return [
			'title' => [
				'type' => 'text',
				'label' => __( 'Title', 'plugin_scaffolding' ),
				'default' => '',
			],
			'my_textarea' => [
				'type' => 'textarea',
				'label' => __( 'Textarea', 'plugin_scaffolding' ),
				'default' => '',
			],
			'my_select' => [
				'type' => 'select',
				'label' => 'Select',
				'default' => '',
				'options' => [
					'' => __( 'Select Option', 'plugin_scaffolding' ),
					'1' => __( 'Option 1', 'plugin_scaffolding' ),
					'2' => __( 'Option 2', 'plugin_scaffolding' ),
				],
			],
			'my_checkbox' => [
				'type' => 'checkbox',
				'label' => 'Checkbox',
				'default' => false,
				'description' => __( 'This is a sample description', 'plugin_scaffolding' ),
			],
			'my_radio' => [
				'type' => 'radio',
				'label' => 'Radio',
				'default' => '1',
				'options' => [
					'1' => __( 'Option 1', 'plugin_scaffolding' ),
					'2' => __( 'Option 2', 'plugin_scaffolding' ),
				],
			],
		];
	}
	/**
	 * Output widget on the front end
	 * @param $args, $instance
	 * @since 1.0.0
	 */
	public function widget( $args, $instance ) {
		// Display before widget args
		echo $args['before_widget'];
		// Display Title
		if( !empty( $instance['title'] ) ) {
			$instance['title']  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
			// Again check if filters cleared name, in the case of 'dont show titles' filter or something
			$instance['title']  = ( !empty( $instance['title']  ) ) ? $args['before_title'] . $instance['title']  . $args['after_title'] : '';
			// Display Title
			echo $instance['title'];
		}

		/**
		 * DO WIDGETY STUFF
		 */
		echo '<ul>';
		foreach( $this->getFields() as $field => $field_args ) {
			if( isset( $instance[$field_args['id']] ) ) {
				printf( '<li><strong>%s:</strong> %s</li>', $field_args['id'], esc_attr( $instance[$field_args['id']] ) );
			}
		}
		echo '</ul>';

		echo $args['after_widget'];
	}

} // end class