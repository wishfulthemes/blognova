<?php
/**
 * Copyright text area.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$copyright = blognova_theme_mod( 'copyright_text' );

if ( ! $copyright ) {
	$defaults  = blognova_customizer_defaults();
	$copyright = ! empty( $defaults['copyright_text'] ) ? $defaults['copyright_text'] : '';
}

?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="site-footer__bottom flex">
				<?php
				if ( $copyright ) {
					?>
					<div class="copyright"><?php echo wp_kses_post( $copyright ); ?></div>
					<?php
				}

				if ( blognova_theme_mod( 'enable_footer_social_links' ) ) {
					get_template_part( 'template-parts/social-media' );
				}
				?>
			</div>
		</div>
	</div>
</div>
