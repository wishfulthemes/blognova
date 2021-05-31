<?php
/**
 * Main template file for this theme.
 * It handles the frontpage and homepage and can also works as
 * the fallback for other templates.
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
	<?php

	get_template_part( 'template-parts/hero-banner' );

	$blognova_posts_listing_cats = (array) blognova_theme_mod( 'posts_listing_categories' );

	// Filter out the empty value.
	$blognova_posts_listing_cats = array_filter( $blognova_posts_listing_cats );

	// Start index from 0.
	$blognova_posts_listing_cats = array_values( $blognova_posts_listing_cats );

	$args = array(
		'post_type'   => 'post',
		'post_status' => 'publish',
	);

	if ( $blognova_posts_listing_cats ) {
		$args['category_name'] = implode( ',', $blognova_posts_listing_cats );
	}

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		?>
		<section class="main__cnt"  id="content">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							get_template_part( 'template-parts/post/post-list' );
						}
						?>
					</div>
					<?php
					if ( 'no-sidebar' !== blognova_theme_mod( 'posts_listing_sidebar_layout' ) ) {
						get_sidebar();
					}
					?>
				</div>
			</div>
		</section>
		<?php
	}

	wp_reset_postdata();

	?>

	<?php get_template_part( 'template-parts/section-subscribe' ); ?>
</main>
<?php

get_template_part( 'template-parts/search' );

get_footer();
