<?php
/**
 * Quicksand Theme Customizer 
 */

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global
 */
function quicksand_customize_control_js() {
    wp_enqueue_script('quicksand-color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), 'quicksand', true);
    wp_localize_script('quicksand-color-scheme-control', 'quicksandColorScheme', quicksand_get_color_schemes());
}

add_action('customize_controls_enqueue_scripts', 'quicksand_customize_control_js');

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously
 */
function quicksand_customize_preview_js() {
    wp_enqueue_script('quicksand-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview'), 'quicksand', true);
}

add_action('customize_preview_init', 'quicksand_customize_preview_js');

/**
 * Add specific Control-Classes
 *
 * @see https://codex.wordpress.org/Theme_Customization_API
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function quicksand_customize_register($wp_customize) {

    // include extended WP-Custompizer classes 
    quicksand_get_customizer_classes();

    // get color-scheme
    $color_scheme_option = get_theme_mod('color_scheme', 'default');
    $colorSchemes = quicksand_get_color_schemes();
    $colorSchemeDefault = $colorSchemes[$color_scheme_option];

    /* Main option Settings Panel */
    $wp_customize->add_panel('quicksand_main_options', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Theme Options', 'quicksand')
    ));


    /**
     *  Section: Color Schemes
     * 
     * @hint always add setting to color-scheme-control.js, also the non-colored ones 
     */
    $wp_customize->add_section('quicksand_color_schemes', array(
        'title' => esc_html__('Color Schemes', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    $wp_customize->add_setting('color_scheme', array(
        'default' => 'default',
        'sanitize_callback' => 'quicksand_sanitize_color_scheme',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('color_scheme', array(
        'label' => esc_html__('Color Schemes', 'quicksand'),
        'section' => 'quicksand_color_schemes',
        'type' => 'select',
        'choices' => quicksand_get_color_scheme_choices(),
        'priority' => 1,
    ));



    /* Section: Navigation */
    $wp_customize->add_section('quicksand_nav', array(
        'title' => esc_html__('Navigation', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    // logo-text
    $wp_customize->add_setting('qs_nav_logo_text', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize, 'qs_nav_logo_text', array(
        'label' => esc_html__('Logo Text', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_logo_text',
        'description' => esc_html__('Appears when no logo is selected', 'quicksand'),
    )));

    // fullwidth
    $wp_customize->add_setting("qs_nav_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_nav_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_nav_fullwidth', array(
        'label' => esc_html__("Navigation Fullwidth", 'quicksand'),
        'section' => 'quicksand_nav',
        'type' => 'checkbox',
        'settings' => 'qs_nav_fullwidth',
        'priority' => 10,
    ));

    // link-color
    $wp_customize->add_setting('qs_nav_link_color', array(
        'default' => $colorSchemeDefault['colors']['qs_nav_link_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_link_color', array(
        'label' => esc_html__('Navbar Link Color', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_link_color'
    )));

    // link-hover-color
    $wp_customize->add_setting('qs_nav_link_hover_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_nav_link_hover_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_link_hover_background_color', array(
        'label' => esc_html__('Navbar Link Hover Background Color', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_link_hover_background_color'
    )));


    // bg-color
    $wp_customize->add_setting('qs_nav_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_nav_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_background_color', array(
        'label' => esc_html__('Navbar Background Color', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_background_color'
    )));



    /* Section: Header */
    $wp_customize->add_section('quicksand_header', array(
        'title' => esc_html__('Header', 'quicksand'),
        'priority' => 20,
        'panel' => 'quicksand_main_options',
//        'description' => ''
    ));


    // enabled
    $wp_customize->add_setting("qs_header_enabled", array(
        'default' => $colorSchemeDefault['settings']['qs_header_enabled'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_header_enabled', array(
        'label' => esc_html__("Enable Header", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_enabled',
        'description' => esc_html__('Note that all options in here do only work when \'Display Site Title and Tagline\' in \'Site Identity\' is enabled.', 'quicksand'),
        'priority' => 10,
    ));

    // show only on front
    $wp_customize->add_setting("qs_header_hide_when_slider_enabled", array(
        'default' => $colorSchemeDefault['settings']['qs_header_hide_when_slider_enabled'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_header_hide_when_slider_enabled', array(
        'label' => esc_html__("Hide when Slider is enabled", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_hide_when_slider_enabled',
        'priority' => 20,
    ));

    // show only on front
    $wp_customize->add_setting("qs_header_show_front", array(
        'default' => $colorSchemeDefault['settings']['qs_header_show_front'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_header_show_front', array(
        'label' => esc_html__("Show only on front-page", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_show_front',
        'priority' => 20,
    ));

    // fullwidth
    $wp_customize->add_setting("qs_header_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_header_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_header_fullwidth', array(
        'label' => esc_html__("Header Fullwidth", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_fullwidth',
        'priority' => 30,
    ));


    // bg-color
    $wp_customize->add_setting('qs_header_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_header_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_header_background_color', array(
        'label' => esc_html__('Header Background Color', 'quicksand'),
        'section' => 'quicksand_header',
        'priority' => 50,
        'settings' => 'qs_header_background_color'
    )));




    /**
     *  Section: Slider  
     */
    $wp_customize->add_section('quicksand_slider_section', array(
        'title' => esc_html__('Slider', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));


    // enabled
    $wp_customize->add_setting("qs_slider_enabled", array(
        'default' => $colorSchemeDefault['settings']['qs_slider_enabled'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_slider_enabled', array(
        'label' => esc_html__("Enable Slider", 'quicksand'),
        'section' => 'quicksand_slider_section',
        'type' => 'checkbox',
        'settings' => 'qs_slider_enabled',
        'description' => esc_html__('Is only shown on front-page. You also have to select a category below.', 'quicksand'),
        'priority' => 10,
    ));

    // fullwidth
    $wp_customize->add_setting("qs_slider_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_slider_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_slider_fullwidth', array(
        'label' => esc_html__("Slider Fullwidth", 'quicksand'),
        'section' => 'quicksand_slider_section',
        'type' => 'checkbox',
        'settings' => 'qs_slider_fullwidth',
        'priority' => 20,
    ));

    // hide in mobile mode
    $wp_customize->add_setting("qs_slider_hide_mobile_mode", array(
        'default' => $colorSchemeDefault['settings']['qs_slider_hide_mobile_mode'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_slider_hide_mobile_mode', array(
        'label' => esc_html__("Hide in mobile-mode", 'quicksand'),
        'section' => 'quicksand_slider_section',
        'type' => 'checkbox',
        'settings' => 'qs_slider_hide_mobile_mode',
        'priority' => 25,
    ));


    // category
    $wp_customize->add_setting('qs_slider_category', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new QuicksandCustomizeCategoryControl(
            $wp_customize, 'slider_category', array(
        'label' => 'Category',
        'settings' => 'qs_slider_category',
        'section' => 'quicksand_slider_section',
        'priority' => 30,
        'description' => esc_html__('Only posts including a featured image will be exposed', 'quicksand'),
    )));

    // count slides
    $wp_customize->add_setting('qs_slider_count', array(
        'default' => '6',
        'sanitize_callback' => 'prefix_sanitize_integer',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'slider_count', array(
        'label' => esc_html__('Number of posts', 'quicksand'),
        'section' => 'quicksand_slider_section',
        'settings' => 'qs_slider_count',
        'priority' => 40,
        'type' => 'text',
    )));

    // height
    $wp_customize->add_setting('qs_slider_height', array(
        'default' => $colorSchemeDefault['settings']['qs_slider_height'],
        'type' => 'theme_mod',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('qs_slider_height', array(
        'type' => 'range',
        'priority' => 100,
        'section' => 'quicksand_slider_section',
        'label' => esc_html__('Height', 'quicksand'),
        'description' => esc_html__('Set the height of the slider', 'quicksand'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'class' => 'slider-height-class',
            'style' => 'color: #0a0',
        ),
    ));

    // margin-top
    $wp_customize->add_setting('qs_slider_margin_top', array(
        'default' => $colorSchemeDefault['settings']['qs_slider_margin_top'],
        'type' => 'theme_mod',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('qs_slider_margin_top', array(
        'type' => 'range',
        'priority' => 120,
        'section' => 'quicksand_slider_section',
        'label' => esc_html__('Height', 'quicksand'),
        'description' => esc_html__('Margin to the top', 'quicksand'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'class' => 'slider-height-class',
            'style' => 'color: #0a0',
        ),
    ));




    /**
     * Section: Content 
     */
    $wp_customize->add_section('quicksand_content', array(
        'title' => esc_html__('Content', 'quicksand'),
        'priority' => 30,
        'panel' => 'quicksand_main_options',
    ));


    // fullwidth
    $wp_customize->add_setting("qs_content_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_content_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_content_fullwidth', array(
        'label' => esc_html__("Content Fullwidth", 'quicksand'),
        'section' => 'quicksand_content',
        'type' => 'checkbox',
        'settings' => 'qs_content_fullwidth',
        'priority' => 10,
    ));

    // masonry
    $wp_customize->add_setting("qs_content_masonry", array(
        'default' => $colorSchemeDefault['settings']['qs_content_masonry'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_content_masonry', array(
        'label' => esc_html__("List-Views Masonry-like", 'quicksand'),
        'section' => 'quicksand_content',
        'type' => 'checkbox',
        'settings' => 'qs_content_masonry',
        'description' => esc_html__('Shown when there are more than 2 posts', 'quicksand'),
        'priority' => 10,
    ));


    // lightgallery
    $wp_customize->add_setting("qs_content_use_lightgallery", array(
        'default' => $colorSchemeDefault['settings']['qs_content_use_lightgallery'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_content_use_lightgallery', array(
        'label' => esc_html__("Use LightGallery", 'quicksand'),
        'section' => 'quicksand_content',
        'type' => 'checkbox',
        'settings' => 'qs_content_use_lightgallery',
        'priority' => 10,
    ));

    // Google fonts 
    $wp_customize->add_setting('quicksand_google_font', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));


    // font-size
    $wp_customize->add_setting('qs_content_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'prefix_sanitize_integer',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'content_font_size', array(
        'label' => esc_html__('Font Size', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_font_size',
        'priority' => 10,
        'type' => 'text',
    )));


    // meta
    $wp_customize->add_setting(
            'qs_content_show_meta', array('default' => $colorSchemeDefault['settings']['qs_content_show_meta'],
        'sanitize_callback' => 'quicksand_sanitize_meta_checkboxes'
    ));

    $wp_customize->add_control(
            new QuicksandCustomizeControlCheckboxMultiple($wp_customize, 'qs_content_show_meta', array(
        'section' => 'quicksand_content',
        'label' => esc_html__('Show Meta', 'quicksand'), 'choices' => array(
            'date' => esc_html__('Date', 'quicksand'),
            'author' => esc_html__('Author', 'quicksand'),
            'post-format' => esc_html__('Post-Format', 'quicksand'),
            'taxonomies' => esc_html__('Taxonomies', 'quicksand'),
            'comments' => esc_html__('Comments', 'quicksand')
        )))
    );

    // bg-color
    $wp_customize->add_setting('qs_content_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_background_color', array(
        'label' => esc_html__('Content Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_background_color'
    )));




    // link-color
    $wp_customize->add_setting('qs_content_link_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_link_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_link_color', array(
        'label' => esc_html__('Content Link Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_link_color'
    )));


    // text-color
    $wp_customize->add_setting('qs_content_text_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_text_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_text_color', array(
        'label' => esc_html__('Content Text Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_text_color'
    )));

    // 2nd-text-color
    $wp_customize->add_setting('qs_content_secondary_text_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_secondary_text_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_secondary_text_color', array(
        'label' => esc_html__('Secondary Text Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_secondary_text_color'
    )));

    // title-background
    $wp_customize->add_setting('qs_content_title_bg_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_title_bg_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_title_bg_color', array(
        'label' => esc_html__('Title Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_title_bg_color'
    )));

    // post background color
    $wp_customize->add_setting('qs_content_post_bg_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_post_bg_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_post_bg_color', array(
        'label' => esc_html__('Post Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_post_bg_color'
    )));

    // post border color
    $wp_customize->add_setting('qs_content_post_border_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_post_border_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_post_border_color', array(
        'label' => esc_html__('Post Border Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_post_border_color'
    )));


    // === buttons === 
    /* Section: Content */
    $wp_customize->add_section('quicksand_buttons', array(
        'title' => esc_html__('Buttons', 'quicksand'),
        'priority' => 30,
        'panel' => 'quicksand_main_options',
    ));

    // button primary color
    $wp_customize->add_setting('qs_button_color_primary', array(
        'default' => $colorSchemeDefault['colors']['qs_button_color_primary'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_button_color_primary', array(
        'label' => esc_html__('Button Primary Color', 'quicksand'),
        'section' => 'quicksand_buttons',
        'priority' => 20,
        'settings' => 'qs_button_color_primary'
    )));


    // button secondary color
    $wp_customize->add_setting('qs_button_color_secondary', array(
        'default' => $colorSchemeDefault['colors']['qs_button_color_secondary'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_button_color_secondary', array(
        'label' => esc_html__('Button Secondary Color', 'quicksand'),
        'section' => 'quicksand_buttons',
        'priority' => 20,
        'settings' => 'qs_button_color_secondary'
    )));



    // tags: bg-color
    $wp_customize->add_setting('qs_content_tag_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_tag_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_tag_background_color', array(
        'label' => esc_html__('Tag Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_tag_background_color'
    )));

    // tags: font-color
    $wp_customize->add_setting('qs_content_tag_font_color', array(
        'default' => $colorSchemeDefault['colors']['qs_content_tag_font_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_tag_font_color', array(
        'label' => esc_html__('Tag Font Color', 'quicksand'),
        'section' => 'quicksand_content',
        'priority' => 20,
        'settings' => 'qs_content_tag_font_color'
    )));



    /**
     *  Section: Biography 
     */
    $wp_customize->add_section('quicksand_biography', array(
        'title' => esc_html__('Biography', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    // visible
    $wp_customize->add_setting("qs_biography_show", array(
        'default' => $colorSchemeDefault['settings']['qs_biography_show'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_biography_show', array(
        'label' => esc_html__("Show Author Biography", 'quicksand'),
        'section' => 'quicksand_biography',
        'type' => 'checkbox',
        'settings' => 'qs_biography_show',
        'priority' => 10,
    ));

    // bio: bg-color
    $wp_customize->add_setting('qs_biography_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_biography_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_biography_background_color', array(
        'label' => esc_html__('Background Color', 'quicksand'),
        'section' => 'quicksand_biography',
        'priority' => 20,
        'settings' => 'qs_biography_background_color'
    )));

    // bio: font-color
    $wp_customize->add_setting('qs_biography_font_color', array(
        'default' => $colorSchemeDefault['colors']['qs_biography_font_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_biography_font_color', array(
        'label' => esc_html__('Font Color', 'quicksand'),
        'section' => 'quicksand_biography',
        'priority' => 20,
        'settings' => 'qs_biography_font_color'
    )));



    /**
     * Section: Sidebar 
     */
    $wp_customize->add_section('quicksand_sidebar', array(
        'title' => esc_html__('Sidebar', 'quicksand'),
        'priority' => 30,
        'panel' => 'quicksand_main_options',
    ));

    // sidebar-number
    $wp_customize->add_setting('qs_sidebar_number', array(
        'default' => $colorSchemeDefault['settings']['qs_sidebar_number'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));


    $wp_customize->add_control('qs_sidebar_number', array(
        'label' => esc_html__('Sidebar Numbers', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'type' => 'select',
        'choices' => array(
            'no_sidebar' => esc_html__('No Sidebar', 'quicksand'),
            'right_sidebar' => esc_html__('Right Sidebar', 'quicksand'),
            'left_sidebar' => esc_html__('Left Sidebar', 'quicksand'),
            'left_right_sidebar' => esc_html__('Left & right Sidebar', 'quicksand'),
        ),
        'priority' => 10,
    ));


    // bg-color
    $wp_customize->add_setting('qs_sidebar_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_sidebar_background_color'],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_background_color', array(
        'label' => esc_html__('Widget Background Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_background_color'
    )));

    // color
    $wp_customize->add_setting('qs_sidebar_text_color', array(
        'default' => $colorSchemeDefault['colors']['qs_sidebar_text_color'],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_text_color', array(
        'label' => esc_html__('Widget Text Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_text_color'
    )));

    // link
    $wp_customize->add_setting('qs_sidebar_link_color', array(
        'default' => $colorSchemeDefault['colors']['qs_sidebar_link_color'],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_link_color', array(
        'label' => esc_html__('Widget Link Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_link_color'
    )));

    // border
    $wp_customize->add_setting('qs_sidebar_border_color', array(
        'default' => $colorSchemeDefault['colors']['qs_sidebar_border_color'],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));


    $bgColorContent = get_theme_mod('qs_content_background_color');
    $bgContent = !empty($bgColorContent) ? $bgColorContent : $colorSchemeDefault['colors']['qs_content_background_color'];
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_border_color', array(
        'label' => esc_html__('Widget Border Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        /* translators: hex-value for color */
        'description' => sprintf(esc_html__('For a nice effect choose the same color like Content-Background (%s) ...', 'quicksand'), $bgContent),
        'settings' => 'qs_sidebar_border_color'
    )));

    $wp_customize->add_setting('qs_sidebar_border_width', array(
        'default' => $colorSchemeDefault['settings']['qs_sidebar_border_width'],
        'type' => 'theme_mod',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('qs_sidebar_border_width', array(
        'type' => 'range',
        'priority' => 10,
        'section' => 'quicksand_sidebar',
        'label' => esc_html__('Border width', 'quicksand'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'class' => 'sidebar-border-width-slider-class',
            'style' => 'color: #0a0',
        ),
    ));


    /**
     * Section: Footer 
     */
    $wp_customize->add_section('quicksand_footer', array(
        'title' => esc_html__('Footer', 'quicksand'),
        'priority' => 40,
        'panel' => 'quicksand_main_options',
    ));

    // bg-color
    $wp_customize->add_setting('qs_footer_background_color', array(
        'default' => $colorSchemeDefault['colors']['qs_footer_background_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_background_color', array(
        'label' => esc_html__('Footer Background Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_background_color'
    )));

    // text-color
    $wp_customize->add_setting('qs_footer_text_color', array(
        'default' => $colorSchemeDefault['colors']['qs_footer_text_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_text_color', array(
        'label' => esc_html__('Footer Text Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_text_color'
    )));

    // link-color
    $wp_customize->add_setting('qs_footer_link_color', array(
        'default' => $colorSchemeDefault['colors']['qs_footer_link_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_link_color', array(
        'label' => esc_html__('Footer Link Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_link_color'
    )));

    // link-hover-color
    $wp_customize->add_setting('qs_footer_link_hover_color', array(
        'default' => $colorSchemeDefault['colors']['qs_footer_link_hover_color'],
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_link_hover_color', array(
        'label' => esc_html__('Footer Link Hover Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_link_hover_color'
    )));


    /**
     *  Default WordPress Theme Customization 
     */
    $wp_customize->get_setting('blogname')->transport = 'refresh';
    $wp_customize->get_setting('blogdescription')->transport = 'refresh';
    $wp_customize->get_setting('header_textcolor')->transport = 'refresh';

    // move header-text-color to Theme-Options-Section 'Header'
    $wp_customize->get_control('header_textcolor')->section = 'quicksand_header';
    $wp_customize->get_control('header_textcolor')->priority = 40;

    // move page-bg-color to Theme-Options-Section 'Content'
    $wp_customize->get_control('background_color')->section = 'quicksand_content';
    $wp_customize->get_control('background_color')->priority = 20;

    // move header-image to header-section
    $wp_customize->get_control('header_image')->section = 'quicksand_header';
    $wp_customize->get_control('header_image')->priority = 100;
}

add_action('customize_register', 'quicksand_customize_register');


if (!function_exists('quicksand_get_color_scheme')) :

    /**
     * Retrieves the current Quicksand color scheme.
     *
     * Create your own quicksand_get_color_scheme() function to override in a child theme.
     *
     * @return array An associative array of either the current or default color scheme HEX values.
     */
    function quicksand_get_color_scheme() {
        $color_scheme_option = get_theme_mod('color_scheme', 'default');
        $color_schemes = quicksand_get_color_schemes();

        if (array_key_exists($color_scheme_option, $color_schemes)) {
            return $color_schemes[$color_scheme_option];
        }

        return $color_schemes['default'];
    }

endif;

// quicksand_get_color_scheme
if (!function_exists('quicksand_get_color_scheme_choices')) :

    /**
     * Retrieves an array of color scheme choices registered for Quicksand.
     *
     * Create your own quicksand_get_color_scheme_choices() function to override
     * in a child theme.
     *
     * @return array Array of color schemes.
     */
    function quicksand_get_color_scheme_choices() {
        $color_schemes = quicksand_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }

        return $color_scheme_control_options;
    }

endif; // quicksand_get_color_scheme_choices


if (!function_exists('quicksand_sanitize_color_scheme')) :

    /**
     * Handles sanitization for Quicksand color schemes.
     *
     * Create your own quicksand_sanitize_color_scheme() function to override
     * in a child theme.
     *
     * @param string $value Color scheme name value.
     * @return string Color scheme name.
     */
    function quicksand_sanitize_color_scheme($value) {
        $color_schemes = quicksand_get_color_scheme_choices();

        if (!array_key_exists($value, $color_schemes)) {
            return 'default';
        }

        return $value;
    }

endif; // quicksand_sanitize_color_scheme




if (!function_exists('quicksand_sanitize_checkbox')) :

    /**
     * Sanitzie checkbox for WordPress customizer
     */
    function quicksand_sanitize_checkbox($input) {
        if ($input == 1) {
            return 1;
        } else {
            return '';
        }
    }

endif; // quicksand_sanitize_color_scheme


if (!function_exists('quicksand_sanitize_hexcolor')) :

    /**
     * Adds sanitization callback function: colors
     * @package Quicksand
     */
    function quicksand_sanitize_hexcolor($color) {
        if ($unhashed = sanitize_hex_color_no_hash($color))
            return '#' . $unhashed;
        return $color;
    }

endif; // quicksand_sanitize_color_scheme

/**
 * integrate a scoial-media-menu
 * 
 * @see https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 * 
 * @return string
 */
function quicksand_social_media_array() {
    /* store social site names in array */
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

    return $social_sites;
}

function quicksand_add_social_sites_customizer($wp_customize) {

    $wp_customize->add_section('quicksand_social_settings', array(
        'title' => esc_html__('Social Media Icons', 'quicksand'),
        'priority' => 35,
    ));

    $social_sites = quicksand_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => $social_site . "url:",
            'section' => 'quicksand_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'quicksand_add_social_sites_customizer');

/**
 * returns all active social sites
 * 
 * @return type mixed
 */
function quicksand_get_active_social_sites() {
    $active_sites = array();
    $social_sites = quicksand_social_media_array();

    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }

    return $active_sites;
}

/*
 * template-tag:
 * 
 * takes user input from the customizer and outputs linked social media icons 
 */

function quicksand_social_media_icons() {

    $active_sites = quicksand_get_active_social_sites();

    /* for each active social site, add it as a list item */
    if (!empty($active_sites)) {
        echo '<ul class="list-inline">';

        foreach ($active_sites as $active_site) {

            /* setup the class */
            $class = 'fa fa-' . $active_site;

            if ($active_site == 'email') {
                ?>                 
                <li class="d-inline">
                    <a  class="<?php echo esc_attr($active_site); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse" title="<?php
                            /* translators: FontAwesome css-shortcode */
                            printf(esc_html__('%s icon', 'quicksand'), esc_html($active_site));
                            ?>"></i>
                        </span>
                    </a>
                </li> 
            <?php } else { ?> 
                <li class="d-inline">
                    <a  class="<?php echo esc_attr($active_site); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo esc_attr($class); ?> fa-stack-1x fa-inverse" title="<?php
                               /* translators: FontAwesome css-shortcode */
                               printf(esc_html__('%s icon', 'quicksand'), esc_html($active_site));
                               ?>"></i>
                        </span>
                    </a>
                </li> 
                <?php
            }
        }
        echo "</ul>";
    }
}

/**
 * sanitizer for integers
 * 
 * @param type $input
 * @return int
 */
function prefix_sanitize_integer($input) {
    return absint($input);
}

/**
 * sanitizer for multiple checkboxes (needed by QuicksandCustomizeControlCheckboxMultiple)
 * 
 * @param string $values
 * @return array
 */
function quicksand_sanitize_meta_checkboxes($values) {
    $multi_values = !is_array($values) ? explode(',', $values) : $values;
    return !empty($multi_values) ? array_map('sanitize_text_field', $multi_values) : array();
}
