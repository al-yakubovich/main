<?php
/**
 * Authorize functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Authorize
 */

if ( ! function_exists( 'authorize_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function authorize_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'authorize' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'authorize', get_template_directory() . '/languages' );

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
	add_image_size( 'authorize-featured-image', 640, 9999 );
	add_image_size( 'authorize-thumbnail', 960, 9999 );
	add_image_size( 'authorize-home-feature', 270, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'authorize' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'authorize_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Add visual editor in Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	//Add editor style sheet
	add_editor_style('style-editor.css');

}
endif;
add_action( 'after_setup_theme', 'authorize_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function authorize_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'authorize_content_width', 640 );
}
add_action( 'after_setup_theme', 'authorize_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function authorize_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function authorize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Front Page', 'authorize' ),
		'id'            => 'sidebar-frontpage',
		'description'   => esc_html__( 'Sidebar that appears on the home page.', 'authorize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s shadow-border">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Inside', 'authorize' ),
		'id'            => 'sidebar-inside',
		'description'   => esc_html__( 'Sidebar that appears on the inside pages (not home page).', 'authorize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s shadow-border">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'authorize' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'First sidebar in the footer', 'authorize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'authorize' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Second sidebar in the footer', 'authorize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'authorize' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Third sidebar in the footer', 'authorize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'authorize_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 
	
function authorize_scripts() {
	wp_enqueue_style( 'authorize-style', get_stylesheet_uri() );

	wp_enqueue_script( 'authorize-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20151215', true );
	

	wp_enqueue_script( 'authorize-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//Add Google fonts
	authorize_add_google_font();
	
	//Add Font Awesome (for menu)
	wp_enqueue_style( 'authorize-fontawesome_icon', trailingslashit(get_template_directory_uri()).'assets/stylesheets/font-awesome/css/font-awesome.min.css', false );
		
}

add_action( 'wp_enqueue_scripts', 'authorize_scripts' );


/**
 * Add styles to admin for editor
 *
 */
function authorize_add_google_font() {
  	//Add Google fonts
	wp_enqueue_style( 'authorize-font-Merriweather', 'https://fonts.googleapis.com/css?family=Merriweather+Sans', false ); 

	wp_enqueue_style( 'authorize-font-Source-Sans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro', false ); 
}
add_action( 'admin_enqueue_scripts', 'authorize_add_google_font' );


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
 * Load updated Recent Widgets file.
 */
require get_template_directory() . '/inc/widget-recent-posts.php';


/**
 * Add exceprts to page
 */

function authorize_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'authorize_add_excerpts_to_pages' );


/**
 * Add entry type to post
 */
function authorize_entrytype_meta_html($object){
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
        <div>
           
            <?php 
				$radio_value = get_post_meta($object->ID, "authorize_entry_type", true);
			
				$Radio1_Checked = $radio_value == 'write' ? 'checked=checked' : NULL;
				$Radio2_Checked = $radio_value == 'event' ? 'checked=checked' : NULL;
				$Radio3_Checked = $radio_value == 'video' ? 'checked=checked' : NULL;
				$Radio4_Checked = $radio_value == 'podcast' ? 'checked=checked' : NULL;
			?>
              
              	<div>
                	<input type="radio" name="authorize_entry_type" id="entry_type_write" value="write" <?php echo esc_attr( $Radio1_Checked ) ?> />
                	<label for="entry_type_write"><span class="dashicons dashicons-media-document"></span> <?php echo __( 'Article', 'authorize' ); ?></label>
             	</div>
              
                <div>
                	<input type="radio" name="authorize_entry_type" id="entry_type_event" value="event" <?php echo esc_attr( $Radio2_Checked ) ?> />
                	<label for="entry_type_event"><span class="dashicons dashicons-calendar-alt"></span> <?php echo __( 'Event', 'authorize' ); ?></label>
				</div>
             
                <div>
                	<input type="radio" name="authorize_entry_type" id="entry_type_video" value="video" <?php echo esc_attr( $Radio3_Checked ) ?> />
                	<label for="entry_type_video"><span class="dashicons dashicons-video-alt2"></span> <?php echo __( 'Video', 'authorize' ); ?></label>
                </div>

                <div>
                	<input type="radio" name="authorize_entry_type" id="entry_type_podcast" value="podcast" <?php echo esc_attr( $Radio4_Checked ) ?> />
					<label for="entry_type_podcast"><span class="dashicons dashicons-controls-volumeon"></span> <?php echo __( 'Podcast', 'authorize' ); ?></label>
                </div>

        </div>
    <?php  
}

function authorize_add_entrytype_meta_box(){
    add_meta_box("authorize_entrytype-meta-box", "Entry Type", "authorize_entrytype_meta_html", "post", "side", "high", null);
}
add_action("add_meta_boxes", "authorize_add_entrytype_meta_box");


function authorize_save_entrytype_meta_box($post_id, $post, $update){
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce( $_POST["meta-box-nonce"] , basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_radio_value = "";
    
	if( isset( $_POST[ 'authorize_entry_type' ] ) ) {
		$meta_box_radio_value = esc_html( $_POST["authorize_entry_type"] );
	}
	update_post_meta($post_id, "authorize_entry_type", $meta_box_radio_value);
}

add_action("save_post", "authorize_save_entrytype_meta_box", 10, 3);

/**
 * Return entry type image
 */
 
function authorize_get_entrytype_image($type){
		 
	switch ($type) {
		case 'write':
			$image =  '<i class="fa fa-file-text-o" aria-hidden="true"></i>';
			break;
		
		case 'event':
			$image =  '<i class="fa fa-calendar" aria-hidden="true"></i>';
			break;
		
		case 'video':
			$image =  '<i class="fa fa-file-video-o" aria-hidden="true"></i>';
			break;
			
		case 'podcast':
			$image =  '<i class="fa fa-volume-up" aria-hidden="true"></i>';
			break;
			
		default :
			$image  = '<i class="fa fa-file-text-o" aria-hidden="true"></i>';;
	}
	
	return $image;

}

/**
 * Get Home Page Boxes
 */
function authorize_get_homepage_box($ThemeMod = NULL){
//Returns array for home page box

	$ID = get_theme_mod($ThemeMod, '');
	$arBox = array();

	if(empty($ID)){
		$arBox['ID'] = $ID;
		$arBox['title'] = NULL;
		$arBox['content'] = NULL;
		$arBox['image'] = NULL;
	
		$arBox['link'] = NULL;		
	}else{
		$objPost = get_post($ID); 

		$arBox['title'] = $objPost->post_title;
		$arBox['content'] = wpautop($objPost->post_excerpt);
		$arBox['image'] = get_the_post_thumbnail($ID, 'authorize-home-feature');
		
		$arBox['link'] = '<a href="'.get_permalink($ID).'">'.__( 'More', 'authorize' ).'</a>';
	}
	
	return $arBox;
					
	
}