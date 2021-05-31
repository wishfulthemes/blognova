<?php
/**
 * Main template file for search.
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

	if ( have_posts() ) {
		?>
		<section class="main__cnt"  id="content">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/post/post-list' );
						}
						the_posts_pagination();
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	?>

	<?php get_template_part( 'template-parts/section-subscribe' ); ?>
</main>
<?php

get_footer();
