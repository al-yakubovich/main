<?php
/**
 * Elvinaa Theme Customizer
 *
 * @package elvinaa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'elvinaa_customize_register' ) ) :
function elvinaa_customize_register( $wp_customize ) {

    require( get_template_directory() . '/inc/customizer/custom-controls/control-custom-content.php' );  
    require( get_template_directory() . '/inc/customizer/custom-controls/control-dropdown-category.php' );  

    // General Settings
    $wp_customize->add_section(
        'elvinaa_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'General Settings', 'elvinaa' )
        )
    );

    // Home Background Image 
    $wp_customize->add_setting(
        'el_theme_home_bg',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'elvinaa_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'el_theme_home_bg',
          array(
              'settings'      => 'el_theme_home_bg',
              'section'       => 'elvinaa_general_settings',
              'label'         => __( 'Home Background Image', 'elvinaa' ),
              'description'   => __( 'This setting will add background image if Background Image was selected above.', 'elvinaa' )
          )
      )
    );

    // Home Section Heading text 
    $wp_customize->add_setting(
        'el_home_heading_text',
        array(            
            'default'           => __('ENTER YOUR HEADING HERE','elvinaa'),
            'sanitize_callback' => 'elvinaa_sanitize_textarea',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'el_home_heading_text',
        array(
            'settings'      => 'el_home_heading_text',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textarea',
            'label'         => __( 'Heading Text', 'elvinaa' ),
            'description'   => __( 'heading for the home section', 'elvinaa' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'el_home_heading_text', array(
        'selector'            => '.slide-bg-section h1',   
        'settings'            => 'el_home_heading_text',     
        'render_callback'     => 'elvinaa_home_heading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    // Home Section SubHeading text
    $wp_customize->add_setting(
        'el_home_subheading_text',
        array(            
            'default'           => __('ENTER YOUR SUBHEADING HERE','elvinaa'),
            'sanitize_callback' => 'elvinaa_sanitize_textarea',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'el_home_subheading_text',
        array(
            'settings'      => 'el_home_subheading_text',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textarea',
            'label'         => __( 'SubHeading Text', 'elvinaa' ),
            'description'   => __( 'Subheading for the home section', 'elvinaa' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'el_home_subheading_text', array(
        'selector'            => '.slide-bg-section p',   
        'settings'            => 'el_home_subheading_text',     
        'render_callback'     => 'elvinaa_home_subheading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    // Home Section Button text 
    $wp_customize->add_setting(
        'el_home_button_text',
        array( 
            'type' => 'theme_mod',           
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_html',
            
        )
    );

    $wp_customize->add_control(
        'el_home_button_text',
        array(
            'settings'      => 'el_home_button_text',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button Text', 'elvinaa' ),
            'description'   => __( 'Button text for the home section', 'elvinaa' ),
        )
    );  


    // Home Section Button url 
    $wp_customize->add_setting(
        'el_home_button_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_home_button_url',
        array(
            'settings'      => 'el_home_button_url',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button URL', 'elvinaa' ),
            'description'   => __( 'Button URL for the home section', 'elvinaa' ),
        )
    );


    // Home Section Button2 text
    $wp_customize->add_setting(
        'el_home_button2_text',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'el_home_button2_text',
        array(
            'settings'      => 'el_home_button2_text',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 Text', 'elvinaa' ),
            'description'   => __( 'Button 2 text for the home section', 'elvinaa' ),
        )
    );


    // Home Section Button2 url 
    $wp_customize->add_setting(
        'el_home_button2_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_home_button2_url',
        array(
            'settings'      => 'el_home_button2_url',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 URL', 'elvinaa' ),
            'description'   => __( 'Button 2 URL for the home section', 'elvinaa' ),
        )
    );

    // text position
    $wp_customize->add_setting(
        'el_home_text_position',
        array(
            'type' => 'theme_mod',
            'default'           => 'center',
            'sanitize_callback' => 'elvinaa_sanitize_home_text_position_radio_selection'
        )
    );

    $wp_customize->add_control(
        'el_home_text_position',
        array(
            'settings'      => 'el_home_text_position',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'radio',
            'label'         => __( 'Select Text Position:', 'elvinaa' ),
            'description'   => '',
            'choices' => array(
                            'left' =>__( 'Left', 'elvinaa' ),
                            'center' =>__( 'Center', 'elvinaa' ),
                            'right' => __( 'Right', 'elvinaa' ),                            
                            ),
        )
    );

    // Parallax Scroll for background image 
    $wp_customize->add_setting(
        'el_home_parallax',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_home_parallax',
        array(
            'settings'      => 'el_home_parallax',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Parallax Scroll:', 'elvinaa' ),
            'description'   => __( 'Choose whether to show a parallax scroll feature for the Home Background image', 'elvinaa' ),           
        )
    );

    // Enable Dark Overlay
    $wp_customize->add_setting(
        'el_home_dark_overlay',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_home_dark_overlay',
        array(
            'settings'      => 'el_home_dark_overlay',
            'section'       => 'elvinaa_general_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Dark Overlay:', 'elvinaa' ),
            'description'   => __( 'Choose whether to show a dark overlay over background image', 'elvinaa' ),           
        )
    );


    //Slider Settings
    $wp_customize->add_section(
        'elvinaa_slider_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Slider Settings', 'elvinaa' )
        )
    );    


    /* Slider settings */
    $wp_customize->add_setting(
        'el_slide_options_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'single',
            'sanitize_callback' => 'elvinaa_sanitize_slider_options_selection'
        )
    );

    $wp_customize->add_control(
        'el_slide_options_radio',
        array(
            'settings'      => 'el_slide_options_radio',
            'section'       => 'elvinaa_slider_settings',
            'type'          => 'radio',
            'label'         => __( 'Choose Slider or Static Background Image:', 'elvinaa' ),
            'description'   => __( 'Choose whether to show a slider with multiple background images to slide or just a static background image', 'elvinaa' ),
            'choices' => array(
                            'single' => __('Single Background Image', 'elvinaa'),
                            'slider' => __('Slider Images', 'elvinaa'),                           
                            ),
        )
    );

    /* Slider Post Category */
    $wp_customize->add_setting( 
        'el_slider_post_category', 
        array(
            'type' => 'theme_mod',
            'default'           => 0,
            'sanitize_callback' => 'absint',
        ) 
    );

    $wp_customize->add_control( 
        new Elvinaa_Dropdown_Category_Control( $wp_customize, 'el_slider_post_category', 
        array(
            'section'       => 'elvinaa_slider_settings',
            'label'         => __( 'Choose Slider Post Category', 'elvinaa' ),
            'description'   => __( 'Select the category that the slider will show posts from.', 'elvinaa' ),
            ) 
        ) 
    );

   
     //Sticky Header Settings
    $wp_customize->add_section(
        'elvinaa_sticky_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Sticky Header Settings', 'elvinaa' )
        )
    );

    //enable sticky menu
    $wp_customize->add_setting(
        'el_sticky_menu',
        array(
            'type' => 'theme_mod',
            'default'           => false,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_sticky_menu',
        array(
            'settings'      => 'el_sticky_menu',
            'section'       => 'elvinaa_sticky_header_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Sticky Header Feature:', 'elvinaa' ),
            'description'   => __( 'Choose whether to enable a sticky header feature for the site', 'elvinaa' ),            
        )
    );

    // Color Settings 
    $wp_customize->add_section(
        'elvinaa_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Color Settings', 'elvinaa' )
        )
    );               

    
    // Link Color
    $wp_customize->add_setting(
        'el_link_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#444444',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_link_color',
        array(
        'label'      => __( 'Links Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_link_color',
        ) )
    );

    // Link Hover Color
    $wp_customize->add_setting(
        'el_link_hover_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_link_hover_color',
        array(
        'label'      => __( 'Links Hover Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_link_hover_color',
        ) )
    );

    // Heading Color
    $wp_customize->add_setting(
        'el_heading_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#444444',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_heading_color',
        array(
        'label'      => __( 'Headings Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_heading_color',
        ) )
    );

    // Heading Hover Color
    $wp_customize->add_setting(
        'el_heading_hover_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_heading_hover_color',
        array(
        'label'      => __( 'Heading Hover Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_heading_hover_color',
        ) )
    );


    // Buttons Color
    $wp_customize->add_setting(
        'el_button_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fe7237',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_button_color',
        array(
        'label'      => __( 'Buttons Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_button_color',
        ) )
    );

    // Buttons Hover Color
    $wp_customize->add_setting(
        'el_button_hover_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#db5218',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_button_hover_color',
        array(
        'label'      => __( 'Buttons Hover Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_button_hover_color',
        ) )
    );    

    // Top menu color
    $wp_customize->add_setting(
        'el_top_menu_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#000',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_top_menu_color',
        array(
        'label'      => __( 'Top Menu Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_top_menu_color',
        ) )
    );

    // Category Blinker color
    $wp_customize->add_setting(
        'el_cat_blinker_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#fe7237',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_cat_blinker_color',
        array(
        'label'      => __( 'Category Blinker Color', 'elvinaa' ),
        'section'    => 'elvinaa_color_settings',
        'settings'   => 'el_cat_blinker_color',
        ) )
    );
    
     //Blog Settings
    $wp_customize->add_section(
        'elvinaa_blog_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Blog Settings', 'elvinaa' )
        )
    );   

    // Author Image
    $wp_customize->add_setting(
        'el_author_display',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_author_display',
        array(
            'settings'      => 'el_author_display',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Author Image Display in Post', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Category Blinker
    $wp_customize->add_setting(
        'el_cat_blinker',
        array(
            'type' => 'theme_mod',
            'default'           => false,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_cat_blinker',
        array(
            'settings'      => 'el_cat_blinker',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Category Blinker Animation', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Post Columns
    $wp_customize->add_setting(
        'el_post_columns',
        array(
            'type' => 'theme_mod',
            'default'           => 'two',
            'sanitize_callback' => 'elvinaa_sanitize_blog_post_columns_radio_selection'
        )
    );

    $wp_customize->add_control(
        'el_post_columns',
        array(
            'settings'      => 'el_post_columns',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'radio',
            'label'         => __( 'Select Blog Posts Column Style:', 'elvinaa' ),
            'description'   => '',
            'choices' => array(
                            'one' => __( 'One Column', 'elvinaa' ),
                            'two' =>__( 'Two Columns', 'elvinaa' ),
                            ),
        )
    ); 

    // Blog Sidebar
    $wp_customize->add_setting(
        'el_blog_sidebar',
        array(
            'type' => 'theme_mod',
            'default'           => 'right',
            'sanitize_callback' => 'elvinaa_sanitize_blog_sidebar_radio_selection'
        )
    );

    $wp_customize->add_control(
        'el_blog_sidebar',
        array(
            'settings'      => 'el_blog_sidebar',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'radio',
            'label'         => __( 'Select sidebar position:', 'elvinaa' ),
            'description'   => '',
            'choices' => array(
                            'right' => __( 'Right', 'elvinaa' ),
                            'left' =>__( 'Left', 'elvinaa' ),
                            ),
        )
    );

    // Excerpt length
    $wp_customize->add_setting(
        'el_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 70,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'el_excerpt_length',
        array(
            'settings'      => 'el_excerpt_length',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'number',
            'label'         => __( 'Post Excerpt Length', 'elvinaa' ),
            'description'   => '',
        )
    );

    // Read more text
    $wp_customize->add_setting(
        'el_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => __( 'CONTINUE READING...', 'elvinaa' ),
            'sanitize_callback' => 'elvinaa_sanitize_textarea'
        )
    );

    $wp_customize->add_control(
        'el_readmore_text',
        array(
            'settings'      => 'el_readmore_text',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'textbox',
            'label'         => __( 'Read More Text', 'elvinaa' ),
            'description'   => '',
        )
    );  

    // Enable Facebook share icon
    $wp_customize->add_setting(
        'el_fb_share_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_fb_share_icon',
        array(
            'settings'      => 'el_fb_share_icon',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Facebook Share Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Enable Twitter share icon
    $wp_customize->add_setting(
        'el_tw_share_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_tw_share_icon',
        array(
            'settings'      => 'el_tw_share_icon',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Twitter Share Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Enable Google plus share icon
    $wp_customize->add_setting(
        'el_gp_share_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_gp_share_icon',
        array(
            'settings'      => 'el_gp_share_icon',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Google Plus Share Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Enable Pinteres icon
    $wp_customize->add_setting(
        'el_pi_share_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_pi_share_icon',
        array(
            'settings'      => 'el_pi_share_icon',
            'section'       => 'elvinaa_blog_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Pinterest Share Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );  


    //Social Icons Settings
    $wp_customize->add_section(
        'elvinaa_social_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Social Icons Settings', 'elvinaa' )
        )
    );

    // Facebook
    $wp_customize->add_setting(
        'el_facebook_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_facebook_icon',
        array(
            'settings'      => 'el_facebook_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Facebook Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Facebook url 
    $wp_customize->add_setting(
        'el_facebook_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_facebook_url',
        array(
            'settings'      => 'el_facebook_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'Facebook Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // Twitter
    $wp_customize->add_setting(
        'el_twitter_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_twitter_icon',
        array(
            'settings'      => 'el_twitter_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Twitter Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Twitter url 
    $wp_customize->add_setting(
        'el_twitter_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_twitter_url',
        array(
            'settings'      => 'el_twitter_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'Twitter Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // Instagram
    $wp_customize->add_setting(
        'el_instagram_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_instagram_icon',
        array(
            'settings'      => 'el_instagram_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Instagram Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Instagram url 
    $wp_customize->add_setting(
        'el_instagram_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_instagram_url',
        array(
            'settings'      => 'el_instagram_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'Instagram Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // Google Plus
    $wp_customize->add_setting(
        'el_googleplus_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_googleplus_icon',
        array(
            'settings'      => 'el_googleplus_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Google Plus Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Google Plus url 
    $wp_customize->add_setting(
        'el_googleplus_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_googleplus_url',
        array(
            'settings'      => 'el_googleplus_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'Google Plus Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // LinkedIn
    $wp_customize->add_setting(
        'el_linkedin_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_linkedin_icon',
        array(
            'settings'      => 'el_linkedin_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable LinkedIn Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // LinkedIn url 
    $wp_customize->add_setting(
        'el_linkedin_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_linkedin_url',
        array(
            'settings'      => 'el_linkedin_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'LinkedIn Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // Pinterest
    $wp_customize->add_setting(
        'el_pinterest_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_pinterest_icon',
        array(
            'settings'      => 'el_pinterest_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Pinterest Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // Pinterest url 
    $wp_customize->add_setting(
        'el_pinterest_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_pinterest_url',
        array(
            'settings'      => 'el_pinterest_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'Pinterest Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    // RSS
    $wp_customize->add_setting(
        'el_rss_icon',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_rss_icon',
        array(
            'settings'      => 'el_rss_icon',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable RSS Icon', 'elvinaa' ),
            'description'   => '',           
        )
    );

    // RSS url 
    $wp_customize->add_setting(
        'el_rss_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'elvinaa_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'el_rss_url',
        array(
            'settings'      => 'el_rss_url',
            'section'       => 'elvinaa_social_settings',
            'type'          => 'textbox',
            'label'         => __( 'RSS Link URL', 'elvinaa' ),
            'description'   => '',
        )
    );

    //Footer Settings
    $wp_customize->add_section(
        'elvinaa_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Footer Settings', 'elvinaa' )
        )
    );

    // Copyright text
    $wp_customize->add_setting(
        'el_copyright_text',
        array(
            'type' => 'theme_mod',
            'default'           => __('Copyrights Elvinaa. All Rights Reserved','elvinaa'),
            'sanitize_callback' => 'elvinaa_sanitize_textarea'
        )
    );

    $wp_customize->add_control(
        'el_copyright_text',
        array(
            'settings'      => 'el_copyright_text',
            'section'       => 'elvinaa_footer_settings',
            'type'          => 'textarea',
            'label'         => __( 'Footer copyright text', 'elvinaa' ),
            'description'   => __( 'Copyright text to be displayed in the footer.', 'elvinaa' )
        )
    );   

    // Footer widgets
    $wp_customize->add_setting(
        'el_footer_widgets',
        array(
            'type' => 'theme_mod',
            'default'           => '4',
            'sanitize_callback' => 'elvinaa_sanitize_footer_widgets_radio_selection'
        )
    );

    $wp_customize->add_control(
        'el_footer_widgets',
        array(
            'settings'      => 'el_footer_widgets',
            'section'       => 'elvinaa_footer_settings',
            'type'          => 'radio',
            'label'         => __( 'Number of Footer Widgets:', 'elvinaa' ),
            'description'   => '',
            'choices' => array(
                            '3' => __( '3', 'elvinaa' ),
                            '4' =>__( '4', 'elvinaa' ),
                            ),
        )
    );       

    // Footer background color
    $wp_customize->add_setting(
        'el_footer_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_footer_bg_color',
        array(
        'label'      => __( 'Footer Background Color', 'elvinaa' ),
        'section'    => 'elvinaa_footer_settings',
        'settings'   => 'el_footer_bg_color',
        ) )
    );    
   

    // Footer Content Color
    $wp_customize->add_setting(
        'el_footer_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_footer_content_color',
        array(
        'label'      => __( 'Footer Content Color', 'elvinaa' ),
        'section'    => 'elvinaa_footer_settings',
        'settings'   => 'el_footer_content_color',
        ) )
    );  

    // Footer links Color
    $wp_customize->add_setting(
        'el_footer_links_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#b3b3b3',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'el_footer_links_color',
        array(
        'label'      => __( 'Footer Links Color', 'elvinaa' ),
        'section'    => 'elvinaa_footer_settings',
        'settings'   => 'el_footer_links_color',
        ) )
    );

    // Preloader Settings
    $wp_customize->add_section(
        'elvinaa_preloader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Preloader Settings', 'elvinaa' )
        )
    );

    // Preloader Enable radio button 
    $wp_customize->add_setting(
        'el_preloader_display',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'elvinaa_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'el_preloader_display',
        array(
            'settings'      => 'el_preloader_display',
            'section'       => 'elvinaa_preloader_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Preloader for site:', 'elvinaa' ),
            'description'   => __( 'Choose whether to show a preloader before a site opens', 'elvinaa' ),            
        )
    );    
   
}
endif;

add_action( 'customize_register', 'elvinaa_customize_register' );


/**
* Render callback for el_topbar_phone
*
* 
* @return mixed
*/
if ( ! function_exists( 'elvinaa_topbar_phone_render_callback' ) ) :
function elvinaa_topbar_phone_render_callback(){
    return wp_kses_post( get_theme_mod( 'el_topbar_phone' ) );
}
endif;

/**
* Render callback for el_home_heading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'elvinaa_home_heading_text_render_callback' ) ) :
function elvinaa_home_heading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'el_home_heading_text' ) );
}
endif;

/**
* Render callback for el_home_subheading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'elvinaa_home_subheading_text_render_callback' ) ) :
function elvinaa_home_subheading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'el_home_subheading_text' ) );
}
endif;

/**
 * Sanitize text box.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_text' ) ) :
function elvinaa_sanitize_text( $input ) {
    return esc_html( $input );
}
endif;

/**
 * Sanitize radio option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_radio_selection' ) ) :
function elvinaa_sanitize_radio_selection( $input ) {
    $valid = array(
        'yes' => __('Yes', 'elvinaa'),
        'no' => __('No', 'elvinaa'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize checkbox option buttons
 *
 * @param string $input
 * @return bool
 */
if ( ! function_exists( 'elvinaa_sanitize_checkbox_selection' ) ) :
function elvinaa_sanitize_checkbox_selection( $input ) {
    return ( ( isset( $input ) && true == $input ) ? true : false );
}
endif;

/**
 * Sanitize blog sidebar radio option 
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_blog_sidebar_radio_selection' ) ) :
function elvinaa_sanitize_blog_sidebar_radio_selection(  $input ){
    $valid = array(
        'right' => __( 'Right', 'elvinaa' ),  
        'left' =>__( 'Left', 'elvinaa' ),      
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize blog post columns radio option 
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_blog_post_columns_radio_selection' ) ) :
function elvinaa_sanitize_blog_post_columns_radio_selection(  $input ){
    $valid = array(
        'one' => __( 'One Column', 'elvinaa' ),
        'two' =>__( 'Two Columns', 'elvinaa' ),  
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Footer Widgets Number select
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_footer_widgets_radio_selection' ) ) :
function elvinaa_sanitize_footer_widgets_radio_selection( $input ){
    $valid = array(
        '3' => __( '3', 'elvinaa' ),
        '4' =>__( '4', 'elvinaa' ),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize radio bg option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_radio_bg_selection' ) ) :
function elvinaa_sanitize_radio_bg_selection( $input ) {
    $valid = array(        
        'color' => __('Background Color','elvinaa'),
        'image' =>  __('Background Image','elvinaa'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize blog style radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_blog_style_radio_selection' ) ) :
function elvinaa_sanitize_blog_style_radio_selection( $input ) {
    $valid = array(        
        'style1' => __('Style 1', 'elvinaa'),
        'style2' => __('Style 2', 'elvinaa'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;


/**
 * Sanitize radio pagebg option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_radio_pagebg_selection' ) ) :
function elvinaa_sanitize_radio_pagebg_selection( $input ) {
    $valid = array(        
        'color' => __('Background Color','elvinaa'),
        'image' =>  __('Background Image','elvinaa'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;


/**
 * Sanitize Header style radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_header_style_radio_selection' ) ) :
function elvinaa_sanitize_header_style_radio_selection( $input ) {
    $valid = array(        
        'style1' => __('Header Style1 - This will show full background image as header with menu over the image', 'elvinaa'),
        'style2' => __('Header Style2 - This header style will show background image below menu', 'elvinaa'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize home text position radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_home_text_position_radio_selection' ) ) :
function elvinaa_sanitize_home_text_position_radio_selection( $input ) {
    $valid = array(        
        'left' =>__( 'Left', 'elvinaa' ),
        'center' =>__( 'Center', 'elvinaa' ),
        'right' => __( 'Right', 'elvinaa' ),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Slider radio options buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_slider_options_selection' ) ) :
function elvinaa_sanitize_slider_options_selection( $input ) {
    $valid = array(
        'single' => 'Single Background Image',
         'slider' => 'Slider Images',
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Footer Widget radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_footer_widgets_radio_selection' ) ) :
function elvinaa_sanitize_footer_widgets_radio_selection( $input ) {
    $valid = array(        
        '3' => __( '3', 'elvinaa' ),
        '4' =>__( '4', 'elvinaa' ),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize checkbox.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'elvinaa_sanitize_checkbox' ) ) :
function elvinaa_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;

/**
 * URL sanitization.
 *
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
if ( ! function_exists( 'elvinaa_sanitize_url' ) ) :
function elvinaa_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
endif;

/**
 * Select sanitization
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
if ( ! function_exists( 'elvinaa_sanitize_select' ) ) :
function elvinaa_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

/**
 * Sanitize textarea.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'elvinaa_sanitize_textarea' ) ) :
function elvinaa_sanitize_textarea( $input ) {
    return sanitize_textarea_field( $input );
}
endif;

/**
 * Sanitize image.
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
if ( ! function_exists( 'elvinaa_sanitize_image' ) ) :
function elvinaa_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
endif;

/**
 * Sanitize the Sidebar Position value.
 *
 * @param string $position.
 * @return string (left|right).
 */
if ( ! function_exists( 'elvinaa_sanitize_sidebar_position' ) ) :
function elvinaa_sanitize_sidebar_position( $position ) {
    if ( ! in_array( $position, array( 'left', 'right' ) ) ) {
        $position = 'right';
    }
    return $position;
}
endif;

/**
 * HTML sanitization
 *
 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
if ( ! function_exists( 'elvinaa_sanitize_html' ) ) :
function elvinaa_sanitize_html( $html ) {
    return wp_filter_post_kses( $html );
}
endif;

/**
 * CSS sanitization.
 *
 * @see wp_strip_all_tags() https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 *
 * @param string $css CSS to sanitize.
 * @return string Sanitized CSS.
 */
if ( ! function_exists( 'elvinaa_sanitize_css' ) ) :
function elvinaa_sanitize_css( $css ) {
    return wp_strip_all_tags( $css );
}
endif;

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'elvinaa_enqueue_customizer_stylesheets' ) ) :
function elvinaa_enqueue_customizer_stylesheets() {
    wp_register_style( 'elvinaa-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'elvinaa-customizer-css' );
}
endif;

add_action( 'customize_controls_print_styles', 'elvinaa_enqueue_customizer_stylesheets' );
