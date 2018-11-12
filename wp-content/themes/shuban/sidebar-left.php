<?php
/**
 * The sidebar containing the left sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shuban
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
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
			<?php dynamic_sidebar( 'sidebar-left' ); ?>
		</aside><!-- #secondary -->
	</div>
	<!-- /.st-sidebar-wrapper col-md-3 -->
