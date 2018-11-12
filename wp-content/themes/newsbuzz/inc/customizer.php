<?php
/**
 * newsbuzz Theme Customizer
 *
 * Please browse readme.txt for credits and forking information
 *
 * @package newsbuzz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsbuzz_customize_register( $wp_customize ) {

	//get the current color value for accent color
	$color_scheme = newsbuzz_get_color_scheme();
	//get the default color for current color scheme
	$current_color_scheme = newsbuzz_current_color_scheme_default_color();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_section('header_image')->title = __( 'Front Page Header', 'newsbuzz' );
	$wp_customize->get_section('colors')->title = __( 'Background Color', 'newsbuzz' );


// Need some help?
 
	$wp_customize->add_section(
		'newsbuzz_needsomehelpsection',
		array(
			'title' => __('Need Some Help?', 'newsbuzz'),
			'priority' => 0,
			'description' => __('
				<p><strong>I have a problem with a plugin</strong>
				<br>
				Not all plugins are integrated in NewsBuzz, so if you are having problems with a plugin, please contact the plugin author.
				</p>
					<p><strong>I have a problem with WordPress Features</strong>
				<br>
				If you are having problems with WordPress or basic features, please go to the <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a> 
				</p>
					<p><strong>I have a problem with NewsBuzz Theme</strong>
				<br>
				If you are having problems with NewsBuzz theme please contact me at Email@vilhodesign.com or through this <a href="http://vilhodesign.com/contact/" target="_blank">contact form</a>.
				</p><br>
				<p><strong>Newsbuzz Premium Features</strong>
				<p>
				<a style="display:block;" href="http://vilhodesign.com/themes/newsbuzz/" target="_blank">
				<img src="http://vilhodesign.com/img/prem.png">
				</a>
				</p>
				', 'newsbuzz') 
			)
		);  
	$wp_customize->add_setting('newsbuzz_needsomehelp', array(
		'sanitize_callback' => 'noneed',
		'type' => 'info_control',
		'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'needsomehelpseciton', array(
		'section' => 'newsbuzz_needsomehelpsection',
		'settings' => 'newsbuzz_needsomehelp',
		'type' => 'themearea',
		'priority' => 1
		) )
	);   
 

	$wp_customize->add_section(
		'newsbuzz_infotab',
		array(
			'title' => __('Unlock New Features', 'newsbuzz'),
			'priority' => 0,
			'description' => __('
				<a style="display:block;" href="http://vilhodesign.com/themes/newsbuzz/" target="_blank">
				<img src="http://vilhodesign.com/img/prem.png">
				</a>
				</p>
				', 'newsbuzz') 
			)
		);  
	$wp_customize->add_setting('newsbuzz_infosection', array(
		'sanitize_callback' => 'noneed',
		'type' => 'info_control',
		'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'infosec', array(
		'section' => 'newsbuzz_infotab',
		'settings' => 'newsbuzz_infosection',
		'type' => 'themearea',
		'priority' => 1
		) )
	);   

	//Header Background Color setting


		$wp_customize->add_setting( 'toggle_all_header_text', array(
        'default' => 0,
        'priority' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ) );
   	
	$wp_customize->add_control( 'toggle_all_header_text', array(
	    'label'    => __( 'Hide ALL header text and buttons', 'newsbuzz' ),
	    'section'  => 'header_image',
	    'settings' => 'toggle_all_header_text',
	    'priority' => 1,
	    'type'     => 'checkbox',
) );



	$wp_customize->add_setting( 'header_bg_color', array(
		'default'           => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'       => __( 'Header Background Color', 'newsbuzz' ),
		'description' => __( 'Applied to header background.', 'newsbuzz' ),
		'section'     => 'header_image',
		'settings'    => 'header_bg_color',
		) ) );

	$wp_customize->add_section( 'site_identity' , array(
		'priority'   => 3,
		));

	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Landing Page Header', 'newsbuzz'),
		'description' => __( 'Shown on the front page only.', 'newsbuzz' ),
		'priority'   => 4,
		));


	$wp_customize->add_setting( 'header_image_before_text_color', array(
		'default'           => '#bd9452',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_before_text_color', array(
		'label'       => __( 'Header Image Before Title Text Color', 'newsbuzz' ),
		'priority' 			=> 2,
		'section'     => 'header_image',
		'settings'    => 'header_image_before_text_color',
		) ) );


	$wp_customize->add_setting( 'header_image_text_color', array(
		'default'           => '#42392a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_text_color', array(
		'label'       => __( 'Header Image Title Color', 'newsbuzz' ),
		'priority' 			=> 2,
		'section'     => 'header_image',
		'settings'    => 'header_image_text_color',
		) ) );

	$wp_customize->add_setting( 'hero_image_above_title', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
		'default'  => '',
		) );


		$wp_customize->add_setting( 'toggle_above_title', array(
        'default' => 0,
        'priority' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ) );
   	
	$wp_customize->add_control( 'toggle_above_title', array(
	    'label'    => __( 'Hide Header Image Before Title', 'newsbuzz' ),
	    'section'  => 'header_image',
	    'settings' => 'toggle_above_title',
	    'priority' => 1,
	    'type'     => 'checkbox',
) );


	$wp_customize->add_control( 'hero_image_above_title', array(
		'label'    => __( "Header Image Before Title", 'newsbuzz' ),
		'section'  => 'header_image',
		'sanitize_callback' => 'sanitize_text_field',
		'type'     => 'text',
		'priority' => 1,
		) );
	$wp_customize->add_control( 'display_header_text', array(
		'label'    => __( "Display Header Images?", 'newsbuzz' ),
		'section'  => 'header_section',
		'type'     => 'text',
		'priority' => 1,
		) );
	$wp_customize->add_setting( 'header_image_tagline_color', array(
		'default'           => '#42392a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_tagline_color', array(
		'label'       => __( 'Header Image After Title Text Color', 'newsbuzz' ),
		'section'     => 'header_image',
		'priority'   => 2,
		'settings'    => 'header_image_tagline_color',
		) ) );



	$wp_customize->add_setting( 'header_image_button_color', array(
		'default'           => '#bd9452',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_button_color', array(
		'label'       => __( 'Header Image Button Color', 'newsbuzz' ),
		'description' => __( 'Choose a color for the header button.', 'newsbuzz' ),
		'section'     => 'header_image',
		'priority'   => 2,
		'settings'    => 'header_image_button_color',
		) ) );



		$wp_customize->add_setting( 'toggle_header_title', array(
        'default' => 0,
        'priority' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ) );
   	
	$wp_customize->add_control( 'toggle_header_title', array(
	    'label'    => __( 'Hide Header Image Title', 'newsbuzz' ),
	    'section'  => 'header_image',
	    'settings' => 'toggle_header_title',
	    'priority' => 1,
	    'type'     => 'checkbox',
) );



	$wp_customize->add_setting( 'hero_image_title', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
		'default'  => '',
		) );

	$wp_customize->add_control( 'hero_image_title', array(
		'label'    => __( "Header Image Title", 'newsbuzz' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
		) );


		$wp_customize->add_setting( 'toggle_header_subtitle', array(
        'default' => 0,
        'priority' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ) );
   	
	$wp_customize->add_control( 'toggle_header_subtitle', array(
	    'label'    => __( 'Hide Header Image After Title', 'newsbuzz' ),
	    'section'  => 'header_image',
	    'settings' => 'toggle_header_subtitle',
	    'priority' => 1,
	    'type'     => 'checkbox',
) );



	$wp_customize->add_setting( 'hero_image_subtitle', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default'  => '',
		) );

	$wp_customize->add_control( 'hero_image_subtitle', array(
		'label'    => __( "Header Image After Title", 'newsbuzz' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
		) );


		$wp_customize->add_setting( 'toggle_header_button', array(
        'default' => 0,
        'priority' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ) );
   	
	$wp_customize->add_control( 'toggle_header_button', array(
	    'label'    => __( 'Hide Header Button', 'newsbuzz' ),
	    'section'  => 'header_image',
	    'settings' => 'toggle_header_button',
	    'priority' => 1,
	    'type'     => 'checkbox',
) );


	$wp_customize->add_setting( 'hero_image_button_text', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default'  => '',
		) );

	$wp_customize->add_control( 'hero_image_button_text', array(
		'label'    => __( "Header Image Button Text", 'newsbuzz' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
		) );
	$wp_customize->add_control( 'header_textcolor', array(
		'section'  => 'foots',
		) );
	$wp_customize->add_setting( 'hero_image_button_link', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control( 'hero_image_button_link', array(
		'label'    => __( "Header Image Button Link", 'newsbuzz' ),
		'section'  => 'header_image',
		'type'     => 'url',
		'priority' => 1,
		) );



	$wp_customize->add_section(
		'accent_color_option',
		array(
			'title'     => __('General Color','newsbuzz'),
			'priority'  => 2
			)
		);

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'newsbuzz_sanitize_color_scheme',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Theme Color Name', 'newsbuzz' ),
		'section'  => 'accent_color_option_no',
		'type'     => 'select',
		'choices'  => newsbuzz_get_color_scheme_choices(),
		'priority' => 3,
		) );

	// Add custom accent color.

	$wp_customize->add_setting( 'accent_color', array(
		'default'           => $current_color_scheme[0],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'       => __( 'General Theme Color', 'newsbuzz' ),
		'description' => __( 'Applied to highlight elements, buttons and much more.', 'newsbuzz' ),
		'section'     => 'accent_color_option_no',
		'settings'    => 'accent_color',
		) ) );

	//Add section for post option
	$wp_customize->add_section(
		'post_options',
		array(
			'title'     => __('Post Options','newsbuzz'),
			'priority'  => 300
			)
		);

	$wp_customize->add_setting('post_display_option', array(
		'default'        => 'post-excerpt',
		'sanitize_callback' => 'newsbuzz_sanitize_post_display_option',
		'transport'         => 'refresh'
		));

	$wp_customize->add_control('post_display_types', array(
		'label'      => __('How would you like to display a post on post listing page?', 'newsbuzz'),
		'section'    => 'post_options',
		'settings'   => 'post_display_option',
		'type'       => 'radio',
		'choices'    => array(
			'post-excerpt' => __('Post excerpt','newsbuzz'),
			'full-post' => __('Full post','newsbuzz'),            
			),
		));
	
}
add_action( 'customize_register', 'newsbuzz_customize_register' );

/**
 * Register color schemes for newsbuzz.
 *
 * @return array An associative array of color scheme options.
 */
