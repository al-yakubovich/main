<?php
/**
 * RubberSoul constants, functions and definitions
 *
 * @package RubberSoul
 */

$rubbersoul_theme = wp_get_theme();
define('RUBBERSOUL_VERSION', $rubbersoul_theme -> get('Version'));
define('RUBBERSOUL_AUTHOR_URI', $rubbersoul_theme -> get('AuthorURI'));
define('RUBBERSOUL_TEMPLATE_PARTS', 'template-parts/');

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * RubberSoul setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * RubberSoul supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since RubberSoul 1.0
 */

add_action( 'after_setup_theme', 'rubbersoul_setup' );
function rubbersoul_setup() {
	/*
	 * Makes RubberSoul available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on RubberSoul, use a find and replace
	 * to change 'rubbersoul' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rubbersoul', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'rubbersoul' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	add_theme_support( 'title-tag' );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	// Images size
	add_image_size('excerpt-thumbnail-zg-176', 176, 176, true);
	add_image_size('latest-th-60', 60, 60, true); //Recent and popular posts
	add_image_size('related-post-th-150', 150, 150, true); //Related posts
	add_image_size('slider-recent-posts', 720, 360, true);

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

}

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since RubberSoul 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function rubbersoul_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'rubbersoul' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'rubbersoul' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$fuente = str_replace(" ", "+", get_theme_mod('rubbersoul_fonts', 'Open Sans'));

		$query_args = array(
			'family' => $fuente.":400italic,700italic,400,700",
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since RubberSoul 1.0
 */

add_action( 'wp_enqueue_scripts', 'rubbersoul_scripts_styles' );
function rubbersoul_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'rubbersoul-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140711', true );

	$font_url = rubbersoul_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'rubbersoul-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'rubbersoul-style', get_stylesheet_uri(), '', RUBBERSOUL_VERSION );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'rubbersoul-ie', get_template_directory_uri() . '/css/ie.css', array( 'rubbersoul-style' ), '20121010' );
	$wp_styles->add_data( 'rubbersoul-ie', 'conditional', 'lt IE 9' );

	// Dashicons
	wp_enqueue_style( 'dashicons' );

	// Font Awesome
	wp_enqueue_style('font-awesome', get_template_directory_uri() .'/css/font-awesome-4.7.0/css/font-awesome.min.css');

	// Toggle search
	wp_enqueue_script('rubbersoul-scripts-functions', get_template_directory_uri() .'/js/rubbersoul-scripts-functions.js', array('jquery'), RUBBERSOUL_VERSION, true);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Ribosome 1.9.0
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */

function rubbersoul_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'rubbersoul-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'rubbersoul_resource_hints', 10, 2 );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses rubbersoul_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since RubberSoul 1.0
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function rubbersoul_mce_css( $mce_css ) {
	$font_url = rubbersoul_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'rubbersoul_mce_css' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since RubberSoul 1.0
 */
function rubbersoul_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'rubbersoul_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since RubberSoul 1.0
 */
function rubbersoul_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'rubbersoul' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except Full-width Page Template', 'rubbersoul' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar(array(
    	'name' => __('RubberSoul: Below entries title', 'rubbersoul'),
        'description' => __('Appears below entries title', 'rubbersoul'),
        'id' => 'wt-sub-title',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));

	register_sidebar(array(
        'name' => __('RubberSoul: End of entries', 'rubbersoul'),
        'description' => __('Appears at the end of entries content', 'rubbersoul'),
        'id' => 'wt-post-end',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
}
add_action( 'widgets_init', 'rubbersoul_widgets_init' );

if ( !function_exists('rubbersoul_the_posts_pagination') ){
	function rubbersoul_the_posts_pagination(){

		echo '<div class="posts-pagination-wrapper">';
		the_posts_pagination(array(
				'mid_size' => 2,
				'prev_text' => __('&laquo; Previous', 'rubbersoul'),
				'next_text' => __('Next &raquo;', 'rubbersoul'),
			));
		echo '</div>';

	}
}

if ( ! function_exists( 'rubbersoul_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own rubbersoul_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since RubberSoul 1.0
 */
function rubbersoul_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'rubbersoul' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'rubbersoul' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'rubbersoul' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'rubbersoul' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'rubbersoul' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'rubbersoul' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'rubbersoul' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since RubberSoul 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function rubbersoul_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'rubbersoul-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'rubbersoul_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since RubberSoul 1.0
 */
function rubbersoul_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'rubbersoul_content_width' );

/**
 * Excerpt
 */

// Establecer la longitud del excerpt
add_filter( 'excerpt_length', 'rubbersoul_excerpt_length', 999 );

function rubbersoul_excerpt_length($length) {
	return 50;
}

// Cambiar [...] del excerpt por texto
add_filter('excerpt_more', 'rubbersoul_excerpt_more');

function rubbersoul_excerpt_more($more) {
   global $post;
   return '... <a href="'. get_permalink($post->ID) . '">' . __( 'Read more', 'rubbersoul' ) . ' &raquo;</a>';
}

function rubbersoul_entry_author(){

	$author = get_the_author();
	$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );

	$author_string = "<span class='author vcard'><a class='fn' rel='author' href='$author_url'>$author</a></span>";

	echo $author_string;

}

function rubbersoul_entry_date() {

	$published_long = esc_attr( get_the_date( 'c' ) );
	$published = get_the_date();
	$updated_long = esc_attr( get_the_modified_date( 'c' ) );
	$updated = get_the_modified_date();

	$time_string = "<time class='entry-date published' datetime='$published_long'>$published</time> <time class='updated' style='display:none;' datetime='$updated_long'>$updated</time>";

	echo $time_string;

}

// Includes
require_once( get_template_directory() . '/inc/rsoul-lite-customization.php' );
require_once( get_template_directory() . '/inc/rsoul-lite-customizer.php' );
require_once( get_template_directory() . '/inc/rsoul-lite-guide.php' );
