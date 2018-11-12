<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	ADD CUSTOM HOOKS
---------------------------------------------------------------------------------- */

/* Used at top if header.php */
function thinkup_hook_header() { 
	do_action('thinkup_hook_header');
}

/* Used at top if header.php within the body tag */
function thinkup_bodystyle() { 
	do_action('thinkup_bodystyle');
}


/* ----------------------------------------------------------------------------------
	CORRECT Z-INDEX OF OEMBED OBJECTS
---------------------------------------------------------------------------------- */
function thinkup_fix_oembed( $embed ) {
	if ( strpos( $embed, '<param' ) !== false ) {
   		$embed = str_replace( '<embed', '<embed wmode="transparent" ', $embed );
   		$embed = preg_replace( '/param>/', 'param><param name="wmode" value="transparent" />', $embed, 1);
	}
	return $embed;
}
add_filter( 'embed_oembed_html', 'thinkup_fix_oembed', 1 );


//----------------------------------------------------------------------------------
//	ADD PAGE TITLE
//----------------------------------------------------------------------------------

function thinkup_title_select() {
	global $post;

	if ( is_page() ) {
		printf( '%s', esc_html( get_the_title() ) );
	} elseif ( is_attachment() ) {
		printf( __( 'Blog Post Image: %s', 'lan-thinkupthemes' ), esc_html( get_the_title( $post->post_parent ) ) );
	} else if ( is_single() ) {
		printf( '%s', html_entity_decode( esc_html( get_the_title() ) ) );
	} else if ( is_search() ) {
		printf( __( 'Search Results: %s', 'lan-thinkupthemes' ), get_search_query() );
	} else if ( is_404() ) {
		printf( __( 'Page Not Found', 'lan-thinkupthemes' ) );
	} else if ( is_category() ) {
		printf( __( 'Category Archives: %s', 'lan-thinkupthemes' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		printf( __( 'Tag Archives: %s', 'lan-thinkupthemes' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		the_post();
		printf( __( 'Author Archives: %s', 'lan-thinkupthemes' ), get_the_author() );
		rewind_posts();
	} elseif ( is_day() ) {
		printf( __( 'Daily Archives: %s', 'lan-thinkupthemes' ), get_the_date() );
	} elseif ( is_month() ) {
		printf( __( 'Monthly Archives: %s', 'lan-thinkupthemes' ), get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		printf( __( 'Yearly Archives: %s', 'lan-thinkupthemes' ), get_the_date( 'Y' ) );
	} elseif ( is_archive() ) {
		printf( get_the_archive_title() );
	} elseif ( is_tax() ) {
		printf( get_queried_object()->name );
	} elseif ( thinkup_check_isblog() ) {
		printf( __( 'Blog', 'lan-thinkupthemes' ) );
	} else {
		printf( '%s', html_entity_decode( esc_html( get_the_title() ) ) );
	}
}

// Remove "archive" text from custom post type archive pages
function thinkup_title_select_cpt($title) {
    if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'thinkup_title_select_cpt' );


/* ----------------------------------------------------------------------------------
	ADD BREADCRUMBS FUNCTIONALITY
---------------------------------------------------------------------------------- */

function thinkup_input_breadcrumb() {
global $thinkup_general_breadcrumbdelimeter;

	if ( empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter">/</span>';
	}
	else if ( ! empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter"> ' . esc_html( $thinkup_general_breadcrumbdelimeter ) . ' </span>';
	}

	$delimiter_inner   =   '<span class="delimiter_core"> &bull; </span>';
	$main              =   __( 'Home', 'lan-thinkupthemes' );
	$maxLength         =   30;

	/* Archive variables */
	$arc_year       =   get_the_time('Y');
	$arc_month      =   get_the_time('F');
	$arc_day        =   get_the_time('d');
	$arc_day_full   =   get_the_time('l');  

	/* URL variables */
	$url_year    =   get_year_link($arc_year);
	$url_month   =   get_month_link($arc_year,$arc_month);

	/* Display breadcumbs if NOT the home page */
	if ( !is_home() ) {
		echo '<div id="breadcrumbs"><div id="breadcrumbs-core">';
		global $post, $cat;
		$homeLink = home_url( '/' );
		echo '<a href="' . esc_url( $homeLink ) . '">' . esc_html( $main ) . '</a>' . $delimiter;    

		/* Display breadcrumbs for single post */
		if ( is_single() ) {
			$category = get_the_category();
			$num_cat = count($category);
			if ($num_cat <=1) {
				echo ' ' . esc_html( get_the_title() );
			} else {

				// Count Total categories
				foreach( get_the_category() as $category) {
					$count_categories++;
				}
				
				// Output Categories
				foreach( get_the_category() as $category) {
					$count_loop++;

					if ( $count_loop < $count_categories ) {
						echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>' . $delimiter_inner; 
					} else {
						echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>'; 
					}
				}
				
				if (strlen(get_the_title()) >= $maxLength) {
					echo ' ' . $delimiter . esc_html( trim( substr( get_the_title(), 0, $maxLength ) ) ) . ' &hellip;';
				} else {
					echo ' ' . $delimiter . esc_html( get_the_title() );
				}
			}
		} elseif (is_category()) {
			_e( 'Archive Category: ', 'lan-thinkupthemes' ) . get_category_parents($cat, true,' ' . $delimiter . ' ') ;
		} elseif ( is_tag() ) {
			_e( 'Posts Tagged: ', 'lan-thinkupthemes' ) . single_tag_title("", false) . '"';
		} elseif ( is_day()) {
			echo '<a href="' . esc_url( $url_year ) . '">' . $arc_year . '</a> ' . $delimiter . ' ';
			echo '<a href="' . esc_url( $url_month ) . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
		} elseif ( is_month() ) {
			echo '<a href="' . esc_url( $url_year ) . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
		} elseif ( is_year() ) {
			echo $arc_year;
		} elseif ( is_search() ) {
			_e( 'Search Results for: ', 'lan-thinkupthemes' ) . esc_html( get_search_query() ) . '"';
		} elseif ( is_page() && !$post->post_parent ) {
			echo esc_html( get_the_title() );
		} elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors( $post );
			krsort( $post_array ); 
			foreach( $post_array as $key=>$postid ){
				$post_ids = get_post( $postid );
				$title = $post_ids->post_title;
				echo '<a href="' . esc_url( get_permalink( $post_ids ) ) . '">' . esc_html( $title ) . '</a>' . $delimiter;
			}
			the_title();
		} elseif ( is_author() ) {
			global $author;
			$user_info = get_userdata($author);
			_e( 'Archived Article(s) by Author: ', 'lan-thinkupthemes' ) . esc_html( $user_info->display_name );
		} elseif ( is_404() ) {
			_e( 'Error 404 - Not Found.', 'lan-thinkupthemes' );
		} elseif ( is_archive() ) {
			echo get_the_archive_title();
		} elseif( is_tax() ) {
			echo esc_html( get_queried_object()->name );
		} elseif ( thinkup_check_isblog() ) {
			_e( 'Blog', 'lan-thinkupthemes' );
		} else {
			echo html_entity_decode( esc_html( get_the_title() ) );
		}

		echo '</div></div>';
    }
}

/* ----------------------------------------------------------------------------------
	ADD PAGINATION FUNCTIONALITY
---------------------------------------------------------------------------------- */
function thinkup_input_pagination( $pages = "", $range = 2 ) {
global $paged;
global $wp_query;
		
	$showitems = ($range * 2)+1;  

	if(empty($paged)) $paged = 1;

	if($pages == "") {
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo '<ul class="pag">';
		
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
				echo '<li class="pag-first"><a href="' . esc_url( get_pagenum_link(1) ) . '">&laquo;</a></li>';
			if($paged > 1 && $showitems < $pages) 
				echo '<li class="pag-previous"><a href="' . esc_url( get_pagenum_link($paged - 1) ) . '">&lsaquo; ' . __( 'Prev', 'lan-thinkupthemes' ) . '</a></li>';

			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? '<li class="current"><span>' . $i . '</span></li>':'<li><a href="' . esc_url( get_pagenum_link($i) ) . '">'. $i . '</a></li>';
				}
			}

			if ($paged < $pages && $showitems < $pages) 
				echo '<li class="pag-next"><a href="' . esc_url( get_pagenum_link($paged + 1) ) . '">' . __( 'Next', 'lan-thinkupthemes' ) . ' &rsaquo;</i></a></li>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
				echo '<li class="pag-last" ><a href="' . esc_url( get_pagenum_link($pages) ) . '">&raquo;</a></li>';

		echo '</ul>';
     }
}


/* ----------------------------------------------------------------------------------
	REMOVE NON VALID REL CATEGORY TAGS
---------------------------------------------------------------------------------- */

function thinkup_removerel_category( $text ) { 
	$text = str_replace( 'rel="category"', "", $text );
	return $text; 
};
add_filter( 'the_category', 'thinkup_removerel_category' );  


/* ----------------------------------------------------------------------------------
	ADD CUSTOM FEATURED IMAGE SIZES
---------------------------------------------------------------------------------- */

if ( ! function_exists( 'thinkup_input_addimagesizes' ) ) {
	function thinkup_input_addimagesizes() {

		/* 1 Column Layout */
		add_image_size( 'column1-1/3', 1140, 380, true );
		add_image_size( 'column1-2/3', 1140, 760, true );
		add_image_size( 'column1-1/4', 1140, 285, true );
		add_image_size( 'column1-2/5', 1140, 456, true );

		/* 2 Column Layout */
		add_image_size( 'column2-1/1', 570, 570, true );
		add_image_size( 'column2-1/2', 570, 285, true );
		add_image_size( 'column2-2/3', 570, 380, true );
		add_image_size( 'column2-3/5', 570, 342, true );

		/* 3 Column Layout */
		add_image_size( 'column3-1/1', 380, 380, true );
		add_image_size( 'column3-1/2', 380, 190, true );
		add_image_size( 'column3-1/3', 380, 127, true );
		add_image_size( 'column3-2/3', 380, 254, true );

		/* 4 Column Layout */
		add_image_size( 'column4-1/1', 285, 285, true );
		add_image_size( 'column4-1/2', 285, 143, true );
		add_image_size( 'column4-2/3', 285, 190, true );
	}
	add_action( 'after_setup_theme', 'thinkup_input_addimagesizes' );
}

if ( ! function_exists( 'thinkup_input_showimagesizes' ) ) {
	function thinkup_input_showimagesizes($sizes) {

		/* 1 Column Layout */
		$sizes['column1-1/3'] = __( 'Full - 1:3', 'lan-thinkupthemes' );
		$sizes['column1-2/3'] = __( 'Full - 2:3', 'lan-thinkupthemes' );
		$sizes['column1-1/4'] = __( 'Full - 1:4', 'lan-thinkupthemes' );
		$sizes['column1-2/5'] = __( 'Full - 2:5', 'lan-thinkupthemes' );

		/* 2 Column Layout */
		$sizes['column2-1/1'] = __( 'Half - 1:1', 'lan-thinkupthemes' );
		$sizes['column2-1/2'] = __( 'Half - 1:2', 'lan-thinkupthemes' );
		$sizes['column2-2/3'] = __( 'Half - 2:3', 'lan-thinkupthemes' );
		$sizes['column2-3/5'] = __( 'Half - 3:5', 'lan-thinkupthemes' );

		/* 3 Column Layout */
		$sizes['column3-1/1'] = __( 'Third - 1:1', 'lan-thinkupthemes' );
		$sizes['column3-1/2'] = __( 'Third - 1:2', 'lan-thinkupthemes' );
		$sizes['column3-1/3'] = __( 'Third - 1:3', 'lan-thinkupthemes' );
		$sizes['column3-2/3'] = __( 'Third - 2:3', 'lan-thinkupthemes' );

		/* 4 Column Layout */
		$sizes['column4-1/1'] = __( 'Quarter - 1:1', 'lan-thinkupthemes' );
		$sizes['column4-1/2'] = __( 'Quarter - 1:2', 'lan-thinkupthemes' );
		$sizes['column4-2/3'] = __( 'Quarter - 2:3', 'lan-thinkupthemes' );

		return $sizes;
	}
	add_filter('image_size_names_choose', 'thinkup_input_showimagesizes');
}

/* ----------------------------------------------------------------------------------
	ADD HOME: HOME TO CUSTOM MENU PAGE LIST
---------------------------------------------------------------------------------- */

function thinkup_menu_homelink( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'thinkup_menu_homelink' );


//----------------------------------------------------------------------------------
//	ADD FUNCTION TO GET CURRENT PAGE URL
//----------------------------------------------------------------------------------

function thinkup_check_ishome() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= '://' . wp_unslash( $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] );

	$pageURL = rtrim($pageURL, '/') . '/';
	$pageURL = str_replace( "www.", "", $pageURL );
	$siteURL = str_replace( "www.", "", site_url( '/' ) );

	if ( $pageURL == $siteURL ) {
		return true;
	} else {
		return false;
	}
}