function newsbuzz_get_color_schemes() {
	return apply_filters( 'newsbuzz_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'newsbuzz' ),
			'colors' => array(
				'#bd9452',			
				),
			),
		'pink'    => array(
			'label'  => __( 'Pink', 'newsbuzz' ),
			'colors' => array(
				'#FF4081',				
				),
			),
		'orange'  => array(
			'label'  => __( 'Orange', 'newsbuzz' ),
			'colors' => array(
				'#FF5722',
				),
			),
		'green'    => array(
			'label'  => __( 'Green', 'newsbuzz' ),
			'colors' => array(
				'#8BC34A',
				),
			),
		'red'    => array(
			'label'  => __( 'Red', 'newsbuzz' ),
			'colors' => array(
				'#FF5252',
				),
			),
		'yellow'    => array(
			'label'  => __( 'yellow', 'newsbuzz' ),
			'colors' => array(
				'#FFC107',
				),
			),
		'blue'   => array(
			'label'  => __( 'Blue', 'newsbuzz' ),
			'colors' => array(
				'#03A9F4',
				),
			),
		) );
}

if(!function_exists('newsbuzz_current_color_scheme_default_color')):
/**
 * Get the default hex color value for current color scheme
 *
 *
 * @return array An associative array of current color scheme hex values.
 */
