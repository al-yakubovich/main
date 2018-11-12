<?php
/**
 * Custom functions are delared here
 */

/**
 * Makes the header transparent if header
 * transparency is selected under customizer
 */

if ( ! function_exists( 'writer_blog_header_transparency' ) ) :

function writer_blog_header_transparency() {
	if ( is_home() ) {

		if ( get_theme_mod( 'ct-homepage-transparent-setting', 'yes' ) == 'yes' ) {
			return 'home-header';	
		}

		return 'white-header';
	} elseif ( is_category() ) {
		if ( get_theme_mod( 'ct-category-transparent-setting' ) == 'yes' ) {
			return 'home-header';	
		}
		
		return 'white-header';
	} else {
		return 'white-header';
	}
}

endif;

/**
 * Checks if default featured image is given
 * else takes the image that comes with theme 
 * as default featured image
 */

if ( ! function_exists( 'writer_blog_default_featured_image' ) ) :

function writer_blog_default_featured_image() {

	if ( get_theme_mod( 'ct-default-featured-setting' ) ) {
		return get_theme_mod( 'ct-default-featured-setting' );
	} else {
		return get_template_directory_uri() . '/img/bg.jpg';
	}

}

endif;

/**
 * Switches the lighter logo if the
 * header is transparent
 */

if ( ! function_exists( 'writer_blog_logo_switch' ) ) :

function writer_blog_logo_switch( $value ) {
	$main_logo_image;

	if ( $value == 'home-header' ) {
    $main_logo_image = ( get_theme_mod( 'ct-transparent-logo-setting' ) ) ? wp_get_attachment_url( get_theme_mod( 'ct-transparent-logo-setting' ) ) : wp_get_attachment_url( get_theme_mod( 'ct-default-logo-setting' ) );

	} else {
    $main_logo_image = ( get_theme_mod( 'ct-default-logo-setting' ) ) ? wp_get_attachment_url( get_theme_mod( 'ct-default-logo-setting' ) ) : wp_get_attachment_url( get_theme_mod( 'ct-transparent-logo-setting' ) );
	}

	return $main_logo_image;
}

endif;

/**
 * Switches the icon color of the mobile menu if
 * transparent header
 */

if ( ! function_exists( 'writer_blog_mobile_menu_icon_color_switch' ) ) :

function writer_blog_mobile_menu_icon_color_switch() {
	if ( writer_blog_header_transparency() == "home-header" ) {
		return 'white';
	}

	return 'black';
}

endif;

/**
 * Adds a span tag with dropdown icon after the unordered list
 * that has a sub menu on the mobile menu.
 */

class writer_blog_dropdown_toggle_walker_nav_menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        if( 'mobile_menu' == $args->theme_location ) {
            $output .='<span class="dropdown-toggle fa fa-angle-down"></span>';
        }
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
}

/**
 * Deplays the slider background image. The functoin
 * checks if the slider image is set else takes the
 * featured image as the slider image. If both not
 * set, it takes the theme default featured image.
 */

if ( ! function_exists( 'writer_blog_owl_carousal_slider_image' ) ) :

function writer_blog_owl_carousal_slider_image() {
	
  if ( get_theme_mod( 'ct-default-slider-bg-setting', 'post' ) == 'post' ) {

    if ( has_post_thumbnail() ){

    	return the_post_thumbnail_url( 'full' );

    } elseif( get_theme_mod( 'ct-default-featured-setting' ) ) {

  		return get_theme_mod( 'ct-default-featured-setting' );

    } else {
    
      return get_template_directory_uri() . '/img/bg.jpg';
    
    }

  } else {

    if( get_theme_mod( 'ct-default-featured-setting' ) ) {

      return get_theme_mod( 'ct-default-featured-setting' );

    } else {
    
      return get_template_directory_uri() . '/img/bg.jpg';
    
    }

  }
}

endif;

/**
 * Displays Breadcrumb on post/pages
 */