//----------------------------------------------------------------------------------
//	ADD CUSTOM COMMENTS POP UP LINK FUNCTION - Credit to http://www.thescubageek.com/code/wordpress-code/add-get_comments_popup_link-to-wordpress/
//----------------------------------------------------------------------------------

// Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
function thinkup_input_commentspopuplink( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments','lan-thinkupthemes' );
    if ( false === $one ) $one = __( '1 Comment','lan-thinkupthemes' );
    if ( false === $more ) $more = __( '% Comments','lan-thinkupthemes' );
    if ( false === $none ) $none = __( 'Comments Off','lan-thinkupthemes' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __( 'Enter your password to view comments.', 'lan-thinkupthemes' );
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s','lan-thinkupthemes'), $title ) ) . '">';
    $str .= thinkup_comments_returnstring( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
 
// Modifies WordPress's built-in comments_number() function to return string instead of echo
function thinkup_comments_returnstring( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __( '% Comments', 'lan-thinkupthemes' ) : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __( 'No Comments', 'lan-thinkupthemes' ) : $zero;
    else // must be one
        $output = ( false === $one ) ? __( '1 Comment', 'lan-thinkupthemes' ) : $one;
 
    return apply_filters('comments_number', $output, $number);
}


//----------------------------------------------------------------------------------
//	CHANGE FALLBACK WP_PAGE_MENU CLASSES TO MATCH WP_NAV_MENU CLASSES
//----------------------------------------------------------------------------------

function thinkup_input_menuclass( $ulclass ) {

	// Add menu class to list
	$ulclass = preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	$ulclass = str_replace( 'children', 'sub-menu', $ulclass );

	// Remove div wrapper
	$ulclass = str_replace( '<div class="menu">', '', $ulclass );
	$ulclass = str_replace( '</div>', '', $ulclass );

	return preg_replace('/<div (.*)>(.*)<\/div>/iU', '$2', $ulclass );
}
add_filter( 'wp_page_menu', 'thinkup_input_menuclass' );


//----------------------------------------------------------------------------------
//	DETERMINE IF THE PAGE IS A BLOG - USEFUL FOR HOMEPAGE BLOG.
//----------------------------------------------------------------------------------

// Credit to: http://www.poseidonwebstudios.com/web-development/wordpress-is_blog-function/
function thinkup_check_isblog() {
 
    global $post;
 
    //Post type must be 'post'.
    $post_type = get_post_type($post);
 
    //Check all blog-related conditional tags, as well as the current post type,
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() )
        && ($post_type == 'post')
    ) ? true : false ;
 
}


//----------------------------------------------------------------------------------
//	ADD FEATURED IMAGE THUMBNAIL.
//----------------------------------------------------------------------------------

// Add featured images to posts
add_filter('manage_pages_columns', 'thinkup_posts_columns', 5);
add_filter('manage_posts_columns', 'thinkup_posts_columns', 5);
add_action('manage_posts_custom_column', 'thinkup_posts_custom_columns', 5, 2);
add_action('manage_pages_custom_column', 'thinkup_posts_custom_columns', 5, 2);
function thinkup_posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __( 'Thumbs', 'lan-thinkupthemes' );
    return $defaults;
}
function thinkup_posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'thumbnail' );
    }
}


