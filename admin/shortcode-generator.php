<?php


/**
 * Class Give_Shortcode_Display_Donors
 */
class Give_Shortcode_Display_Donors extends Give_Shortcode_Generator {

	/**
	 * Class constructor
	 */
	public function __construct() {

		$this->shortcode['title'] = esc_html__( 'Display Donors', 'give' );
		$this->shortcode['label'] = esc_html__( 'Display Donors', 'give' );

		parent::__construct( 'display_donors' );
	}

	/**
	 * Define the shortcode attribute fields
	 *
	 * @return array
	 */
	public function define_fields() {

		return array(
			array(
				'type' => 'container',
				'html' => sprintf( '<p class="strong margin-top">%s</p>', esc_html__( 'Optional settings', 'give' ) ),
			),
			array(
				'type'    => 'textbox',
				'name'    => 'forms',
				'label'   => esc_attr__( 'Form IDs:', 'give' ),
				'tooltip' => esc_attr__( 'Add comma separated form IDs.', 'give' ),
			),
			array(
				'type'    => 'listbox',
				'name'    => 'anonymous',
				'label'   => esc_attr__( 'Anonymous donors:', 'give' ),
				'tooltip' => esc_attr__( 'Show anonymous donors with name as [Anonymous] name', 'give' ),
				'options' => array(
					'true'  => esc_html__( 'True', 'give' ),
					'false' => esc_html__( 'False', 'give' ),
				),
			),
			array(
				'type'    => 'listbox',
				'name'    => 'layout',
				'label'   => esc_attr__( 'Layout:', 'give' ),
				'tooltip' => esc_attr__( 'Layout', 'give' ),
				'options' => array(
					'grid'  => esc_html__( 'Grid', 'give' ),
					'thumbnail' => esc_html__( 'Thumbnail', 'give' ),
				),
			),
		);
	}
}

new Give_Shortcode_Display_Donors();
