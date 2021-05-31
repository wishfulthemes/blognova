<?php
/**
 * All template related hooks and functions.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function blognova_body_classes( $classes ) {

	// Adds `singular` to singular pages, and `hfeed` to all other pages.
	$classes[] = is_singular() ? 'singular' : 'hfeed';

	$classes[] = blognova_theme_mod( 'posts_listing_sidebar_layout' );

	return $classes;
}
add_filter( 'body_class', 'blognova_body_classes' );

function blognova_skip_to_content() {
	?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blognova' ); ?></a>
	<?php
}
add_action( 'wp_body_open', 'blognova_skip_to_content', 8 );

function blognova_header_template() {
	get_template_part( 'template-parts/header/header1' );
}
add_action( 'wp_body_open', 'blognova_header_template' );

function blognova_banner_slider_template() {
	get_template_part( 'template-parts/banner/banner1' );
}
add_action( 'blognova_hero_banner_slider', 'blognova_banner_slider_template' );


/**
 * Filters a menu item's starting output.
 *
 * Append the dropdown arrow to links with submenus.
 *
 * @param string  $item_output The menu item's starting HTML output.
 * @param WP_Post $item        Menu item data object.
 * @return string
 */
function blognova_add_submenu_custom_icon( $item_output, $item ) {
	$has_children = in_array( 'menu-item-has-children', $item->classes, true );
	if ( $has_children ) {
		$element  = '<span class="submenu-icon">';
		$element .= '<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" transform="rotate(90)"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>';
		$element .= '</span>';
		$element .= '<button class="submenu-icon submenu-icon-mobile">';
		$element .= '<svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 24 24" transform="rotate(90)"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>';
		$element .= '</button>';

		$item_output = str_replace(
			'</a>',
			'</a>' . $element,
			$item_output
		);
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'blognova_add_submenu_custom_icon', 10, 2 );
