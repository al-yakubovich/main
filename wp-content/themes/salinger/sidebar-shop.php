<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Salinger
 */

if ( is_active_sidebar( 'salinger-sidebar-shop' ) ) {
	?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'salinger-sidebar-shop' ); ?>
	</div><!-- #secondary -->
	<?php
}
