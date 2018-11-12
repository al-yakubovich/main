<?php
/**
 *
 * @package serenti
 */

global $serenti_site_layout;
$serenti_site_layout = array(
					'mz-sidebar-left' =>  esc_html__('Left Sidebar','serenti'),
					'mz-sidebar-right' => esc_html__('Right Sidebar','serenti'),
					'no-sidebar' => esc_html__('No Sidebar','serenti'),
					'mz-full-width' => esc_html__('Full Width', 'serenti')
					);
$serenti_thumbs_layout = array(
					'landscape' =>  esc_html__('Landscape','serenti'),
					'portrait' => esc_html__('Portrait','serenti')
					);

if ( ! function_exists( 'serenti_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function serenti_setup() {

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	*/
	load_theme_textdomain( 'serenti', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'serenti-slider-thumbnail', 900, 515, true );
	add_image_size( 'serenti-large-thumbnail', 1140, 640, true );
	add_image_size( 'serenti-landscape-thumbnail', 735, 490, true );
	add_image_size( 'serenti-portrait-thumbnail', 735, 1100, true );
	add_image_size( 'serenti-author-thumbnail', 170, 170, true );
	add_image_size( 'serenti-small-thumbnail', 100, 80, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'serenti' ),
	) );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
	} 

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'serenti_custom_background_args', array(
		'default-color' => 'FFFFFF',
		'default-image' => '',
	) ) );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'height'      => 140,
		'width'       => 500,
		'flex-height' => true,
	) );

}
endif; // serenti_setup
add_action( 'after_setup_theme', 'serenti_setup' );


/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
if ( ! function_exists( 'serenti_the_custom_logo' ) ) :
function serenti_the_custom_logo() {
	// Try to retrieve the Custom Logo
	$output = '';
	if ((function_exists('get_custom_logo'))&&(has_custom_logo()))
		$output = get_custom_logo();

		// Nothing in the output: Custom Logo is not supported, or there is no selected logo
		// In both cases we display the site's name
	if (empty($output))
		$output = '<hgroup><h1><a href="' . esc_url(home_url('/')) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1><div class="description">'.esc_html(get_bloginfo('description')).'</div></hgroup>';

	echo $output;
}
endif; // sanremo_custom_logo


/*
 * Add Bootstrap classes to the main-content-area wrapper.
 */
if ( ! function_exists( 'serenti_content_bootstrap_classes' ) ) :
function serenti_content_bootstrap_classes() {
	if ( is_page_template( 'template-fullwidth.php' ) ) {
		return 'col-md-12';
	}
	return 'col-md-8';
}
endif; // serenti_content_bootstrap_classes


/*
 * Generate categories for slider customizer
 */
function serenti_cats() {
	$cats = array();
	$cats[0] = esc_html__("All", "serenti");
	
	foreach ( get_categories() as $categories => $category ) {
		$cats[$category->term_id] = $category->name;
	}

	return $cats;
}

/*
 * generate navigation from default bootstrap classes
 */
include( get_template_directory() . '/inc/wp_bootstrap_navwalker.php');

if ( ! function_exists( 'serenti_header_menu' ) ) :
/*
 * Header menu (should you choose to use one)
 */
function serenti_header_menu() {

	$serenti_menu_center = get_theme_mod( 'serenti_menu_center' );

	/* display the WordPress Custom Menu if available */
	$serenti_add_center_class = "";
	if ( true == $serenti_menu_center ) {
		$serenti_add_center_class = " navbar-center";
	}

	wp_nav_menu(array(
		'theme_location'    => 'primary',
		'depth'             => 3,
		'container'         => 'div',
		'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse'.$serenti_add_center_class,
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'serenti_bootstrap_navwalker::fallback',
		'walker'            => new serenti_bootstrap_navwalker()
	));
} /* end header menu */
endif;

/*
 * Register Google fonts for theme.
 */
if ( ! function_exists( 'serenti_fonts_url' ) ) :
/**
 * Create your own serenti_fonts_url() function to override in a child theme.
 *
 * @since serenti 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function serenti_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Dancing Script, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Dancing Script: on or off', 'serenti' ) ) {
		$fonts[] = 'Dancing Script:400';
	}

	/* translators: If there are characters in your language that are not supported by Crimson Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Libre Baskerville font: on or off', 'serenti' ) ) {
		$fonts[] = 'Libre Baskerville:400,400italic';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Karma font: on or off', 'serenti' ) ) {
		$fonts[] = 'Karma:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'serenti' ) ) {
		$fonts[] = 'Open Sans:500';
	}

	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Karla font: on or off', 'serenti' ) ) {
		$fonts[] = 'Karla:400,400italic,700,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/*
 * load css/js
 */