if ( ! function_exists( 'writer_blog_the_breadcrumb' ) ) :

function writer_blog_the_breadcrumb() {
    $sep = ' <span class="fa fa-angle-double-right"></span> ';
    if ( !is_front_page() ) {

	// Start the breadcrumb with a link to your homepage
        echo '<div class="container"><div class="breadcrumb clearfix"><span class="fa fa-home"></span>';
        echo '<a href="' . esc_url( home_url() ) . '">';
        echo esc_html__( 'Home', 'writer-blog' );
        echo '</a>' . $sep;

	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if ( is_category() || is_single() ){
            the_category( ', ' );
        } elseif ( is_archive() || is_single() ){
            if ( is_day() ) {
                echo get_the_date();
            } elseif ( is_month() ) {
                echo get_the_date( 'F Y' );
            } elseif ( is_year() ) {
                echo get_the_date( 'Y' );
            } else {
                esc_html__( 'Blog Archives', 'writer-blog' );
            }
        }

	// If the current page is a single post, show its title with the separator
        if ( is_single() ) {
            echo $sep;
            the_title();
        }

	// If the current page is a static page, show its title.
        if ( is_page() ) {
            echo the_title();
        }

        echo '</div></div><!-- /.container -->';
    }
}

endif;

/**
 * Adds image field on categories
 */
/**
 * Plugin class
 **/
