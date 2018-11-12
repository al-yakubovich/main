<?php
/**
 * Setup theme functions for Minamaze.
 *
 * @package ThinkUpThemes
 */

// Declare latest theme version
$GLOBALS['thinkup_theme_version'] = '1.6.2';

// Setup content width 
function thinkup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thinkup_content_width', 960 );
}
add_action( 'after_setup_theme', 'thinkup_content_width', 0 );


// ----------------------------------------------------------------------------------
//	Add Theme Options Panel & Assign Variable Values
// ----------------------------------------------------------------------------------

	// Add Redux Framework
	require_once( get_template_directory() . '/admin/main/framework.php' );
	require_once( get_template_directory() . '/admin/main/options.php' );
	require_once( get_template_directory() . '/admin/main-extensions/extensions-init.php' );

	// Add Toolbox Framework
	require_once( get_template_directory() . '/admin/main-toolbox/toolbox.php' );

	// Add Theme Options Features.
	require_once( get_template_directory() . '/admin/main/options/00.theme-setup.php' ); 
	require_once( get_template_directory() . '/admin/main/options/00.variables.php' ); 
	require_once( get_template_directory() . '/admin/main/options/01.general-settings.php' ); 
	require_once( get_template_directory() . '/admin/main/options/02.homepage.php' ); 
	require_once( get_template_directory() . '/admin/main/options/03.header.php' ); 
	require_once( get_template_directory() . '/admin/main/options/04.footer.php' );
	require_once( get_template_directory() . '/admin/main/options/05.blog.php' ); 

	// Add widget features.
//	include_once( get_template_directory() . '/lib/widgets/categories.php' ); 
//	include_once( get_template_directory() . '/lib/widgets/popularposts.php' ); 
//	include_once( get_template_directory() . '/lib/widgets/recentposts.php' ); 
//	include_once( get_template_directory() . '/lib/widgets/searchfield.php' ); 
//	include_once( get_template_directory() . '/lib/widgets/tagscloud.php' );

// ----------------------------------------------------------------------------------
//	Assign Theme Specific Functions
// ----------------------------------------------------------------------------------

// Setup theme features, register menus and scripts.
if ( ! function_exists( 'thinkup_themesetup' ) ) {

	function thinkup_themesetup() {

		// Load required files
		require_once ( get_template_directory() . '/lib/functions/extras.php' );
		require_once ( get_template_directory() . '/lib/functions/template-tags.php' );

		// Make theme translation ready.
		load_theme_textdomain( 'lan-thinkupthemes', get_template_directory() . '/languages' );

		// Add default theme functions.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		// Add support for custom background
		add_theme_support( 'custom-background' );

		// Add support for custom header
		$args = apply_filters( 'custom-header', array( 'height' => 200, 'width'  => 1600 ) );
		add_theme_support( 'custom-header', $args );

		// Add WooCommerce functions.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Register theme menu's.
		register_nav_menus( array( 'pre_header_menu' => __( 'Pre Header Menu', 'lan-thinkupthemes' ) ) );
		register_nav_menus( array( 'header_menu'     => __( 'Primary Header Menu', 'lan-thinkupthemes' ) ) );
		register_nav_menus( array( 'sub_footer_menu' => __( 'Footer Menu', 'lan-thinkupthemes' ) ) );
	}
}
add_action( 'after_setup_theme', 'thinkup_themesetup' );


// ----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
// ----------------------------------------------------------------------------------

function thinkup_frontscripts() {

	global $thinkup_theme_version;

	// Add 3rd party stylesheets
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/lib/extentions/prettyPhoto/css/prettyPhoto.css', '', '3.1.6' );

	// Add 3rd party stylesheets - Prefixed to prevent conflict between library versions
	wp_enqueue_style( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/css/bootstrap.min.css', '', '2.3.2' );

	// Add 3rd party Font Packages
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	// Add 3rd party scripts
	wp_enqueue_script( 'prettyPhoto', ( get_template_directory_uri().'/lib/extentions/prettyPhoto/js/jquery.prettyPhoto.js' ), array( 'jquery' ), '3.1.6', 'true' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/lib/scripts/modernizr.js', array( 'jquery' ), '2.6.2', 'true'  );

	// Add 3rd party scripts - Prefixed to prevent conflict between library versions
	wp_enqueue_script( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/js/bootstrap.js', array( 'jquery' ), '2.3.2', 'true' );

	// Register 3rd party scripts
	wp_register_script( 'retina', get_template_directory_uri() . '/lib/scripts/retina.js', array( 'jquery' ), '0.0.2', '', true );

	// Add theme stylesheets
	wp_enqueue_style( 'thinkup-shortcodes', get_template_directory_uri() . '/styles/style-shortcodes.css', '', $thinkup_theme_version );
	wp_enqueue_style( 'thinkup-style', get_stylesheet_uri(), '', $thinkup_theme_version );

	// Add theme scripts
	wp_enqueue_script( 'thinkup-frontend', get_template_directory_uri() . '/lib/scripts/main-frontend.js', array( 'jquery' ), $thinkup_theme_version, 'true' );

	// Register theme stylesheets
	wp_register_style( 'thinkup-responsive', get_template_directory_uri() . '/styles/style-responsive.css', '', $thinkup_theme_version );

	// Register WooCommerce (theme specific) stylesheets

	// Add Masonry script to all archive pages

	// Add Portfolio styles & scripts

	// Add ThinkUpSlider scripts
	if ( is_front_page() ) {
		wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
		wp_enqueue_script( 'thinkup-responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), $thinkup_theme_version, 'true' );
	}

	// Add comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_frontscripts', 10 );


// ----------------------------------------------------------------------------------
//	Register Back-End Styles And Scripts
// ----------------------------------------------------------------------------------

function thinkup_adminscripts() {

//	if ( is_customize_preview() ) {

		global $thinkup_theme_version;

		// Add theme stylesheets
		wp_enqueue_style( 'thinkup-backend', get_template_directory_uri() . '/styles/backend/style-backend.css', '', $thinkup_theme_version );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

		// Add theme scripts
		wp_enqueue_script( 'thinkup-backend', get_template_directory_uri() . '/lib/scripts/main-backend.js', array( 'jquery' ), $thinkup_theme_version );

//	}
}
add_action( 'admin_enqueue_scripts', 'thinkup_adminscripts' );


//----------------------------------------------------------------------------------
//	Register Shortcodes Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_shortcodescripts() {

	global $thinkup_theme_version;

	// Add shortcode Scripts
	wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
	wp_enqueue_script( 'thinkup-responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), $thinkup_theme_version, 'true' );
}
add_action( 'wp_enqueue_scripts', 'thinkup_shortcodescripts', 10 );


// ----------------------------------------------------------------------------------
//	Register Theme Widgets
// ----------------------------------------------------------------------------------

function thinkup_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 1',
        'id' => 'footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
 
    register_sidebar( array(
        'name' => 'Footer Widget Area 2',
        'id' => 'footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 3',
        'id' => 'footer-w3',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 4',
        'id' => 'footer-w4',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 5',
        'id' => 'footer-w5',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Widget Area 6',
        'id' => 'footer-w6',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
 }
add_action( 'widgets_init', 'thinkup_widgets_init' );