function serenti_scripts() {

	// Add Google Fonts
	wp_enqueue_style( 'serenti-webfonts', serenti_fonts_url(), array(), null, null );

	// Add Bootstrap default CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );

	// Add main theme stylesheet
	wp_enqueue_style( 'serenti-style', get_stylesheet_uri() );

	// Add JS Files
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery') );
	wp_enqueue_script( 'serenti-js', get_template_directory_uri().'/js/serenti.js', array('jquery') );

	// Threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'serenti_scripts' );

/*
 * Add custom colors css to header
 */
if (!function_exists('serenti_custom_css_output'))  {
	function serenti_custom_css_output() {

		$serenti_accent_color = get_theme_mod( 'serenti_accent_color' );
		$serenti_links_color = get_theme_mod( 'serenti_links_color' );
		$serenti_hover_color = get_theme_mod( 'serenti_hover_color' );

		echo '<style type="text/css" id="serenti-custom-theme-css">';

		if ( $serenti_accent_color != "") {
			echo '.widget-title span { box-shadow: ' . esc_attr($serenti_accent_color) . ' 0 -4px 0 inset;}';
		}

		if ( $serenti_links_color != "") {
			echo 'a, .page-title { color: ' . esc_attr($serenti_links_color) . '; }' .
			'::selection { background-color: ' . esc_attr($serenti_links_color) . '; }' .
			'.section-title h2:after { background-color: ' . esc_attr($serenti_links_color) . '; }' .
			'.page-numbers .current, .widget_search button { background-color: ' . esc_attr($serenti_links_color) . '; border-color: ' . esc_attr($serenti_links_color) . '; }';
		}
		if ( $serenti_hover_color != "" ) {
			echo 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { background-color: ' . esc_attr($serenti_hover_color) . '; border-color: ' . esc_attr($serenti_hover_color) . '; }' .
			'.comment-reply-link:hover, .comment-reply-login:hover, .page-numbers li a:hover { background-color: ' . esc_attr($serenti_hover_color) . '; border-color: ' . esc_attr($serenti_hover_color) . '; }' .
			'.post-share a:hover, .post-header span a:hover, .post-meta .meta-info a:hover { border-color: ' . esc_attr($serenti_hover_color) . '; }' .
			'a:hover, a:focus, a:active, a.active, .mz-social-widget a:hover { color: ' . esc_attr($serenti_hover_color) . '; }';
		}
		if ( $serenti_buttons_hover_color != "" ) {
			echo '.read-more a:hover, .null-instagram-feed p a:hover { background-color: ' . esc_attr($serenti_buttons_hover_color) . '; border-color: ' . esc_attr($serenti_buttons_hover_color) . '; }' .
			'.posts-navigation a:hover { background-color: ' . esc_attr($serenti_buttons_hover_color) . '; border-color: ' . esc_attr($serenti_buttons_hover_color) . '; }' .
			'.nav>li>a:focus, .nav>li>a:hover, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover { background-color: ' . esc_attr($serenti_buttons_hover_color) . '; }' .
			'#back-top a:hover { background-color: ' . esc_attr($serenti_buttons_hover_color) . '; }';
		}

		echo '</style>';

	}
}
add_action( 'wp_head', 'serenti_custom_css_output');

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';

/*
 * Register widget areas.
 */

// if no title then add widget content wrapper to before widget
add_filter( 'dynamic_sidebar_params', 'serenti_check_sidebar_params' );
function serenti_check_sidebar_params( $params ) {
	global $wp_registered_widgets;

	$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	$settings = $settings_getter->get_settings();
	$settings = $settings[ $params[1]['number'] ];

	if ( $params[0][ 'after_widget' ] == '</div></div>' && isset( $settings[ 'title' ] ) && empty( $settings[ 'title' ] ) )
		$params[0][ 'before_widget' ] .= '<div class="content">';

	return $params;
}

function serenti_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'serenti' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'serenti' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'serenti' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Appears in the footer section of the site.', 'serenti' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'serenti' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Appears in the footer section of the site.', 'serenti' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'serenti' ),
		'id'            => 'footer-widget-3',
		'description'   => __( 'Appears in the footer section of the site.', 'serenti' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Full Width Footer', 'serenti' ),
		'id'            => 'footer-wide-widget',
		'description'   => __( 'Full width footer area for Instagram, etc. Appears in the footer section after widgets.', 'serenti' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><span>',
		'after_title'   => '</span></div>',
	) );

}
add_action( 'widgets_init', 'serenti_widgets_init' );

/*
 * Misc. functions
 */

/**
 * Footer credits
 */
function serenti_footer_credits() {
	$serenti_footer_text = get_theme_mod( 'serenti_footer_text' );
	?>
	<div class="site-info">
	<?php if ($serenti_footer_text == '') { ?>
	&copy; <?php echo date_i18n( __( 'Y', 'serenti' ) ); ?> <?php bloginfo( 'name' ); ?><?php esc_html_e('. All rights reserved.', 'serenti'); ?>
	<?php } else { echo esc_html( $serenti_footer_text ); } ?>
	</div><!-- .site-info -->

	<?php
	printf( esc_html__( 'Theme by %1$s Powered by %2$s', 'serenti' ) , '<a href="https://moozthemes.com/" target="_blank">MOOZ Themes</a>', '<a href="http://wordpress.org/" target="_blank">WordPress</a>');
}
add_action( 'serenti_footer', 'serenti_footer_credits' );

/* Wrap Post count in a span */
add_filter('wp_list_categories', 'serenti_cat_count_span');
function serenti_cat_count_span($links) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}