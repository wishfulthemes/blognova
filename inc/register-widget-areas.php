<?php
/**
 * Here are register our required widget areas for this theme.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'blognova_register_widget_areas' ) ) {

	/**
	 * Register the required sidebar or widget areas.
	 */
	function blognova_register_widget_areas() {

		/**
		 * Main sidebar.
		 */
		register_sidebar(
			array(
				'id'            => 'blognova-sidebar',
				'name'          => esc_html__( 'Blognova Sidebar', 'blognova' ),
				'description'   => esc_html__( 'Widget area for theme main sidebar. It is located at homepage post listings section, pages, posts, blogs and archives.', 'blognova' ),
				'before_widget' => '<div id="%1$s" class="sidebar__box sidebar__box--bg %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<header class="sidebar__box__header sidebar__box__header--border"><h5>',
				'after_title'   => '</h5></header>',
			)
		);

		$description = esc_html__( 'Widgets to display in theme footer.', 'blognova' );

		if ( ! blognova_theme_mod( 'enable_footer_widgets' ) ) {
			$description = esc_html__( 'You have disabled the footer widget areas. To enable it, go to Customizer > General Options > Footer', 'blognova' );
		}

		register_sidebars(
			4,
			array(
				'id'            => 'blognova-footer-widget',
				'name'          => esc_html__( 'Footer Widget', 'blognova' ) . esc_html( ' %d' ),
				'description'   => $description,
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h2 class="title">',
				'after_title'   => '</h2></div>',
			)
		);

	}
	add_action( 'widgets_init', 'blognova_register_widget_areas' );
}
