<?php

/**
 *  Default Theme options
 *
 * @since plaser 1.0.0
 *
 * @param null
 * @return array $plaser_theme_layout
 *
 */
if ( !function_exists('plaser_default_theme_options') ) :
    function plaser_default_theme_options() {

        $default_theme_options = array(
            'plaser-sticky-sidebar'=>1,
            'plaser-meta-tag'=>1,
            'plaser_sidebar-options'=>'right-sidebar',
            'plaser-footer-copyright'=>esc_html__('All Right Reserved 2018','plaser')
        );
        return apply_filters( 'plaser_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since plaser 1.0.0
 *
 * @param null
 * @return array plaser_theme_options
 *
 */
if ( !function_exists('plaser_get_theme_options') ) :
    function plaser_get_theme_options() {

        $plaser_default_theme_options = plaser_default_theme_options();
        
    
        $plaser_get_theme_options = get_theme_mod( 'plaser_theme_options');
        if( is_array( $plaser_get_theme_options )){
            return array_merge( $plaser_default_theme_options, $plaser_get_theme_options );
        }
        else{
            return $plaser_default_theme_options;
        }

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function plaser_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';

  


    $default = plaser_default_theme_options();
	/*adding sections for footer options*/
    
    $wp_customize->add_panel( 'plaser_panel', array(
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'title' => __( 'Theme Options', 'plaser' ),
        ) );


    $wp_customize->add_section( 'header_background_color' , array(
        'title'      => 'Header & Footer',
        'priority'   => 1,
        'panel' => 'plaser_panel',
        ) );

    // header_background_color
    $wp_customize->add_setting( 'plaser_header_background_color' , array(
        'default'     => '#162b4d',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_header_background_color', array(
        'label' => 'Background Color',
        'section' => 'header_background_color',
        'settings' => 'plaser_header_background_color',
        'type' => 'color',
        ) );
    // end header_background_color

    // header_text_color
    $wp_customize->add_setting( 'plaser_header_text_color' , array(
        'default'     => '#FFF',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_header_text_color', array(
        'label' => 'Text Color',
        'section' => 'header_background_color',
        'settings' => 'plaser_header_text_color',
        'type' => 'color',
        ) );
    //End header_text_color hover

    $wp_customize->add_setting( 'plaser_header_hover_text_color' , array(
        'default'     => '#b71757',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_header_hover_text_color', array(
        'label' => 'Hover Text Color',
        'section' => 'header_background_color',
        'settings' => 'plaser_header_hover_text_color',
        'type' => 'color',
        ) );
    //End header_text_color hover

    //button

    $wp_customize->add_section( 'button_color' , array(
    'title'      => 'Button',
    'priority'   => 2,
    'panel' => 'plaser_panel',
    ) );

    // header_background_color
    $wp_customize->add_setting( 'plaser_background_button_color' , array(
        'default'     => '#162b4d',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_background_button_color', array(
        'label' => 'Button Background Color',
        'section' => 'button_color',
        'settings' => 'plaser_background_button_color',
        'type' => 'color',
        ) );

    $wp_customize->add_setting( 'plaser_button_color' , array(
        'default'     => '#FFF',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_button_color', array(
        'label' => 'Button Text Color',
        'section' => 'button_color',
        'settings' => 'plaser_button_color',
        'type' => 'color',
        ) );
    // end button

    // singe page background

     $wp_customize->add_section( 'page_background' , array(
        'title'      => 'Single Page',
        'priority'   => 3,
        'panel' => 'plaser_panel',
        ) );
     $wp_customize->add_setting( 'plaser_page_background_color' , array(
        'default'     => '#FFF',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_page_background_color', array(
        'label' => 'Single Page Background Color',
        'section' => 'page_background',
        'settings' => 'plaser_page_background_color',
        'type' => 'color',
        ) );

         $wp_customize->add_setting( 'plaser_page_text_color' , array(
        'default'     => '#000',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_page_text_color', array(
        'label' => 'Single Page Text Color',
        'section' => 'page_background',
        'settings' => 'plaser_page_text_color',
        'type' => 'color',
        ) );

    // end singe page background

    // singel post background
         $wp_customize->add_section( 'post_background' , array(
        'title'      => 'Single Post',
        'priority'   => 4,
        'panel' => 'plaser_panel',
        ) );
     $wp_customize->add_setting( 'plaser_post_background_color' , array(
        'default'     => '#FFF',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_post_background_color', array(
        'label' => 'Single Post Background Color',
        'section' => 'post_background',
        'settings' => 'plaser_post_background_color',
        'type' => 'color',
        ) );

         $wp_customize->add_setting( 'plaser_post_text_color' , array(
        'default'     => '#000',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( 'plaser_post_text_color', array(
        'label' => 'Single Post Text Color',
        'section' => 'post_background',
        'settings' => 'plaser_post_text_color',
        'type' => 'color',
        ) );
    // end singel post background



/*
    ***************
    * Layout Section
    ***************
    */
    $wp_customize->add_section( 'plaser_layout_section', array(
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout &amp; Design Options', 'plaser' ),
        'description' => '',
        'panel' => 'plaser_panel',
        ) );

        $wp_customize->add_setting( 'plaser_sidebar-options', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['plaser_sidebar-options'],
            'sanitize_callback' => 'plaser_sanitize_select'
        ) );
        $wp_customize->add_control( 'plaser_sidebar-options', array(
            'choices'       => array(
                            'right-sidebar'         => __('Right Sidebar','plaser'),
                            'left-sidebar'          => __('Left Sidebar','plaser'),
                            'no-sidebar'        => __('No Sidebar','plaser'),
            ),
            'label'         => __( 'Select Sidebar Options', 'plaser' ),
            'description'   => __( 'Select Sidebar options', 'plaser' ),
            'section'       => 'plaser_layout_section',
            'settings'      => 'plaser_sidebar-options',
            'type'          => 'select'
        ) );


    $wp_customize->add_section( 'plaser_copyright_section', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Copyright Text', 'plaser' ),
        'panel' => 'plaser_panel',
    ) );


     /*copyright*/
    $wp_customize->add_setting( 'plaser_theme_options[plaser-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['plaser-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'plaser-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'plaser' ),
        'description' => __('Your Own Copyright Text', 'plaser'),
        'section'   => 'plaser_copyright_section',
        'settings'  => 'plaser_theme_options[plaser-footer-copyright]',
        'type'      => 'text',
        'priority'  => 25
    ) );   

  
  
   

   
}
add_action( 'customize_register', 'plaser_customize_register' );

function mytheme_customize_css()
{
?>
    <style type="text/css">

        .site-content {
           
            background: <?php echo get_theme_mod('background_color', '#0b192f'); ?>;
        }
        /* header and footer */
        .site-header,.mid-header,.site-footer .site-info,.site-footer {
            background: <?php echo get_theme_mod('plaser_header_background_color', '#162b4d'); ?>;
        }

        .main-navigation ul li a,
        .main-navigation li:after,
        .site-branding .site-title a,
        header .site-description,
        .site-footer .site-info,
        .site-footer .site-info a,
        .site-footer .widget .widget-title,
        .textwidget,
        .site-footer ul li a, 
        .site-footer .tagcloud a,
        #recentcomments
         {
            color: <?php echo get_theme_mod('plaser_header_text_color', '#FFF'); ?>;
        }

        .main-navigation ul li a:hover,
        .site-branding .site-title a:hover,
        .site-footer .site-info a:hover,
        .site-footer ul li a:hover, 
        .site-footer .tagcloud a:hover

        {
            color: <?php echo get_theme_mod('plaser_header_hover_text_color', '#b71757'); ?>;
        }
        /* end  header and footer */

        /* button */
        #secondary .widget_search .top-section-search .search-subimit,
        .nav-links .nav-previous a, 
        .nav-links .nav-next a,
        #toTop .fa,
        .menu-toggle,
        #secondary .widget.widget_meta ul li a,
        button, input[type="button"], input[type="reset"], input[type="submit"] {
            background-color:<?php echo get_theme_mod('plaser_background_button_color', '#162b4d'); ?>;
            border: 1px solid <?php echo get_theme_mod('plaser_background_button_color', '#162b4d'); ?>;
        }
        #secondary .widget_search .top-section-search .search-subimit:hover,
        .nav-links .nav-previous a:hover, 
        .nav-links .nav-next a:hover,
        #secondary .widget.widget_meta ul li a:hover,
        .menu-toggle:hover,
        button, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover
         {
            background-color: transparent;
            color: <?php echo get_theme_mod('plaser_background_button_color', '#162b4d'); ?>;
            border: 1px solid <?php echo get_theme_mod('plaser_background_button_color', '#162b4d'); ?>;
        }
        #secondary .widget_search .top-section-search .search-subimit,
        .nav-links .nav-previous a, 
        .nav-links .nav-next a,
        #secondary .widget.widget_meta ul li a,
        .menu-toggle,
        button, input[type="button"], input[type="reset"], input[type="submit"] {
            color:<?php echo get_theme_mod('plaser_button_color', '#fff'); ?>;
        }
        /* end button */

        /* singe page background */
        .page .site-main {
            background-color:<?php echo get_theme_mod('plaser_page_background_color', '#FFF'); ?>;
        }
        .page .entry-content,.page .entry-title,.page-content-color p {
             color:<?php echo get_theme_mod('plaser_page_text_color', '#000'); ?>;
        }
        /* singe end page background */

        /* singel post background */
        .single-post .site-main {
            background-color:<?php echo get_theme_mod('plaser_post_background_color', '#fff'); ?>;
        }
        .single-post .entry-header, 
        .single-post .entry-content,
        .single-post .entry-meta,
        .single-post .entry-meta a,
        .comment-reply-title,
        .logged-in-as a,
        .post-content-color p,
        .comment-form label,
        .comments-title,
        .comment-notes,
        .comment-content p,
        .comment-author a,
        .comment-author,
        .comment-metadata a,
        .comment-list,
        .reply a,
        .comment-content a {
            color:<?php echo get_theme_mod('plaser_post_text_color', '#000'); ?>;
        }
        /* end singel post background */

    </style>
 <?php
}
add_action( 'wp_head', 'mytheme_customize_css');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function plaser_customize_preview_js() {
	wp_enqueue_script( 'plaser-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'plaser_customize_preview_js' );



