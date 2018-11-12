<?php
/**
 * Sidebar - default
 *
 * @package Cressida
 */
$cressida_example_content          = cressida_get_option( 'cressida_example_content' );
$cressida_frontpage_sidebar_toggle = cressida_get_option( 'cressida_frontpage_sidebar_toggle' );

if ( $cressida_frontpage_sidebar_toggle == 'on' ) :
	$cressida_toggle_class = 'col-xs-12';
else :
	$cressida_toggle_class = 'd-none d-lg-block';
endif;
?>

<div class="widget-area widget-area-sidebar widget-area-sidebar-main col-lg-4 <?php echo esc_attr( $cressida_toggle_class ); ?>" role="complementary">
	<?php
		if ( is_front_page() ) :
			/* Sidebar - Front Page - Bordered */
			if ( is_active_sidebar( 'sidebar-frontpage-bordered' ) ) : ?>
				<div class="sidebar-widgets-bordered sidebar-frontpage-bordered">
					<?php dynamic_sidebar( 'sidebar-frontpage-bordered' ); ?>
				</div><?php
			endif;
			/* Sidebar - Front Page */
			if ( is_active_sidebar( 'sidebar-frontpage' ) ) : ?>
				<div class="sidebar-widgets sidebar-frontpage">
					<?php dynamic_sidebar( 'sidebar-frontpage' ); ?>
				</div><?php
			endif;
		endif;
		/* Sidebar - Default - Bordered */
		if ( is_active_sidebar( 'sidebar-default-bordered' ) ) : ?>
			<div class="sidebar-widgets-bordered">
				<?php dynamic_sidebar( 'sidebar-default-bordered' ); ?>
			</div><?php
		endif;
		/* Sidebar - Default */
		if ( is_active_sidebar( 'sidebar-default' ) ) : ?>
			<div class="sidebar-widgets">
				<?php dynamic_sidebar( 'sidebar-default' ); ?>
			</div><?php
		elseif ( $cressida_example_content == 1 ) :
			cressida_example_sidebar();
		endif;
	?>
</div><!-- widget-area widget-area-sidebar -->
