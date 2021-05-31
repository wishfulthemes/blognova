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

if ( ! function_exists( 'blognova_customizer_banner_slider_settings' ) ) {

	function blognova_customizer_banner_slider_settings( $wp_customize ) {

		$panel_id   = 'blognova_general_options';
		$section_id = 'blognova_general_options_banner_slider';

		$banner_layouts = blognova_get_banner_layouts();

		/**
		 * Create section.
		 */
		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Banner Slider', 'blognova' ),
				'panel' => $panel_id,
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'blognova-flat',
				'custom_control'    => 'Blognova_Toggle_One_Control',
				'name'              => 'enable_banner_slider',
				'sanitize_callback' => 'wp_validate_boolean',
				'label'             => esc_html__( 'Enable Banner Slider', 'blognova' ),
				'section'           => $section_id,
			)
		);

		/**
		 * If we have more than one layout option then show the control.
		 */
		if ( is_array( $banner_layouts ) && count( $banner_layouts ) > 1 ) {
			blognova_register_option(
				$wp_customize,
				array(
					'type'              => 'select',
					'name'              => 'banner_slider_layout',
					'sanitize_callback' => 'blognova_sanitize_select',
					'label'             => esc_html__( 'Banner Slider Layout', 'blognova' ),
					'choices'           => $banner_layouts,                             // layout-one is default.
					'section'           => $section_id,
					'active_callback'   => 'blognova_customizer_is_banner_slider_active',
				)
			);
		}

		$booleans = array(
			'hide_banner_slider_category'    => esc_html__( 'Hide Category', 'blognova' ),
			'hide_banner_slider_read_time'   => esc_html__( 'Hide Read Time', 'blognova' ),
			'hide_banner_slider_post_date'   => esc_html__( 'Hide Post Date', 'blognova' ),
			'hide_banner_slider_post_author' => esc_html__( 'Hide Post Author', 'blognova' ),
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
						'active_callback'   => 'blognova_customizer_is_banner_slider_active',
						'label'             => $label,
						'section'           => $section_id,
					)
				);

			}
		}

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'blognova-flat',
				'custom_control'    => 'Blognova_Toggle_One_Control',
				'name'              => 'display_in_frontpage',
				'sanitize_callback' => 'wp_validate_boolean',
				'active_callback'   => 'blognova_customizer_is_banner_slider_active',
				'label'             => esc_html__( 'Display In Frontpage', 'blognova' ),
				'description'       => esc_html__( 'If toggled on, you can display banner slider in your static frontpage.', 'blognova' ),
				'section'           => $section_id,
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'blognova_slim_select',
				'custom_control'    => 'Blognova_Customizer_Slim_Select_Control',
				'name'              => 'banner_slider_categories',
				'sanitize_callback' => 'blognova_sanitize_select',
				'active_callback'   => 'blognova_customizer_is_banner_slider_active',
				'label'             => esc_html__( 'Categories', 'blognova' ),
				'input_attrs'       => array(
					'multiple' => 1,
				),
				'choices'           => blognova_get_terms(),
				'section'           => $section_id,
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'number',
				'name'              => 'banner_slider_total_posts',
				'sanitize_callback' => 'absint',
				'active_callback'   => 'blognova_customizer_is_banner_slider_active',
				'label'             => esc_html__( 'Total Posts', 'blognova' ),
				'input_attrs'       => array(
					'min' => 1,
				),
				'section'           => $section_id,
			)
		);

	}
	add_action( 'customize_register', 'blognova_customizer_banner_slider_settings' );
}
