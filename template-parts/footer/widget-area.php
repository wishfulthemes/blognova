<?php
/**
 * Footer widget area.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! blognova_has_footer_widgets() ) {
	return;
}

?>


<div class="container">
	<div class="row">
		<?php
		for ( $i = 0; $i < 5; $i++ ) {
			$index = $i ? "blognova-footer-widget-{$i}" : 'blognova-footer-widget';
			if ( is_active_sidebar( $index ) ) {
				dynamic_sidebar( $index );
			}
		}
		?>
	</div>
</div>
