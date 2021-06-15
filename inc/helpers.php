<?php
/**
 * Helpers functions.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Credit: @link https://gist.github.com/mynameispj/3170442
 */
function blognova_estimated_post_reading_time( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	$avg_wpm = 200;
	$content = get_the_content( null, false, $post_id );
	$word    = str_word_count( wp_strip_all_tags( $content ) );
	$m       = floor( $word / $avg_wpm );
	$s       = floor( $word % $avg_wpm / ( $avg_wpm / 60 ) );
	$est     = $m ? $m . ' ' . esc_html__( 'min read', 'blognova' ) : $s . ' ' . esc_html__( 'sec read', 'blognova' );

	echo esc_html( $est );

}



if ( ! function_exists( 'blognova_nav_menu_fallback' ) ) {
	/**
	 * Fallback for wp_nav_menu
	 *
	 * @since 1.0.0
	 */
	function blognova_nav_menu_fallback() {
		?>
		<ul class="menu">
			<?php
			if ( current_user_can( 'edit_theme_options' ) ) {
				?>
				<li class="menu-item"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add Menu', 'blognova' ); ?></a></li>
				<?php
			}
			?>
		</ul>
		<?php
	}
}


function blognova_get_header_layouts() {
	return apply_filters(
		'blognova_header_layouts',
		array(
			'layout-one' => esc_html__( 'Layout One', 'blognova' ),
		)
	);
}

function blognova_get_banner_layouts() {
	return apply_filters(
		'blognova_banner_layouts',
		array(
			'layout-one' => esc_html__( 'Layout One', 'blognova' ),
		)
	);
}

function blognova_get_posts_listing_layouts() {
	return apply_filters(
		'blognova_posts_listing_layouts',
		array(
			'layout-one' => esc_html__( 'Layout One', 'blognova' ),
		)
	);
}

function blognova_get_sidebar_layouts() {
	return apply_filters(
		'blognova_sidebar_layouts',
		array(
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blognova' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blognova' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blognova' ),
		)
	);
}

function blognova_get_sidebar_types() {
	return apply_filters(
		'blognova_sidebar_types',
		array(
			'sidebar-one' => esc_html__( 'Sidebar One', 'blognova' ),
			'sidebar-two' => esc_html__( 'Sidebar Two', 'blognova' ),
		)
	);
}

function blognova_get_social_links() {
	return apply_filters(
		'blognova_social_links',
		array(
			'facebook' => esc_html__( 'Facebook', 'blognova' ),
			'twitter'  => esc_html__( 'Twitter', 'blognova' ),
			'github'   => esc_html__( 'Github', 'blognova' ),
			'youtube'  => esc_html__( 'Youtube', 'blognova' ),
			'behance'  => esc_html__( 'Behance', 'blognova' ),
			'dribbble' => esc_html__( 'Dribbble', 'blognova' ),
		)
	);
}

function blognova_has_footer_widgets() {

	$show = false;

	$enable_footer_widgets = blognova_theme_mod( 'enable_footer_widgets' );

	if ( ! $enable_footer_widgets ) {
		return $show;
	}

	for ( $i = 0; $i < 5; $i++ ) {
		$index = $i ? "blognova-footer-widget-{$i}" : 'blognova-footer-widget';
		if ( is_active_sidebar( $index ) ) {
			$show = true;
		}
	}

	return $show;

}

function blognova_has_social_links() {

	$display_social_links = false;
	$social_links         = blognova_get_social_links();
	$social_links         = array_keys( $social_links );
	$blognova_theme_mod   = get_theme_mod( 'blognova_theme_mod' );

	if ( is_array( $social_links ) && ! empty( $social_links ) ) {
		foreach ( $social_links as $social_link ) {
			if ( ! empty( $blognova_theme_mod[ $social_link ] ) ) {
				$display_social_links = true;
			}
		}
	}

	return $display_social_links;
}

/**
 * This function returns the formated array of terms
 * for the given taxonomy name.
 *
 * @param string $tax_name Taxonomy name. Default is "category".
 * @param string $key Whether set array key by term slug [term_slug] or by term id [term_id]
 * @param bool   $hide_empty Takes boolean value, pass true if you want to hide empty terms.
 * @return array $items Formated array for the dropdown options for the customizer.
 */
function blognova_get_terms( $tax_name = 'category', $key = 'term_slug', $hide_empty = true ) {

	if ( empty( $tax_name ) ) {
		return;
	}

	$items = array();
	$terms = get_terms(
		array(
			'taxonomy'   => $tax_name,
			'hide_empty' => $hide_empty,
		)
	);

	if ( ! is_wp_error( $terms ) && is_array( $terms ) && count( $terms ) > 0 ) {
		$items[''] = __( '-- Select --', 'blognova' );
		foreach ( $terms as $term ) {
			$term_name = ! empty( $term->name ) ? $term->name : false;
			if ( 'term_slug' !== $key ) {
				$array_key = ! empty( $term->term_id ) ? $term->term_id : '';
			} else {
				$array_key = ! empty( $term->slug ) ? $term->slug : '';
			}
			if ( $term_name ) {
				$items[ $array_key ] = $term_name;
			}
		}
	}

	return $items;
}
