<?php
/**
 * elvinaa functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elvinaa
 */

 // Register Custom Navigation Walker
 require_once(get_template_directory() .'/inc/wp_bootstrap_navwalker.php');

 //Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

if ( ! function_exists( 'elvinaa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elvinaa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on elvinaa, use a find and replace
	 * to change 'elvinaa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'elvinaa', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => __( 'Primary', 'elvinaa' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	//post formats support
	add_theme_support( 'post-formats', array( 'gallery' ) );

	/**
	 * elvinaa theme info
	 */
	require get_template_directory() . '/inc/theme-info.php';

	/*
	* About page instance
	*/
	$config = array();
	Elvinaa_About_Page::elvinaa_init( $config );

}
endif;
add_action( 'after_setup_theme', 'elvinaa_setup' );


/**
* Custom Logo 
*
*
*/
function elvinaa_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 60,
	   'width'       => 180,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'elvinaa_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elvinaa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elvinaa_content_width', 640 );
}
add_action( 'after_setup_theme', 'elvinaa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elvinaa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'elvinaa' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'elvinaa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

  register_sidebar( array(
		'name'          => __( 'Footer Column1', 'elvinaa' ),
		'id'            => 'footer-column1',
		'description'   => __( 'Add widgets here.', 'elvinaa' ),
		'before_widget' => '<div id="%1$s" class="section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

  register_sidebar( array(
		'name'          => __( 'Footer Column2', 'elvinaa' ),
		'id'            => 'footer-column2',
		'description'   => __( 'Add widgets here.', 'elvinaa' ),
		'before_widget' => '<div id="%1$s" class="section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

  register_sidebar( array(
		'name'          => __( 'Footer Column3', 'elvinaa' ),
		'id'            => 'footer-column3',
		'description'   => __( 'Add widgets here.', 'elvinaa' ),
		'before_widget' => '<div id="%1$s" class="section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

  register_sidebar( array(
		'name'          => __( 'Footer Column4', 'elvinaa' ),
		'id'            => 'footer-column4',
		'description'   => __( 'Add widgets here.', 'elvinaa' ),
		'before_widget' => '<div id="%1$s" class="section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Left Sidebar', 'elvinaa' ),
		'id'            => 'top-left-sidebar',
		'description'   => __( 'Add widget here.', 'elvinaa' ),
		'before_widget' => '<div id="%1$s" class="section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'elvinaa_widgets_init' );

/**
* Admin Scripts
*/
if ( ! function_exists( 'elvinaa_admin_scripts' ) ) :
function elvinaa_admin_scripts($hook) {
  if('appearance_page_elvinaa-theme-info' != $hook)
    return;  
  wp_enqueue_style( 'elvinaa-info-css', get_template_directory_uri() . '/css/elvinaa-theme-info.css', false );  
}
endif;
add_action( 'admin_enqueue_scripts', 'elvinaa_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function elvinaa_dynamic_css_wrap() {

  require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
?>
  <style type="text/css" id="custom-theme-dynamic-style">
    <?php echo elvinaa_dynamic_css_stylesheet(); ?>
  </style>
<?php }
add_action( 'wp_head', 'elvinaa_dynamic_css_wrap' );



function elvinaa_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7');	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.3');	
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/css/flexslider.css', array(), '2.0');
	wp_enqueue_style( 'elvinaa-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,700,900', array(), '1.0');		
	wp_enqueue_style( 'm-customscrollbar-css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '1.0');		
	wp_enqueue_style( 'elvinaa-responsive', get_template_directory_uri() . '/css/elvinaa-style-responsive.css', array(), '1.0.9');	   
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0');   

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', true );
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js',array(),'2.0', true );		
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js',array(),'1.4.2', true );	
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js',array(),'1.7.0', true );
	wp_enqueue_script( 'elvinaa-script', get_template_directory_uri() . '/js/elvinaa-main.js', array('jquery'), '1.0.9', true );		
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'elvinaa_scripts' );


/**
* Registers an editor stylesheet for the theme.
*/
function elvinaa_theme_add_editor_styles() {
    add_editor_style(get_template_directory_uri() . '/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'elvinaa_theme_add_editor_styles' );


/**
* Custom search form
*/
function elvinaa_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','elvinaa' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="fa fa-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','elvinaa' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'elvinaa_search_form', 100 );


/** 
*Excerpt More
*/
function elvinaa_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'elvinaa_excerpt_more');


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function elvinaa_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
  }
}
add_action( 'wp_head', 'elvinaa_pingback_header' );


/**
 * Add sticky header
 */
function elvinaa_sticky_header_script() {
 	if(true===get_theme_mod( 'el_sticky_menu',false)) {
 		wp_enqueue_script( 'elvinaa-sticky-script', get_template_directory_uri() . '/js/elvinaa-sticky.js', array('jquery'), '1.0.9', true );		
 	} 
}
add_action( 'wp_enqueue_scripts', 'elvinaa_sticky_header_script' );


/**
 *  Set homepage and blog page after demo import
 */

function elvinaa_after_import_setup() {    
        
    //Assign menus to their locations
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
          'primary' => $main_menu->term_id,
        )
    );
    if(is_child_theme()) {
	    //Assign front page
	    $front_page = get_page_by_title( 'Home' );  
	    $blog_page = get_page_by_title( 'Blog' );  

	    update_option( 'show_on_front', 'page' );
	    update_option( 'page_on_front', $front_page -> ID );    
	    update_option( 'page_for_posts', $blog_page -> ID );
    }
    else{
    	update_option( 'show_on_front', 'posts' );
    }
}
add_action( 'pt-ocdi/after_import', 'elvinaa_after_import_setup' );


/** 
*plugins Required
*/
add_action( 'tgmpa_register', 'elvinaa_register_required_plugins' );

function elvinaa_register_required_plugins() {

    $plugins = array(      
      array(
          'name'               => 'Contact Form 7',
          'slug'               => 'contact-form-7',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),       
    );


    $config = array(
            'id'           => 'elvinaa',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );

    tgmpa( $plugins, $config );

}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra classes for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Upgrade Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'elvinaa-pro/class-customize.php' );