<?php

/**
 *  Default Theme options
 *
 * @since placid 1.0.0
 *
 * @param null
 * @return array $placid_theme_layout
 *
 */
if ( !function_exists('placid_default_theme_options') ) :
    function placid_default_theme_options() {

        $default_theme_options = array(
            'placid-disable-search'              => 1,
            'placid-sticky-sidebar'              => 1,
            'placid-meta-tag'                    => 1,
            'placid_sidebar-options'             => 'right-sidebar',
            'placid-footer-copyright'            => esc_html__('All Right Reserved 2016','placid'),
            'placid_no_of_words'                 => 25,
            'hide-feature-image'                 => 0,
            'placid-realted-post'                => 0,
            'placid-realted-post-title'          => esc_html__('Related Posts','placid'),
            'placid_number_of_post_show_option'  => 3,
            'placid_read_more_text_blog_archive_option'  => '',
            'placid_primary_color'               => '#000000',
            'placid_woocommerce_button_color'    => '#19bc9b',
            'placid_cloumn_options'              => 'defaults'

        );
        return apply_filters( 'placid_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since placid 1.0.0
 *
 * @param null
 * @return array placid_theme_options
 *
 */
if ( !function_exists('placid_get_theme_options') ) :
    function placid_get_theme_options() {

        $placid_default_theme_options = placid_default_theme_options();
        
    
        $placid_get_theme_options = get_theme_mod( 'placid_theme_options');
        if( is_array( $placid_get_theme_options )){
            return array_merge( $placid_default_theme_options, $placid_get_theme_options );
        }
        else{
            return $placid_default_theme_options;
        }

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';
function placid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';


    $default = placid_default_theme_options();
	/*adding sections for footer options*/
    
    $wp_customize->add_panel( 'placid_panel', array(
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'title' => __( 'Theme Options', 'placid' ),
        ) );
    
/*
    ***************
    * Layout Section
    ***************
    */
    $wp_customize->add_section( 'placid_layout_section', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout &amp; Design Options', 'placid' ),
        'description' => '',
        'panel' => 'placid_panel',
        ) );

     
        $wp_customize->add_setting( 'placid_sidebar-options', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['placid_sidebar-options'],
            'sanitize_callback' => 'placid_sanitize_select'
        ) );
        $wp_customize->add_control( 'placid_sidebar-options', array(
            'choices'       => array(
                            'right-sidebar'         => __('Right Sidebar','placid'),
                            'left-sidebar'          => __('Left Sidebar','placid'),
                            'no-sidebar'        => __('No Sidebar','placid'),
            ),
            'label'         => __( 'Select Sitebar Options', 'placid' ),
            'description'   => __( 'Select Sidebar options', 'placid' ),
            'section'       => 'placid_layout_section',
            'settings'      => 'placid_sidebar-options',
            'type'          => 'select'
        ) );


      $wp_customize->add_setting( 'placid_theme_options[placid_cloumn_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['placid_cloumn_options'],
            'sanitize_callback' => 'placid_sanitize_select'
        ) );
        $wp_customize->add_control( 'placid_theme_options[placid_cloumn_options]', array(
            'choices'       => array(
                            'defaults'     => __('Default','placid'),
                            'full-image'  => __('Full Image','placid'),
             ),
            'label'         => __( 'Image Display Option', 'placid' ),
            'description'   => __( 'Select Image display options', 'placid' ),
            'section'       => 'placid_layout_section',
            'settings'      => 'placid_theme_options[placid_cloumn_options]',
            'type'          => 'select'
        ) );




       $wp_customize->add_setting( 'placid_theme_options[placid_no_of_words]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['placid_no_of_words'],
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( 'placid_theme_options[placid_no_of_words]', array(
            'label'         => __( 'Select Excerpt Length Options', 'placid' ),
            'description'   => __( 'Select Excerpt Length options', 'placid' ),
            'section'       => 'placid_layout_section',
            'settings'      => 'placid_theme_options[placid_no_of_words]',
            'type'          => 'number'
        ) );

   
   $wp_customize->add_section( 'placid_single_post_section', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Single Post', 'placid' ),
        'panel' => 'placid_panel',
    ) );


     /*Hide Feature Image in */
    $wp_customize->add_setting( 'placid_theme_options[hide-feature-image]', array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => $default['hide-feature-image'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid_theme_options[hide-feature-image]', array(
        'label'       => __( 'Hide/Show Feature Image', 'placid' ),
        'description' => __('Check to hide feature image', 'placid'),
        'section'     => 'placid_single_post_section',
        'settings'    => 'placid_theme_options[hide-feature-image]',
        'type'        => 'checkbox',
        'priority'    => 25
    ) );  


    /*Hide Related Post */
    $wp_customize->add_setting( 'placid_theme_options[placid-realted-post]', array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => $default['placid-realted-post'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid_theme_options[placid-realted-post]', array(
        'label'       => __( 'Show/Hide Realated Post', 'placid' ),
        'description' => __('Check To Show Realated Post', 'placid'),
        'section'     => 'placid_single_post_section',
        'settings'    => 'placid_theme_options[placid-realted-post]',
        'type'        => 'checkbox',
        'priority'    => 25
    ) );  



    /* Realated Post Title*/
    $wp_customize->add_setting( 'placid_theme_options[placid-realted-post-title]', array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => $default['placid-realted-post-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'placid_theme_options[placid-realted-post-title]', array(
        'label'       => __( 'Related Post Title', 'placid' ),
        'section'     => 'placid_single_post_section',
        'settings'    => 'placid_theme_options[placid-realted-post-title]',
        'type'        => 'text',
        'priority'    => 25
    ) );  

  
      /* Number Of  Realated Post */
    $wp_customize->add_setting( 'placid_theme_options[placid_number_of_post_show_option]', array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => $default['placid_number_of_post_show_option'],
        'sanitize_callback' => 'absint'
    ) );
    $wp_customize->add_control( 'placid_theme_options[placid_number_of_post_show_option]', array(
        'label'       => __( 'No of Related Post', 'placid' ),
        'section'     => 'placid_single_post_section',
        'settings'    => 'placid_theme_options[placid_number_of_post_show_option]',
        'type'        => 'number',
        'priority'    => 25
    ) );  






    $wp_customize->add_section( 'placid_copyright_section', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Copyright Text', 'placid' ),
        'panel' => 'placid_panel',
    ) );


     /*copyright*/
    $wp_customize->add_setting( 'placid_theme_options[placid-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'placid-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'placid' ),
        'description' => __('Your Own Copyright Text', 'placid'),
        'section'   => 'placid_copyright_section',
        'settings'  => 'placid_theme_options[placid-footer-copyright]',
        'type'      => 'text',
        'priority'  => 25
    ) );   

  
   $wp_customize->add_section( 'placid_hide_meta_section', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Hide Meta Tag', 'placid' ),
        'panel' => 'placid_panel',
    ) );


     /*Meta-Tag*/
    $wp_customize->add_setting( 'placid_theme_options[placid-meta-tag]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-meta-tag'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-meta-tag]', array(
        'label'     => __( 'Hide Meta Tags', 'placid' ),
        'section'   => 'placid_hide_meta_section',
        'settings'  => 'placid_theme_options[placid-meta-tag]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) );

    /*Sticky Sidebar*/
    $wp_customize->add_section( 'placid-disable-sticky-sidebar', array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Disable Sticky Sidebar', 'placid' ),
         'panel' => 'placid_panel',
     ) );

    $wp_customize->add_setting( 'placid_theme_options[placid-sticky-sidebar]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-sticky-sidebar'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-sticky-sidebar]', array(
        'label'     => __( 'Enable/Disable Sticky Sidebar', 'placid' ),
        'section'   => 'placid-disable-sticky-sidebar',
        'settings'  => 'placid_theme_options[placid-sticky-sidebar]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) ); 

    /*Enable disable Search on Header*/
    $wp_customize->add_section( 'placid-disable-search-header', array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Enable/Disable Search', 'placid' ),
         'panel' => 'placid_panel',
     ) );

    $wp_customize->add_setting( 'placid_theme_options[placid-disable-search]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-disable-search'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-disable-search]', array(
        'label'     => __( 'Enable/Disable Search on Header', 'placid' ),
        'section'   => 'placid-disable-search-header',
        'settings'  => 'placid_theme_options[placid-disable-search]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) );    


    $wp_customize->add_setting(
        'placid_theme_options[placid_primary_color]',
        array(
                'default' => "#b78438",
                'sanitize_callback' => 'sanitize_hex_color',

              )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'placid_theme_options[placid_primary_color]',
            array(
                    'label' => esc_html__('Primary Color', 'placid'),
                    'description' => esc_html__('Choose Primary Color', 'placid'),
                    'section' => 'colors',
                    'priority' => 14,

                  )
            )
    );

