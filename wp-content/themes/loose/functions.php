<?php
/**
 * Loose functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package loose
 */

if ( ! function_exists( 'loose_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function loose_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on loose, use a find and replace
		 * to change 'loose' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'loose', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Left Menu', 'loose' ),
				'top' => esc_html__( 'Top Menu', 'loose' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'audio',
				'video',
				'gallery',
				'quote',
				'link',
				'aside',
				'image',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'loose_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Enable support for Site Logo.
		add_theme_support( 'custom-logo' );
	}

endif; // End of loose_setup.
add_action( 'after_setup_theme', 'loose_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function loose_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'loose_content_width', 732 );
}

add_action( 'after_setup_theme', 'loose_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function loose_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Right Sidebar', 'loose' ),
			'id' => 'sidebar-1',
			'description' => esc_html__( 'Right Sidebar Widget Area', 'loose' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title"><span>',
			'after_title' => '</span></h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Left Sidebar', 'loose' ),
			'id' => 'sidebar-2',
			'description' => esc_html__( 'Right Sidebar Widget Area', 'loose' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Top', 'loose' ),
			'id' => 'top-1',
			'description' => esc_html__( 'Top Widget Area. Above the content - on home and archive pages', 'loose' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'loose_widgets_init' );

if ( ! function_exists( 'loose_fonts_url' ) ) :

	/**
	 * Register Google fonts for Twenty Fifteen.
	 *
	 * @since Loose 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function loose_fonts_url() {

		if ( ! get_theme_mod( 'load_google_fonts_from_google', 1 ) ) {
			return get_template_directory_uri() . '/fonts/fonts.css';
		}

		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'loose' ) ) {
			$fonts[] = 'Roboto:700,400';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Playfair Display, translate this to 'off'. Do not translate into your own language.
		 */

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Merriweather, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'loose' ) ) {
			$fonts[] = 'Merriweather:700,300,300italic';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'loose' );

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
			$fonts_url = esc_url(
				add_query_arg(
					array(
						'family' => urlencode( implode( '|', $fonts ) ),
						'subset' => urlencode( $subsets ),
					),
					'https://fonts.googleapis.com/css'
				)
			);
		}

		return $fonts_url;
	}

endif;

/**
 * Enqueue scripts and styles.
 */
function loose_scripts() {

	$loose_theme_info = wp_get_theme();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'loose-fonts', loose_fonts_url(), array(), $loose_theme_info->get( 'Version' ) );

	wp_enqueue_style( 'loose-style', get_stylesheet_uri(), array(), $loose_theme_info->get( 'Version' ) );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array( 'jquery' ), '20150828', true );

	if ( ! is_singular() && ! is_404() && have_posts() ) {

		wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery', 'masonry' ), '2.1.0', true );
	}

	if ( get_theme_mod( 'sticky_sidebar', 1 ) && is_active_sidebar( 'sidebar-1' ) ) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.2.2', true );
	}

	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '20150829', true );

	wp_enqueue_script( 'loose-scripts', get_template_directory_uri() . '/js/loose.min.js', array( 'jquery', 'jquery-effects-core', 'jquery-effects-slide' ), $loose_theme_info->get( 'Version' ), true );

	wp_enqueue_script( 'loose-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	// Preparing to pass variables to js -> load more posts via ajax call.
	global $wp_query;
	$loose_ajax_max_pages = $wp_query->max_num_pages;
	$loose_ajax_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;

	// Passing theme options to loose.js.
	wp_localize_script(
		'loose-scripts',
		'loose',
		array(
			'home_page_slider_img_number' => get_theme_mod( 'home_page_slider_img_number', 1 ),
			'loadingText' => '',
			'noMorePostsText' => '',
			'getTemplateDirectoryUri' => esc_url( get_template_directory_uri() ),
			'months' => loose_months(),
			'days' => loose_days(),
			'show_menu_on_scroll' => get_theme_mod( 'show_menu_on_scroll', 1 ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'loose_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Hybrid Media Grabber for getting media from posts.
 */
require get_template_directory() . '/inc/class-media-grabber.php';

/**
 * Get The Image for getting images from posts.
 */
require get_template_directory() . '/inc/get-the-image.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Some meta fields for category styling.
 */
require get_template_directory() . '/inc/class-loose-meta-for-categories.php';

/**
 * Load TGMPA recommended plugins.
 */
require_once get_template_directory() . '/inc/tgmpa-plugins.php';
