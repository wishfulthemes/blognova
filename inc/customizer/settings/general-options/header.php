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

if ( ! function_exists( 'blognova_customizer_header_settings' ) ) {

	function blognova_customizer_header_settings( $wp_customize ) {

		$panel_id   = 'blognova_general_options';
		$section_id = 'blognova_general_options_header';

		$header_layouts = blognova_get_header_layouts();

		/**
		 * Create section.
		 */
		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Header', 'blognova' ),
				'panel' => $panel_id,
			)
		);

		/**
		 * If we have more than one layout option then show the control.
		 */
		if ( is_array( $header_layouts ) && count( $header_layouts ) > 1 ) {
			blognova_register_option(
				$wp_customize,
				array(
					'type'              => 'select',
					'name'              => 'header_layout',
					'sanitize_callback' => 'blognova_sanitize_select',
					'label'             => esc_html__( 'Header Layout', 'blognova' ),
					'choices'           => $header_layouts, // layout-one is default.
					'section'           => $section_id,
				)
			);
		}

		$booleans = array(
			'enable_sticky_header' => esc_html__( 'Enable Sticky Header', 'blognova' ),
			'enable_header_search' => esc_html__( 'Enable Search', 'blognova' ),
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
						'choices'           => $header_layouts, // layout-one is default.
						'section'           => $section_id,
					)
				);

			}
		}

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => 'header_cta_one_label',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Call To Action One Label', 'blognova' ),
				'section'           => $section_id,
				'active_callback'   => 'blognova_customizer_enable_header_cta',
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => 'header_cta_one_link',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'Call To Action One Link', 'blognova' ),
				'section'           => $section_id,
				'active_callback'   => 'blognova_customizer_enable_header_cta',
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => 'header_cta_two_label',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Call To Action Two Label', 'blognova' ),
				'section'           => $section_id,
				'active_callback'   => 'blognova_customizer_enable_header_cta',
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => 'header_cta_two_link',
				'sanitize_callback' => 'esc_url_raw',
				'label'             => esc_html__( 'Call To Action Two Link', 'blognova' ),
				'section'           => $section_id,
				'active_callback'   => 'blognova_customizer_enable_header_cta',
			)
		);

	}
	add_action( 'customize_register', 'blognova_customizer_header_settings' );
}
