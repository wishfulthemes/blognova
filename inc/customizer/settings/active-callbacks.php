<?php
/**
 * Active callback function.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function blognova_customizer_is_banner_slider_active( $control ) {
	$setting = $control->manager->get_setting( 'blognova_theme_mod[enable_banner_slider]' )->value();
	return $setting;
}

function blognova_customizer_enable_header_cta( $control ) {
	$setting = $control->manager->get_setting( 'blognova_theme_mod[header_layout]' );
	$value   = $setting && null !== $setting ? $setting->value() : 'layout-one';
	return 'layout-one' === $value; // If header layout one is selected, display.
}
