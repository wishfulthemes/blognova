<?php
/**
 * Site Layout header one
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<!-- #site-header -->
<header role="site-header" class="site-header site-header--bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="site-header__wrap flex">

					<?php blognova_site_identity(); ?>

					<div class="site-header__wrap__right flex">

						<button title="<?php esc_attr_e( 'Menu toggle button', 'blognova' ); ?>" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&times;</button>

						<?php
						wp_nav_menu(
							array(
								'container'       => 'nav',
								'container_id'    => 'site-navigation',
								'container_class' => 'main-nav',
								'fallback_cb'     => 'blognova_nav_menu_fallback',
								'theme_location'  => 'primary-menu',
								'menu_class'			=> 'top-level-menu',
								'add_li_class'		=> 'top-menu-item'
							)
						);
						?>

						<?php if ( blognova_theme_mod( 'header_cta_one_label' ) ) { ?>
							<div class="link-item link-item--login">
								<a href="<?php echo esc_url( blognova_theme_mod( 'header_cta_one_link' ) ); ?>" class="btn-login"><?php echo esc_html( blognova_theme_mod( 'header_cta_one_label' ) ); ?></a>
							</div>
						<?php } ?>

						<?php if ( blognova_theme_mod( 'header_cta_two_label' ) ) { ?>
							<div class="link-item link-item--subscribe">
								<a href="<?php echo esc_url( blognova_theme_mod( 'header_cta_two_link' ) ); ?>" class="btn-primary"><?php echo esc_html( blognova_theme_mod( 'header_cta_two_label' ) ); ?></a>
							</div>
						<?php } ?>

						<?php if ( blognova_theme_mod( 'enable_header_search' ) ) { ?>
							<div class="link-item link-item--search">
								<a href="#">
									<svg id="i-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path>
									</svg>
								</a>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- #end site-header -->
