<?php

/**
 * Theme single page and posts template.
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

	if ( blognova_theme_mod( 'display_in_frontpage' ) && is_front_page() ) {
		get_template_part( 'template-parts/hero-banner' );
	}

	get_template_part( 'template-parts/banner/inner-banner' );

	while ( have_posts() ) {
		the_post();

		?>
		<section class="main__cnt"  id="content">
			<div class="container">
				<div class="row">
					<div class="col">
						<h1>Required minor design fixes</h1>
						<?php
						get_template_part( 'template-parts/single/single1' );

						wp_link_pages();

						the_tags();

						blognova_get_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
		<?php
	}
	get_template_part( 'template-parts/single/related-posts' );

	?>

	<?php get_template_part( 'template-parts/section-subscribe' ); ?>
</main>
<?php

get_footer();