function newsbuzz_current_color_scheme_default_color(){
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	
	$color_schemes       = newsbuzz_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; //newsbuzz_current_color_scheme_default_color

if ( ! function_exists( 'newsbuzz_get_color_scheme' ) ) :
/**
 * Get the current newsbuzz color scheme.
 *
 *
 * @return array An associative array of currently set color hex values.
 */
function newsbuzz_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$accent_color = get_theme_mod('accent_color','#bd9452');
	$color_schemes       = newsbuzz_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		$color_schemes[ $color_scheme_option ]['colors'] = array($accent_color);
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // newsbuzz_get_color_scheme

if ( ! function_exists( 'newsbuzz_get_color_scheme_choices' ) ) :
/**
 * Returns an array of color scheme choices registered for newsbuzz.
 *
 *
 * @return array Array of color schemes.
 */
function newsbuzz_get_color_scheme_choices() {
	$color_schemes                = newsbuzz_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // newsbuzz_get_color_scheme_choices

if ( ! function_exists( 'newsbuzz_sanitize_color_scheme' ) ) :
/**
 * Sanitization callback for color schemes.
 *
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function newsbuzz_sanitize_color_scheme( $value ) {
	$color_schemes = newsbuzz_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		$value = 'default';
	}

	return $value;
}
endif; // newsbuzz_sanitize_color_scheme

if ( ! function_exists( 'newsbuzz_sanitize_post_display_option' ) ) :
/**
 * Sanitization callback for post display option.
 *
 *
 * @param string $value post display style.
 * @return string post display style.
 */

function newsbuzz_sanitize_post_display_option( $value ) {
	if ( ! in_array( $value, array( 'post-excerpt', 'full-post' ) ) )
		$value = 'post-excerpt';

	return $value;
}
endif; // newsbuzz_sanitize_post_display_option
/**
 * Enqueues front-end CSS for color scheme.
 *
 *
 * @see wp_add_inline_style()
 */
function newsbuzz_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	
	$color_scheme = newsbuzz_get_color_scheme();

	$color = array(
		'accent_color'            => $color_scheme[0],
		);

	$color_scheme_css = newsbuzz_get_color_scheme_css( $color);

	wp_add_inline_style( 'newsbuzz-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'newsbuzz_color_scheme_css' );

/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function newsbuzz_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'accent_color'            => '',
		) );

	$css = <<<CSS
	/* Color Scheme */

	/* Accent Color */

	a:active,
	a:hover,
	a:focus {
		color: {$colors['accent_color']};
	}			

	.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
		color: {$colors['accent_color']};
	}



	.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
		color: {$colors['accent_color']} !important;			
	}

	.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {	    
		background-color: {$colors['accent_color']};
	}
	.btn, .btn-default:visited, .btn-default:active:hover, .btn-default.active:hover, .btn-default:active:focus, .btn-default.active:focus, .btn-default:active.focus, .btn-default.active.focus {
		background: {$colors['accent_color']};
	}

	.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
		color: {$colors['accent_color']};
	}
	.cat-links a, .tags-links a {
		color: {$colors['accent_color']};
	}
	.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
	.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
		color: #fff;
		background-color: {$colors['accent_color']};
	}
	h5.entry-date a:hover {
		color: {$colors['accent_color']};
	}

	 #respond input#submit {
	background-color: {$colors['accent_color']};
	background: {$colors['accent_color']};
	}
	button:hover, button, button:active, button:focus {
		border: 1px solid {$colors['accent_color']};
		background-color:{$colors['accent_color']};
		background:{$colors['accent_color']};
	}
	.dropdown-menu .current-menu-item.current_page_item a, .dropdown-menu .current-menu-item.current_page_item a:hover, .dropdown-menu .current-menu-item.current_page_item a:active, .dropdown-menu .current-menu-item.current_page_item a:focus {
		background: {$colors['accent_color']} !important;
		color:#fff !important
	}
	blockquote {
		border-left: 5px solid {$colors['accent_color']};
	}
	.sticky-post{
		background: {$colors['accent_color']};
		color:white;
	}
	.entry-title a:hover,
	.entry-title a:focus{
		color: {$colors['accent_color']};
	}
	.entry-header .entry-meta::after{
		background: {$colors['accent_color']};
	}
	.post-password-form input[type="submit"], .post-password-form input[type="submit"]:hover, .post-password-form input[type="submit"]:focus, .post-password-form input[type="submit"]:active {
		background-color: {$colors['accent_color']};
	}
	.fa {
		color: {$colors['accent_color']};
	}
	.btn-default{
		border-bottom: 1px solid {$colors['accent_color']};
	}
	.btn-default:hover, .btn-default:focus{
		border-bottom: 1px solid {$colors['accent_color']};
		background-color: {$colors['accent_color']};
	}
	.nav-previous:hover, .nav-next:hover{
		border: 1px solid {$colors['accent_color']};
		background-color: {$colors['accent_color']};
	}
	.next-post a:hover,.prev-post a:hover{
		color: {$colors['accent_color']};
	}
	.posts-navigation .next-post a:hover .fa, .posts-navigation .prev-post a:hover .fa{
		color: {$colors['accent_color']};
	}
		#secondary .widget a:hover,
		#secondary .widget a:focus{
	color: {$colors['accent_color']};
	}
	#secondary .widget_calendar tbody a {
	background-color: {$colors['accent_color']};
	color: #fff;
	padding: 0.2em;
	}
	#secondary .widget_calendar tbody a:hover{
	background-color: {$colors['accent_color']};
	color: #fff;
	padding: 0.2em;
	}

	.frontpage-site-button:hover{
	background-color: {$colors['accent_color']};
	color: #fff !important;
	border-color: {$colors['accent_color']};
	}
