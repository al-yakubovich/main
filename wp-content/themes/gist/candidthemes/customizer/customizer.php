<?php
/**
 * Gist Theme Customizer
 *
 * @package Gist
 */
if ( !function_exists('gist_default_theme_options') ) :
    function gist_default_theme_options() {

        $default_theme_options = array(
        	'gist_primary_color' => '#4ea371',
            'gist-footer-copyright'=> esc_html__('All Right Reserved 2016','gist'),
            'gist-footer-gototop' => 1,
            'gist-sticky-sidebar'=> 1,
            'gist-sidebar-options'=>'right-sidebar',
            'gist-font-url'=> esc_url('//fonts.googleapis.com/css?family=Merriweather:30', 'gist'),
            'gist-font-family' => esc_html__('Merriweather, serif','gist'),
            'gist-font-size'=> 16,
            'gist-font-line-height'=> 2,
            'gist-letter-spacing'=> 0,
            'gist-blog-excerpt-options'=> 'excerpt',
            'gist-blog-excerpt-length'=> 25,
            'gist-blog-featured-image'=> 'full-image',
            'gist-blog-meta-options'=> 1,
            'gist-blog-read-more-options' => esc_html__('Read More','gist'),
            'gist-blog-pagination-type-options'=>'default',
            'gist-related-post'=> 1,
            'gist-single-featured'=> 1,
            'gist-footer-social' => 0,
            'gist-extra-breadcrumb' => 0,
            'gist-breadcrumb-text' => esc_html__('You Are Here','gist')
        );
        return apply_filters( 'gist_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since Gist 1.0.0
 *
 * @param null
 * @return array gist_get_theme_options
 *
 */
if ( !function_exists('gist_get_theme_options') ) :
    function gist_get_theme_options() {

        $gist_default_theme_options = gist_default_theme_options();
        
    
        $gist_get_theme_options = get_theme_mod( 'gist_theme_options');
        if( is_array( $gist_get_theme_options )){
            return array_merge( $gist_default_theme_options, $gist_get_theme_options );
        }
        else{
            return $gist_default_theme_options;
        }

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gist_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'gist_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'gist_customize_partial_blogdescription',
		) );
	}

	$default = gist_default_theme_options();
	/*adding sections for footer options*/
	    
	    $wp_customize->add_panel( 'gist_panel', array(
	        'priority' => 30,
	        'capability' => 'edit_theme_options',
	        'title' => __( 'Gist Theme Options', 'gist' ),
	    ) );

	    	/* Primary Color Section Inside Core Color Option */
	    	$wp_customize->add_setting( 'gist_theme_options[gist_primary_color]',
	    	    array(
	    	        'default'           => $default['gist_primary_color'],
	    	        'sanitize_callback' => 'sanitize_hex_color',
	    	    )
	    	);
	    	$wp_customize->add_control(
	    	    new WP_Customize_Color_Control(	    	        
	    	        $wp_customize,
	    	        'gist_theme_options[gist_primary_color]',
	    	        array(
	    	            'label'       => esc_html__( 'Primary Color', 'gist' ),
	    	            'description' => esc_html__( 'Applied to main color of site.', 'gist' ),
	    	            'section'     => 'colors',  
	    	        )
	    	    )
	    	);
	    	/*Blog Page Options*/
	    	$wp_customize->add_section( 'gist_blog_section', array(
	    	    'priority'       => 20,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Blog Section Options', 'gist' ),
	    	    'panel' 		 => 'gist_panel',
	    	) );

	    	/*Sidebar Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-sidebar-options]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'default'           => $default['gist-sidebar-options'],
	    	    'sanitize_callback' => 'gist_sanitize_select'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-sidebar-options]', array(
	    	    'choices'       => array(
	    	                    'right-sidebar'         => __('Right Sidebar','gist'),
	    	                    'left-sidebar'          => __('Left Sidebar','gist'),
	    	                    'no-sidebar'        => __('No Sidebar','gist'),
	    	                    'middle-column'        => __('Middle Column','gist'),

	    	    ),
	    	    'label'         => __( 'Select Prefered Sidebar from this Options', 'gist' ),
	    	    'description'   => __( 'Select Sidebar options', 'gist' ),
	    	    'section'       => 'gist_blog_section',
	    	    'settings'      => 'gist_theme_options[gist-sidebar-options]',
	    	    'type'          => 'select'
	    	) );

	    	/*Excerpt Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-excerpt-options]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' => 'refresh',
	    	    'default'           => $default['gist-blog-excerpt-options'],
	    	    'sanitize_callback' => 'gist_sanitize_select'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-excerpt-options]', array(
	    		'choices' => array(
                            'excerpt'         => __('Excerpt','gist'),
                            'content'          => __('Content','gist'),        
							 ),
	    	    'label'     => __( 'Show Content From', 'gist' ),
	    	    'description' => __('Select The Content Show Options', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-excerpt-options]',
	    	    'type'      => 'select',
	    	    'priority'  => 25
	    	) );

	    	/*Excerpt Length*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-excerpt-length]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' => 'refresh',
	    	    'default'           => $default['gist-blog-excerpt-length'],
	    	    'sanitize_callback' => 'absint'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-excerpt-length]', array(
	    	    'label'     => __( 'Enter Excerpt Length', 'gist' ),
	    	    'description' => __('Enter Your Excerpt Lenght. You must select Excerpt Above First', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-excerpt-length]',
	    	    'type'      => 'number',
	    	    'priority'  => 30
	    	) );

	    	/*Featured Image Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-featured-image]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' => 'refresh',
	    	    'default'           => $default['gist-blog-featured-image'],
	    	    'sanitize_callback' => 'gist_sanitize_select'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-featured-image]', array(
	    		'choices' => array(
                            'left-image'  => __('Left Image','gist'),
                            'right-image' => __('Right Image','gist'),
                            'full-image'  => __('Full Image','gist'),
                            'hide-image'  => __('Hide Image','gist')       
							),
	    	    'label'     => __( 'Featured Image Options', 'gist' ),
	    	    'description' => __('Select the options to change the featured image position or hide', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-featured-image]',
	    	    'type'      => 'select',
	    	    'priority'  => 30
	    	) );
	    	/*Meta Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-meta-options]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' 		=> 'refresh',
	    	    'default'           => $default['gist-blog-meta-options'],
	    	    'sanitize_callback' => 'gist_sanitize_checkbox'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-meta-options]', array(
	    	    'label'     => __( 'Meta Show/Hide Options', 'gist' ),
	    	    'description' => __('Checked to hide Meta Options', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-meta-options]',
	    	    'type'      => 'checkbox',
	    	    'priority'  => 30
	    	) );
	    	/*Read More Text Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-read-more-options]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' 		=> 'refresh',
	    	    'default'           => $default['gist-blog-read-more-options'],
	    	    'sanitize_callback' => 'sanitize_text_field'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-read-more-options]', array(
	    	    'label'     => __( 'Read More Text', 'gist' ),
	    	    'description' => __('Enter Text For Read More', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-read-more-options]',
	    	    'type'      => 'text',
	    	    'priority'  => 30
	    	) );

	    	/* Pagination Type Options*/
	    	$wp_customize->add_setting( 'gist_theme_options[gist-blog-pagination-type-options]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' 		=> 'refresh',
	    	    'default'           => $default['gist-blog-pagination-type-options'],
	    	    'sanitize_callback' => 'gist_sanitize_select'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-blog-pagination-type-options]', array(
	    		'choices' => array(
                            'default'  => __('Default Pagination','gist'),
                            'numeric' => __('Numeric Pagination','gist')      
							),
	    	    'label'     => __( 'Pagination Options', 'gist' ),
	    	    'description' => __('Select the required pagination type', 'gist'),
	    	    'section'   => 'gist_blog_section',
	    	    'settings'  => 'gist_theme_options[gist-blog-pagination-type-options]',
	    	    'type'      => 'select',
	    	    'priority'  => 30
	    	) );

	    	/*Single Post Options*/
	    	$wp_customize->add_section( 'gist_single_post_section', array(
	    	    'priority'       => 20,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Single Post Options', 'gist' ),
	    	    'panel' 		 => 'gist_panel',
	    	) );
	    	$wp_customize->add_setting( 'gist_theme_options[gist-related-post]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' => 'refresh',
	    	    'default'           => $default['gist-related-post'],
	    	    'sanitize_callback' => 'gist_sanitize_checkbox'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-single_post]', array(
	    	    'label'     => __( 'Related Post Options Text', 'gist' ),
	    	    'description' => __('Show/Hide Related Post on Single Post', 'gist'),
	    	    'section'   => 'gist_single_post_section',
	    	    'settings'  => 'gist_theme_options[gist-related-post]',
	    	    'type'      => 'checkbox',
	    	    'priority'  => 15
	    	) );

	    	$wp_customize->add_setting( 'gist_theme_options[gist-single-featured]', array(
	    	    'capability'        => 'edit_theme_options',
	    	    'transport' => 'refresh',
	    	    'default'           => $default['gist-single-featured'],
	    	    'sanitize_callback' => 'gist_sanitize_checkbox'
	    	) );
	    	$wp_customize->add_control( 'gist_theme_options[gist-single-featured]', array(
	    	    'label'     => __( 'Featured Image Options', 'gist' ),
	    	    'description' => __('Show/Hide Featured Image on Single Post', 'gist'),
	    	    'section'   => 'gist_single_post_section',
	    	    'settings'  => 'gist_theme_options[gist-single-featured]',
	    	    'type'      => 'checkbox',
	    	    'priority'  => 15
	    	) );

		    /*stickysidebar*/
		    $wp_customize->add_section( 'gist_sticky-sidebar_section', array(
		        'priority'       => 80,
		        'capability'     => 'edit_theme_options',
		        'theme_supports' => '',
		        'title'          => __( 'Sticky Sidebar Option', 'gist' ),
		        'panel' 		 => 'gist_panel',
		    ) );
		    $wp_customize->add_setting( 'gist_theme_options[gist-sticky-sidebar]', array(
		        'capability'        => 'edit_theme_options',
		        'transport' => 'refresh',
		        'default'           => $default['gist-sticky-sidebar'],
		        'sanitize_callback' => 'gist_sanitize_checkbox'
		    ) );
		    $wp_customize->add_control( 'gist_theme_options[gist-sticky-sidebar]', array(
		        'label'     => __( 'Sticky Sidebar Option', 'gist' ),
		        'description' => __('Enable/Disable Sticky Sidebar', 'gist'),
		        'section'   => 'gist_sticky-sidebar_section',
		        'settings'  => 'gist_theme_options[gist-sticky-sidebar]',
		        'type'      => 'checkbox',
		        'priority'  => 26
		    ) );

		        /*Typography Options */
		        
		        $wp_customize->add_section('gist-typography-options', array(
		        	'title'    => __( 'Typography Options', 'gist' ),
		        	'priority' => 50,
		        	'panel' => 'gist_panel'
		        ));
		        
		        $wp_customize->add_setting('gist_theme_options[gist-font-url]', array(
		        	'default' =>  $default['gist-font-url'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'esc_url_raw'
		        ));
		        
		        $wp_customize->add_control('gist_theme_options[gist-font-url]', array(
		        	 'label' => __('Google Font URL', 'gist'),
		        	 'section' => 'gist-typography-options',
		        	 'type'    => 'url',
		        	 'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		        		__( 'Insert', 'gist' ),
		        		esc_url('https://www.google.com/fonts'),
		        		__('Enter Google Font URL' , 'gist'),
		        		__('to add google Font.' ,'gist')
		        		),
		        	
		        ));
		        
		        $wp_customize->add_setting('gist_theme_options[gist-font-family]', array(
		        	'default' => $default['gist-font-family'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'sanitize_text_field',
		        	'settings'=>'gist_theme_options[gist-font-url]'
		        ));
		        
		        $wp_customize->add_control('gist_theme_options[gist-font-family]', array(
		        	 'label' => __('Font Family', 'gist'),
		        	 'section' => 'gist-typography-options',
		        	 'type'    => 'text',
		        	 'description' => __( 'Insert Google Font Family Name.', 'gist' ),
		        	
		        ));
		        
		        $wp_customize->add_setting('gist_theme_options[gist-font-size]', array(
		        	'default' => $default['gist-font-size'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'gist_sanitize_number',
		        	'settings'=>'gist_theme_options[gist-font-size]'
		        ));
		        
		        $wp_customize->add_control('gist_theme_options[gist-font-size]', array(
		        	'label' => __('Font Size', 'gist'),
		        	'section' => 'gist-typography-options',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Font Size.', 'gist' ),
		        	'input_attrs' => array(
		        		'min' => 10,
		        		'max' => 30,
		        		'step' => 1,
		        	),
		        ));
		        
		        
		        $wp_customize->add_setting('gist_theme_options[gist-font-line-height]', array(
		        	'default'     => $default['gist-font-line-height'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'gist_sanitize_number',
		        	'settings'=>'gist_theme_options[gist-font-line-height]'
		        ));
		        
		        $wp_customize->add_control('gist_theme_options[gist-font-line-height]', array(
		        	'label' => __('Line Height', 'gist'),
		        	'section' => 'gist-typography-options',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Line Height.', 'gist' ),
		        	'input_attrs' => array(
		        		'min' => '0',
		        		'max' => '4',
		        		'step' => '0.1',
		        	),
		        ));
		        
		        $wp_customize->add_setting('gist_theme_options[gist-letter-spacing]', array(
		        	'default' => $default['gist-letter-spacing'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'gist_sanitize_number',
		        	'settings'=>'gist_theme_options[gist-font-line-height]',
		        ));
		        
		        $wp_customize->add_control('gist_theme_options[gist-letter-spacing]', array(
		        	'label'   => __('Letter Space', 'gist'),
		        	'section' => 'gist-typography-options',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Letter Space.', 'gist' ),
		        	'input_attrs' => array(
		        		'min' => '-20',
		        		'max' => '4',
		        		'step' => '1',
		        	),
		        ));
		        /*copyright*/
		        $wp_customize->add_section( 'gist_footer_section', array(
		            'priority'       => 100,
		            'capability'     => 'edit_theme_options',
		            'theme_supports' => '',
		            'title'          => __( 'Footer Options', 'gist' ),
		            'panel' 		 => 'gist_panel',
		        ) );
		        $wp_customize->add_setting( 'gist_theme_options[gist-footer-copyright]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['gist-footer-copyright'],
		            'sanitize_callback' => 'sanitize_text_field'
		        ) );
		        $wp_customize->add_control( 'gist_theme_options[gist-footer-copyright]', array(
		            'label'     => __( 'Copyright Text', 'gist' ),
		            'description' => __('Write Your Copyright Text Here', 'gist'),
		            'section'   => 'gist_footer_section',
		            'settings'  => 'gist_theme_options[gist-footer-copyright]',
		            'type'      => 'text',
		            'priority'  => 25
		        ) );

		        /*gototop*/
		        $wp_customize->add_setting( 'gist_theme_options[gist-footer-gototop]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['gist-footer-gototop'],
		            'sanitize_callback' => 'gist_sanitize_checkbox'
		        ) );
		        $wp_customize->add_control( 'gist_theme_options[gist-footer-gototop]', array(
		            'label'     => __( 'Go To Top Option', 'gist' ),
		            'description' => __('Enable/Disable Go To Top', 'gist'),
		            'section'   => 'gist_footer_section',
		            'settings'  => 'gist_theme_options[gist-footer-gototop]',
		            'type'      => 'checkbox',
		            'priority'  => 26
		        ) );


		        /*Footer Social Options*/
		        $wp_customize->add_setting( 'gist_theme_options[gist-footer-social]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['gist-footer-social'],
		            'sanitize_callback' => 'gist_sanitize_checkbox'
		        ) );
		        $wp_customize->add_control( 'gist_theme_options[gist-footer-social]', array(
		            'label'     => __( 'Social Option', 'gist' ),
		            'description' => __('Show/Hide Social Options in Footer', 'gist'),
		            'section'   => 'gist_footer_section',
		            'settings'  => 'gist_theme_options[gist-footer-social]',
		            'type'      => 'checkbox',
		            'priority'  => 26
		        ) );

		        /*Extra Options*/
		        $wp_customize->add_section( 'gist_extra_section', array(
		            'priority'       => 200,
		            'capability'     => 'edit_theme_options',
		            'theme_supports' => '',
		            'title'          => __( 'Extra Options', 'gist' ),
		            'panel' 		 => 'gist_panel',
		        ) );
		        /* Show Hide Breadcrumbs */
		        $wp_customize->add_setting( 'gist_theme_options[gist-extra-breadcrumb]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['gist-extra-breadcrumb'],
		            'sanitize_callback' => 'gist_sanitize_checkbox'
		        ) );
		        $wp_customize->add_control( 'gist_theme_options[gist-extra-breadcrumb]', array(
		            'label'     => __( 'Breadcrumb Options', 'gist' ),
		            'description' => __('Show/Hide Breadcrumbs', 'gist'),
		            'section'   => 'gist_extra_section',
		            'settings'  => 'gist_theme_options[gist-extra-breadcrumb]',
		            'type'      => 'checkbox',
		            'priority'  => 25
		        ) );
		        /* Breadcrumbs Text */
		        $wp_customize->add_setting( 'gist_theme_options[gist-breadcrumb-text]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['gist-breadcrumb-text'],
		            'sanitize_callback' => 'sanitize_text_field'
		        ) );
		        $wp_customize->add_control( 'gist_theme_options[gist-breadcrumb-text]', array(
		            'label'     => __( 'Breadcrumb Text', 'gist' ),
		            'description' => __('Enter Breadcrumb Text Here', 'gist'),
		            'section'   => 'gist_extra_section',
		            'settings'  => 'gist_theme_options[gist-breadcrumb-text]',
		            'type'      => 'text',
		            'priority'  => 25
		        ) );		        
		        /* About Theme Section */
		        $wp_customize->add_section( 'gist_about_theme_section', array(
		            'priority'       => 10,
		            'capability'     => 'edit_theme_options',
		            'theme_supports' => '',
		            'title'          => __( 'About Gist', 'gist' ),
		            'panel' 		 => 'gist_panel',
		        ) );
	           	$wp_customize->add_setting( 'upgrade_text', array(
	               'default' => '',
	               'sanitize_callback' => '__return_false'
	           	) );
	           
	           	$wp_customize->add_control( new Gist_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
	               'section'     => 'gist_about_theme_section',
	               'description' => array('')
	           	) ) );

		        /**
		         * Load customizer custom-controls
		         */
		        require get_template_directory() . '/candidthemes/customizer-pro/customize-controls.php';		        
}
add_action( 'customize_register', 'gist_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gist_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gist_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gist_customize_preview_js() {
	wp_enqueue_script( 'gist-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gist_customize_preview_js' );