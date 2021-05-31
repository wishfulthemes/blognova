<?php
/**
 * 404 page template.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="main">

	<section class="main__cnt" id="content">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="error">
						<div class="error__title"><?php esc_html_e( '404', 'blognova' ); ?></div>
						<div class="error__sub-title"><?php esc_html_e( 'Page Not Found', 'blognova' ); ?></div>
						<p><?php esc_html_e( 'Maybe the URL is incorrect, or the page no longer exist.', 'blognova' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return to home page', 'blognova' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>
<?php
get_footer();
