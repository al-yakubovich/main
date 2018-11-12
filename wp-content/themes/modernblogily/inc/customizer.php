<?php
/**
 * modernblogily Theme Customizer.
 *
 * @package modernblogily
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modernblogily_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->add_section(
        'navigation_settings',
        array(
            'title' => __('Navigation', 'modernblogily'),
            'priority' => 99,
            )
        );  
    $wp_customize->add_setting( 'nav_bg', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_bg', array(
        'label'       => __( 'Background Color', 'modernblogily' ),
        'section'     => 'navigation_settings',
        'priority' => 1,
        'settings'    => 'nav_bg',
        ) ) );
    $wp_customize->add_setting( 'nav_link_color', array(
        'default'           => '#929292', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_color', array(
        'label'       => __( 'Link Color', 'modernblogily' ),
        'section'     => 'navigation_settings',
        'priority' => 1,
        'settings'    => 'nav_link_color',
        ) ) );
    $wp_customize->add_setting( 'nav_logo_color', array(
        'default'           => '#000', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_logo_color', array(
        'label'       => __( 'Logo Color', 'modernblogily' ),
        'section'     => 'navigation_settings',
        'priority' => 1,
        'settings'    => 'nav_logo_color',
        ) ) );
    $wp_customize->add_control( 'display_header_text', array(
        'label'    => __( 'Header Text Color', 'modernblogily' ),
        'section'  => 'head_colors',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'       => __( 'Background Color', 'modernblogily' ),
        'description' => __( 'Choose a color for the background.', 'modernblogily' ),
        'section'     => 'background_image',
        'settings'    => 'background_color',
        ) ) );
    $wp_customize->add_setting( 'show_sitename_in_menubar', array(
        'default'           => 1,
        'sanitize_callback' => 'modernblogily_sanitize_checkbox',
        ) );
        // Show Sitename in Menubar Control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_sitename_in_menubar',
            array( 
                'label'         => __( 'Show sitename in menu bar?', 'modernblogily' ),
                'type'          => 'checkbox',
                'section'       => 'title_tagline',
                )
            ) );



    /* ///////////////// SIDEBAR LAYOUT ////////////////// */

        /* 
         * Select Sidebar Layout 
         */
        // Add Sidebar Layout Section
        $wp_customize->add_section( 'modernblogily-options', array(
            'title'         => __( 'Theme Options', 'modernblogily' ),
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the default display options for the theme.', 'modernblogily' ),
            ) );
        
        // Sidebar Layout setting
        $wp_customize->add_setting( 'layout_setting',
            array(
                'default'           => 'sidebar-right',
                'type'              => 'theme_mod',
                'sanitize_callback' => 'modernblogily_sanitize_layout',
                'transport'         => 'postMessage'
                ) );
        
        // Sidebar Layout Control
        $wp_customize->add_control( 'layout_control',
            array(
                'settings'          => 'layout_setting',
                'type'              => 'radio',
                'label'             => __( 'Sidebar position', 'modernblogily' ),
                'choices'           => array(
                    'no-sidebar'    => __( 'No sidebar', 'modernblogily' ),
                    'sidebar-right' => __( 'Sidebar right', 'modernblogily' ),
                    'sidebar-left'  => __( 'Sidebar left', 'modernblogily' ),
                    ),
                'section'           => 'sidebar_settings'
                ) );
        
        /**
	 * Front Page sections 
	 *
	 * @since modernblogily 2.1.2
	 *
	 * @param $page_names array
	 */
        $page_names = array( 'services', 'clients', 'about', 'contact' );

	// Create a setting and control for each of the sections available in the theme.
        for ( $i = 0; $i < count( $page_names ); $i++ ) {
          $wp_customize->add_setting( 'panel_' . $page_names[$i], array(
             'default'           => false,
             'sanitize_callback' => 'absint',
//			'transport'         => 'postMessage',
             ) );

          $wp_customize->add_control( 'panel_' . $page_names[$i], array(
             /* translators: %s is the front page section name */
             'label'          => sprintf( __( '%s Page Content', 'modernblogily' ), ucwords( $page_names[$i] ) ),
             'description'    => ( 0 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'modernblogily' ) ),
             'section'        => 'static_front_page',
             'type'           => 'dropdown-pages',
             'allow_addition' => true,
             'active_callback' => 'modernblogily_is_static_front_page',
             ) );


      }

  }
  add_action( 'customize_register', 'modernblogily_customize_register' );

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function modernblogily_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function modernblogily_customize_preview_js() {
	wp_enqueue_script( 'modernblogily_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160507', true );
}
add_action( 'customize_preview_init', 'modernblogily_customize_preview_js' );

/*
 * Sanitize layout options
 */

function modernblogily_sanitize_layout ( $value ) {
    if ( !in_array( $value, array( 'no-sidebar', 'sidebar-right', 'sidebar-left' ) ) ) {
        $value = 'no-sidebar';
    }
    return $value;
}

/**
 * Checkbox sanitization callback
 * @link    https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 * 
 * @param   bool    $checked    Whether the checkbox is checked.
 * @return  bool                Whether the checkbox is checked.
 */
function modernblogily_sanitize_checkbox( $checked ) {
    // Boolean check
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


if(! function_exists('modernblogily_get_user_input' ) ):
function modernblogily_get_user_input(){
?>
<style type="text/css">
    #header-image .site-title { color: <?php echo esc_attr(get_theme_mod( 'header_title_color')); ?>; }
    #header-image .site-description{ color: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
    .site-description:before { background: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
    div#header-image { background: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
    ul.sub-menu.dropdown.childopen, .main-navigation ul li a:hover, .top-bar, .top-bar ul, button.menu-toggle.navicon, button.menu-toggle:hover, .main-navigation .sub-menu li { background: <?php echo esc_attr(get_theme_mod( 'nav_bg')); ?>; background-color: <?php echo esc_attr(get_theme_mod( 'nav_bg')); ?>; }
    .navicon:focus .fa-bars, .navicon:active .fa-bars, .navicon .fa-bars, .site-header .main-navigation ul li a, .site-header .main-navigation ul li a:visited, .site-header .main-navigation ul li a:focus, .site-header .main-navigation ul li a:active, .site-header .main-navigation ul li a:hover, .site-header .main-navigation ul li a:visited, .site-header .main-navigation ul li a:focus, .site-header .main-navigation ul li a:active, .main-navigation ul li ul.childopen li:hover a, .top-bar-menu .navicon span, .main-navigation ul li ul.childopen li .active a { color: <?php echo esc_attr(get_theme_mod( 'nav_link_color')); ?> !important; }
    .top-bar-title .site-title a { color: <?php echo esc_attr(get_theme_mod( 'nav_logo_color')); ?>; }
    .blog .entry-content label, .blog .entry-content, .blog .entry-content li, .blog .entry-content p, .blog .entry-content ol li, .blog .entry-content ul li { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_text_color')); ?>; }          
    .blog .pagination a:hover, .blog .pagination button:hover, .blog .paging-navigation ul, .blog .pagination ul, .blog .pagination .current { background: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_navigation_bg_color')); ?>; }
    .blog .paging-navigation li a:hover, .blog .pagination li a:hover, .blog .paging-navigation li span.page-numbers, .blog .pagination li span.page-numbers, .paging-navigation li a, .pagination li a { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_navigation_text_color')); ?>; }    
</style>
<?php }
add_action( 'wp_head', 'modernblogily_get_user_input' );
endif;





