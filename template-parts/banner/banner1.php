<?php
/**
 * Banner slider layout one.
 *
 * @package blognova
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blognova_banner_slider_cats = (array) blognova_theme_mod( 'banner_slider_categories' );

// Filter out the empty value.
$blognova_banner_slider_cats = array_filter( $blognova_banner_slider_cats );

// Start index from 0.
$blognova_banner_slider_cats = array_values( $blognova_banner_slider_cats );

/**
 * Bail, if user has not selected any categories.
 */
if ( ! $blognova_banner_slider_cats ) {
	return;
}

$args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => blognova_theme_mod( 'banner_slider_total_posts' ),
	'category_name'  => implode( ',', $blognova_banner_slider_cats ),
);

$the_query = new WP_Query( $args );

?>
<section class="main__banner">
	<div class="main__banner__hero carousel slide" id="mainHeroBanner" data-ride="carousel">
		<div class="carousel-inner">

			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$active = 0 === $the_query->current_post ? ' active' : null;

				?>
				<div class="carousel-item <?php echo esc_attr( $active ); ?>">
					<article class="post post--large">
						<?php blognova_the_post_thumbnail( 'full' ); ?>
						<div class="post__cnt-box">

							<?php
							blognova_post_box_meta(
								blognova_theme_mod( 'hide_banner_slider_post_author' ),
								blognova_theme_mod( 'hide_banner_slider_read_time' ),
								blognova_theme_mod( 'hide_banner_slider_post_date' )
							);

							the_title(
								'<h2 class="post__cnt-box__title"><a href="' . esc_url( get_the_permalink() ) . '">',
								'</a></h2>'
							);

							blognova_post_box_bottom( blognova_theme_mod( 'hide_banner_slider_category' ) );
							?>
						</div>
					</article>
				</div>
				<?php
			}
			?>

		</div>
		<a class="slide-btn slide-btn--prev" href="#mainHeroBanner" role="button" data-slide="prev">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
				<path fill-rule="evenodd" d="M15.28 5.22a.75.75 0 00-1.06 0l-6.25 6.25a.75.75 0 000 1.06l6.25 6.25a.75.75 0 101.06-1.06L9.56 12l5.72-5.72a.75.75 0 000-1.06z"></path>
			</svg>
		</a>
		<a class="slide-btn slide-btn--next" href="#mainHeroBanner" role="button" data-slide="next">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
				<path fill-rule="evenodd" d="M8.72 18.78a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06L9.78 5.22a.75.75 0 00-1.06 1.06L14.44 12l-5.72 5.72a.75.75 0 000 1.06z"></path>
			</svg>
		</a>
	</div>
</section>
<?php
wp_reset_postdata();
