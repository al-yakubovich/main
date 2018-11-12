<?php
/**
 * Helper functions for Cressida theme
 *
 * @package Cressida
 */

if ( ! function_exists( 'cressida_get_option' ) ) :
	/**
	 * Theme mod value helper
	 *
	 * @param  string $key Theme mod key id
	 * @return string      Returns value for provided theme mod
	 */
	function cressida_get_option( $key ) {
		global $cressida_defaults;

		if ( array_key_exists( $key, $cressida_defaults ) ) {
			$value = get_theme_mod( $key, $cressida_defaults[$key] );
		} else {
			$value = get_theme_mod( $key );
		}

		return $value;
	}
endif; // function_exists( 'cressida_get_option' )

if ( ! function_exists( 'cressida_get_sample' ) ) :
	/**
	 * Get random sample image based on image size
	 *
	 * @param  string $what Registered image size
	 * @return string       Returns url for the image
	 */
	function cressida_get_sample( $what ) {
		global $cressida_defaults;

		switch ( $what ) {
			case 'cressida-slider':
				$images = $cressida_defaults['cressida_slide_sample'];
				$rand_key = array_rand( $images, 1 );
				return ( $images[$rand_key] ); // images already escaped in theme-defaults.php
				break;
			case 'cressida-slider-sidebar':
				$images = $cressida_defaults['cressida_slide_sidebar_sample'];
				$rand_key = array_rand( $images, 1 );
				return ( $images[$rand_key] ); // images already escaped in theme-defaults.php
				break;
			case 'cressida-archive':
				$images = $cressida_defaults['cressida_archive_sample'];
				$rand_key = array_rand( $images, 1 );
				return ( $images[$rand_key] ); // images already escaped in theme-defaults.php
				break;
			case 'full':
				$images = $cressida_defaults['cressida_slide_sample'];
				$rand_key = array_rand( $images, 1 );
				return ( $images[$rand_key] ); // images already escaped in theme-defaults.php
				break;
		}
	}
endif; // function_exists( 'cressida_get_sample' )

if ( ! function_exists( 'cressida_toggle_entry_meta' ) ) :
	/**
	 * Toggle entry meta
	 *
	 * Helper function to determine whether specific meta is set to be visible
	 * or hidden. Markup is mainly the same for single and archive view so we are
	 * covering here both.
	 *
	 * @param  string $feed_field     Blog feed option for specific meta
	 * @param  string $single_field   Single post option for specific meta
	 * @return bool                   Returns true/false for specified meta
	 */
	function cressida_toggle_entry_meta( $feed_field, $single_field ) {
		$show = false;
		$cressida_blog_feed_meta_show = cressida_get_option( 'cressida_blog_feed_meta_show' );
		$cressida_posts_meta_show     = cressida_get_option( 'cressida_posts_meta_show' );
		/**
		 * Blog feed - front page or blog archive
		 */
		if ( is_front_page() || is_home() || is_archive() || is_search() ) :
			if ( $cressida_blog_feed_meta_show && $feed_field ) :
				$show = true;
			endif;
		/**
		 * Single post
		 */
		elseif ( is_single() ) :
			if ( $cressida_posts_meta_show && $single_field ) :
				$show = true;
			endif;
		endif;

		return $show;
	}
endif; // function_exists( 'cressida_toggle_entry_meta' )

