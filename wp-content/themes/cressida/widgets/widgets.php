<?php
/**
 * Widgets
 *
 * @package Cressida
 */
/**
 * Register sidebars and widgets
 *
 * This function is attached to
 * 'widgets_init' action hook.
 */
function cressida_widgets_init() {

	/* Sidebar Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default', 'cressida' ),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default - Bordered', 'cressida' ),
		'id'            => 'sidebar-default-bordered',
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Frontpage Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Front Page', 'cressida' ),
		'id'            => 'sidebar-frontpage',
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Front Page - Bordered', 'cressida' ),
		'id'            => 'sidebar-frontpage-bordered',
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Front Page - Promo Category 1', 'cressida' ),
		'id'            => 'sidebar-frontpage-promo-1',
		'before_widget' => '<div id="%1$s" class="frontpage-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Header Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Header - Left', 'cressida' ),
		'id'            => 'sidebar-top-left',
		'description'   => esc_html__( 'Add widgets here to appear in the top left area.', 'cressida' ),
		'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="screen-reader-text">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header - Right', 'cressida' ),
		'id'            => 'sidebar-top-right',
		'description'   => esc_html__( 'Add widgets here to appear in the top right area.', 'cressida' ),
		'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="screen-reader-text">',
		'after_title'   => '</h3>',
	) );

	/* Frontpage Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Top', 'cressida' ),
		'id'            => 'sidebar-frontpage-top',
		'before_widget' => '<div id="%1$s" class="frontpage-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Footer Widgets */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Full 1', 'cressida' ),
		'id'            => 'footer-full-1',
		'before_widget' => '<div id="%1$s" class="footer-widget footer-widget-full widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Full 2', 'cressida' ),
		'id'            => 'footer-full-2',
		'before_widget' => '<div id="%1$s" class="footer-widget footer-widget-full widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Left', 'cressida' ),
		'id'            => 'footer-columns-col-1',
		'before_widget' => '<div id="%1$s" class="footer-columns-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Center', 'cressida' ),
		'id'            => 'footer-columns-col-2',
		'before_widget' => '<div id="%1$s" class="footer-columns-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Right', 'cressida' ),
		'id'            => 'footer-columns-col-3',
		'before_widget' => '<div id="%1$s" class="footer-columns-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'cressida_widgets_init' );
