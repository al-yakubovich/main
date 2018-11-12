<?php
/**
 * Header logo/text display options alternative
 *
 * @since AcmeBlog 1.0.2
 *
 * @param null
 * @return array $acmeblog_header_id_display_opt
 *
 */
if ( !function_exists('acmeblog_header_id_display_opt') ) :
    function acmeblog_header_id_display_opt() {
        $acmeblog_header_id_display_opt =  array(
            'logo-only'         => __( 'Logo Only ( First Select Logo Above )', 'acmeblog' ),
            'title-only'        => __( 'Site Title Only', 'acmeblog' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'acmeblog' ),
            'disable'           => __( 'Disable', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_header_id_display_opt', $acmeblog_header_id_display_opt );
    }
endif;

/**
 * Global layout options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array $acmeblog_default_layout
 *
 */
if ( !function_exists('acmeblog_default_layout') ) :
    function acmeblog_default_layout() {
        $acmeblog_default_layout =  array(
            'fullwidth' => __( 'Fullwidth', 'acmeblog' ),
            'boxed'     => __( 'Boxed', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_default_layout', $acmeblog_default_layout );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array $acmeblog_sidebar_layout
 *
 */
if ( !function_exists('acmeblog_sidebar_layout') ) :
    function acmeblog_sidebar_layout() {
        $acmeblog_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'acmeblog' ),
            'left-sidebar'  => __( 'Left Sidebar' , 'acmeblog' ),
            'no-sidebar'    => __( 'No Sidebar', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_sidebar_layout', $acmeblog_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array $acmeblog_blog_layout
 *
 */
if ( !function_exists('acmeblog_blog_layout') ) :
    function acmeblog_blog_layout() {
        $acmeblog_blog_layout =  array(
            'full-image' => __( 'Full Image', 'acmeblog' ),
            'no-image'   => __( 'No Image', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_blog_layout', $acmeblog_blog_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array $acmeblog_blog_single_image_layout
 *
 */
if ( !function_exists('acmeblog_blog_single_image_layout') ) :
	function acmeblog_blog_single_image_layout() {
		$acmeblog_blog_single_image_layout =  array(
			'large-image' => __( 'Full Image', 'acmeblog' ),
			'left-image' => __( 'Left Image', 'acmeblog' ),
			'no-image'   => __( 'No Image', 'acmeblog' )
		);
		return apply_filters( 'acmeblog_blog_single_image_layout', $acmeblog_blog_single_image_layout );
	}
endif;

/**
 * Related posts layout options
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('acmeblog_reset_options') ) :
    function acmeblog_reset_options() {
        $acmeblog_reset_options =  array(
            '0'                    => __( 'Do Not Reset', 'acmeblog' ),
            'reset-color-options'  => __( 'Reset Colors Options', 'acmeblog' ),
            'reset-all'            => __( 'Reset All', 'acmeblog' )
        );
        return apply_filters( 'acmeblog_reset_options', $acmeblog_reset_options );
    }
endif;

/**
 * Blog layout options
 *
 * @since AcmeBlog 1.4.0
 *
 * @param null
 * @return array $acmeblog_get_image_sizes_options
 *
 */
if ( !function_exists('acmeblog_get_image_sizes_options') ) :
	function acmeblog_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = __( 'No Image', 'acmeblog' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = __( 'full (original)', 'acmeblog' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}

		}
		return apply_filters( 'acmeblog_get_image_sizes_options', $choices );
	}
endif;

/**
 *  Default Theme layout options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array $acmeblog_theme_layout
 *
 */
if ( !function_exists('acmeblog_get_default_theme_options') ) :
    function acmeblog_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'acmeblog-feature-cat'          => 0,
            'acmeblog-feature-post-one'     => -1,
            'acmeblog-feature-post-two'     => -1,
            'acmeblog-enable-feature'       => '',
            'acmeblog-feature-slider-read-more'  => __('Read More','acmeblog'),
            'acmeblog-feature-slider-post-number'  => 5,

            /*header options*/
            'acmeblog-header-logo'          => '',
            'acmeblog-header-id-display-opt'=> 'title-and-tagline',
            'acmeblog-show-date'            => 1,
            'acmeblog-facebook-url'         => '',
            'acmeblog-twitter-url'          => '',
            'acmeblog-youtube-url'          => '',
            'acmeblog-instagram-url'        => '',
            'acmeblog-pinterest-url'        => '',
            'acmeblog-google-plus-url'      => '',
            'acmeblog-enable-social'        => '',
            'acmeblog-menu-show-search'     => 1,

            /*footer options*/
            'acmeblog-footer-copyright'     => __( 'AcmeThemes &copy; 2015', 'acmeblog' ),

            /*layout/design options*/
            'acmeblog-default-layout'       => 'boxed',

            'acmeblog-sidebar-layout'       => 'right-sidebar',
            'acmeblog-front-page-sidebar-layout'       => 'right-sidebar',
            'acmeblog-archive-sidebar-layout'       => 'right-sidebar',

            'acmeblog-enable-sticky-sidebar'       => '',
            'acmeblog-blog-archive-layout'  => 'large-image',
            'acmeblog-blog-archive-image-size' => 'full',
            'acmeblog-primary-color'        => '#66CCFF',
            'acmeblog-custom-css'           => '',

            /*single related post options*/
            'acmeblog-show-related'         => 1,
            'acmeblog-related-title'  => __( 'Related posts', 'acmeblog' ),
            'acmeblog-single-post-layout'  => 'large-image',
            'acmeblog-single-image-size'  => 'full',

            /*theme options*/
            'acmeblog-search-placholder'    => __( 'Search', 'acmeblog' ),
            'acmeblog-show-breadcrumb'      => '',
            'acmeblog-you-are-here-text'  => __( 'You are here', 'acmeblog' ),
        );
        return apply_filters( 'acmeblog_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return array acmeblog_theme_options
 *
 */
if ( !function_exists('acmeblog_get_theme_options') ) :

    function acmeblog_get_theme_options() {
        $acmeblog_default_theme_options = acmeblog_get_default_theme_options();
        $acmeblog_get_theme_options = get_theme_mod( 'acmeblog_theme_options');
        if( is_array( $acmeblog_get_theme_options ) ){
            return array_merge( $acmeblog_default_theme_options ,$acmeblog_get_theme_options );
        }
        else{
            return $acmeblog_default_theme_options;
        }
    }
endif;