.header-box-white-wrapper-content {
	border-color: {$colors['accent_color']};
}


CSS;

return $css;
}

if(! function_exists('newsbuzz_toggle_css_output' ) ):
function newsbuzz_toggle_css_output(){

	?>

		<style type="text/css">
	.site-header { background: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
	.footer-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_title_colors')); ?>; }
	.site-footer { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_background_color')); ?>; }
	.footer-widget-wrapper { background: <?php echo esc_attr(get_theme_mod( 'footer_colors')); ?>; }
	.row.site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text_color')); ?>; }
	#secondary h3.widget-title, #secondary h4.widget-title { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_colors')); ?>; }
	#secondary .widget, #secondary .search-form, #secondary .widget li, #secondary .textwidget, #secondary .tagcloud { background: <?php echo esc_attr(get_theme_mod( 'sidebar_background_color')); ?>; }
	#secondary .widget a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
	.navbar-default, .dropdown-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
	.navbar-default .navbar-nav>li>a, .dropdown-menu > li > a { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
	.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { color: <?php echo esc_attr(get_theme_mod( 'navigation_logo_color')); ?>; }
	.page .entry-content table th, .single-post .entry-content table th,.page .entry-content h1, .page .entry-content h2, .page .entry-content h3, .page .entry-content h4, .page .entry-content h5, .page .entry-content h6,.single-post .entry-content h1, .single-post .entry-content h2, .single-post .entry-content h3, .single-post .entry-content h4, .single-post .entry-content h5, .single-post .entry-content h6,h1.entry-title, .entry-header .entry-title a { color: <?php echo esc_attr(get_theme_mod( 'headline_color')); ?>; }
	.entry-content, .entry-summary, .post-feed-wrapper p { color: <?php echo esc_attr(get_theme_mod( 'post_content_color')); ?>; }
	.article-grid-single .entry-header-category, .entry-date time, h5.entry-date, h5.entry-date a { color: <?php echo esc_attr(get_theme_mod( 'author_line_color')); ?>; }
	.top-widgets { background: <?php echo esc_attr(get_theme_mod( 'top_widget_background_color')); ?>; }
	.top-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'top_widget_title_color')); ?>; }
	.top-widgets, .top-widgets p { color: <?php echo esc_attr(get_theme_mod( 'top_widget_text_color')); ?>; }
	.bottom-widgets { background: <?php echo esc_attr(get_theme_mod( 'bottom_widget_background_color')); ?>; }
	.bottom-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'bottom_widget_title_color')); ?>; }
	.frontpage-site-title { color: <?php echo esc_attr(get_theme_mod( 'header_image_text_color')) ?>; }
	.frontpage-site-description { color: <?php echo esc_attr(get_theme_mod( 'header_image_tagline_color')) ?>; }
	#secondary .widget .post-date, #secondary .widget p, #secondary .widget {color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
	#secondary h4.widget-title { background-color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_background_colors')); ?>; }
	.frontpage-site-before-title { color: <?php echo esc_attr(get_theme_mod( 'header_image_before_text_color')); ?>; }
	.footer-widgets a, .footer-widgets li a { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_link_color')); ?>; }
	.footer-widgets h3 { border-bottom-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
	.site-footer { border-top-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
	.bottom-widgets, .bottom-widgets p { color: <?php echo esc_attr(get_theme_mod( 'bottom_widget_text_color')); ?>; }
	.footer-widgets span.post-date, .footer-widgets, .footer-widgets p { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_text_color')); ?>; }
	.frontpage-site-button, .frontpage-site-button:hover, .frontpage-site-button:active, .frontpage-site-button:focus, .frontpage-site-button:visited { background-color: <?php echo esc_attr(get_theme_mod( 'header_image_button_color')); ?>; }
	.frontpage-site-button { border-color: <?php echo esc_attr(get_theme_mod( 'header_image_button_color')); ?>; }
	.home .lh-nav-bg-transform .navbar-nav>li>a,.home .lh-nav-bg-transform .navbar-nav>li>a:hover,.home .lh-nav-bg-transform .navbar-nav>li>a:active,.home .lh-nav-bg-transform .navbar-nav>li>a:focus,.home .lh-nav-bg-transform .navbar-nav>li>a:visited { color: <?php echo esc_attr(get_theme_mod( 'navigation_frontpage_menu_color')); ?>; }
	.home .lh-nav-bg-transform.navbar-default .navbar-brand { color: <?php echo esc_attr(get_theme_mod( 'navigation_frontpage_logo_color')); ?>; }
	body { background-color: <?php echo esc_attr(get_theme_mod( 'background_elements_color')); ?>; }
	@media (max-width:767px){
	.navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-nav .open ul.dropdown-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
	.navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus{ color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
	.navbar-default .navbar-toggle:active .icon-bar, .navbar-default .navbar-toggle:focus .icon-bar, .navbar-default .navbar-toggle:hover .icon-bar, .navbar-default .navbar-toggle:visited .icon-bar, .navbar-default .navbar-toggle .icon-bar { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
	.navbar-default .navbar-toggle { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
 	}
	</style>
	<?php }
	add_action( 'wp_head', 'newsbuzz_toggle_css_output' );
	endif;





/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 */
function newsbuzz_customize_control_js() {
	wp_enqueue_script( 'newsbuzz-color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
	wp_localize_script( 'newsbuzz-color-scheme-control', 'colorScheme', newsbuzz_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'newsbuzz_customize_control_js' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsbuzz_customize_preview_js() {
	wp_enqueue_script( 'newsbuzz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'newsbuzz_customize_preview_js' );

/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 */
function newsbuzz_color_scheme_css_template() {
	$colors = array(
		'accent_color'            => '{{ data.accent_color }}',
		);
		?>
		<script type="text/html" id="tmpl-newsbuzz-color-scheme">
		<?php echo newsbuzz_get_color_scheme_css( $colors ); ?>
		</script>
		<?php
	}
	add_action( 'customize_controls_print_footer_scripts', 'newsbuzz_color_scheme_css_template' );
