<?php
/**
 * Main class file.
 *
 * @package blognova
 */

if ( ! class_exists( 'Blognova' ) ) {

	/**
	 * Main class for blognova theme.
	 */
	class Blognova {

		/**
		 * The unique instance of the plugin.
		 *
		 * @var Blognova
		 */
		private static $instance;

		/**
		 * Gets an instance of our theme.
		 *
		 * @return Blognova
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();

				/**
				 * Blognova loaded.
				 *
				 * Fires when blognova is fully loaded.
				 *
				 * @since 1.0.0
				 */
				do_action( 'blognova_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		private function __construct() {
			$this->define_constants();
			$this->includes();
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Returns an array of theme data.
		 *
		 * @uses wp_get_theme
		 */
		public function get_theme_data() {
			$data = wp_get_theme( 'blognova' );

			$theme_data = array();

			$theme_data['version']     = $data->get( 'Version' );
			$theme_data['text_domain'] = $data->get( 'TextDomain' );

			return $theme_data;

		}

		/**
		 * Define the required constants for this theme.
		 */
		private function define_constants() {
			$theme_data = $this->get_theme_data();

			if ( ! defined( 'BLOGNOVA_VERSION' ) ) {
				define( 'BLOGNOVA_VERSION', $theme_data['version'] );
			}

			if ( ! defined( 'BLOGNOVA_TEXTDOMAIN' ) ) {
				define( 'BLOGNOVA_TEXTDOMAIN', $theme_data['text_domain'] );
			}

			if ( ! defined( 'BLOGNOVA_PATH' ) ) {
				define( 'BLOGNOVA_PATH', get_template_directory() );
			}

			if ( ! defined( 'BLOGNOVA_URI' ) ) {
				define( 'BLOGNOVA_URI', get_template_directory_uri() );
			}
		}

		/**
		 * Enqueue required styles and scripts.
		 */
		public function enqueue_scripts() {

			$version = BLOGNOVA_VERSION;
			$handle  = BLOGNOVA_TEXTDOMAIN;
			$url     = BLOGNOVA_URI;

			/**
			 * Styles.
			 */
			wp_enqueue_style( "{$handle}-font", '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300&display=swap', array(), $version );
			wp_enqueue_style( "{$handle}-bootstrap", "{$url}/bootstrap.css", array(), '4.5.2' );
			wp_enqueue_style( $handle, get_stylesheet_uri(), array(), $version );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( "{$handle}-popper", "{$url}/assets/js/popper.js", array(), '1.16.1', true );
			wp_enqueue_script( "{$handle}-bootstrap", "{$url}/assets/js/bootstrap.js", array(), '4.5.2', true );
			wp_enqueue_script( "{$handle}-navigation", "{$url}/assets/js/navigation.js", array(), '1.0.0', true );
			wp_enqueue_script( "{$handle}-wowjs", "{$url}/assets/js/wow.min.js", array(), '1.0.0', true );

			if ( is_singular() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script( $handle, "{$url}/assets/js/custom.js", array(), '1.0.0', true );
		}

		/**
		 * Include the files.
		 */
		public function includes() {

			$files = array(
				'/inc/helpers.php',
				'/inc/template-tags.php',
				'/inc/template-functions.php',
				'/inc/customizer/customizer.php',
				'/inc/dynamic-assets.php',
				'/inc/after-setup-theme.php',
				'/inc/register-widget-areas.php',
			);

			if ( is_array( $files ) && ! empty( $files ) ) {
				foreach ( $files as $file ) {
					require_once BLOGNOVA_PATH . $file;
				}
			}
		}

	}

	$blognova = Blognova::get_instance();
}
