<?php

/**
 * Customizer functionality
 */
if (!function_exists('omtria_customize_register')) {
    function omtria_customize_register($wp_customize)
    {

        /**
         * Default settings
         */
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_section('title_tagline')->priority = 1;
        $wp_customize->get_setting('custom_logo')->transport = 'refresh';


        /**
         * Footer settings
         */

        $wp_customize->add_panel('omtria_header_panel', array(
            'title' => __('Header', 'omtria')
        ));

        $wp_customize->add_section('omtria_header_section', array(
            'title' => __('Header', 'omtria'),
            'panel' => '',
            'priority' => 2
        ));

        /* Header background */
        $wp_customize->add_setting('omtria_header_background', array(
            'type' => 'theme_mod',
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_background', array(
            'label' => __('Background color', 'omtria'),
            'section' => 'omtria_header_section',
        )));

        /* Header logo color */
        $wp_customize->add_setting('omtria_header_logo_color', array(
            'type' => 'theme_mod',
            'default' => '#212224',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_logo_color', array(
            'label' => __('Logo color', 'omtria'),
            'section' => 'omtria_header_section',
        )));

        /* Header logo color (hover) */
        $wp_customize->add_setting('omtria_header_logo_color_hover', array(
            'type' => 'theme_mod',
            'default' => '#575757',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_logo_color_hover', array(
            'label' => __('Logo color(hover)', 'omtria'),
            'section' => 'omtria_header_section',
        )));

        /* Header menu button color */
        $wp_customize->add_setting('omtria_header_menu_button_color', array(
            'type' => 'theme_mod',
            'default' => '#212224',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_menu_button_color', array(
            'label' => __('Menu button color', 'omtria'),
            'section' => 'omtria_header_section',
        )));

        /* Header menu button color (hover) */
        $wp_customize->add_setting('omtria_header_menu_button_color_hover', array(
            'type' => 'theme_mod',
            'default' => '#575757',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_menu_button_color_hover', array(
            'label' => __('Menu button color(hover)', 'omtria'),
            'section' => 'omtria_header_section',
        )));

        /* Header border color */
        $wp_customize->add_setting('omtria_header_border_color', array(
            'type' => 'theme_mod',
            'default' => '#ececec',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_header_border_color', array(
            'label' => __('Border color', 'omtria'),
            'section' => 'omtria_header_section',
        )));


        /**
         * Color settings
         */

        /* Contrast Color */
        $wp_customize->add_setting('omtria_contrast_color', array(
            'type' => 'theme_mod',
            'default' => 'default',
            'sanitize_callback' => 'omtria_sanitize_contrast_color',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('omtria_contrast_color', array(
            'label' => __('Contrast color', 'omtria'),
            'type' => 'select',
            'choices' => omtria_get_contrast_options(),
            'section' => 'colors'
        ));


        /**
         * Showing of sidebar
         */
        $wp_customize->add_section('omtria_sidebar_section', array(
            'title' => __('Show/hide elements', 'omtria'),
            'panel' => ''
        ));

        $wp_customize->add_setting('omtria_sidebar_on_home', array(
            'type' => 'theme_mod',
            'default' => true,
            'sanitize_callback' => 'omtria_sanitize_boolean',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('omtria_sidebar_on_home', array(
            'label' => __('Show sidebar on home page', 'omtria'),
            'type' => 'checkbox',
            'section' => 'omtria_sidebar_section',
            'active_callback' => 'omtria_ac_sidebar_on_home'
        ));

        if (!function_exists('omtria_ac_sidebar_on_home')) {
            function omtria_ac_sidebar_on_home()
            {
                return is_home() && is_active_sidebar('sidebar-1');
            }
        }


        $wp_customize->add_setting('omtria_navigation_in_post', array(
            'type' => 'theme_mod',
            'default' => true,
            'sanitize_callback' => 'omtria_sanitize_boolean',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('omtria_navigation_in_post', array(
            'label' => __('Show navigation in post detail', 'omtria'),
            'type' => 'checkbox',
            'section' => 'omtria_sidebar_section',
            'active_callback' => 'omtria_ac_navigation_in_post'
        ));

        if (!function_exists('omtria_ac_navigation_in_post')) {
            function omtria_ac_navigation_in_post()
            {
                return is_single();
            }
        }


        $wp_customize->add_setting('omtria_sidebar_on_archive_search', array(
            'type' => 'theme_mod',
            'default' => false,
            'sanitize_callback' => 'omtria_sanitize_boolean',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('omtria_sidebar_on_archive_search', array(
            'label' => __('Show sidebar on archive and search page', 'omtria'),
            'type' => 'checkbox',
            'section' => 'omtria_sidebar_section',
            'active_callback' => 'omtria_ac_sidebar_on_archive_search'
        ));

        if (!function_exists('omtria_ac_sidebar_on_archive_search')) {
            function omtria_ac_sidebar_on_archive_search()
            {
                return (is_archive() || is_search()) && is_active_sidebar('sidebar-1');
            }
        }


        /**
         * Footer settings
         */

        $wp_customize->add_panel('omtria_footer_panel', array(
            'title' => __('Footer', 'omtria')
        ));

        $wp_customize->add_section('omtria_footer_section', array(
            'title' => __('Footer', 'omtria'),
            'panel' => ''
        ));

        /* Footer background */
        $wp_customize->add_setting('omtria_footer_background', array(
            'type' => 'theme_mod',
            'default' => '#212224',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_background', array(
            'label' => __('Background color', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Footer color */
        $wp_customize->add_setting('omtria_footer_color', array(
            'type' => 'theme_mod',
            'default' => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_color', array(
            'label' => __('Text color', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Footer regular link color */
        $wp_customize->add_setting('omtria_footer_regular_link_color', array(
            'type' => 'theme_mod',
            'default' => '#b5b5b5',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_regular_link_color', array(
            'label' => __('Regular link color', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Footer social link color */
        $wp_customize->add_setting('omtria_footer_social_link_color', array(
            'type' => 'theme_mod',
            'default' => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_social_link_color', array(
            'label' => __('Social link color', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Footer social link color(hover) */
        $wp_customize->add_setting('omtria_footer_social_link_color_hover', array(
            'type' => 'theme_mod',
            'default' => '#ececec',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_social_link_color_hover', array(
            'label' => __('Social link color(hover)', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Footer social link border/background */
        $wp_customize->add_setting('omtria_footer_social_link_border', array(
            'type' => 'theme_mod',
            'default' => '#4a4a4a',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omtria_footer_social_link_border', array(
            'label' => __('Social link border/background color', 'omtria'),
            'section' => 'omtria_footer_section',
        )));

        /* Text in footer */
        $wp_customize->add_setting('omtria_footer_text', array(
            'type' => 'theme_mod',
            'default' => __('Created by michalmarek.sk', 'omtria'),
            'sanitize_callback' => 'omtria_sanitize_footer',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('omtria_footer_text', array(
            'label' => __('Footer text', 'omtria'),
            'type' => 'text',
            'section' => 'omtria_footer_section'
        ));
    }
}
add_action('customize_register', 'omtria_customize_register');



/**
 * Customizer handling in Javascript
 */
if (!function_exists('omtria_customize_preview_js')) {
    function omtria_customize_preview_js()
    {
        wp_enqueue_script('omtria-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview', 'jquery'), '2.0.6', true);
    }
}
add_action('customize_preview_init', 'omtria_customize_preview_js');



/**
 * Sanitizing functions
 */
if (!function_exists('omtria_sanitize_footer')) {
    function omtria_sanitize_footer($value)
    {
        return wp_kses_post($value);
    }
}

if (!function_exists('omtria_sanitize_contrast_color')) {
    function omtria_sanitize_contrast_color($value)
    {
        $contrast_colors = omtria_contrast_colors();

        if (!array_key_exists($value, $contrast_colors)) {
            return 'default';
        }

        return $value;
    }
}

if (!function_exists('omtria_sanitize_boolean')) {
    function omtria_sanitize_boolean($value)
    {
        return ((isset($value) && true == $value) ? true : false);
    }
}



/**
 * Helpers - Change hex value to decimal
 */
if (!function_exists('omtria_hex_to_rgb')) {
    function omtria_hex_to_rgb($color)
    {
        $color = trim($color, '#');

        if (strlen($color) === 3) {
            $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
            $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
            $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
        } else if (strlen($color) === 6) {
            $r = hexdec(substr($color, 0, 2));
            $g = hexdec(substr($color, 2, 2));
            $b = hexdec(substr($color, 4, 2));
        } else {
            return array();
        }

        return array('r' => $r, 'g' => $g, 'b' => $b);
    }
}


/**
 * Contrast Color Options
 */
if (!function_exists('omtria_contrast_colors')) {
    function omtria_contrast_colors()
    {
        return array(
            'default' => array(
                'label' => __('Default', 'omtria'),
                'base' => '#1cca5a',
                'base_30' => '#c3f0d1',
                'hover' => '#1bb451'
            ),
            'blue' => array(
                'label' => __('Blue', 'omtria'),
                'base' => '#328dfe',
                'base_30' => '#c8dfff',
                'hover' => '#257deb'
            ),
            'brown' => array(
                'label' => __('Brown', 'omtria'),
                'base' => '#6c5e51',
                'base_30' => '#d6d2cf',
                'hover' => '#56493d'
            ),
            'green' => array(
                'label' => __('Green', 'omtria'),
                'base' => '#66b34e',
                'base_30' => '#d4eacf',
                'hover' => '#599c44'
            ),
            'orange' => array(
                'label' => __('Orange', 'omtria'),
                'base' => '#f97343',
                'base_30' => '#fdd8cc',
                'hover' => '#e46537'
            ),
            'pink' => array(
                'label' => __('Pink', 'omtria'),
                'base' => '#f2a9cb',
                'base_30' => '#fce6ef',
                'hover' => '#de9cbb'
            ),
            'purple' => array(
                'label' => __('Purple', 'omtria'),
                'base' => '#4649b0',
                'base_30' => '#cccde8',
                'hover' => '#393c9d'
            ),
            'red' => array(
                'label' => __('Red', 'omtria'),
                'base' => '#f32d3b',
                'base_30' => '#fcc7ca',
                'hover' => '#e22b38'
            ),
            'yellow' => array(
                'label' => __('Yellow', 'omtria'),
                'base' => '#f5cd5e',
                'base_30' => '#fcf1d2',
                'hover' => '#e6ba41'
            )
        );
    }
}



/**
 * Get Contrast Colors for select input
 */
if (!function_exists('omtria_get_contrast_options')) {
    function omtria_get_contrast_options()
    {
        $contrast_colors = omtria_contrast_colors();
        $contrast_colors_options = array();

        foreach ($contrast_colors as $color => $value) {
            $contrast_colors_options[$color] = $value['label'];
        }

        return $contrast_colors_options;
    }
}



/**
 * Add CSS based on changed settings
 */
if (!function_exists('omtria_add_css_for_settings')) {
    function omtria_add_css_for_settings()
    {
        $contrast_color  = esc_attr(get_theme_mod('omtria_contrast_color', 'default'));
        $contrast_colors = omtria_contrast_colors();
        $selected_color  = $contrast_colors[$contrast_color];

        $header_background               = esc_attr(get_theme_mod('omtria_header_background', '#fff'));
        $header_logo_color               = esc_attr(get_theme_mod('omtria_header_logo_color', '#212224'));
        $header_logo_color_hover         = esc_attr(get_theme_mod('omtria_header_logo_color_hover', '#575757'));
        $header_menu_button_color        = esc_attr(get_theme_mod('omtria_header_menu_button_color', '#212224'));
        $header_menu_button_color_hover  = esc_attr(get_theme_mod('omtria_header_menu_button_color_hover', '#575757'));
        $header_border_color             = esc_attr(get_theme_mod('omtria_header_border_color', '#ececec'));

        $footer_background               = esc_attr(get_theme_mod('omtria_footer_background', '#212224'));
        $footer_text_color               = esc_attr(get_theme_mod('omtria_footer_color', '#666666'));
        $footer_regular_link_color       = esc_attr(get_theme_mod('omtria_footer_regular_link_color', '#b5b5b5'));
        $footer_social_link_color        = esc_attr(get_theme_mod('omtria_footer_social_link_color', '#666666'));
        $footer_social_link_color_hover  = esc_attr(get_theme_mod('omtria_footer_social_link_color_hover', '#ececec'));
        $footer_social_link_border_color = esc_attr(get_theme_mod('omtria_footer_social_link_border', '#4a4a4a'));

        $generated_css = null;

        // Colors
        if ($contrast_color !== 'default') {
            $generated_css .= omtria_generate_contrast_color_css($selected_color);
        }


        // Colors - Header
        if ($header_background !== '#fff') {
            $generated_css .= omtria_generate_header_bg_css($header_background);
        }

        if ($header_logo_color !== '#212224') {
            $generated_css .= omtria_generate_header_logo_color_css($header_logo_color);
        }

        if ($header_logo_color_hover !== '#575757') {
            $generated_css .= omtria_generate_header_logo_color_hover_css($header_logo_color_hover);
        }

        if ($header_menu_button_color !== '#212224') {
            $generated_css .= omtria_generate_header_menu_button_color_css($header_menu_button_color);
        }

        if ($header_menu_button_color_hover !== '#575757') {
            $generated_css .= omtria_generate_header_menu_button_color_hover_css($header_menu_button_color_hover);
        }

        if ($header_border_color !== '#ececec') {
            $generated_css .= omtria_generate_header_border_color_css($header_border_color);
        }


        // Colors - Footer
        if ($footer_background !== '#212224') {
            $generated_css .= omtria_generate_footer_bg_css($footer_background);
        }

        if ($footer_text_color !== '#666666') {
            $generated_css .= omtria_generate_footer_text_css($footer_text_color);
        }

        if ($footer_regular_link_color !== '#b5b5b5') {
            $generated_css .= omtria_generate_footer_regular_link_css($footer_regular_link_color);
        }

        if ($footer_social_link_color !== '#666666') {
            $generated_css .= omtria_generate_footer_social_link_css($footer_social_link_color);
        }

        if ($footer_social_link_color_hover !== '#ececec') {
            $generated_css .= omtria_generate_footer_social_link_hover_css($footer_social_link_color_hover);
        }

        if ($footer_social_link_border_color !== '#4a4a4a') {
            $generated_css .= omtria_generate_footer_social_link_border_css($footer_social_link_border_color);
        }

        wp_add_inline_style('omtria-style', $generated_css);
    }
}
add_action( 'wp_enqueue_scripts', 'omtria_add_css_for_settings' );



/**
 * Generate CSS based on selected contrast color
 */
if (!function_exists('omtria_generate_contrast_color_css')) {
    function omtria_generate_contrast_color_css($color)
    {
        $base      = $color['base'];
        $base_30   = $color['base_30'];
        $hover     = $color['hover'];
        $base_rgb  = omtria_hex_to_rgb($base);
        $hover_rgb = omtria_hex_to_rgb($hover);

        $css = <<<CSS

    blockquote {       
        border-left: 0.25em solid $base; /* 4/16 */        
    }
    
    a {
        color: $base;
    }
    
    a:hover,
    a:focus {
        color: $base;        
    }
    
    mark,
    ins {
        background: $base_30;        
    }
    
    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"] {        
        background: $base;        
    }
    
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus {
        background: $hover;        
    }
    
    .menu-header--default a:hover,
    .menu-header--default a:focus,
    .menu-header--default .current-menu-item > a {
        color: $base;
    }
    
    .content-box--default .content-box-title:after {
        background: $base;
    }
    
    .button--default {
        background: $base;        
    }
    
    .button--default:hover,
    .button--default:focus {
        background: $hover;        
    }
    
    .button--default.button--transparent {
        background: $base;
        background: rgba({$base_rgb['r']},{$base_rgb['g']},{$base_rgb['b']},0.7);
    }
    
    .post--default .post-title:before {
        background: $base;
    }
    
    .post-detail--default .post-detail-title:after {
        background: $base;
    }
    
    .comments--default .bypostauthor .comment-author .fn {
        color: $base;
    }
    
    .comments--default .comment-metadata .edit-link a {
        color: $base;
    }
    
    .widget-section-title:before {        
        background: $base;        
    }
CSS;

        return $css;
    }
}



/**
 * Generating function for Header CSS
 */
if (!function_exists('omtria_generate_header_bg_css')) {
    function omtria_generate_header_bg_css($color)
    {
        $color_rgb     = omtria_hex_to_rgb($color);
        $color_rgb_css = "rgba(".$color_rgb['r'].", ".$color_rgb['g'].", ".$color_rgb['b'].", 0.95)";

        return sprintf('
        .header--default {
            background: %s;
            background: %s;
        }
    ', $color, $color_rgb_css);
    }
}

if (!function_exists('omtria_generate_header_logo_color_css')) {
    function omtria_generate_header_logo_color_css($color)
    {
        return sprintf('
        .text--logo {
            color: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_header_logo_color_hover_css')) {
    function omtria_generate_header_logo_color_hover_css($color)
    {
        return sprintf('
        a.text--logo:hover, 
        a.text--logo:focus {
            color: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_header_menu_button_color_css')) {
    function omtria_generate_header_menu_button_color_css($color)
    {
        return sprintf('
        .menu-header-button--default span, 
        .menu-header-button--default span i, 
        .menu-header-button--default span em {  
            background: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_header_menu_button_color_hover_css')) {
    function omtria_generate_header_menu_button_color_hover_css($color)
    {
        return sprintf('
        .menu-header-button--default:hover span, 
        .menu-header-button--default:hover span i, 
        .menu-header-button--default:hover span em,
        .menu-header-button--default:focus span, 
        .menu-header-button--default:focus span i, 
        .menu-header-button--default:focus span em {  
            background: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_header_border_color_css')) {
    function omtria_generate_header_border_color_css($color)
    {
        return sprintf('
        .header--default {
            border-bottom-color: %s;
        }
    ', $color);
    }
}



/**
 * Generating function for Footer CSS
 */
if (!function_exists('omtria_generate_footer_bg_css')) {
    function omtria_generate_footer_bg_css($color)
    {
        return sprintf('
        .footer--default {
            background: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_footer_text_css')) {
    function omtria_generate_footer_text_css($color)
    {
        return sprintf('
        .footer--default {
            color: %s;        
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_footer_regular_link_css')) {
    function omtria_generate_footer_regular_link_css($color)
    {
        return sprintf('
        .footer--default a {
            color: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_footer_social_link_css')) {
    function omtria_generate_footer_social_link_css($color)
    {
        return sprintf('
        .menu-footer--default a {
            color: %s;
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_footer_social_border_css')) {
    function omtria_generate_footer_social_link_border_css($color)
    {
        return sprintf('    
        .menu-footer--default a {
            border-color: %1$s;        
        }
    
        .menu-footer--default a:hover,
        .menu-footer--default a:focus {
            background: %1$s;        
        }
    ', $color);
    }
}

if (!function_exists('omtria_generate_footer_social_link_hover_css')) {
    function omtria_generate_footer_social_link_hover_css($color)
    {
        return sprintf('        
        .menu-footer--default a:hover,
        .menu-footer--default a:focus {
            color: %1$s;        
        }
    ', $color);
    }
}