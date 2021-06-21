<?php
/**
 * Dynamic scripts and styles.
 *
 * @package blognova
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function blognova_load_dynamic_assets() {
	blognova_dynamic_styles();
	blognova_dynamic_scripts();
}
add_action( 'wp_enqueue_scripts', 'blognova_load_dynamic_assets', 50 );


function blognova_dynamic_styles() {
	ob_start();
	?>
	<style>

	</style>
	<?php
	$data = ob_get_clean();
	$data = str_replace( array( '<style>', '</style>' ), '', $data );

	wp_add_inline_style( BLOGNOVA_TEXTDOMAIN, $data );
}


function blognova_dynamic_scripts() {
	ob_start();
	?>
	<script>
		jQuery(function($) {
			<?php
			if ( blognova_theme_mod( 'enable_sticky_header' ) ) {
				?>
				$(window).scroll(function() {
					if ($(this).scrollTop() > 50) {
						$('.site-header').addClass('site-header--small');
					} else {
						$('.site-header').removeClass('site-header--small');
					}
				});
				<?php
			}
			?>
			$(document).ready(function() {
				var el = document.querySelector('html');
				$('.dark-theme').on('click', function() {
					el.setAttribute('data-theme', 'dark');
				});
				$('.light-theme').on('click', function() {
					el.setAttribute('data-theme', 'light');
				});
			});
		});
	</script>
	<?php
	$data = ob_get_clean();
	$data = str_replace( array( '<script>', '</script>' ), '', $data );
	wp_add_inline_script( BLOGNOVA_TEXTDOMAIN, $data );
}
