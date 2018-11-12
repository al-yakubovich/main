<?php

/**

 * plaser functions and definitions.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package plaser

 */



if ( ! function_exists( 'plaser_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function plaser_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on plaser, use a find and replace

	 * to change 'plaser' to the name of your theme in all the template files.

	 */

	  load_theme_textdomain('plaser');

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

		'primary' => esc_html__( 'Primary', 'plaser' ),

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


	/*

	 * Set up the WordPress core custom background feature.

	 */
	add_theme_support( 'custom-background', apply_filters( 'plaser_custom_background_args', array(
		'default-color' => '#0b192f',   
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'plaser_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */

function plaser_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'plaser_content_width', 640 );
}
add_action( 'after_setup_theme', 'plaser_content_width', 0 );



/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function plaser_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'plaser' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'plaser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="title-widget"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'plaser' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'plaser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'plaser' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'plaser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'plaser' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'plaser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'plaser_widgets_init' );


add_action( "customize_register", "ruth_sherman_theme_customize_register" );
function ruth_sherman_theme_customize_register( $wp_customize ) {

 //=============================================================
 // Remove header image and widgets option from theme customizer
 //=============================================================
 $wp_customize->remove_control("header_image");
 
}


/**

 * Enqueue scripts and styles.

 */

function plaser_scripts() {
	global $plaser_theme_options;
	/*google font  */
    wp_enqueue_style( 'plaser-googleapis', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i', array(), null );
	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '3.3.7' );
	/*Style CSS*/
	wp_enqueue_style( 'plaser-style', get_stylesheet_uri() );
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );
	/*plaser custom*/
	wp_enqueue_script( 'plaser-custom', get_template_directory_uri() . '/assets/js/plaser-custom.js', array('jquery'), '20151215', true );
	/*Sticky Sidebar*/
	 if( 1 == $plaser_theme_options['plaser-sticky-sidebar'] ){
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'plaser_scripts' );


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



/** ----------------------------------------*/

	
/*
	***************
	* Sanitization Fucntion
	***************
	*/

function plaser_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize checkbox field
 *
 * @since 1.0.0
 */
if ( !function_exists('plaser_sanitize_checkbox') ) :
        function plaser_sanitize_checkbox( $checked )
        {
            // Boolean check.
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }
    endif;

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */    

function plaser_excerpt_more( $more ) {
	 if(!is_admin() ){
         return '&hellip;';
      }    
}
add_filter('excerpt_more', 'plaser_excerpt_more');



/**
 * Excerpt length 25 return
 *
 * @since Plaser 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('plaser_alter_excerpt') ) :
    function plaser_alter_excerpt( $length ){
  if(is_admin() ){
   return $length;
  }
        return 25;
    }
endif;
add_filter('excerpt_length', 'plaser_alter_excerpt');

/**
 * Add sidebar class in body
 *
 * @since Plaser 1.0.0
 *
 */

add_filter( 'body_class', 'plaser_custom_class' );
function plaser_custom_class( $classes ) {
	$classes[] = 'at-sticky-sidebar';
	$sidebar = esc_attr( get_theme_mod( 'plaser_sidebar-options' ) );
    if ( $sidebar == 'no-sidebar' ) {
        $classes[] = 'no-sidebar';
    }
    elseif ( $sidebar == 'left-sidebar'){
    	$classes[] = 'left-sidebar';
    }
    else{
    	$classes[] = 'right-sidebar';
    }
    return $classes;
}


/**
 * custom header
 *
 * @since Plaser 1.0.0
 *
 */
if ( ! function_exists( 'plaser_custom_header_setup' ) ) :
	function plaser_custom_header_setup() {
		add_theme_support( 'custom-header', apply_filters( 'plaser_custom_header_args', array(
			'default-image'          => '',
			'width'                  => 1800,
			'height'                 => 450,
			'flex-height'            => true,
			'header-text'            => false
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'plaser_custom_header_setup' );

/**
 * Goto Top functions
 *
 * @since Plaser 1.0.0
 *
 */

if ( !function_exists('plaser_go_to_top') ) :
function plaser_go_to_top(){ ?>	
	<a id="toTop" href="#" title="<?php esc_attr_e('Go to Top','plaser'); ?>">
	    <i class="fa fa-angle-double-up"></i>
	</a>
<?php } endif; 