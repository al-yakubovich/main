<?php
/**
 * mega-ui functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mega-ui
 */

if ( ! function_exists( 'mega_ui_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mega_ui_setup() {
	/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
	$GLOBALS['content_width'] = apply_filters( 'mega_ui_content_width', 640 );
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'mega-ui', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-width' => true,
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mega_ui_primary' => esc_html__( 'Primary Menu', 'mega-ui' ),
		'mega_ui_footer' => esc_html__( 'Footer Menu', 'mega-ui' ),
	) );
	
	add_image_size( 'mega_ui_thumb', 600, 400, true );
	add_image_size( 'mega_ui_page_thumb', 1200, 400, true );
}
endif;
add_action( 'after_setup_theme', 'mega_ui_setup' );


//including customizer
require( get_template_directory().'/customizer.php');

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mega_ui_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mega-ui' ),
		'id'            => 'mega-ui-sidebar',
		'description'   => __( 'Main Sidebar', 'mega-ui' ),
		'before_widget' => '<div id="%1$s" class="col-12 p-2 mb-3 widget-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title md20 sm19 xs18 p-2 ls2">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'mega-ui' ),
		'id' => 'mega-ui-footer-widget',
		'description'   => __( 'Footer widget area 1', 'mega-ui' ),
		'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-4 col-xs-12 mt3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="md16 sm15 xs14 w700 blue2">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Right', 'mega-ui' ),
		'id' => 'mega-ui-footer-widget-right',
		'description'   => __( 'Footer widget area', 'mega-ui' ),
		'before_widget' => '<div id="%1$s" class="col-xs-12 mt3 %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="md16 sm15 xs14 w700 blue2">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'mega_ui_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mega_ui_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() .'/css/owl.carousel.min.css' );
	wp_enqueue_style( 'mega-ui-google-font', 'https://fonts.googleapis.com/css?family=Bai+Jamjuree' );
	wp_enqueue_style('mega-ui-stylesheet', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style('mega-ui-wp-classes', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js');

	// on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
	
}
add_action( 'wp_enqueue_scripts', 'mega_ui_scripts' );

function mega_ui_footer_scripts() {	
	wp_enqueue_script( 'mega-ui-script', get_template_directory_uri() . '/js/theme.js');
}
add_action( 'wp_footer', 'mega_ui_footer_scripts' );

// menu setup	
function mega_ui_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'mega_ui_page_menu_args' );

 
function mega_ui_fallback_page_menu( $args = array() ) {

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','mega-ui');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item active"';
		$menu .= '<li ' . $class . '><a href="' .   esc_url( home_url('/')) . '" title="' . esc_html($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new mega_ui_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_html($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_html($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}
class mega_ui_walker_page_menu extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='dropdown-menu'>\n";
	}
	function start_el( &$output, $page, $depth=0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item active';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . esc_url(get_permalink($page->ID)) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}

class mega_ui_nav_walker extends Walker_Nav_Menu {	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children ) {
			$classes[] = 'dropdown';
		} 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_html( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_html( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_html( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_html( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_html( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';	
		$item_output = $args->before;
		$item_output .= '<a'. $attributes;
		$item_output .= ($args->has_children) ? 'class="dropdown-toggle">' : ' >';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children) ? ' <i class="fa fa-angle-down"></i></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}
function mega_ui_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'mega_ui_nav_menu_css_class' );

/****--- Navigation ---***/
function mega_ui_navigation() { 
?>
	<div class="row navi">
		<ul class="pager">
			<li class="next"><?php next_posts_link(__('Older Entries &raquo;','mega-ui')); ?></li>
			<li class="previous"><?php previous_posts_link(__('&laquo; Newer Entries ','mega-ui')); ?></li>
		</ul>
	</div>
<?php }

// post/page navigation
function mega_ui_link_pages(){
	$defaults = array(
		'before'           => '<p class="link-content">' . __( 'Pages:','mega-ui' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page','mega-ui'),
		'previouspagelink' => __( 'Previous page','mega-ui'),
		'pagelink'         => '%',
		'echo'             => 1
	);
				wp_link_pages( $defaults );
}

function mega_ui_post_link(){
	global $post; 
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="col-md-12">
		<?php next_post_link( '<div class="btn btn-primary btn-md post_link float-left mb-1">%link</div>' ); ?>
		<?php previous_post_link( '<div class="btn btn-primary btn-md post_link float-right mb-1">%link</div>'); ?>
	</div>
	<?php }
	

require( get_template_directory() . '/inc/breadcrumbs.php' );

if ( ! function_exists( 'mega_ui_comment' ) ){
require( get_template_directory() . '/comment-function.php' );
}