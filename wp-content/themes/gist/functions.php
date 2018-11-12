<?php
/**
 * Gist functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gist
 */
if ( ! function_exists( 'gist_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gist_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Gist, use a find and replace
		 * to change 'gist' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gist' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_image_size( 'gist-small-thumb', 350, 220, true );
        add_image_size( 'gist-large-thumb', 1170, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'gist' ),
            'social' => esc_html__( 'Social Menu', 'gist' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gist_custom_background_args', array(
			'default-color' => 'f1f1f1',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gist_content_width', 640 );
}
add_action( 'after_setup_theme', 'gist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gist_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gist_scripts() {
    global $gist_theme_options;
	$gist_name_font_url   = esc_url( $gist_theme_options['gist-font-url'] );

	if($gist_name_font_url != ''):
		wp_enqueue_style('gist-googleapis',$gist_name_font_url , null, false, 'all');
	endif;

    wp_enqueue_style('gist-google-fonts', '//fonts.googleapis.com/css?family=Oswald');

	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/candidthemes/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'gist-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gist-custom', get_template_directory_uri() . '/candidthemes/assets/js/gist-custom.js', array('jquery'), '20151215', true );

	if( 1 == $gist_theme_options['gist-sticky-sidebar'] ){
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/candidthemes/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	}

	wp_enqueue_script( 'gist-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gist-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gist_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/candidthemes/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load sidebar widgets core file.
 */
require get_template_directory() . '/candidthemes/core.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
   require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
}