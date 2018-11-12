<?php
/**
 * newspaperly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newspaperly
 */


if ( ! function_exists( 'newspaperly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

function newspaperly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newspaperly, use a find and replace
		 * to change 'newspaperly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newspaperly', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 300 );

		add_image_size( 'newspaperly-grid', 350 , 230, true );
		add_image_size( 'newspaperly-slider', 850 );
		add_image_size( 'newspaperly-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'newspaperly' ),
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
		add_theme_support( 'custom-background', apply_filters( 'newspaperly_custom_background_args', array(
			'default-color' => '#f1f1f1',
			'default-image' => '',
			'default-image' => '%1$s/images/bg.png',
			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'newspaperly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspaperly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newspaperly_content_width', 640 );
}
add_action( 'after_setup_theme', 'newspaperly_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newspaperly_widgets_init() {
/**
 * Widgets shown in the header, beside the logo.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Header Widget', 'newspaperly' ),
	'id'            => 'banner-widget',
	'description'   => esc_html__( 'Add widgets to the header banner here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="banner-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
	) );

/**
 * Widgets shown in the sidebar.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Sidebar', 'newspaperly' ),
	'id'            => 'sidebar-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
	) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (1)', 'newspaperly' ),
	'id'            => 'footerwidget-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
	) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (2)', 'newspaperly' ),
	'id'            => 'footerwidget-2',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
	) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (3)', 'newspaperly' ),
	'id'            => 'footerwidget-3',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
	) );

/**
 * Widgets shown under the navigation.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (1)', 'newspaperly' ),
	'id'            => 'headerwidget-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
	) );

register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (2)', 'newspaperly' ),
	'id'            => 'headerwidget-2',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
	) );

register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (3)', 'newspaperly' ),
	'id'            => 'headerwidget-3',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
	) );
}
add_action( 'widgets_init', 'newspaperly_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function newspaperly_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'newspaperly-style', get_stylesheet_uri() );
	wp_enqueue_script( 'newspaperly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'newspaperly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'newspaperly-flexslider-jquery', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'newspaperly-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newspaperly_scripts' );

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue Google fonts, credits can be found in readme.
 */
function newspaperly_google_fonts() {

	wp_enqueue_style( 'newspaperly-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'newspaperly_google_fonts' );


/**
 * excerpt Changes
 */

function newspaperly_new_excerpt_more( $more ) {
	if ( ! is_admin() )
		/* If you want to change replace the dots after excerpt with something else, do it on the line below */
	return '...';
}
add_filter('excerpt_more', 'newspaperly_new_excerpt_more');

function newspaperly_custom_excerpt_length( $length ) {
	if ( ! is_admin() )
		/* If you want to change the excerpt length, change this number */
	return 32;
}
add_filter( 'excerpt_length', 'newspaperly_custom_excerpt_length', 1 );

/**
 * Blog Pagination 
 */
if ( !function_exists( 'newspaperly_numeric_posts_nav' ) ) {
	
	function newspaperly_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(the_posts_pagination(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
				) ));
		}
	}
}





/**
 * * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function newspaperly_comparepage_css($hook) {
	if ( 'appearance_page_newspaperly-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'newspaperly-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'newspaperly_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'newspaperly_themepage');
function newspaperly_themepage(){
	$theme_info = add_theme_page( __('NewsPaperly','newspaperly'), __('NewsPaperly','newspaperly'), 'manage_options', 'newspaperly-info.php', 'newspaperly_info_page' );
}

function newspaperly_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap newspaperly-add-css">
		<div>
			<h1>
				<?php echo esc_html('Welcome to NewsPaperly!','newspaperly'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("Contact Support", "newspaperly"); ?></h3>
						<p><?php echo esc_html("Getting started with a new theme can be difficult, if you have issues with NewsPaperly then throw us an email.", "newspaperly"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'newspaperly'); ?>" class="button button-primary">
							<?php echo esc_html("Contact Support", "newspaperly"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("View our other themes", "newspaperly"); ?></h3>
						<p><?php echo esc_html("Do you like our concept but feel like the design doesn't fit your need? Then check out our website for more designs.", "newspaperly"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/wordpress-themes/', 'newspaperly'); ?>" class="button button-primary">
							<?php echo esc_html("View All Themes", "newspaperly"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("Premium Edition", "newspaperly"); ?></h3>
						<p><?php echo esc_html("If you enjoy NewsPaperly and want to take your website to the next step, then check out our premium edition here.", "newspaperly"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/newspaperly/', 'newspaperly'); ?>" class="button button-primary">
							<?php echo esc_html("Read More", "newspaperly"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo esc_html("Free Vs Premium","newspaperly"); ?></h2>
		<div class="newspaperly-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/newspaperly/', 'newspaperly'); ?>" class="button button-primary">
				<?php echo esc_html("Read Full Description", "newspaperly"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/newspaperly/', 'newspaperly'); ?>" class="button button-primary">
				<?php echo esc_html("View Theme Demo", "newspaperly"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo esc_html("Theme Feature", "newspaperly"); ?></strong></th>
					<th><strong><?php echo esc_html("Basic Version", "newspaperly"); ?></strong></th>
					<th><strong><?php echo esc_html("Premium Version", "newspaperly"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo esc_html("Header Background Color/Image", "newspaperly"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Custom Header Logo Or Text	", "newspaperly"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Hide Logo Text", "newspaperly"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Premium Support", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Recent Posts Widget", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Easy Google Fonts", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Pagespeed Plugin", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Only Show Upper Widgets On Front Page", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Replace Copyright Text", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Upper Widgets Colors", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Navigation Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Post/Page Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Blog Feed Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Footer Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Sidebar Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Background Color", "newspaperly"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
			</tbody>
		</table>

	</div>
	<?php
}
