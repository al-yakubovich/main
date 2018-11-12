<?php
/**
 * Our Blog Theme Options panel at Theme Customizer
 *
 * @package Our_Blog
 * @since 1.0.0
 */

add_action( 'customize_register', 'our_blog_theme_options_register' );

function our_blog_theme_options_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-control-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Theme options Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'our_blog_theme_options_panel',
     array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Theme Options', 'our-blog' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Social Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'our_blog_social_section',
        array(
        	'priority'       => 2,
        	'panel'          => 'our_blog_theme_options_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Social Section', 'our-blog' ),
            'description'    => __( 'Managed the content display at top header section.', 'our-blog' ),
        )
    );


    /**Top Header Enable/Disable Social Links */
    $wp_customize->add_setting(
        'our_blog_top_header_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'our_blog_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'our_blog_top_header_social_links_enable',
        array(
            'section'     => 'our_blog_social_section',
            'label'       => __( 'Social Links', 'our-blog' ),
            'description' => __( 'Enable/Disable social links in top header.', 'our-blog' ),
            'type'        => 'checkbox'
        )       
    );


    /**Footer Bottom Enable/Disable Social Links */
    $wp_customize->add_setting(
        'our_blog_bottom_footer_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'our_blog_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'our_blog_bottom_footer_social_links_enable',
        array(
            'section'     => 'our_blog_social_section',
            'label'       => __( 'Social Links', 'our-blog' ),
            'description' => __( 'Enable/Disable social links in Bottom Footer.', 'our-blog' ),
            'type'        => 'checkbox'
        )       
    );


    /** Social Links */
    $wp_customize->add_setting( 
        new Our_Blog_Repeater_Setting( 
            $wp_customize, 
            'top_header_social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fa fa-facebook',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fa fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fa fa-pinterest',
                        'link' => 'https://www.pinterest.com/',
                    ),
                    array(
                        'font' => 'fa fa-instagram',
                        'link' => 'https://www.instagram.com/',
                    )
                ),
                'sanitize_callback' => array( 'Our_Blog_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Our_Blog_Control_Repeater(
            $wp_customize,
            'top_header_social_links',
            array(
                'section' => 'our_blog_social_section',              
                'label'   => __( 'Social Links', 'our-blog' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'our-blog' ),
                        'description' => __( 'Example: fa-facebook', 'our-blog' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'our-blog' ),
                        'description' => __( 'Example: http://facebook.com', 'our-blog' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'our-blog' ),
                    'field' => 'link'
                )                        
            )
        )
    );


    /*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Homepage Slider section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'our_blog_slider_section',
    array(
        'priority'       => 3,
        'panel'          => 'our_blog_theme_options_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Homepage Slider Section', 'our-blog' ),
        'description'    => __( 'Managed the content display at Homepage slider section.', 'our-blog' ),
    )
);

/**Homepage Slider Section Enable/Disable */
$wp_customize->add_setting(
    'our_blog_slider_section_enable',
    array(
        'default'           => 1,
        'sanitize_callback' => 'our_blog_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'our_blog_slider_section_enable',
    array(
        'section'     => 'our_blog_slider_section',
        'label'       => __( 'Homepage Slider Section', 'our-blog' ),
        'description' => __( 'Enable/Disable slider section.', 'our-blog' ),
        'type'        => 'checkbox'
    )       
);

/*
* Banner slider section
*/

$wp_customize->add_setting( 'our_blog_slider_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'our_blog_sanitize_category'
) );

$wp_customize->add_control(new Our_Blog_Customize_Dropdown_Taxonomies_Control($wp_customize,'our_blog_slider_title',
    array(
        'label'                 => __( 'Select Category for Homepage Slider image and title', 'our-blog'),
        'section' => 'our_blog_slider_section',
        'type'=> 'dropdown-taxonomies',
        'settings' => 'our_blog_slider_title'
    )
));


$wp_customize->add_setting( 'our_blog_slider_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => '3',
    'sanitize_callback'     => 'absint'
) );

$wp_customize->add_control( 'our_blog_slider_number', array(
    'label'                 =>  __( 'Number of slider to Show in front Page', 'our-blog' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9', 'our-blog' ),
    'section'               => 'our_blog_slider_section',
    'type'                  => 'number',
    'settings' => 'our_blog_slider_number',
) );
}