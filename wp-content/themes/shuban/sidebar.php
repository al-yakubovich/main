<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shuban
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<?php
if ( is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) {  ?>

	<div class="st-sidebar-wrapper col-md-3">

<?php
} else {  ?>
	<div class="st-sidebar-wrapper col-md-4">

<?php
}
?>
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside><!-- #secondary -->
	</div>
	<!-- /.st-sidebar-wrapper -->
