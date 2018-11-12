<?php 
/**
 * Register theme sidebars
 * @package JustBlog
*/
 
function justblog_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'justblog' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'justblog' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'justblog' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'justblog' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'justblog' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Post Banner', 'justblog' ),
		'id' => 'post-banner',
		'description' => esc_html__( 'For Images and Sliders, but ONLY shows up on posts and pages that use the left and/or right sidebar columns.', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'justblog' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'justblog' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'justblog' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'justblog' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'justblog' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer 1', 'justblog' ),
		'id' => 'footer1',
		'description' => esc_html__( 'Footer 1 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 2', 'justblog' ),
		'id' => 'footer2',
		'description' => esc_html__( 'Footer 2 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 3', 'justblog' ),
		'id' => 'footer3',
		'description' => esc_html__( 'Footer 3 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer 4', 'justblog' ),
		'id' => 'footer4',
		'description' => esc_html__( 'Footer 4 position', 'justblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
// Register custom sidebar  widgets
register_widget( 'JustBlog_Recent_Posts_Widget' );	
	
}
add_action( 'widgets_init', 'justblog_widgets_init' );

// Count the number of widgets to enable resizable widgets in the bottom group.
function justblog_bottom_group() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr( $class ) . '"';
}
// Count the number of widgets to enable resizable widgets in the footer group.
function justblog_footer_group() {
	$count = 0;
	if ( is_active_sidebar( 'footer1' ) )
		$count++;
	if ( is_active_sidebar( 'footer2' ) )
		$count++;
	if ( is_active_sidebar( 'footer3' ) )
		$count++;		
	if ( is_active_sidebar( 'footer4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-lg-6';
			break;
		case '3':
			$class = 'col-lg-4';
			break;
		case '4':
			$class = 'col-sm-12 col-md-6 col-lg-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr( $class ) . '"';
}