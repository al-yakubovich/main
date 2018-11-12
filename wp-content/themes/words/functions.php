<?php

/**

 * words functions and definitions.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package words

 */



if ( ! function_exists( 'words_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function words_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on words, use a find and replace

	 * to change 'words' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'words', get_template_directory() . '/languages' );



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

	 * Custom Logo implemeted from WordPress Core

	 */



	add_theme_support( 'custom-logo', array(

            'height'      => 70,

            'width'       => 290,

            'flex-height' => true,

            'flex-width' => true

        ) );



	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

	 */

	add_theme_support( 'post-thumbnails' );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(

		'primary' => esc_html__( 'Primary', 'words' ),

	) );



	register_nav_menus( array(

		'social' => esc_html__( 'Social Menu', 'words' ),

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

	add_theme_support( 'custom-background', apply_filters( 'words_custom_background_args', array(

		'default-color' => '#f0f0f0',

		'default-image' => '',

	) ) );

}

endif;

add_action( 'after_setup_theme', 'words_setup' );



/**

 * Set the content width in pixels, based on the theme's design and stylesheet.

 *

 * Priority 0 to make it available to lower priority callbacks.

 *

 * @global int $content_width

 */

function words_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'words_content_width', 640 );

}

add_action( 'after_setup_theme', 'words_content_width', 0 );



/**

 * Register widget area.

 *

 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 */

function words_widgets_init() {

	register_sidebar( array(

		'name'          => esc_html__( 'Sidebar', 'words' ),

		'id'            => 'sidebar-1',

		'description'   => esc_html__( 'Add widgets here.', 'words' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



	register_sidebar( array(

		'name'          => esc_html__( 'Footer One', 'words' ),

		'id'            => 'footer-1',

		'description'   => esc_html__( 'Add widgets here to display in footer.', 'words' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



	register_sidebar( array(

		'name'          => esc_html__( 'Footer Two', 'words' ),

		'id'            => 'footer-2',

		'description'   => esc_html__( 'Add widgets here to display in footer.', 'words' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



	register_sidebar( array(

		'name'          => esc_html__( 'Footer Three', 'words' ),

		'id'            => 'footer-3',

		'description'   => esc_html__( 'Add widgets here to display in footer.', 'words' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



		register_sidebar( array(

		'name'          => esc_html__( 'Top Widget Area', 'words' ),

		'id'            => 'top-area',

		'description'   => esc_html__( 'Add widgets here to display in top of the page', 'words' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title-top-area">',

		'after_title'   => '</h2>',

	) );





}

add_action( 'widgets_init', 'words_widgets_init' );



/**

 * Enqueue scripts and styles.

 */

function words_scripts() {
	global $words_theme_options;

	/*google font  */

    wp_enqueue_style( 'words-googleapis', '//fonts.googleapis.com/css?family=Merriweather:300,400,700|Open+Sans:400,700', array(), null );

	

	/*Font-Awesome-master*/

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );

	

	/*Bootstrap CSS*/

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '3.3.7' );

	

		

	/*Style CSS*/

	wp_enqueue_style( 'words-style', get_stylesheet_uri() );

	

	

    /*Bootstrap JS*/

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );

	

	

	/*words custom*/

	wp_enqueue_script( 'words-custom', get_template_directory_uri() . '/assets/js/words-custom.js', array('jquery'), '20151215', true );


	/*Sticky Sidebar*/
	 if( 1 == $words_theme_options['words-sticky-sidebar-option'] ){
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

}

add_action( 'wp_enqueue_scripts', 'words_scripts' );





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

 * Load custom functions file.

 */

require get_template_directory() . '/inc/custom-functions.php';



/**

 * Load author widget

 */

require get_template_directory() . '/inc/author-widget.php';

/**

 * Load custom header

 */

require get_template_directory() . '/inc/custom-header.php';


/**

 * Load custom header

 */

require get_template_directory() . '/inc/customizer-pro/class-customize.php';
