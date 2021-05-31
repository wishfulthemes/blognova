<?php
/**
 * Initialize the customizer.
 *
 * @package blognova
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Set default values for the customizer settings.
 */
function blognova_customizer_defaults() {
	$defaults = array(
		'header_layout'                => 'layout-one',
		'banner_slider_layout'         => 'layout-one',
		'enable_banner_slider'         => false,
		'posts_listing_sidebar_layout' => 'no-sidebar',
		'enable_footer_widgets'        => true,
		'enable_footer_social_links'   => false,
		'copyright_text'               => __( 'Copyright © 2020 | Blognova by', 'blognova' ) . ' <a href="' . esc_url( 'https://wishfulthemes.com/' ) . '">Wishful Themes</a> | ' . __( 'Powered by', 'blognova' ) . ' <a href="' . esc_url( 'https://wordpress.org/' ) . '">WordPress</a>',

	);
	return apply_filters( 'blognova_customizer_defaults', $defaults );
}

/**
 * Returns customizer settings.
 *
 * @uses get_theme_mod
 */
function blognova_theme_mod( $key ) {

	$mods = get_theme_mod( 'blognova_theme_mod' );

	$defaults = blognova_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return isset( $mods[ $key ] ) ? $mods[ $key ] : $default;

}

/**
 * Function to register control and setting. To set defaults, @see `blognova_customizer_defaults();`
 *
 * @uses blognova_customizer_defaults();
 */
function blognova_register_option( $wp_customize, $option ) {

	$key = $option['name'];

	$defaults = blognova_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : null;

	$name = "blognova_theme_mod[{$key}]";

	// Initialize Setting.
	$wp_customize->add_setting(
		$name,
		array(
			'sanitize_callback' => $option['sanitize_callback'],
			'default'           => $default,
			'transport'         => isset( $option['transport'] ) ? $option['transport'] : 'refresh',
			'theme_supports'    => isset( $option['theme_supports'] ) ? $option['theme_supports'] : '',
		)
	);

	$control = array(
		'label'    => $option['label'],
		'section'  => $option['section'],
		'settings' => $name,
	);

	if ( isset( $option['active_callback'] ) ) {
		$control['active_callback'] = $option['active_callback'];
	}

	if ( isset( $option['priority'] ) ) {
		$control['priority'] = $option['priority'];
	}

	if ( isset( $option['choices'] ) ) {
		$control['choices'] = $option['choices'];
	}

	if ( isset( $option['type'] ) ) {
		$control['type'] = $option['type'];
	}

	if ( isset( $option['input_attrs'] ) ) {
		$control['input_attrs'] = $option['input_attrs'];
	}

	if ( isset( $option['description'] ) ) {
		$control['description'] = $option['description'];
	}

	if ( isset( $option['mime_type'] ) ) {
		$control['mime_type'] = $option['mime_type'];
	}

	if ( ! empty( $option['custom_control'] ) ) {
		$wp_customize->add_control( new $option['custom_control']( $wp_customize, $name, $control ) );
	} else {
		$wp_customize->add_control( $name, $control );
	}
}

require_once BLOGNOVA_PATH . '/inc/customizer/settings/sanitize-callbacks.php';
require_once BLOGNOVA_PATH . '/inc/customizer/settings/active-callbacks.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blognova_customize_register( $wp_customize ) {

	require_once BLOGNOVA_PATH . '/inc/customizer/controls/select/slim-select/class-blognova-customizer-slim-select-control.php';
	require_once BLOGNOVA_PATH . '/inc/customizer/controls/sortable/sortable-one/class-sortable-one-control.php';
	require_once BLOGNOVA_PATH . '/inc/customizer/controls/toggle/toggle-one/class-toggle-one-control.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blognova_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blognova_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Create panel.
	 */
	$wp_customize->add_panel(
		'blognova_general_options',
		array(
			'title'       => esc_html__( 'General Options', 'blognova' ),
			'description' => '<p>' . esc_html__( 'General options for customizing overall theme appearances.', 'blognova' ) . '</p>',
			'priority'    => 30,
		)
	);

}
add_action( 'customize_register', 'blognova_customize_register' );

require_once BLOGNOVA_PATH . '/inc/customizer/settings/general-options/header.php';
require_once BLOGNOVA_PATH . '/inc/customizer/settings/general-options/social-links.php';
require_once BLOGNOVA_PATH . '/inc/customizer/settings/general-options/banner-slider.php';
require_once BLOGNOVA_PATH . '/inc/customizer/settings/general-options/posts-listing.php';
require_once BLOGNOVA_PATH . '/inc/customizer/settings/general-options/footer.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blognova_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blognova_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blognova_customize_preview_js() {
	wp_enqueue_script( 'blognova-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BLOGNOVA_VERSION, true );
}
add_action( 'customize_preview_init', 'blognova_customize_preview_js' );

