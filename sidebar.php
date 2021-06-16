<?php
/**
 * Sidebar template file
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_dynamic_sidebar( 'blognova-sidebar' ) ) {
	return;
}

if ( is_home() && 'no-sidebar' === blognova_theme_mod( 'posts_listing_sidebar_layout' ) ) {
	return;
}

?>
<div class="sidebar-container">
	<aside class="sidebar">
		<?php dynamic_sidebar( 'blognova-sidebar' ); ?>
	</aside>
</div>
