<?php
/**
 * Post listings.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<article <?php post_class( 'post' ); ?>>

	<?php blognova_the_post_thumbnail(); ?>

	<div class="post__cnt-box post-normal">
		<div class="post__container">
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
		
	</div>

</article>
