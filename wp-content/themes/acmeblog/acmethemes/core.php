<?php
/*It is underscores functions.php file and its modification*/
if ( ! function_exists( 'acmeblog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function acmeblog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on AcmeBlog, use a find and replace
         * to change 'acmeblog' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'acmeblog', get_template_directory() . '/languages' );

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
         * Enable support for custom logo.
         *
         *  @since AcmeBlog 1.3.0
          */
        add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 330, 195, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'acmeblog' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'acmeblog_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

	    /*woocommerce support*/
	    add_theme_support( 'woocommerce' );
    }
endif; // acmeblog_setup
add_action( 'after_setup_theme', 'acmeblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acmeblog_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'acmeblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'acmeblog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function acmeblog_scripts() {
	global $acmeblog_customizer_all_values;

    /*bxslider css*/
    wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/assets/library/bxslider/css/jquery.bxslider.min.css', array(), '4.2.5' );

    /*google font*/
    wp_enqueue_style( 'acmeblog-googleapis', '//fonts.googleapis.com/css?family=Oswald:300,400,700|Lato:400,700', array(), '1.0.1' );

    /*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );

    /*custom-css*/
    wp_enqueue_style( 'acmeblog-style', get_stylesheet_uri() );

    /*jquery start*/
    /*html5shiv*/
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    /*respond js*/
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), '1.1.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	if( 1 == $acmeblog_customizer_all_values['acmeblog-enable-sticky-sidebar'] ){
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/theia-sticky-sidebar/theia-sticky-sidebar.min.js', array('jquery'), '1.4.0', 1);
	}

    /*bxslider js*/
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/library/bxslider/js/jquery.bxslider.min.js', array('jquery'), '4.2.51', 1);

    /*custom-js*/
    wp_enqueue_script('acmeblog-custom', get_template_directory_uri() . '/assets/js/acmeblog-custom.js', array('jquery'), '1.0.1', 1);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'acmeblog_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function acmeblog_is_edit_page() {
	//make sure we are on the backend
	if ( !is_admin() ){
		return false;
	}
	global $pagenow;
	return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

/**
 * Enqueue admin scripts and styles.
 */
function acmeblog_admin_scripts( $hook ) {
	if ( 'widgets.php' == $hook || acmeblog_is_edit_page() ){
		wp_enqueue_media();
		wp_enqueue_script( 'acmeblog-widgets-script', get_template_directory_uri() . '/assets/js/acme-widget.js', array( 'jquery' ), '1.0.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'acmeblog_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require_once acmeblog_file_directory('acmethemes/core/template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require_once acmeblog_file_directory('acmethemes/core/extras.php');

/**
 * Load Jetpack compatibility file.
 */
require_once acmeblog_file_directory('acmethemes/core/jetpack.php');