if ( ! class_exists( 'Writer_Blog_Tax_Meta' ) ) {

class Writer_Blog_Tax_Meta {

  public function __construct() {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() {
   add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
   add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );
   add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
   add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() {
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new category page
  * @since 1.0.0
 */
 public function add_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php esc_html_e('Image', 'writer-blog'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary writer_blog_tax_media_button" id="writer_blog_tax_media_button" name="writer_blog_tax_media_button" value="<?php esc_html_e( 'Add Image', 'writer-blog' ); ?>" />
       <input type="button" class="button button-secondary writer_blog_tax_media_remove" id="writer_blog_tax_media_remove" name="writer_blog_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'writer-blog' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = sanitize_text_field( wp_unslash( $_POST['category-image-id'] ) );
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php esc_html_e( 'Image', 'writer-blog' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo esc_attr( $image_id ); ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary writer_blog_tax_media_button" id="writer_blog_tax_media_button" name="writer_blog_tax_media_button" value="<?php esc_html_e( 'Add Image', 'writer-blog' ); ?>" />
         <input type="button" class="button button-secondary writer_blog_tax_media_remove" id="writer_blog_tax_media_remove" name="writer_blog_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'writer-blog' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = sanitize_text_field( wp_unslash( $_POST['category-image-id'] ) );
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function writer_blog_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     writer_blog_media_upload('.writer_blog_tax_media_button.button'); 
     $('body').on('click','.writer_blog_tax_media_remove',function(){
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php }

  }
 
$WRITER_BLOG_TAX_META = new Writer_Blog_Tax_Meta();
$WRITER_BLOG_TAX_META -> init();
 
}

/**
 * Displays Category image
 */

if ( ! function_exists( 'writer_blog_category_image' ) ) :

function writer_blog_category_image() {
	// Get the current category ID, e.g. if we're on a category archive page
	$category = get_category( get_query_var( 'cat' ) );
	$cat_id = $category->cat_ID;
	// Get the image ID for the category
	$image_id = get_term_meta ( $cat_id, 'category-image-id', true );
	// Echo the image
	if ($image_id) {
		return wp_get_attachment_image_url( $image_id, 'large' );
	} else {
		return writer_blog_default_featured_image();
	}
}

endif;

/**
 * Displays Breadcrumb if checked
 */

if ( ! function_exists( 'writer_blog_breadcrumb_switcher' ) ) :

function writer_blog_breadcrumb_switcher() {
	if ( get_theme_mod( 'ct-breadcrumb-setting' ) == 'yes' ) {
		return writer_blog_the_breadcrumb();
	}

	return '';
}

endif;

/**
 *  Adds extra class to search widget
 */

if ( ! function_exists( 'writer_blog_adapt_search_form' ) ) :

function writer_blog_adapt_search_form( $form ) {
    $form = str_replace(
        'input type="submit" id="searchsubmit" value="Search" /',
        'button id="searchsubmit" class="submit-right-transition">Search</button',
        $form
    );
    // return the modified string
    return $form;
}

endif;
// run the search form HTML output through the newly defined filter
add_filter( 'get_search_form', 'writer_blog_adapt_search_form' );

/**
 *  Displays author and comment info on post excerpt
 */

if ( ! function_exists( 'writer_blog_excerpt_info' ) ) :

  function writer_blog_excerpt_info() {
    ?>
      <span class="post-by"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a></span>
      <span class="comments-on">
        <?php
        if ( !comments_open() ) 
          { esc_html_e( 'Off' , 'writer-blog' ); }
        else { ?>
          <a href="<?php echo esc_url( get_comments_link() ); ?>">
            <?php echo absint( get_comments_number() ); ?>
          </a>
        <?php } ?>
      </span>
    <?php
  }

endif;

/**
 * Set the content width
 */

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/**
 *  Displays categories under post excerpt
 */

if ( ! function_exists( 'writer_blog_list_categories' ) ) :

function writer_blog_list_categories() {
    $categories     = wp_get_post_categories( get_the_ID() );
    $category_links = get_category_link( get_the_ID() );

    echo '<span class="single-category">';
    foreach($categories as $category){

        echo '<a href="' . esc_url( get_category_link( $category ) ) . '">' . esc_html( get_cat_name( $category ) ) . '</a>';
    }
    echo '</span>';
}

endif;

/**
 * Delay pro notice after_setup_theme
 */
if ( ! function_exists( 'delay_pro_notice' ) ) :

function delay_pro_notice() {

  global $pagenow;
  
  if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {  
    if (!isset($_COOKIE['statepro'])) {
      setcookie('statepro', 'hidden',  time()+86400); // 1 day
    }
  }
}

endif;

add_action( 'after_setup_theme', 'delay_pro_notice' );
/**
 * Writer Pro notice
 */

function writer_pro_notice() {
    global $pagenow;
    if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
        $pro_state = 'hidden';
    } else if( isset( $_COOKIE[ 'statepro' ] ) ) {
        $pro_state = $_COOKIE[ 'statepro' ];
    } else {
        $pro_state = '';
    }

    ?>
    <div class="notice notice-warning is-dismissible pro-notice <?php echo $pro_state; ?>">
        <h2><?php _e( 'LIMITED OFFER: Get 30% Off on Writer Blog Pro – Use Promo Code: SPECIAL30', 'writer-blog' ); ?></h2>
        <p><?php _e( 'Get the best out of your blog with Writer Blog Pro! Writer blog pro offers Customizable typography, Advanced Slider settings, Optimized SEO, Ads section and many more fearures. You will also get Premium support for your theme.', 'writer-blog' ); ?></p>
        <a href="https://www.crafthemes.com/writer-pro" target="_blank"><button id="buy-pro-btn" type="button" class="button button-primary"><?php _e( 'Upgrade to Pro!', 'writer-blog' ); ?></button></a> <strong><a class="pro-notice-dismiss" href="#"><?php _e( 'Dismiss this notice', 'writer-blog' ); ?></a></strong>
    </div>

    <script>
      ( function($) {

        function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name+"="+value+expires+"; path=/";
        }

        $( '.pro-notice-dismiss' ).click(function() {
          createCookie("statepro", "hidden", 7);
          $( '.pro-notice' ).addClass( 'hidden' );
        });
      } )( jQuery );
    </script>
    <?php
}
add_action( 'admin_notices', 'writer_pro_notice' );

/**
 * Imports demo data from the crafthemes server
 */

if ( ! function_exists( 'writer_blog_import_files' ) ) :

function writer_blog_import_files() {
  return array(
    array(
      'import_file_name'           => __( 'Import Demo Data', 'writer-blog' ),
      'import_file_url'            => 'https://crafthemes.com/xml/writer-demo.xml',
      'import_widget_file_url'     => 'https://crafthemes.com/xml/writer-widgets.wie',
      'import_customizer_file_url' => 'http://crafthemes.com/xml/writer-blog-export.dat',
      'import_preview_image_url'   => 'https://www.crafthemes.com/themes/writer/wp-content/themes/techy/screenshot.png',
      'import_notice'              => __( 'After you import this demo, you will have to setup the menu. <a href="https://www.crafthemes.com/2018/07/02/writer-blog-free-wordpress-theme-documentation/" target="_blank">Click here</a> to see the complete theme documentation.', 'writer-blog' ),
      'preview_url'                => 'https://www.crafthemes.com/themes/writer/',
    ),
  );
}

endif;

add_filter( 'pt-ocdi/import_files', 'writer_blog_import_files' );

/**
 * Loads google fonts to the theme
 */

if ( ! function_exists( 'writer_blog_fonts_url' ) ) :

function writer_blog_fonts_url() {
  $fonts_url  = '';
  $Lato   = _x( 'on', 'Lato font: on or off', 'writer-blog' );
  $Montserrat = _x( 'on', 'Montserrat font: on or off', 'writer-blog' );

  if ( 'off' !== $Lato || 'off' !== $Montserrat ) {
    $font_families = array();
     
    if ( 'off' !== $Lato ) {
      $font_families[] = 'Lato:300,300i,400,400i,900';
    }

    if ( 'off' !== $Montserrat ) {
      $font_families[] = 'Montserrat:200,300,400,500,600,700,800,900';
    }
  }

  $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $fonts_url );
}

endif;

/**
 *  Adding Google fonts to the editor
 */

if ( ! function_exists( 'writer_blog_editor_styles' ) ) :

function writer_blog_editor_styles() {
  $Montserrat = ( array( 'editor-style.css', '//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' ) );
  $Lato = ( array( 'editor-style.css', '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,900' ) );
  add_editor_style( $Lato, $Montserrat );
}

endif;

add_action( 'after_setup_theme', 'writer_blog_editor_styles' );

/**
 * Adding fonts to the Custom Header screen
 */

if ( ! function_exists( 'writer_blog_custom_header_fonts' ) ) :

function writer_blog_custom_header_fonts() {
  wp_enqueue_style( 'Lato-font','//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,900', array(), null ); 
  wp_enqueue_style( 'Montserrat-font','//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900', array(), null );
}

endif;

add_action( 'admin_print_styles-appearance_page_custom-header', 'writer_blog_custom_header_fonts' );

/**
 * Add support for custom header
 */

if ( ! function_exists( 'writer_blog_custom_header_setup' ) ) :

function writer_blog_custom_header_setup() {

  add_theme_support( 'custom-header', array(
    'default-text-color'    => 'fff',
    'header-text'           => false,
    'width'                 => 1600,
    'height'                => 75,
    'wp-head-callback'      => 'writer_blog_header_style',
  ) );
}

endif;

add_action( 'after_setup_theme', 'writer_blog_custom_header_setup' );

/**
 * Adds custom background support.
 */
add_theme_support( 'custom-background', array(
    'default-color' => 'ffffff',
  )
);

if ( ! function_exists( 'writer_blog_header_style' ) ) :

/**
 * Styles the header image and text displayed on the blog
 */

function writer_blog_header_style() {
    //Check if user has defined any header image.
    if ( get_header_image() ) :
  ?>
    <style type="text/css">
      .white-header{
        background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
        background-position: center top;
      }
    </style>
  <?php endif; ?>
  <?php
}

endif; // writer_blog_header_style