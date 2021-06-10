<?php

/**
 * Related posts html.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! is_single() ) {
	return;
}

$blognova_related_posts_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'category__in'   => wp_get_post_categories(),
		'post__not_in'   => array( get_the_ID() ),
	)
);


if ( $blognova_related_posts_query->have_posts() ) {
	?>
	<div class="container">
			<div class="related-post__title">
						<h3><?php esc_html_e( 'Related post you might also like', 'blognova' ); ?></h3>
			</div>

		<div class="row">
				
					<?php
					while ( $blognova_related_posts_query->have_posts() ) {
						$blognova_related_posts_query->the_post();
						$blognova_related_posts_cats = get_categories();
						?>
						<div class="col-md-4">
						<div class="related-post__item">
							<article class="related-post__item__cnt">
								<a class="overlay-link" href="<?php the_permalink(); ?>"></a>
								<?php
								if ( is_array( $blognova_related_posts_cats ) && ! empty( $blognova_related_posts_cats ) ) {
									foreach ( $blognova_related_posts_cats as $key => $blognova_related_posts_cat ) {

										/**
										 * Do not display more than 1 categories.
										 */
										if ( $key > 0 ) {
											break;
										}

										$blognova_related_posts_cat_name = ! empty( $blognova_related_posts_cat ) && isset( $blognova_related_posts_cat->name ) ? $blognova_related_posts_cat->name : '';
										if ( ! $blognova_related_posts_cat_name ) {
											continue;
										}
										?>
										<div class="related-post__item__cnt__tag">
											<a href="<?php echo esc_url( get_category_link( $blognova_related_posts_cat ) ); ?>"><?php echo esc_html( $blognova_related_posts_cat_name ); ?></a>
										</div>
										<?php
									}
								}
								?>
								<?php
								the_title(
									'<div class="related-post__item__cnt__title"><a href="' . esc_url( get_the_permalink() ) . '">',
									'</a></div>'
								);
								?>
								<div class="related-post__item__cnt__time"><?php blognova_estimated_post_reading_time(); ?></div>
							</article>
						</div>
						</div>
						
						<?php
					}
					?>

				
			
		</div>
	</div>
	<?php
}

wp_reset_postdata();
