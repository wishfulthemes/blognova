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

if ( ! function_exists( 'blognova_customizer_social_links_settings' ) ) {

	function blognova_customizer_social_links_settings( $wp_customize ) {

		$panel_id   = 'blognova_general_options';
		$section_id = 'blognova_general_options_social_links';

		/**
		 * Create section.
		 */
		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Social Links', 'blognova' ),
				'panel' => $panel_id,
			)
		);

		$social_links = blognova_get_social_links();

		if ( is_array( $social_links ) && ! empty( $social_links ) ) {
			foreach ( $social_links as $key => $label ) {

				blognova_register_option(
					$wp_customize,
					array(
						'type'              => 'url',
						'name'              => $key,
						'sanitize_callback' => 'esc_url_raw',
						'label'             => $label,
						'section'           => $section_id,
					)
				);

			}
		}

	}
	add_action( 'customize_register', 'blognova_customizer_social_links_settings' );
}