if ( ! function_exists( 'cressida_default_widgets_args' ) ) :
	/**
	 * Default widgets args
	 *
	 * Set widget args for example content default widgets.
	 *
	 * @param  string $class Class, specific to certain default widgets
	 * @return string        Returns string of widget args
	 */
	function cressida_default_widgets_args( $class = '' ) {
		$args = array(
			'before_widget' => '<div class="default-widget widget ' . $class . '">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		);

		$widget_args = '';

		foreach ( $args as $key => $value ) {
			$widget_args .= '&' . $key . '=' . $value;
		}

		return $widget_args;
	}
endif; // function_exists( 'cressida_default_widgets_args' )


if ( ! function_exists( 'cressida_header_widgets_args' ) ) :
	/**
	 * Header widgets args
	 *
	 * Set widget args for example content header widgets.
	 *
	 * @param  string $class Class, specific to certain header widgets
	 * @return string        Returns string of widget args
	 */
	function cressida_header_widgets_args( $class = '' ) {
		$args = array( 
			'before_widget' => '<div class="header-widget widget ' . $class . '">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		);

		$widget_args = '';

		foreach ( $args as $key => $value ) {
			$widget_args .= '&' . $key . '=' . $value;
		}

		return $widget_args;
	}
endif; // function_exists( 'cressida_header_widgets_args' )


if ( ! function_exists( 'cressida_example_sidebar' ) ) :
	/**
	 * Example sidebar widgets if example content is on in customizer
	 * @return Returns sidebar widgets
	 */
	function cressida_example_sidebar() {
		echo '<div class="sidebar-default sidebar-widgets">';
		the_widget( 'WP_Widget_Search',
			'title=' . esc_html__( 'Search', 'cressida' ),
			cressida_default_widgets_args( 'widget_search' )
		);
		the_widget( 'WP_Widget_Pages',
			'title=' . esc_html__( 'Pages', 'cressida' ) ,
			cressida_default_widgets_args( 'widget_pages' )
		);
		the_widget( 'WP_Widget_Recent_Posts',
			'title=' . esc_html__( 'Recent Posts', 'cressida' ) ,
			cressida_default_widgets_args( 'widget_recent_entries' )
		);
		the_widget( 'WP_Widget_Archives',
			'title=' . esc_html__( 'Archives', 'cressida' ),
			cressida_default_widgets_args( 'widget_archive' )
		);
		the_widget( 'WP_Widget_Categories',
			'title=' . esc_html__( 'Categories', 'cressida' ) . '&dropdown=1',
			cressida_default_widgets_args( 'widget_categories' )
		);
		the_widget( 'WP_Widget_Tag_Cloud',
			'title=' . esc_html__( 'Search by Tags', 'cressida' ),
			cressida_default_widgets_args( 'widget_tag_cloud' )
		);
		echo '</div>';
	}
endif; // function_exists( 'cressida_example_sidebar' )

if ( ! function_exists( 'cressida_example_header_widgets' ) ) :
	/**
	 * Example header widgets
	 * @return Returns header widgets
	 */
	function cressida_example_header_widgets($location) {
		echo '<div class="widget-area widget-area-header widget-area-header-'.esc_attr($location).'" role="complementary">';
		if($location == 'left') 
            the_widget( 'WP_Widget_Pages',
                'exclude=49&title= ',
                cressida_header_widgets_args( 'widget_nav_menu header-widget widget example-header-sidebar' )  
            );
        if($location == 'right')
            the_widget( 'WP_Widget_Search',
                'title=' . esc_html__( 'Search', 'cressida' ),
                'before_title=<h3 class="screen-reader-text">&after_title=</h3>&before_widget=<div class="default-widget widget widget_search">&after_widget=</div>'
            );
		echo '</div>';
	}
endif; // function_exists( 'cressida_example_header_widgets' )

if ( ! function_exists( 'cressida_set_aspect_ratio_padding' ) ) :
	/**
	 * Set padding for element holding image as background based
	 * on image aspect ratio.
	 *
	 * @param  string $url URL of the image
	 * @return float       Returns padding value
	 */
	function cressida_set_aspect_ratio_padding( $url = '' ) {
		$cressida_padding = 0;

		if ( $url ) :
			// Get image size so that we can calculate aspect ratio
			$cressida_image_info = getimagesize( $url );

			if ( is_array( $cressida_image_info ) ) :
				// Translators: height / width
				$cressida_aspect_ratio = $cressida_image_info[1] / $cressida_image_info[0];
				$cressida_padding = $cressida_aspect_ratio * 100;
			else :
				// Keep 16:9 ratio
				$cressida_padding = 56.25;
			endif;
		endif;

		return floatval( $cressida_padding );
	}
endif; // function_exists( 'cressida_set_aspect_ratio_padding' )

if ( ! function_exists( 'cressida_set_conditional_class' ) ) :
	/**
	 * Set class based on condition.
	 *
	 * @param  boolean $condition   Condition to check against
	 * @param  string  $true_class  Class when condition is true
	 * @param  string  $false_class Class when condition is false
	 * @return string               Returns class(es)
	 */
	function cressida_set_conditional_class( $condition = false, $true_class = '', $false_class = '' ) {
		if ( $condition ) :
			$class = $true_class;
		else :
			$class = $false_class;
		endif;

		return $class;
	}
endif; // function_exists( 'cressida_set_conditional_class' )

if ( ! function_exists( 'cressida_singular_show_featured_image' ) ) :
	/**
	 * Check if featured image for singulars is enabled in customizer.
	 *
	 * @return bool Returns true or false
	 */
	function cressida_singular_show_featured_image() {
		$cressida_posts_featured_image_show = cressida_get_option( 'cressida_posts_featured_image_show' );
		$cressida_pages_featured_image_show = cressida_get_option( 'cressida_pages_featured_image_show' );

		$show_image = false;

		if ( is_single() && $cressida_posts_featured_image_show ) :
			$show_image = true;
		elseif ( is_page() && $cressida_pages_featured_image_show ) :
			$show_image = true;
		endif;

		return $show_image;
	}
endif; // function_exists( 'cressida_singular_show_featured_image' )

if ( ! function_exists( 'cressida_singular_has_featured_image' ) ) :
	/**
	 * Check whether we have any image to show as featured for
	 * singulars, if enabled in customizer.
	 *
	 * @return bool Returns true or false
	 */
	function cressida_singular_has_featured_image() {
		$cressida_example_content = cressida_get_option( 'cressida_example_content' );
		$show_image = cressida_singular_show_featured_image();
		$has_image = false;

		if ( $show_image && ( has_post_thumbnail() || $cressida_example_content == 1 ) ) :
			$has_image = true;
		endif;

		return $has_image;
	}
endif; // function_exists( 'cressida_singular_has_featured_image' )