<?php
/**
 * Hero banner main file.
 *
 * @package blognova
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! blognova_theme_mod( 'enable_banner_slider' ) ) {
	return;
}

do_action( 'blognova_hero_banner_slider' );

