<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */
 
function thinkup_custom_logo() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolink;
global $thinkup_general_sitetitle;
global $thinkup_general_sitedescription;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolink ) ) {
			echo '<img src="' . $thinkup_general_logolink . '" alt="' . esc_attr__( 'Logo', 'lan-thinkupthemes' ) . '">';
		} 
	} else if ( $thinkup_general_logoswitch == "option2" or empty( $thinkup_general_logoswitch ) ) {
		if ( empty( $thinkup_general_sitetitle ) ) {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . get_bloginfo( 'name' ) . '</h1>';
		} else {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( $thinkup_general_sitetitle ) . '</h1>';
		}
		if ( ! empty( $thinkup_general_sitedescription ) ) {
			echo '<h2 class="site-description">' . esc_html( $thinkup_general_sitedescription ) . '</h2>';
		}
	}
}

// Output retina js script if retina logo is set
function thinkup_input_logoretina() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolinkretina;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolinkretina ) ) {
			wp_enqueue_script( 'retina' );
		} 
	}
}	
add_action( 'wp_enqueue_scripts', 'thinkup_input_logoretina', 11 );


/* ----------------------------------------------------------------------------------
	Custom Favicon
---------------------------------------------------------------------------------- */

function thinkup_custom_favicon() {
global $thinkup_general_faviconlink;

	if ( ! empty( $thinkup_general_faviconlink ) ) {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . esc_url( $thinkup_general_faviconlink ) . '" />';
	}	
}
add_action('wp_head', 'thinkup_custom_favicon');


/* ----------------------------------------------------------------------------------
	Page Layout
---------------------------------------------------------------------------------- */

