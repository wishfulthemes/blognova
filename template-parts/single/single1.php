<?php
/**
 * Post detail.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div <?php post_class(); ?>>
	<?php
	blognova_post_box_meta();
	blognova_post_box_bottom( false, 'post__cnt-box__bottom flex mb-5' );
	the_content();
	?>
</div>
