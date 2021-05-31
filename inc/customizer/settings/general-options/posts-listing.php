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

if ( ! function_exists( 'blognova_customizer_posts_listing_settings' ) ) {

	function blognova_customizer_posts_listing_settings( $wp_customize ) {

		$panel_id   = 'blognova_general_options';
		$section_id = 'blognova_general_options_posts_listing';

		$posts_listing_layouts = blognova_get_posts_listing_layouts();

		/**
		 * Create section.
		 */
		$wp_customize->add_section(
			$section_id,
			array(
				'title' => __( 'Posts Listing', 'blognova' ),
				'panel' => $panel_id,
			)
		);

		$booleans = array(
			'hide_posts_listing_category'    => esc_html__( 'Hide Category', 'blognova' ),
			'hide_posts_listing_read_time'   => esc_html__( 'Hide Read Time', 'blognova' ),
			'hide_posts_listing_post_date'   => esc_html__( 'Hide Post Date', 'blognova' ),
			'hide_posts_listing_post_author' => esc_html__( 'Hide Post Author', 'blognova' ),
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
				'type'              => 'select',
				'name'              => 'posts_listing_sidebar_layout',
				'sanitize_callback' => 'blognova_sanitize_select',
				'label'             => esc_html__( 'Sidebar Layout', 'blognova' ),
				'choices'           => blognova_get_sidebar_layouts(), // no-sidebar is default.
				'section'           => $section_id,
			)
		);

		blognova_register_option(
			$wp_customize,
			array(
				'type'              => 'blognova_slim_select',
				'custom_control'    => 'Blognova_Customizer_Slim_Select_Control',
				'name'              => 'posts_listing_categories',
				'description'       => esc_html__( 'If no categories are selected then the posts will be displayed from all the available categories.', 'blognova' ),
				'sanitize_callback' => 'blognova_sanitize_select',
				'label'             => esc_html__( 'Categories', 'blognova' ),
				'input_attrs'       => array(
					'multiple' => 1,
				),
				'choices'           => blognova_get_terms(),
				'section'           => $section_id,
			)
		);

		/**
		 * If we have more than one layout option then show the control.
		 */
		if ( is_array( $posts_listing_layouts ) && count( $posts_listing_layouts ) > 1 ) {
			blognova_register_option(
				$wp_customize,
				array(
					'type'              => 'select',
					'name'              => 'posts_listing_layout',
					'sanitize_callback' => 'blognova_sanitize_select',
					'label'             => esc_html__( 'Posts Listing Layout', 'blognova' ),
					'choices'           => $posts_listing_layouts,                             // layout-one is default.
					'section'           => $section_id,
				)
			);
		}

	}
	add_action( 'customize_register', 'blognova_customizer_posts_listing_settings' );
}
