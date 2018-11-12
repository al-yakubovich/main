<?php

/**
 * Registers color schemes for Quicksand.
 *
 * Can be filtered with {@see 'quicksand_color_schemes'} 
 *
 * @return array An associative array of color scheme options.
 */
function quicksand_get_color_schemes() {
    /**
     * Filter the color schemes registered for use with Quicksand.
     *
     * The default schemes include 'default', 'quicksand' 
     * Adjust your CSS-below
     *
     * @param array $schemes {
     *     Associative array of color schemes data.
     *
     *     @type array $slug {
     *         Associative array of information for setting up the color scheme.
     *
     *         @type string $label  Color scheme label.
     *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
     *                              Colors are defined in the following order: Main background, page
     *                              background, link, main text, secondary text.
     *     }
     * }
     */
    return apply_filters('quicksand_color_schemes', array(
        'default' => array(
            'label' => __('Asteroid Blues', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' => 1,
                'qs_header_show_front' => 0,
                'qs_header_fullwidth' => 1,
                'qs_content_fullwidth' => 0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' => 1,
                'qs_content_masonry' => 0,
                'qs_content_use_lightgallery' => 1,
                'qs_slider_enabled' => 1,
                'qs_slider_hide_mobile_mode' => 0,
                'qs_slider_fullwidth' => 1,
                'qs_header_enabled' => 1,
                'qs_slider_height' => 30,
                'qs_header_hide_when_slider_enabled' => 0,
                'qs_slider_margin_top' => 0,
                'qs_sidebar_number' => 'right_sidebar',
                'quicksand_google_font' => 'Raleway',
                'qs_content_font_size' => 14,
                'qs_content_show_meta' => array(
                    'date',
                    'taxonomies',
                    'comments',
//                    'post-format',
//                    'author' 
                )
            ),
            'colors' => array(
                'background_color' => '#ffffff',
                'header_textcolor' => '#ffffff',
                'qs_nav_background_color' => '#9cbaba',
                'qs_nav_link_color' => '#ffffff',
                'qs_nav_link_hover_background_color' => '#95b2b1',
                'qs_header_background_color' => '#95b2b1',
                'qs_sidebar_background_color' => '#ffffff',
                'qs_sidebar_text_color' => '#666666',
                'qs_sidebar_link_color' => '#a3a3a3',
                'qs_sidebar_border_color' => '#f5f5f5',
                'qs_content_background_color' => '#ffffff',
                'qs_content_link_color' => '#cecece',
                'qs_content_text_color' => '#686868',
                'qs_content_secondary_text_color' => '#9ab7ac',
                'qs_content_post_bg_color' => '#ffffff',
                'qs_content_post_border_color' => '#e0e0e0',
                'qs_content_title_bg_color' => '#f5f5f5',
                'qs_content_tag_background_color' => '#286584',
                'qs_content_tag_font_color' => '#fff',
                'qs_button_color_primary' => '#9ab7ac',
                'qs_button_color_secondary' => '#fff',
                'qs_biography_background_color' => '#f5f5f5',
                'qs_biography_font_color' => '#686868',
                'qs_footer_link_hover_color' => '#7c938a',
                'qs_footer_background_color' => '#303030',
                'qs_footer_link_color' => '#9ab7ac',
                'qs_footer_text_color' => '#5e7772',
            ),
        ),
        'jupiter-jazz' => array(
            'label' => __('Jupiter Jazz', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' => 0,
                'qs_header_show_front' => 0,
                'qs_header_fullwidth' => 0,
                'qs_content_fullwidth' => 0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' => 3,
                'qs_content_masonry' => 1,
                'qs_content_use_lightgallery' => 1,
                'qs_slider_enabled' => 0,
                'qs_slider_hide_mobile_mode' => 1,
                'qs_slider_fullwidth' => 0,
                'qs_header_enabled' => 1,
                'qs_slider_height' => 30,
                'qs_header_hide_when_slider_enabled' => 0,
                'qs_slider_margin_top' => 2,
                'qs_sidebar_number' => 'right_sidebar',
                'quicksand_google_font' => 'Abel',
                'qs_content_font_size' => 16,
                'qs_content_show_meta' => array(
                    'date',
                    'taxonomies',
                    'comments',
                    'post-format',
                    'author'
                )
            ),
            'colors' => array(
                'background_color' => '#e0d4c0',
                'header_textcolor' => '#ffffff',
                'qs_nav_background_color' => '#e0d4c0',
                'qs_nav_link_color' => '#ffffff',
                'qs_nav_link_hover_background_color' => '#ccbfaf',
                'qs_header_background_color' => '#e0d4c0',
                'qs_content_background_color' => '#e0d4c0',
                'qs_content_link_color' => '#dbcfbc',
                'qs_content_text_color' => '#686868',
                'qs_content_secondary_text_color' => '#ffffff',
                'qs_content_tag_background_color' => '#722145',
                'qs_content_tag_font_color' => '#fff',
                'qs_content_post_bg_color' => '#ffffff',
                'qs_content_post_border_color' => '#e0d4c0',
                'qs_content_title_bg_color' => '#d6cbb8',
                'qs_sidebar_background_color' => '#ffffff',
                'qs_sidebar_text_color' => '#8c867a',
                'qs_sidebar_link_color' => '#e0d4c0',
                'qs_sidebar_border_color' => '#e0d4c0',
                'qs_button_color_primary' => '#ada495',
                'qs_button_color_secondary' => '#fff',
                'qs_biography_background_color' => '#fff',
                'qs_biography_font_color' => '#000',
                'qs_footer_background_color' => '#303030',
                'qs_footer_link_color' => '#d6cbb8',
                'qs_footer_text_color' => '#dbdbdb',
                'qs_footer_link_hover_color' => '#d6cbb8',
            ),
        ),
        'ganymede-elegy' => array(
            'label' => __('Ganymede Elegy', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' => 1,
                'qs_header_show_front' => 0,
                'qs_header_fullwidth' => 0,
                'qs_content_fullwidth' => 0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' => 0,
                'qs_content_masonry' => 0,
                'qs_content_use_lightgallery' => 1,
                'qs_slider_enabled' => 0,
                'qs_slider_hide_mobile_mode' => 0,
                'qs_slider_fullwidth' => 0,
                'qs_header_enabled' => 1,
                'qs_slider_height' => 30,
                'qs_header_hide_when_slider_enabled' => 0,
                'qs_slider_margin_top' => 0,
                'qs_sidebar_number' => 'right_sidebar',
                'quicksand_google_font' => 'Raleway',
                'qs_content_font_size' => 14,
                'qs_content_show_meta' => array(
                    'date',
                    'taxonomies',
                    'comments',
                    'post-format',
                    'author' 
                )
            ),
            'colors' => array(
                'background_color' => '#ffffff',
                'header_textcolor' => '#ffffff',
                'qs_nav_background_color' => '#729bbf',
                'qs_nav_link_color' => '#ffffff',
                'qs_nav_link_hover_background_color' => '#91a9bf',
                'qs_header_background_color' => '#729bbf',
                'qs_sidebar_background_color' => '#ffffff',
                'qs_sidebar_text_color' => '#729bbf',
                'qs_sidebar_link_color' => '#a3a3a3',
                'qs_sidebar_border_color' => '#f5f5f5',
                'qs_content_background_color' => '#ffffff',
                'qs_content_link_color' => '#7aa3cc',
                'qs_content_text_color' => '#686868',
                'qs_content_secondary_text_color' => '#729bbf',
                'qs_content_post_bg_color' => '#ffffff',
                'qs_content_post_border_color' => '#ffffff',
                'qs_content_title_bg_color' => '#ffffff',
                'qs_content_tag_background_color' => '#286584',
                'qs_content_tag_font_color' => '#fff',
                'qs_button_color_primary' => '#729bbf',
                'qs_button_color_secondary' => '#ffffff',
                'qs_biography_background_color' => '#f5f5f5',
                'qs_biography_font_color' => '#686868',
                'qs_footer_link_hover_color' => '#ffffff',
                'qs_footer_background_color' => '#232e42',
                'qs_footer_link_color' => '#c4c4c4',
                'qs_footer_text_color' => '#fff',
            ),
        ),
    ));
}
