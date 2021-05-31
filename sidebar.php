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
<div class="col-4">
	<aside class="sidebar">
		<h1>Required some styling for default WP widgets</h1>
		<?php dynamic_sidebar( 'blognova-sidebar' ); ?>
	</aside>
</div>
