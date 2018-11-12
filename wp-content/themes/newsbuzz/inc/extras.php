<?php
/**
* Custom functions that act independently of the theme templates
*
* Eventually, some of the functionality here could be replaced by core features
*
* @package newsbuzz
*
* Please browse readme.txt for credits and forking information
*/

/**
* Sets the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*
*/
if ( ! function_exists( 'newsbuzz_content_width' ) ) {
  function newsbuzz_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'newsbuzz_content_width', 640 );
  }
  add_action( 'after_setup_theme', 'newsbuzz_content_width', 0 );
}


/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
function newsbuzz_body_classes( $classes ) {
// Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
add_filter( 'body_class', 'newsbuzz_body_classes' );

if ( ! function_exists( 'newsbuzz_header_menu' ) ) :
  /**
   * Header menu (should you choose to use one)
   */
function newsbuzz_header_menu() {
    // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'theme_location'    => 'primary',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker()
    ));
} /* end header menu */
endif;


function newsbuzz_wpinterface_sidebar_menu_page( $hook ) {
  if ( 'appearance_page_about-newsbuzz' !== $hook ) {
    return;
  }
  wp_enqueue_style( 'newsbuzz-custom-admin-css', get_template_directory_uri() . '/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'newsbuzz_wpinterface_sidebar_menu_page' );


function  newsbuzz_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'newsbuzz_add_top_level_menu_url', 99, 3 );

add_action( 'admin_menu', 'newsbuzz_register_backend' );
function newsbuzz_register_backend() {
  add_theme_page( __('About Newsbuzz', 'newsbuzz'), __('Newsbuzz', 'newsbuzz'), 'edit_theme_options', 'about-newsbuzz.php', 'newsbuzz_backend');
}

function newsbuzz_backend(){ ?>
<div class="themepage-wrapper">
  <div class="headings-wrapper">
    <h2>NewsBuzz Informaton And Support</h2>
    <h3>If you can't find a solution, feel free to email me at Email@vilhodesign.com</h3>
  </div>
  <div class="themepage-left">
    <div class="help-box-wrapper">
      <a href="https://wordpress.org/support/" class="help-box" target="_blank">
        General WordPress Support 
      </a>
    </div>
    <div class="help-box-wrapper">
      <a href="http://vilhodesign.com/contact/" class="help-box" target="_blank">
        Newsbuzz Theme Support 
        <span>Email@vilhodesign.com</span>
      </a>
    </div>
    <div class="help-box-wrapper">
     <a href="http://vilhodesign.com/themes/newsbuzz/" class="help-box" target="_blank">
      Newsbuzz Theme Demo 
    </a>
  </div>
  <div class="help-box-wrapper">
    <a href="http://vilhodesign.com/themes/newsbuzz/" class="help-box" target="_blank">
      Newsbuzz Premium 
    </a>
  </div>
</div>
<div class="themepage-right">
  <a style="display:block;" href="http://vilhodesign.com/themes/newsbuzz/" target="_blank">
    <img src="http://vilhodesign.com/img/prem.png">
  </a>
</div>
</div>
<?php }
