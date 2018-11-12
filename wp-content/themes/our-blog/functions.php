<?php
/**
 * our blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package our_blog
 */

if ( ! function_exists( 'our_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function our_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on our blog, use a find and replace
		 * to change 'our-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'our-blog', get_template_directory() . '/languages' );

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
		add_image_size( 'our-blog-slider-1-450x403', 450, 403, true );
		add_image_size( 'our-blog-about-me-288x158', 288, 158, true );
		add_image_size( 'our-blog-popular-posts-68x60', 68, 60, true );
		add_image_size( 'our-blog-latest-posts-90x80', 90, 80, true );
		add_image_size( 'our-blog-single-page-730x389', 730, 389, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'our-blog' ),
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
		add_theme_support( 'custom-background', apply_filters( 'our_blog_custom_background_args', array(
			'default-color' => 'ffffff',
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
			'height'      => 45,
			'width'       => 185,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'our_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function our_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'our_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'our_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function our_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'our-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'our-blog' ),
		'before_widget' => '<div id="%1$s" class="block widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="side-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'our-blog' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here it Support 3 Widgets in footer.', 'our-blog' ),
		'before_widget' => '<div id="%1$s" class="col-md-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'our_blog_widgets_init' );


/*Bootstrap Pagination Function*/

function our_blog_portfolio_bs_pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2) + 1;  
	$paged = get_query_var( 'paged');

	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<ul class="pagination">';
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"page-item active\"><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>":"<li class='page-item'><a href='".esc_url(get_pagenum_link($i))."' class='page-link'>".esc_html($i)."</a></li>";
			}
		}

		if ($paged < $pages ) echo "<li class='page-item next'><a href=\"".esc_url(get_pagenum_link($paged + 1))."\" class='page-link'>".esc_html__('Next Page','our-blog')."</a></li>";  
		echo "</ul>";
	}
}

/*
* Related Post
*/
function our_blog_get_related_posts( $taxonomy = '', $args = array() )
{ 
	if ( !is_single() )
		return false;

	if ( !$taxonomy ) 
		return false;

	$taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
	if ( !taxonomy_exists( $taxonomy ) )
		return false;

	$current_post = get_queried_object();

	$terms = wp_get_post_terms( $current_post->ID, $taxonomy, array( 'fields' => 'ids') );

	if ( !$terms || is_wp_error( $terms ) )
		return false;

	$defaults = array(
		'post_type' => $current_post->post_type,
		'post__not_in' => array( $current_post->ID),
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'terms' => $terms,
				'include_children' => false
			),
		),
	);

	if ( is_array( $args ) ) {
		$args = wp_parse_args( $args, $defaults );
	} else {
		$args = $defaults;
	}

	$q = get_posts( $args );

	return $q;
}
/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
* Widgets
*/
require get_template_directory() . '/inc/widgets/widgets-register.php';

/**
 * Bootstrap Navwalker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

