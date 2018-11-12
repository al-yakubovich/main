<?php
/*************************************************************************************************************************
 * Add logo section on the theme customizer.
 ************************************************************************************************************************/

function writer_blog_brand_setup( $wp_customize ) {
	$wp_customize->add_section( 'ct-brand-setup-section', array(
		'title'		=>	'Logo and Featured Image',
		'priority'	=>	20,
	) );

	// Upload logo for default header

	$wp_customize->add_setting( 'ct-default-logo-setting', array(
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ct-default-logo-control', array(
		'label'			=>	__( 'Upload logo for default header', 'writer-blog' ),
		'description'	=>	__( 'Upload dark version of your logo. 150x40px is preferred.', 'writer-blog' ),
		'section'		=>	'ct-brand-setup-section',
		'settings'		=>	'ct-default-logo-setting',
		'width'			=>	150,
		'height'		=>	40,
	) ) );

	// Upload logo for transparent header

	$wp_customize->add_setting( 'ct-transparent-logo-setting', array(
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ct-transparent-logo-control', array(
		'label'			=>	__( 'Upload logo for transparent header', 'writer-blog' ),
		'description'	=>	__( 'Upload light version of your logo. 150x40px is preferred.', 'writer-blog' ),
		'section'		=>	'ct-brand-setup-section',
		'settings'		=>	'ct-transparent-logo-setting',
		'width'			=>	150,
		'height'		=>	40,
	) ) );

	// Upload default featured image

	$wp_customize->add_setting( 'ct-default-featured-setting', array(
		'sanitize_callback' => 'writer_blog_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ct-default-featured-control', array(
		'label'			=>	__( 'Upload default featured image', 'writer-blog' ),
		'description'	=>	__( 'Upload your default featured image. It will be displayed for posts that do not have a featured image set.', 'writer-blog' ),
		'section'		=>	'ct-brand-setup-section',
		'settings'		=>	'ct-default-featured-setting'
	) ) );
}

add_action( 'customize_register', 'writer_blog_brand_setup');

/*************************************************************************************************************************
 * Add General Settings section.
 ************************************************************************************************************************/

function writer_blog_general_settings_setup( $wp_customize ) {
	$wp_customize->add_section( 'ct-general-settings-section', array(
		'title'		=>	'General Settings',
		'priority'	=>	30,
	) );

	// Enable/disable homepage transparent header

	$wp_customize->add_setting( 'ct-homepage-transparent-setting', array(
		'default'	=>	'yes',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-homepage-transparent-control', array(
		'label'		=>	__( 'Enable homepage transparent header?', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-homepage-transparent-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'yes'	=>	__( 'Yes', 'writer-blog' ),
							'no'	=>	__( 'No' , 'writer-blog'),
						),
	) ) );

	//Enable/disable Category page transparent header

	$wp_customize->add_setting( 'ct-category-transparent-setting', array(
		'default'	=>	'yes',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-category-transparent-control', array(
		'label'		=>	__( 'Enable Category page transparent header?', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-category-transparent-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'yes'	=>	__( 'Yes', 'writer-blog' ),
							'no'	=>	__( 'No' , 'writer-blog'),
						),
	) ) );

	// Credits: https://blog.josemcastaneda.com/2015/05/13/customizer-dropdown-category-selection/
	// create an empty array
	$cats = array();
	 
	// we loop over the categories and set the names and
	// labels we need
	foreach ( get_categories() as $categories => $category ){
	    $cats[$category->term_id] = $category->name;
	}
	 
	// we register our new setting
	$wp_customize->add_setting( 'ct-cats-elect-setting', array(
	    'default' => 1,
	    'sanitize_callback' => 'absint'
	) );
	 
	// we create our control for the setting
	$wp_customize->add_control( 'cat_contlr', array(
		'label'		=>	__( 'Setup homepage slider category.', 'writer-blog' ),
	    'settings' => 'ct-cats-elect-setting',
	    'type' => 'select',
	    'choices' => $cats,
	    'section' => 'ct-general-settings-section',
	) );

	// Slider background image
	$wp_customize->add_setting( 'ct-default-slider-bg-setting', array(
		'default'	=>	'post',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-default-slider-bg-control', array(
		'label'		=>	__( 'Set homepage slider background image as', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-default-slider-bg-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'post'		=>	__( 'Post Featured Image', 'writer-blog' ),
							'default'	=>	__( 'Default Featured Image' , 'writer-blog'),
						),
	) ) );

	// Enable/disable Breadcrumb

	$wp_customize->add_setting( 'ct-breadcrumb-setting', array(
		'default'	=>	'yes',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-breadcrumb-control', array(
		'label'		=>	__( 'Enable Breadcrumb?', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-breadcrumb-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'yes'	=>	__( 'Yes', 'writer-blog' ),
							'no'	=>	__( 'No' , 'writer-blog'),
						),
	) ) );

	// Setting Post Sidebar position

	$wp_customize->add_setting( 'ct-post-sidebar-setting', array(
		'default'	=>	'right',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-post-sidebar-control', array(
		'label'		=>	__( 'Setup sidebar location on single blog post.', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-post-sidebar-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'left'	=>	__( 'Left Sidebar', 'writer-blog' ),
							'right'	=>	__( 'Right Sidebar', 'writer-blog' ),
							'none'	=>	__( 'No Sidebar', 'writer-blog' ),
						),
	) ) );

	// Setting Page Sidebar position

	$wp_customize->add_setting( 'ct-page-sidebar-setting', array(
		'default'	=>	'right',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-page-sidebar-control', array(
		'label'		=>	__( 'Setup sidebar location on pages.', 'writer-blog' ),
		'section'	=>	'ct-general-settings-section',
		'settings'	=>	'ct-page-sidebar-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'left'	=>	'Left Sidebar',
							'right'	=>	'Right Sidebar',
							'none'	=>	'No Sidebar',
						),
	) ) );
}

