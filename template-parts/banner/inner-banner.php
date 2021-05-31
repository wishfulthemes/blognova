<?php

/**
 * Inner pages header banner.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$thumb_url = get_the_post_thumbnail_url( null, 'full' );
if ( is_singular() ) {
	$thumbnail_url = $thumb_url ? $thumb_url : get_header_image();
} else {
	$thumbnail_url = has_header_image() ? get_header_image() : $thumb_url;
}
?>
<section class="main__banner main__banner--inner">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="main__banner__hero">
					<div class="main__banner__hero__img">
						<img src="<?php echo esc_url( $thumbnail_url ); ?>">
					</div>
					<div class="main__banner__hero__cnt">
						<?php if ( ! is_front_page() ) { ?>
							<h2><?php wp_title( ' ' ); ?></h2>
						<?php } else { ?>
							<h2><?php esc_html_e( 'Home', 'blognova' ); ?></h2>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
