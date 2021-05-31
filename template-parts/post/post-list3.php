<?php
/**
 * Post Listing Layout 3.[Pro Version Only]
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article <?php post_class( 'post post--layout3' ); ?>>

	<?php blognova_the_post_thumbnail(); ?>

	<div class="post__cnt-box">
		<?php
		blognova_post_box_meta(
			blognova_theme_mod( 'hide_posts_listing_post_author' ),
			blognova_theme_mod( 'hide_posts_listing_read_time' ),
			blognova_theme_mod( 'hide_posts_listing_post_date' )
		);

		the_title(
			'<h2 class="post__cnt-box__title"><a href="' . esc_url( get_the_permalink() ) . '">',
			'</a></h2>'
		);

		blognova_post_box_bottom();
		?>
	</div>

</article>
