<?php
	/**
		* Functions and definitions
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/	
	
	define ("MyStem", "1.4");
	
	if ( ! function_exists( 'mystem_setup' ) ) :
	/**
		* Sets up theme defaults and registers support for various WordPress features.
		*
		* Note that this function is hooked into the after_setup_theme hook, which
		* runs before the init hook. The init hook is too late for some features, such
		* as indicating support for post thumbnails.
	*/
	
	function mystem_setup() {
		// keep the media in check
		if ( ! isset( $content_width ) ) {
			$content_width = 762;
		}
		
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'mystem', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		/*
			* This theme styles the visual editor to resemble the theme style,
			* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'inc/assets/css/editor-style.css', get_template_directory() ) );
		
		// Enable support for Custom Logo for site.
		add_theme_support( 'custom-logo' );
		
		/*
			* Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support( 'post-thumbnails' );
		
		// add a hard cropped (for uniformity) image sizes for the products and posts
		add_image_size( 'mystem-featured-img', 762, 450, true );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'header'  => __( 'Header Menu', 'mystem' ),
		'primary' => __( 'Primary Menu', 'mystem' ),
		'mobileleft' => __( 'Mobile Left Menu', 'mystem' ),
		'mobileright' => __( 'Mobile Right Menu', 'mystem' ),		
		) );
		
		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		) );
	}
	endif; // stem_setup
	add_action( 'after_setup_theme', 'mystem_setup' );
	
	
	function mystem_add_menu_page() {
		add_theme_page( __('Theme Options', 'mystem' ), __('Theme Options', 'mystem' ), 'edit_theme_options', 'mystem', 'mystem_options_page' );
	}
	add_action( 'admin_menu', 'mystem_add_menu_page' );
	
	function mystem_welcome() {
		global $pagenow;
		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			wp_redirect( admin_url( 'themes.php?page=mystem' ) );			
		}	
	}
	add_action('admin_init', 'mystem_welcome');
	
	
	if ( ! function_exists( 'mystem_options_page' ) ) {
		function mystem_options_page() {
			load_template( dirname( __FILE__ ) . '/admin/index.php' );			
		}
	}
	
	/**
		* Register widgetized area and update sidebar with default widgets.
	*/
	
	function mystem_widgets_init() {
		register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'mystem' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'mystem' ),
		'id'            => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 1', 'mystem' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 2', 'mystem' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
		'name'          => __( 'Footer 3', 'mystem' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
		) );		
	}
	add_action( 'widgets_init', 'mystem_widgets_init' );
	
	
	/**
		* Enqueue scripts and styles.
	*/
	
	function mystem_scripts() {
		// main stylesheet
		wp_enqueue_style( 'mystem-style', get_stylesheet_uri() );
		
		wp_add_inline_style( 'mystem-style', mystem_color_scheme_css() );
		
		// font awesome stylesheet
		wp_enqueue_style( 'mystem-font-awesome', get_template_directory_uri() . '/font-awesome/css/fontawesome-all.min.css', array(), '5.4.1', 'all' );
		
		// Google fonts - Pacifico & Quicksand
		wp_enqueue_style( 'mystem-googlefonts', '//fonts.googleapis.com/css?family=Pacifico|Quicksand:400italic,700italic,400,700|Raleway:300,400,500,600,700|Open+Sans' );
		
		// theme assets
		wp_enqueue_script( 'mystem-navigation', get_template_directory_uri() . '/inc/assets/js/navigation.js', array('jquery'), null, true );
		
		wp_enqueue_script( 'mystem-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js' );		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'mystem_scripts' );	
	
	/** ===============
		* Adjust excerpt length
	*/
	
	if ( ! function_exists( 'mystem_custom_excerpt_length' ) ) {
		function mystem_custom_excerpt_length( $length ) {
			if ( !is_admin() ){
				return 35;
			}			
		}
	}
	add_filter( 'excerpt_length', 'mystem_custom_excerpt_length', 999 );
	
	
	/** ===============
		* Replace excerpt ellipses with new ellipses and link to full article
	*/
	if ( ! function_exists( 'mystem_excerpt_more' ) ) {
		function mystem_excerpt_more( $more ) {
			if ( !is_admin() ) {
				return '...</p> <div class="continue-reading"><a class="more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html( get_theme_mod( 'mystem_read_more', __( 'Read More', 'mystem' ) ) ) . ' <i class="fas fa-angle-double-right"></i></a></div>';
			}
		}
	}
	add_filter( 'excerpt_more', 'mystem_excerpt_more' );
	
	
	/** ===============
		* Add .top class to the first post in a loop
	*/
	if ( ! function_exists( 'mystem_first_post_class' ) ) {
		function mystem_first_post_class( $classes ) {
			global $wp_query;
			if ( 0 == $wp_query->current_post ) {
				$classes[] = 'top';
			}
			return $classes;
		}
	}
	add_filter( 'post_class', 'mystem_first_post_class' );
	
	
	/**
		* Change the Tag Cloud's Font Sizes.
		*
		* @since 1.0.
		*
		* @param array $args
		*
		* @return array
	*/
	if ( ! function_exists( 'mystem_change_tag_cloud_font_sizes' ) ) {
		function mystem_change_tag_cloud_font_sizes( array $args ) {
			$args['smallest'] = '8';
			$args['largest'] = '8';
			return $args;
		}
		}
	add_filter( 'widget_tag_cloud_args', 'mystem_change_tag_cloud_font_sizes' );			
		
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
		* Theme Widgets .
	*/
require get_template_directory() . '/inc/widgets.php';