<?php
/**
 * Customizer settings file.
 *
 * @package blognova
 */


/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'blognova_customizer_footer_settings' ) ) {

	function blognova_customizer_footer_settings( $wp_customize ) {

		$panel_id   = 'blognova_general_options';
		$section_id = 'blognova_general_options_footer';

		/**
		 * Create section.
		 */
		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Footer', 'blognova' ),
				'panel' => $panel_id,
			)
		);

		$booleans = array(
			'enable_footer_widgets'      => esc_html__( 'Enable Footer Widgets', 'blognova' ),
			'enable_footer_social_links' => esc_html__( 'Enable Social Links', 'blognova' ),
		);

		if ( is_array( $booleans ) && ! empty( $booleans ) ) {
			foreach ( $booleans as $key => $label ) {

				blognova_register_option(
					$wp_customize,
					array(
						'type'              => 'blognova-flat',
						'custom_control'    => 'Blognova_Toggle_One_Control',
						'name'              => $key,
						'sanitize_callback' => 'wp_validate_boolean',
						'label'             => $label,
						'section'           => $section_id,
					)
				);

			}
		}

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'textarea',
				'name'              => 'copyright_text',
				'sanitize_callback' => 'sanitize_textarea_field',
				'label'             => esc_html__( 'Copyright Text', 'blognova' ),
				'section'           => $section_id,
			)
		);

	}
	add_action( 'customize_register', 'blognova_customizer_footer_settings' );
}
