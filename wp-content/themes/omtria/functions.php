<?php

if (!isset($content_width)) $content_width = 1170;

/**
 * Omtria only works with WordPress 4.1 or later
 */
if (version_compare($GLOBALS['wp_version'], '4.1', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}



/**
 * Theme Setup
 */
if (!function_exists('omtria_setup')) {
    function omtria_setup() {
        load_theme_textdomain( 'omtria', get_template_directory() . '/languages' );

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size( 1200, 900, true );

        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'height'     => 70,
            'width'      => 70,
            'flex-width' => true
        ));

        register_nav_menus(array(
            'menu-header' => __( 'Menu in header', 'omtria' ),
            'menu-footer' => __( 'Menu in footer (Social links)', 'omtria' )
        ));
    }
}
add_action('after_setup_theme', 'omtria_setup');



/**
 * Styles and Scripts
 */
if (!function_exists('omtria_styles_and_scripts')) {
    function omtria_styles_and_scripts()
    {
        wp_enqueue_style('omtria-fonts', omtria_fonts_url(), array(), null);
        wp_enqueue_style('omtria-style', get_stylesheet_uri(), array(), '2.0.6');

        wp_enqueue_script('omtria-main', get_template_directory_uri() . "/js/main.js", array('jquery'), '2.0.6', true);

        wp_enqueue_script('html5shiv', get_template_directory_uri() . "/js/html5shiv.min.js", array(), '3.7.3', false);
        wp_enqueue_script('respond', get_template_directory_uri() . "/js/respond.min.js", array(), '1.4.2', false);

        add_filter('script_loader_tag', 'omtria_return_tag', 10, 2);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        if (is_singular() && wp_attachment_is_image()) {
            wp_enqueue_script('image-navigation', get_template_directory_uri() . '/js/image-navigation.js', array('jquery'), '2.0.6');
        }
    }
}
add_action('wp_enqueue_scripts', 'omtria_styles_and_scripts');



/**
 * Register widget area
 */
if (!function_exists('omtria_widgets_init')) {
    function omtria_widgets_init() {
        register_sidebar(array(
            'name'          => __( 'Widget Area', 'omtria' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'omtria' ),
            'before_widget' => '<div id="%1$s" class="widget-section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-section-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action( 'widgets_init', 'omtria_widgets_init' );



/**
 * Helpers
 */
if (!function_exists('omtria_fonts_url')) {
    function omtria_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto font: on or off', 'omtria')) {
            $fonts[] = 'Roboto:400,700,400italic,700italic';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Condensed, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto Condensed font: on or off', 'omtria')) {
            $fonts[] = 'Roboto+Condensed:400,700,400italic,700italic';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Squada One, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Squada One font: on or off', 'omtria')) {
            $fonts[] = 'Squada+One';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'omtria');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => implode('|', $fonts),
                'subset' => $subsets,
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
}

if (!function_exists('omtria_custom_logo')) {
    function omtria_custom_logo()
    {
        if (has_custom_logo()) {
            the_custom_logo();
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('omtria_category_list')) {
    function omtria_category_list($categories)
    {
        $formatted = "";

        for ($i = 0; $i < count($categories); $i++) {
            $formatted .= "<a href='" . esc_attr(get_category_link(get_cat_ID($categories[$i]))) . "' class='button button--default button--sm text--uppercase'>" . esc_html($categories[$i]) . "</a> ";
        }

        return $formatted;
    }
}

if (!function_exists('omtria_return_tag')) {
    function omtria_return_tag($tag, $handle)
    {
        if ($handle === 'html5shiv' || $handle === 'respond') {
            $tag = "<!--[if lt IE 9]>$tag<![endif]-->";
        }
        return $tag;
    }
}

if (!function_exists('omtria_pingback_header')) {
    function omtria_pingback_header() {
        if (is_singular() && pings_open()) {
            printf('<link rel="pingback" href="%s">'."\n", get_bloginfo('pingback_url'));
        }
    }
}
add_action('wp_head', 'omtria_pingback_header');



/**
 * Filters
 */
if (!function_exists('omtria_get_the_archive_title')) {
    function omtria_get_the_archive_title($title)
    {
        if (is_category()) {
            $title = __('Category', 'omtria') . ": <span>" . single_cat_title('', false) . "</span>";
        } else if (is_tag()) {
            $title = __('Tag', 'omtria') . ": <span>" . single_cat_title('', false) . "</span>";
        } else if (is_date()) {
            $title = __('Day', 'omtria') . ": <span>" . get_the_date('', false) . "</span>";
        }

        return $title;
    }
}
add_filter('get_the_archive_title', 'omtria_get_the_archive_title');



/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer.php';