<?php
/**
 * The sidebar containing the page sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shuban
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>

<div class="st-sidebar-wrapper col-md-4">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	</aside><!-- #secondary -->
</div>
<!-- /.st-sidebar-wrapper col-md-3 -->
