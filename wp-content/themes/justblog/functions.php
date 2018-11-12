<?php
/**
 * Just Blog functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package JustBlog
 */

if ( ! function_exists( 'justblog_setup' ) ) :

	// Set the default content width.
		$GLOBALS['content_width'] = 1150;
		
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function justblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Just Blog, use a find and replace
		 * to change 'justblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'justblog', get_template_directory() . '/languages' );

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

		// create recent posts thumbnails
		add_image_size( 'justblog-recent', 340, 75, true );

		// create related posts thumbnails
		if( get_theme_mod( 'justblog_related_post_thumbnails', false ) ) :
			add_image_size( 'justblog-related-posts', 210, 150, true );
		endif;
		
		// create featured images for the default blog style
		if( get_theme_mod( 'justblog_default_thumbnails', false ) ) :
			add_image_size( 'justblog-default', 740, 400, true );
		endif;
		
		// create featured images for the grid blog style
		if( get_theme_mod( 'justblog_grid_thumbnails', false ) ) :
			add_image_size( 'justblog-grid', 660, 350, true );
		endif;		
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'justblog' ),
			'social' => esc_html__( 'Social', 'justblog' ),
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
		add_theme_support( 'custom-background', apply_filters( 'justblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => esc_url(get_template_directory_uri()) . '/images/default-bg.png',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( array( '/css/editor.css', justblog_fonts_url() ) );
		
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
add_action( 'after_setup_theme', 'justblog_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */

function justblog_content_width() {
	$content_width = $GLOBALS['content_width'];
 
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'pageleft'  ) || is_active_sidebar( 'pageright' ) || is_active_sidebar( 'blogleft' ) || is_active_sidebar( 'blogright' ) ) {
		$content_width = 750;
	}
	
  $GLOBALS['content_width'] = apply_filters( 'justblog_content_width', $content_width );
}
add_action( 'template_redirect', 'justblog_content_width', 0 );


if ( ! function_exists( 'justblog_fonts_url' ) ) :

function justblog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// Translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language.
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'justblog' ) ) {
		$fonts[] = 'Open Sans:300,400,700';
	}

	// Translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language.
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'justblog' ) ) {
		$fonts[] = 'Playfair Display:400,700';
	}

	// Translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'justblog' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
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
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function justblog_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'justblog-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'justblog_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function justblog_scripts() {
	
	$bloglayout = esc_attr(get_theme_mod( 'justblog_blog_layout', 'blog1' ));
	
	if( esc_attr(get_theme_mod( 'justblog_fa5', true ) ) ) :
		// FontAwesome 5
		wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/css/fontawesome5.css', array(), '5.0.8' );
	endif; 
	
	if( esc_attr(get_theme_mod( 'justblog_fa4', false ) ) ) :
		// Font Awesome 4
		wp_enqueue_style( 'font-awesome-4', get_template_directory_uri() . '/css/fontawesome4.css', '', '4.7.0' );
	endif;	
	
	wp_enqueue_style( 'justblog-fonts', justblog_fonts_url(), array(), null );	
	
	// Theme stylesheet
	wp_enqueue_style( 'justblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'superfish-navigation', get_template_directory_uri() . '/js/superfish.js', array('jquery'), '1.7.10', true );
	wp_enqueue_script( 'justblog-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '2018', true );

	wp_enqueue_script( 'justblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '2018', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'justblog_scripts' );

// Register custom widgets
require get_template_directory() . '/inc/widgets/class-justblog-recent-posts-widget.php';

// Theme info page class
require get_template_directory() . '/inc/theme-info/justblog-info-class-about.php';

// Theme Info Page
require get_template_directory() . '/inc/theme-info/justblog-info.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load CSS overrides
require get_template_directory() . '/inc/inline-styles.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