if ( class_exists( 'WooCommerce' ) ) {
    
    $wp_customize->add_setting(
        'placid_theme_options[placid_woocommerce_button_color]',
        array(
                'default' => "#19bc9b",
                'sanitize_callback' => 'sanitize_hex_color',

              )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'placid_theme_options[placid_woocommerce_button_color]',
            array(
                    'label' => esc_html__('WooCommerce Button, Border, Pagination.. Color', 'placid'),
                    'description' => esc_html__('Choose WooCommerce Button, Border,  Pagination.. Color', 'placid'),
                    'section' => 'colors',
                    'priority' => 14,

                  )
            )
    );

}    

     /**
     * Read More Text
     */
    $wp_customize->add_setting(
        'placid_theme_options[placid_read_more_text_blog_archive_option]',
        array(
                'sanitize_callback' => 'sanitize_text_field',
              )
    );
    $wp_customize->add_control('placid_theme_options[placid_read_more_text_blog_archive_option]',
        array(
                'label' => esc_html__('Read More Text', 'placid'),
                'section' => 'placid_layout_section',
                'type' => 'text',
                'priority' => 14
             )
    );
 

}
add_action( 'customize_register', 'placid_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function placid_customize_preview_js() {
	wp_enqueue_script( 'placid-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'placid_customize_preview_js' );



/**
 * Adding color in Theme Customizer cutom section
 */

function newie_customizer_script() {
  
    wp_enqueue_style( 'newie-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css'); 
}
add_action( 'customize_controls_enqueue_scripts', 'newie_customizer_script' );