add_action( 'customize_register', 'writer_blog_general_settings_setup');

/*************************************************************************************************************************
 * Add footer copyright section.
 ************************************************************************************************************************/

function writer_blog_footer_copyright_setup( $wp_customize ) {
	$wp_customize->add_section( 'ct-footer-copyright-setup-section', array(
		'title'		=>	'Footer Settings',
	) );

	// Enable/disable bottom bar copyright section

	$wp_customize->add_setting( 'ct-footer-copyright-display-setting', array(
		'default'	=>	'yes',
		'sanitize_callback' => 'writer_blog_sanitize_select',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-footer-copyright-display-control', array(
		'label'		=>	__( 'Enable bottom bar copyright section?', 'writer-blog' ),
		'section'	=>	'ct-footer-copyright-setup-section',
		'settings'	=>	'ct-footer-copyright-display-setting',
		'type'		=>	'select',
		'choices'	=>	array(
							'yes'	=>	'Yes',
							'no'	=>	'No',
						),
	) ) );

	// Display bottom bar copyright text

	$wp_customize->add_setting( 'ct-footer-copyright-text-setting', array(
		'default'	=>	'Copyright. All Rights Reserved.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ct-footer-copyright-text-control', array(
		'label'		=>	__( 'Bottom bar copyright text', 'writer-blog' ),
		'type'		=>	'textarea',
		'section'	=>	'ct-footer-copyright-setup-section',
		'settings'	=>	'ct-footer-copyright-text-setting',
	) ) );
}

add_action( 'customize_register', 'writer_blog_footer_copyright_setup');

// Sanitize Select fields

function writer_blog_sanitize_select( $input ) {
	$valid = array(
		'yes'		=>	'Yes',
		'no' 		=>	'No',
		'left'		=>	'Left Sidebar',
		'right'		=>	'Right Sidebar',
		'none'		=>	'No Sidebar',
		'post'		=>	'Post Featured Image',
		'default'	=>	'Default Featured Image',
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/**
 * Sanitization: image
 * Control: text, WP_Customize_Image_Control
 *
 * Sanitization callback for images.
 *
 * @uses	theme_slug_validate_image()		
 * @uses	esc_url_raw()				http://codex.wordpress.org/Function_Reference/esc_url_raw
 */
function writer_blog_sanitize_image( $input, $setting ) {
	return esc_url_raw( writer_blog_validate_image( $input, $setting->default ) );
}

/**
 * Validation: image
 * Control: text, WP_Customize_Image_Control
 *
 * @uses	wp_check_filetype()		https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @uses	in_array()				http://php.net/manual/en/function.in-array.php
 */
 
function writer_blog_validate_image( $input, $default = '' ) {
	// Array of valid image file types
	// The array includes image mime types
	// that are included in wp_get_mime_types()
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);
	// Return an array with file extension
	// and mime_type
	$file = wp_check_filetype( $input, $mimes );
	// If $input has a valid mime_type,
	// return it; otherwise, return
	// the default.
	return ( $file['ext'] ? $input : $default );
}