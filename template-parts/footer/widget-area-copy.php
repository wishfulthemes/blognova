<?php
/**
 * Footer widget area.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$enable_footer_widgets = blognova_theme_mod( 'enable_footer_widgets' );

if ( ! $enable_footer_widgets ) {
	return;
}

?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>logo here</h1>
			<p class="paragraph-bold">
			Bold typography focused Ghost magazine and blog theme. It improves reading experience as well as overall functionality and aesthetics.
			</p>
		
		</div>
		<div class="col-md-4 offset-md-2 menu-block">
			<ul class="footer-menu-1 footer-menu">
				<li class="menu-item item-header">Features</li>
				<li class="menu-item"><a href="#" class="menu-link">Elements</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Tags</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Authors</a></li>
				<li class="menu-item"><a href="#" class="menu-link">404 page</a></li>
			</ul>
			<ul class="footer-menu-2 footer-menu">
				<li class="menu-item item-header">Memebers</li>
				<li class="menu-item"><a href="#" class="menu-link">Subscribe</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Log in</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Authors</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Contact</a></li>
			</ul>
				<ul class="footer-menu-3 footer-menu">
				<li class="menu-item item-header">Memebers</li>
				<li class="menu-item"><a href="#" class="menu-link">Subscribe</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Log in</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Authors</a></li>
				<li class="menu-item"><a href="#" class="menu-link">Contact</a></li>
			</ul>

		</div>
	</div>
</div>
