<?php
/**
 * Helpers html tag function for template files.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function blognova_site_identity() {     ?>
	<div class="site-header__wrap__left">
		<?php the_custom_logo(); ?>
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
				<?php bloginfo(); ?>
			</a>
		</h1>
		<?php
		echo get_bloginfo( 'description' ) ? wp_kses_post( '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>' ) : null;
		?>
		</a>
	</div>
	<?php
}

function blognova_the_post_thumbnail( $size = 'post-thumbnail' ) {
	?>
	<a href="<?php the_permalink(); ?>" tabindex="-1" class="post__img loading-bg">
		<?php the_post_thumbnail( $size ); ?>
	</a>
	<?php
}

function blognova_post_box_meta( $hide_author = false, $hide_read_time = false, $hide_date = false, $wrapper_class = 'post__cnt-box__meta flex' ) {
	$banner_slider_date = get_the_date();
	?>

	<ul class="<?php echo esc_attr( $wrapper_class ); ?>">

		<?php if ( ! $hide_author ) : ?>
			<li class="flex">
				<a href="#" class="post-author">
					<div class="post-author__tooltip">Avatar</div>
					<div class="post-author__img loading-bg"><img src="https://api.adorable.io/avatars/155/abott@adorable.png" alt=""></div>
				</a>
				<a href="#" class="post-author">
					<div class="post-author__tooltip">Avatar</div>
					<div class="post-author__img loading-bg"><img src="https://api.adorable.io/avatars/155/abott@adorable.png" alt=""></div>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( ! $hide_read_time ) : ?>
			<li><?php blognova_estimated_post_reading_time(); ?></li>
		<?php endif; ?>

		<?php if ( $banner_slider_date && ! $hide_date ) { ?>
			<li><?php echo esc_html( $banner_slider_date ); ?></li>
		<?php } ?>

		<li><?php esc_html_e( 'Free', 'blognova' ); ?></li>
	</ul>

	<?php
}

function blognova_post_box_bottom( $hide_category = false, $wrapper_class = 'post__cnt-box__bottom flex', $post_id = 0 ) {
	?>
	<div class="<?php echo esc_attr( $wrapper_class ); ?>">
		<?php if ( is_sticky( $post_id ) ) : ?>
			<div class="featured-label"><?php esc_html_e( 'Featured', 'blognova' ); ?></div>
		<?php endif; ?>

		<?php
		if ( ! $hide_category ) {
			$banner_slider_cats = get_categories();
			if ( is_array( $banner_slider_cats ) && ! empty( $banner_slider_cats ) ) {
				?>
				<div class="tag-wrap">
					<?php
					foreach ( $banner_slider_cats as $key => $banner_slider_cat ) {

						/**
						 * Do not display more than two categories.
						 */
						if ( $key > 1 ) {
							break;
						}

						$banner_slider_cat_name = ! empty( $banner_slider_cat ) && isset( $banner_slider_cat->name ) ? $banner_slider_cat->name : '';
						if ( ! $banner_slider_cat_name ) {
							continue;
						}
						?>
						<a href="<?php echo esc_url( get_category_link( $banner_slider_cat ) ); ?>"><?php echo esc_html( $banner_slider_cat_name ); ?></a>
						<?php
					}
					?>
				</div>
				<?php
			}
		}
		?>
	</div>

	<?php
}


function blognova_get_post_navigation() {
	$current_id = get_the_ID();

	$next_post = get_next_post();
	$prev_post = get_previous_post();

	?>

	<div class="prev-next-wrap flex">

		<?php if ( $prev_post && $current_id !== $prev_post->ID ) { ?>
			<div class="post-wrap prev-post">
				<a href="<?php echo esc_url( get_the_permalink( $prev_post ) ); ?>">
					<div class="post-img-wrap loading-bg">
						<img src="<?php echo esc_url( get_the_post_thumbnail( $prev_post ) ); ?>">
					</div>
					<div class="content-box">
						<div class="content-top"><?php esc_html_e( 'Older post', 'blognova' ); ?></div>
						<h4 class="title"><span><?php echo esc_html( get_the_title( $prev_post ) ); ?></span></h4>
					</div>
				</a>
			</div>
		<?php } ?>

		<?php if ( $next_post && $current_id !== $next_post->ID ) { ?>
			<div class="post-wrap next-post">
				<a href="<?php echo esc_url( get_the_permalink( $next_post ) ); ?>">
					<div class="post-img-wrap loading-bg">
						<img src="<?php echo esc_url( get_the_post_thumbnail( $next_post ) ); ?>">
					</div>
					<div class="content-box">
						<div class="content-top"><?php esc_html_e( 'Newer post', 'blognova' ); ?></div>
						<h4 class="title"><span><?php echo esc_html( get_the_title( $next_post ) ); ?></span></h4>
					</div>
				</a>
			</div>
		<?php } ?>

	</div>

	<?php
}
