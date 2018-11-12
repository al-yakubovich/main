<?php
/**
 * actions setup functions
 *
 * @package actions
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function actions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'actions_content_width', 640 );
}
add_action( 'after_setup_theme', 'actions_content_width', 0 );

/**
 * Assign the Actions version to a var
 */
$theme 			  = wp_get_theme( 'actions' );
$actions_version  = $theme['Version'];

if ( ! function_exists( 'actions_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function actions_setup() {

		/*
	     * Make theme available for translation.
	     * Translations can be filed in the /languages/ directory.
	     * If you're building a theme based on actions, use a find and replace
	     * to change 'actions' to the name of your theme in all the template files.
	     */
	    load_theme_textdomain( 'actions' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 840, 400, true );

		// This theme uses wp_nav_menu() in one locations.
		register_nav_menus( array(
			'primary'		=> esc_html__( 'Primary Menu', 'actions' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		/*
	     * Enable support for site logo.
	     */
	    add_theme_support( 'custom-logo', array(
		   'height'      => 150,
		   'width'       => 250,
		   'flex-height' => true,
		   'header-text' => array( 'site-title', 'site-description' ),
	    ) );		

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );		
	}
endif; // actions_setup

if ( ! function_exists( 'actions_the_site_logo' ) ) {
/**
 * Displays the optional site logo.
 *
 * Returns early if the site logo is not available.
 *
 * @since Actions 1.0.4
 */
    function actions_the_custom_logo() {
	    if ( function_exists( 'the_custom_logo' ) ) {
		    the_custom_logo();
	    }
    }
}



/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function actions_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'actions' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	// Header Left Widgets.
	register_sidebar( array(
		'name'          => esc_html__( 'Header Top Left', 'actions' ),
		'id'            => 'header-widgets-left',
		'description'   => esc_html__( 'Place for widgets on left side of header. Avoid adding a title to any widget! Custom menu should ideally be short without child menu items.', 'actions' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
	) );

	// Header Right Widgets.
	register_sidebar( array(
		'name'          => esc_html__( 'Header Top Right', 'actions' ),
		'id'            => 'header-widgets-right',
		'description'   => esc_html__( 'Place for widgets on right side of header. Avoid adding a title to any widget! Custom menu should ideally be short without child menu items.', 'actions' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget'  => '</div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'actions' ),
		'id'            => 'sidebar-header',
		'description'   => __('Ideal for that extra CTA button, a search box or some extra infor above the fold. Only add 1 widget!', 'actions' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

if ( ! function_exists( 'actions_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own actions_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function actions_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'actions' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'actions' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'actions' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Actions 1.0.1
 */
function actions_javascript_detection() {
	echo "<script>( function( html ){html.className = html.className.replace(/\bno-js\b/,'js')})( document.documentElement );</script>\n";
}
add_action( 'wp_head', 'actions_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function actions_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'actions_pingback_header' );

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function actions_scripts() {
	global $actions_version;
	$parent_style = 'actions-style'; // This is 'actions-style' for the Actions theme.
	$child_style = 'actions-child-style';
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'actions-fonts', actions_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/genericons/genericons.css', array(), '3.6.1' );

	//wp_enqueue_style( 'actions-style', get_template_directory_uri() . '/style.css', '', $actions_version );
	if ( wp_get_theme()->get('Name') != 'Actions' ) {
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(), $actions_version );
		wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $actions_version );
	} else {
		wp_enqueue_style( $parent_style, get_stylesheet_uri(), array(), $actions_version );
	}

	wp_style_add_data( 'actions-rtl', 'rtl', 'replace' );

	wp_enqueue_script( 'actions-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'actions-script', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'actions-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'actions' ),
		'collapse' => __( 'collapse child menu', 'actions' ),
	) );
}