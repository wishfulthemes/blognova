<?php
/**
 * Footer template of this theme.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blognova_footer_classes   = array();
$blognova_footer_classes[] = 'site-footer';
$blognova_footer_classes[] = blognova_theme_mod( 'enable_footer_widgets' ) ? 'has-footer-widgets' : 'no-footer-widgets';
$blognova_footer_classes[] = blognova_has_social_links() && blognova_theme_mod( 'enable_footer_social_links' ) ? 'has-social-links' : 'no-social-links';

?>
		<footer class="<?php echo esc_attr( implode( ' ', $blognova_footer_classes ) ); ?>">
		<?php
		get_template_part( 'template-parts/footer/widget-area' );
		get_template_part( 'template-parts/footer/copyright' );
		?>
		</footer>

		<?php wp_footer(); ?>
	</body>

</html>
