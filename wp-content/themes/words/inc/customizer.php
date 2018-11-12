<?php

/**
 *  Default Theme options
 *
 * @since words 1.0.0
 *
 * @param null
 * @return array $words_theme_layout
 *
 */
if ( !function_exists('words_default_theme_options') ) :
    function words_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'words-footer-copyright'=>'',
            'words-blog-content'=>'',
            'words-blog-meta'  =>'',
            'words-sticky-sidebar-option' =>'',       
        );

        return apply_filters( 'words_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since words 1.0.0
 *
 * @param null
 * @return array words_theme_options
 *
 */
if ( !function_exists('words_get_theme_options') ) :
    function words_get_theme_options() {

        $words_default_theme_options = words_default_theme_options();
        

        $words_get_theme_options = get_theme_mod( 'words_theme_options');
        if( is_array( $words_get_theme_options )){
            return array_merge( $words_default_theme_options, $words_get_theme_options );
        }
        else{
            return $words_default_theme_options;
        }

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function words_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*adding sections for footer options*/
    $wp_customize->add_section( 'words-footer-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Copyright Text', 'words' )
    ) );

        /*copyright*/
        $wp_customize->add_setting( 'words_theme_options[words-footer-copyright]', array(
            'capability'        => 'edit_theme_options',
            'default'           => __('All Right Reserved 2016', 'words'),
            'sanitize_callback' => 'wp_kses_post'
        ) );
        $wp_customize->add_control( 'words-footer-copyright', array(
            'label'     => __( 'Copyright Text', 'words' ),
            'description' => __('Your Own Copyright Text', 'words'),
            'section'   => 'words-footer-option',
            'settings'  => 'words_theme_options[words-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
        ) ); 

    /*Blog Page Options*/
    $wp_customize->add_section( 'words-blog-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Blog Options', 'words' )
    ) );

        /*blog post*/
        $wp_customize->add_setting( 'words_theme_options[words-blog-content]', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'words_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'words-blog-content', array(
            'label'     => __( 'Show Content From Content', 'words' ),
            'description' => __('Checked to show the content from Content(Full Content), otherwise Excerpt content will appeared.', 'words'),
            'section'   => 'words-blog-option',
            'settings'  => 'words_theme_options[words-blog-content]',
            'type'      => 'checkbox',
            'priority'  => 10
        ) );


        /*blog post meta show/hide */
        $wp_customize->add_setting( 'words_theme_options[words-blog-meta]', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'words_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'words-blog-meta', array(
            'label'     => __( 'Show/Hide Post Meta', 'words' ),
            'description' => __('Checked to show/hide the meta from blog page', 'words'),
            'section'   => 'words-blog-option',
            'settings'  => 'words_theme_options[words-blog-meta]',
            'type'      => 'checkbox',
            'priority'  => 10
        ) );

    /*Sticky Sidebar Options*/
    $wp_customize->add_section( 'words-sticky-sidebar', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Sidebar Options', 'words' )
    ) );

    /*Sticky Sidebar Options on customizer*/
    $wp_customize->add_setting( 'words_theme_options[words-sticky-sidebar-option]', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'words_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'words-sticky-sidebar-option', array(
        'label'     => __( 'Enable/Disable Sticky Sidebar', 'words' ),
        'section'   => 'words-sticky-sidebar',
        'settings'  => 'words_theme_options[words-sticky-sidebar-option]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );  
}
add_action( 'customize_register', 'words_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function words_customize_preview_js() {
	wp_enqueue_script( 'words_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'words_customize_preview_js' );