//----------------------------------------------------------------------------------
//	GET EXCERPT BY ID.
//----------------------------------------------------------------------------------

function thinkup_input_excerptbyid($post_id){

	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_excerpt; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 35; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if(count($words) > $excerpt_length) {
		array_pop($words);
		array_push($words, '…');
		$the_excerpt = implode(' ', $words);
	}

	$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}


//----------------------------------------------------------------------------------
//	CUSTOM READ MORE FOR the_content() AND the_excerpt().
//----------------------------------------------------------------------------------

function thinkup_modify_read_more_link() {
	return '<p><a href="'. esc_url( get_permalink( get_the_ID() ) ) . '" class="more-link themebutton">' . __( 'Read More', 'lan-thinkupthemes') . '</a></p>';
}
add_filter( 'excerpt_more', 'thinkup_modify_read_more_link' );
add_filter( 'the_content_more_link', 'thinkup_modify_read_more_link' );


//----------------------------------------------------------------------------------
//	ADD GOOGLE FONT - OPEN SANS.
//----------------------------------------------------------------------------------

function thinkup_googlefonts_url() {
    $fonts_url = '';

    // Translators: Translate this to 'off' if there are characters in your language that are not supported by Open Sans
    $font_translate = _x( 'on', 'Open Sans font: on or off', 'lan-thinkupthemes' );
 
    if ( 'off' !== $font_translate ) {
        $font_families = array();
  
        if ( 'off' !== $font_translate ) {
            $font_families[] = 'Open Sans:300,400,600,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

function thinkup_googlefonts_scripts() {
   wp_enqueue_style( 'thinkup-google-fonts', thinkup_googlefonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'thinkup_googlefonts_scripts' );


//----------------------------------------------------------------------------------
//	FIX JETPACK PHOTON IMAGE LOAD ISSUE - DISABLE CACHING FOR SPECIFIC IMAGES 
//----------------------------------------------------------------------------------

function thinkup_photon_exception( $val, $src, $tag ) {
        if ( $src == get_template_directory_uri() . '/images/transparent.png' ) {
                return true;
        }
        return $val;
}
add_filter( 'jetpack_photon_skip_image', 'thinkup_photon_exception', 10, 3 );

