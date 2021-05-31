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

$enable_footer_widgets = blognova_theme_mod( 'enable_footer_widgets' );

if ( ! $enable_footer_widgets ) {
	return;
}

?>


<div class="container">
	<div class="row">
		<div class="col flex">
			<h1>We need to re-write html for footer widgets</h1>
		</div>
	</div>
</div>
