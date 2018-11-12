<?php
/**
* newsbuzz functions and definitions
* Please browse readme.txt for credits and forking information
*
* @package newsbuzz
*/


if ( ! function_exists( 'newsbuzz_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/


function newsbuzz_setup() {
/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on newsbuzz, use a find and replace
 * to change 'newsbuzz' to the name of your theme in all the template files
 */
load_theme_textdomain( 'newsbuzz', get_template_directory() . '/languages' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 604, 270);
add_image_size( 'newsbuzz-full-width', 1038, 576, true );


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Top Primary Menu', 'newsbuzz' ),
	) );	

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
	) );

// Set up the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'newsbuzz_custom_background_args', array(
	'default-color' => 'eee',
	'default-image' => '',
	) ) );

}


endif; // newsbuzz_setup
add_action( 'after_setup_theme', 'newsbuzz_setup' );


/**
* Enqueue scripts and styles.
*/
if ( ! function_exists( 'newsbuzz_scripts' ) ) {
function newsbuzz_scripts ( $in_footer ) {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css',true );  

	wp_enqueue_style( 'newsbuzz-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',true );   

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);  

	wp_enqueue_script( 'newsbuzz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'newsbuzz_scripts' );
}

/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';


/**
* Custom functions that act independently of the theme templates.
*/
require get_template_directory() . '/inc/extras.php';


/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';


/**
* Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';


/**
* Load custom nav walker
*/
if(!class_exists('wp_bootstrap_navwalker')){
require get_template_directory() . '/inc/navwalker.php';
}

if ( ! function_exists( 'newsbuzz_google_fonts' ) ) {
function newsbuzz_google_fonts() {
	$query_args = array(

		'family' => 'Lato:400,400italic,600,600italic,700,700i,900'
		);
	wp_enqueue_style( 'newsbuzz-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action('wp_enqueue_scripts', 'newsbuzz_google_fonts');
}
if ( ! function_exists( 'newsbuzz_new_excerpt_more' ) ) {
function newsbuzz_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	$link = sprintf( '<p class="read-more"><a class="readmore-btn" href="'. esc_url(get_permalink( get_the_ID() )) . '' . '"><span>' . __('Read Article', 'newsbuzz') . '</span><span class="screen-reader-text"> '. __(' Read More', 'newsbuzz').'</span></a></p>',
		esc_url( get_permalink( get_the_ID() ) )
		);
	return ' &hellip; ' . $link;

}
add_filter( 'excerpt_more', 'newsbuzz_new_excerpt_more' );
}

if ( ! function_exists( 'newsbuzz_logo' ) ) {
function newsbuzz_logo() {
	add_theme_support('custom-logo', array(
		'size' => 'newsbuzz-logo',
		'width'                  => 250,
		'height'                 => 50,
		'flex-height'            => true,
		));
}

add_action('after_setup_theme', 'newsbuzz_logo');
}

/**
*
* All Widgets
*
**/
if ( ! function_exists( 'newsbuzz_footer_widget_left_init' ) ) {
function newsbuzz_footer_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget left', 'newsbuzz'),
		'id' => 'footer_widget_left',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'newsbuzz' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s"><div class="footer-widgets">',
		'after_widget' => '</div></span>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_footer_widget_left_init' );
}
if ( ! function_exists( 'newsbuzz_footer_widget_middle_init' ) ) {
function newsbuzz_footer_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget middle', 'newsbuzz'),
		'id' => 'footer_widget_middle',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'newsbuzz' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s"><div class="footer-widgets">',
		'after_widget' => '</div></span>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_footer_widget_middle_init' );
}
if ( ! function_exists( 'newsbuzz_footer_widget_right_init' ) ) {
function newsbuzz_footer_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget right', 'newsbuzz'),
		'id' => 'footer_widget_right',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'newsbuzz' ),
		'before_widget' => '<span id="%1$s" class="widget %2$s"><div class="footer-widgets">',
		'after_widget' => '</div></span>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_footer_widget_right_init' );
}
if ( ! function_exists( 'newsbuzz_bottom_widget_left_init' ) ) {
function newsbuzz_bottom_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Bottom Widget left', 'newsbuzz'),
		'id' => 'bottom_widget_left',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'newsbuzz' ),
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_bottom_widget_left_init' );
}
if ( ! function_exists( 'newsbuzz_bottom_widget_middle_init' ) ) {
function newsbuzz_bottom_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Bottom Widget middle', 'newsbuzz'),
		'id' => 'bottom_widget_middle',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'newsbuzz' ),
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_bottom_widget_middle_init' );
}
if ( ! function_exists( 'newsbuzz_bottom_widget_right_init' ) ) {
function newsbuzz_bottom_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Bottom Widget right', 'newsbuzz'),
		'id' => 'bottom_widget_right',
		'before_widget' => '<div class="bottom-widgets">',
		'after_widget' => '</div>',
		'description'   => esc_html__( 'Widgets here will appear above the footer', 'newsbuzz' ),
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_bottom_widget_right_init' );
}
if ( ! function_exists( 'newsbuzz_widgets_init' ) ) {
function newsbuzz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newsbuzz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets here will appear in your sidebar', 'newsbuzz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="sidebar-headline-wrapper"><div class="widget-title-lines"></div><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
		) );
}
add_action( 'widgets_init', 'newsbuzz_widgets_init' );
}




add_filter( 'widget_posts_args', function( array $args )
{
add_filter( 'the_title', 'newsbuzz_wpse_prepend_thumbnail', 10, 2 );
add_action( 'loop_end',  'newsbuzz_wpse_clean_up' );
return $args;
} );
if ( ! function_exists( 'newsbuzz_wpse_prepend_thumbnail' ) ) {
function newsbuzz_wpse_prepend_thumbnail( $title, $post_id )
{
	static $instance = 0;

// Append thumbnail every second time (odd)
	if( 1 === $instance++ % 2 && has_post_thumbnail( $post_id ) )
		$title = get_the_post_thumbnail( $post_id ) . $title;

	return $title;
} 
}
if ( ! function_exists( 'newsbuzz_wpse_clean_up' ) ) {
function newsbuzz_wpse_clean_up( \WP_Query $q )
{
	remove_filter( current_filter(), __FUNCTION__ );
	remove_filter( 'the_title', 'wpse_add_thumnail', 10 );
} 
}