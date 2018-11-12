<?php
/**
 * Cressida functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cressida
 */

/**
 * Customizer
 *
 * This theme uses Kirki customizer
 * @link https://aristath.github.io/kirki/
 */
if ( ! class_exists( 'Kirki' ) ) {
	include_once( dirname( __FILE__ ) . '/inc/kirki.php' ); // fallback
	include_once( dirname( __FILE__ ) . '/inc/kirki-installer.php' ); // installer
}
require get_parent_theme_file_path( '/customize/theme-defaults.php' );
require get_parent_theme_file_path( '/customize/customizer.php' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Tunction is attached to 'after_setup_theme' action hook.
 */
function cressida_setup() {
	global $cressida_defaults;

	// Make theme available for translation.
	load_theme_textdomain( 'cressida', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * @link https://codex.wordpress.org/Title_Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 760, 1100, true );
	add_image_size( 'cressida-slider', 1170, 550, true ); /* Used for the highlight posts / videos, slider */
	add_image_size( 'cressida-slider-sidebar', 790, 530, true ); /* Used for split slider (slider with sidebar) */
	add_image_size( 'cressida-archive', 760, 1100, true ); /* Used for links, category archive, and blog feed archive */
    add_image_size( 'cressida-sidebar', 750, 800, true ); /* Used for Recent Posts With Thumbnails */

	/**
	 * Register menus
	 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
	 */
	register_nav_menus( array(
		'header' => esc_html__( 'Main Menu', 'cressida' ),
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

	/**
	 * Enable support for Post Formats.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array( 'video' ) );

	/**
	 * Add theme support for Custom Logo.
	 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
	 */
	$logo_args = array(
		'width'       => 300,
		'height'      => 150,
		'flex-width'  => true,
		'flex-height' => true
	);
	add_theme_support( 'custom-logo', $logo_args );

	/**
	 * Add theme support for Custom Background.
	 * @link https://codex.wordpress.org/Custom_Backgrounds
	 */
	add_theme_support( 'custom-background' );

	/**
	 * Add theme support for Custom Header.
	 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
	 */
	$header_args = array(
		'width'         => 1200,
		'height'        => 550,
		'flex-height'   => true,
		'flex-width'    => true,
		'header-text'   => false,
		'default-image' => $cressida_defaults['cressida_custom_header'],
	);
	add_theme_support( 'custom-header', $header_args );

	/**
	 * Add support for page excerpts
	 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
	 */
	add_post_type_support( 'page', 'excerpt' );

	// Set and filter the default content width
	$GLOBALS['content_width'] = apply_filters( 'cressida_content_width', 1200 );
}
add_action( 'after_setup_theme', 'cressida_setup' );

/**
 * Register Google fonts.
 *
 * @return string Returns url for Google fonts
 */
function cressida_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Montserrat';
	$font_families[] = 'Cormorant:400,600,600i,700i';
	$font_families[] = 'Lato:400,400i,700';

	$query_args = array(
		'family' => rawurlencode( implode( '|', $font_families ) ),
		'subset' => rawurlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}
/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function cressida_resource_hints( $urls, $relation_type ) {
	/**
	 * Preconnect Google fonts
	 */
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'cressida_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 *
 * This function is attached to 'wp_enqueue_scripts'
 * action hook. Avoid loading files which
 * are already in WordPress core.
 * @see wp-includes/script-loader.php
 */
function cressida_scripts() {
	/**
	 * Styles
	 */
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'cressida-fonts', cressida_fonts_url(), array(), null );

	// Third party styles
	wp_register_style( 'bootstrap', get_parent_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
	wp_register_style( 'fontawesome', get_parent_theme_file_uri( '/assets/css/fontawesome.min.css' ) );
	wp_register_style( 'fontawesome-all', get_parent_theme_file_uri( '/assets/css/fontawesome-all.min.css' ) );
	wp_register_style( 'smartmenus-bootstrap', get_parent_theme_file_uri( '/assets/css/jquery.smartmenus.bootstrap-4.css' ) );
	wp_register_style( 'slick', get_parent_theme_file_uri( '/assets/css/slick.min.css' ) );
	wp_register_style( 'slick-theme', get_parent_theme_file_uri( '/assets/css/slick-theme.min.css' ) );

	// Default stylesheet
	$deps = array( 'bootstrap', 'fontawesome', 'fontawesome-all', 'smartmenus-bootstrap', 'slick', 'slick-theme' );
	wp_enqueue_style( 'cressida-style', get_stylesheet_uri(), $deps );
	wp_style_add_data( 'cressida-style', 'rtl', 'replace' );

	/**
	 * Scripts
	 */
	// Third party scripts
	wp_enqueue_script( 'html5', get_parent_theme_file_uri( '/assets/js/html5shiv.min.js' ), array(), '3.7.0' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respondjs', get_parent_theme_file_uri( '/assets/js/respond.min.js' ), array(), '1.3.0' );
	wp_script_add_data( 'respondjs', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'bootstrap', get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '', true );
	wp_enqueue_script( 'smartmenus', get_parent_theme_file_uri( '/assets/js/jquery.smartmenus.min.js' ), array( 'bootstrap' ), '', true );
	wp_enqueue_script( 'smartmenus-bootstrap', get_parent_theme_file_uri( '/assets/js/jquery.smartmenus.bootstrap-4.min.js' ), array( 'smartmenus' ), '', true );
	wp_enqueue_script( 'slick', get_parent_theme_file_uri( '/assets/js/slick.min.js' ), array(), '', true );
	wp_enqueue_script( 'jquery-match-height', get_parent_theme_file_uri( '/assets/js/jquery.matchHeight-min.js' ), array(), '', true );
	// Custom theme's script
	wp_enqueue_script( 'cressida-js', get_parent_theme_file_uri( '/assets/js/cressida.min.js' ), array( 'jquery' ), '', true );

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cressida_scripts' );

/**
 * Recommend plugins for best experience with this theme
 */
require_once get_parent_theme_file_path( '/inc/class-tgm-plugin-activation.php' );
/**
 * Define recommended plugins
 *
 * This function is attached to 'tgmpa_register' action hook.
 *
 * For overriding in child themes remove the action hook:
 * remove_action( 'tgmpa_register', 'cressida_register_required_plugins' );
 */
function cressida_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
		array(
			'name'      => 'Recent Posts Widget With Thumbnails',
			'slug'      => 'recent-posts-widget-with-thumbnails',
			'required'  => false,
		),
		array(
			'name'      => 'WP Instagram Widget',
			'slug'      => 'wp-instagram-widget',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
	);
	$config = array(
		'id'           => 'cressida',               // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cressida_register_required_plugins' );

/**
 * Bootstrap Navigation Walker
 */
require_once get_parent_theme_file_path( '/inc/class-wp-bootstrap-navwalker.php' );
/**
 * Helper functions
 */
require_once get_parent_theme_file_path( '/inc/helper-functions.php' );

/**
 * Additional features for Cressida theme
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Register sidebars and widgets
 */
require_once get_parent_theme_file_path( '/widgets/widgets.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
/**
 * Welcome page
 */
require get_parent_theme_file_path( '/welcome-page/welcome-page.php' );
