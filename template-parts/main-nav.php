<nav class="main-nav main-nav--bg">
	<div class="container">
		<div class="row">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&times;</button>

			<?php
			wp_nav_menu(
				array(
					'container'       => 'div',
					'container_class' => 'col',
					'container_id'    => 'site-navigation',
					'fallback_cb'     => 'blognova_nav_menu_fallback',
					'theme_location'  => 'primary-menu',
				)
			);
			?>

		<?php if ( blognova_theme_mod( 'enable_header_search' ) ) { ?>
			<div class="col-1 text-right">
				<div class="link-item link-item--search">
					<a href="#" data-toggle="modal" data-target="#exampleModal">
						<svg id="i-search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path></svg>
					</a>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
</nav>
