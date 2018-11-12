<?php
/**
 * Dynamic css
 *
 * @since Gist 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('gist_dynamic_css')) :

    function gist_dynamic_css()
    {

        global $gist_theme_options;
        $gist_font_family = wp_kses_post( $gist_theme_options['gist-font-family'] );
        $gist_font_size = absint( $gist_theme_options['gist-font-size'] );
        $gist_font_line_height = esc_attr( $gist_theme_options['gist-font-line-height'] );
        $gist_font_letter_spacing = absint( $gist_theme_options['gist-letter-spacing'] );
        $gist_primary_color = esc_attr( $gist_theme_options['gist_primary_color'] );
        $custom_css = '';

        /* Typography Section */
        if (!empty($gist_font_family)) {
            $custom_css .= "body { font-family: {$gist_font_family}; }";
        }

        if (!empty($gist_font_size)) {
            $custom_css .= "body { font-size: {$gist_font_size}px; }";
        }

        if (!empty($gist_font_line_height)) {
            $custom_css .= "body { line-height : {$gist_font_line_height}; }";
        }

        if (!empty($gist_font_letter_spacing)) {
            $custom_css .= "body { letter-spacing : {$gist_font_letter_spacing}px; }";
        }

        /* Primary Color Section */
        if (!empty($gist_primary_color)) {
            $custom_css .= ".breadcrumbs span.breadcrumb, .nav-links a, .search-form input[type=submit], #toTop, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover  { background : {$gist_primary_color}; }";

            $custom_css .= ".search-form input.search-field, .sticky .p-15, .related-post-entries li, .candid-pagination .page-numbers { border-color : {$gist_primary_color}; }";

            $custom_css .= ".error-404 h1, .no-results h1, a, a:visited, .related-post-entries .title:hover, .entry-title a:hover, .featured-post-title a:hover, .entry-meta.entry-category a,.widget li a:hover, .widget h1 a:hover, .widget h2 a:hover, .widget h3 a:hover, .site-title a, .site-title a:visited, .main-navigation ul li a:hover { color : {$gist_primary_color}; }";
            $custom_css .=".btn-primary { border: 2px solid {$gist_primary_color};}";
        }

        wp_add_inline_style('gist-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'gist_dynamic_css', 99);