/* Add Custom Sidebar css */
function thinkup_sidebar_css($classes) {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

	$class_sidebar = NULL;

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_homepage_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				$class_sidebar = '';
			} else if ( $thinkup_general_layout == "option2" ) {
				$class_sidebar = 'layout-sidebar-left';
			} else if ( $thinkup_general_layout == "option3" ) {
				$class_sidebar = 'layout-sidebar-right';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			$class_sidebar = '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_blog_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				$class_sidebar = '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				$class_sidebar = 'layout-sidebar-left';
			} else if ( $thinkup_blog_layout == "option3" ) {
				$class_sidebar = 'layout-sidebar-right';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			$class_sidebar = '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_single() ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {		
				$class_sidebar = '';
			} else if ( $thinkup_post_layout == "option2" ) {
				$class_sidebar = 'layout-sidebar-left';
			} else if ( $thinkup_post_layout == "option3" ) {
				$class_sidebar = 'layout-sidebar-right';
			} else {
				$class_sidebar = '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			$class_sidebar = '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ($thinkup_general_layout == "option3") {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			$class_sidebar = '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	}

	// Output sidebar class
	if( ! empty( $class_sidebar ) ) {
		$classes[] = $class_sidebar;
	} else {
		$classes[] = 'layout-sidebar-none';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_sidebar_css' );

/* Add Custom Sidebar html */
function thinkup_sidebar_html() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

do_action('thinkup_sidebar_html');

	if ( is_front_page() ) {	
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
				echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
				echo get_sidebar(); 
		} else if ( $thinkup_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() and !is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_general_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				echo '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_blog_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_single() ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_post_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			get_sidebar();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Select a Sidebar
---------------------------------------------------------------------------------- */

/* Add Selected Sidebar To Specific Pages */
function thinkup_input_sidebars() {
global $thinkup_general_sidebars;
global $thinkup_homepage_sidebars;
global $thinkup_blog_sidebars;
global $thinkup_post_sidebars;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
$_thinkup_meta_sidebars = get_post_meta( $post->ID, '_thinkup_meta_sidebars', true );

	if ( is_front_page() ) {	
			$output = $thinkup_homepage_sidebars;
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_general_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_blog_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}	
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_search() ) {
		$output = $thinkup_general_sidebars;
	} else {
		$output = $_thinkup_meta_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

return $output;
}


/* ----------------------------------------------------------------------------------
	Intro Default options
---------------------------------------------------------------------------------- */

/* Add custom intro section [Extend for more options in future update] */
function thinkup_custom_intro() {

	if ( ! is_front_page() ) {
		echo	'<div id="intro" class="option1"><div id="intro-core">',
				'<h1 class="page-title"><span>',
				thinkup_title_select(),
				'</span></h1>',
				thinkup_input_breadcrumbswitch(),
				'</div></div>';
	} else {
		echo '';
	}
}


/* ----------------------------------------------------------------------------------
	Enable Responsive Layout
---------------------------------------------------------------------------------- */

/* http://wordpress.stackexchange.com/questions/40753/add-parent-class-to-parent-menu-items */
class thinkup_nav_menu_responsive extends Walker_Nav_Menu{

    public function start_el(&$output, $item, $depth = 0, $args=array(), $id = 0){

      // add spacing to the title based on the current depth
      if ( $depth > 0 ) {
            $item->title = str_repeat('&nbsp; ', $depth *  4 ) . '&#45; ' . $item->title;
      }
      parent::start_el($output, $item, $depth, $args);
    } 
}

// Fallback responsive menu when custom header menu has not been set.
function thinkup_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');

	echo '<div id="header-responsive-inner" class="responsive-links nav-collapse collapse"><ul>',
		 $output,
		 '</ul></div>';
}

function thinkup_input_responsivehtml() {
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		$args =  array(
			'container_class' => 'responsive-links nav-collapse collapse', 
			'container_id'    => 'header-responsive-inner', 
			'menu_class'      => '', 
			'theme_location'  => 'header_menu', 
			'walker'          => new thinkup_nav_menu_responsive(), 
			'fallback_cb'     => 'thinkup_input_responsivefall',
		);

		echo '<div id="header-responsive">',
			 '<a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">',
			 '<span class="icon-bar"></span>',
			 '<span class="icon-bar"></span>',
			 '<span class="icon-bar"></span>',
			 '</a>',
			wp_nav_menu( $args ),
			'</div>',
			'<!-- #header-responsive -->';
	}
}

function thinkup_input_responsivecss() {
global $thinkup_general_fixedlayoutswitch;
	
	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'thinkup-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	Enable Breadcrumbs
---------------------------------------------------------------------------------- */

/* Toggle Breadcrumbs */
function thinkup_input_breadcrumbswitch() {
global $thinkup_general_breadcrumbswitch;

global $post;
$_thinkup_meta_breadcrumbs = get_post_meta( $post->ID, '_thinkup_meta_breadcrumbs', true );

	if( ! is_front_page() ) {
		if ( empty( $_thinkup_meta_breadcrumbs ) or $_thinkup_meta_breadcrumbs == 'option1' ) {
			if ( $thinkup_general_breadcrumbswitch == '0' or empty( $thinkup_general_breadcrumbswitch ) ) {
				echo '';
			} else if ( $thinkup_general_breadcrumbswitch == '1' ) {
				thinkup_input_breadcrumb();
			}
		} else if ( $_thinkup_meta_breadcrumbs == 'option2' ) {
			thinkup_input_breadcrumb();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Custom CSS
---------------------------------------------------------------------------------- */

/* Add Custom CSS */
function thinkup_custom_css() {
global $thinkup_general_customcss;

global $post;
$_thinkup_meta_customcss = get_post_meta( $post->ID, '_thinkup_meta_customcss', true );

	if ( ! empty( $thinkup_general_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				wp_kses_post( $thinkup_general_customcss ) . "\n",
				'</style>' . "\n";
	}
	if ( ! is_front_page() and ! empty( $_thinkup_meta_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				wp_kses_post( $_thinkup_meta_customcss ) . "\n",
				'</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_custom_css', '12' );


/* ----------------------------------------------------------------------------------
	Custom JavaScript - Front End
---------------------------------------------------------------------------------- */

/* Add Custom Front-End Javascript */
function thinkup_custom_javafront() {
global $thinkup_general_customjavafront;

global $post;
$_thinkup_meta_customjava = get_post_meta( $post->ID, '_thinkup_meta_customjava', true );

	if ( ! empty( $thinkup_general_customjavafront ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $thinkup_general_customjavafront ) . "\n",
			'</script>' . "\n";
	}
	if ( ! empty( $_thinkup_meta_customjava ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $_thinkup_meta_customjava ) . "\n",
			'</script>' . "\n";
	}
}
//add_action( 'wp_footer', 'thinkup_custom_javafront' );


?>