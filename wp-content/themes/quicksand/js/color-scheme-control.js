/**
 * Add a listener to the Color-Scheme-Control to update other controls to new values/defaults when color-scheme is changed
 */

(function (api) {

    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('color_scheme' === this.id) {
                this.setting.bind('change', function (value) {
                    // other settings
                    var settings = quicksandColorScheme[value].settings;

                    api('qs_nav_fullwidth').set(settings['qs_nav_fullwidth']);
                    api('qs_header_fullwidth').set(settings['qs_header_fullwidth']);
                    api('qs_biography_show').set(settings['qs_biography_show']);
                    api('qs_sidebar_border_width').set(settings['qs_sidebar_border_width']);
                    api('qs_content_fullwidth').set(settings['qs_content_fullwidth']);
                    api('qs_header_show_front').set(settings['qs_header_show_front']);
                    api('qs_content_masonry').set(settings['qs_content_masonry']);
                    api('qs_content_use_lightgallery').set(settings['qs_content_use_lightgallery']);
                    api('qs_slider_enabled').set(settings['qs_slider_enabled']);
                    api('qs_slider_fullwidth').set(settings['qs_slider_fullwidth']);
                    api('qs_slider_enabled').set(settings['qs_slider_enabled']);
                    api('qs_slider_hide_mobile_mode').set(settings['qs_slider_hide_mobile_mode']);
                    api('qs_slider_height').set(settings['qs_slider_height']);
                    api('qs_header_hide_when_slider_enabled').set(settings['qs_header_hide_when_slider_enabled']);
                    api('qs_slider_margin_top').set(settings['qs_slider_margin_top']);
                    api('qs_sidebar_number').set(settings['qs_sidebar_number']);
                    api('quicksand_google_font').set(settings['quicksand_google_font']);
                    api('qs_content_font_size').set(settings['qs_content_font_size']);


                    // colors
                    var colors = quicksandColorScheme[value].colors;
                    var color = colors['background_color'];
                    api('background_color').set(color);
                    api.control('background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_content_background_color'];
                    api('qs_content_background_color').set(color);
                    api.control('qs_content_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_link_color'];
                    api('qs_content_link_color').set(color);
                    api.control('qs_content_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_text_color'];
                    api('qs_content_text_color').set(color);
                    api.control('qs_content_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_secondary_text_color'];
                    api('qs_content_secondary_text_color').set(color);
                    api.control('qs_content_secondary_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['header_textcolor'];
                    api('header_textcolor').set(color);
                    api.control('header_textcolor').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_nav_background_color'];
                    api('qs_nav_background_color').set(color);
                    api.control('qs_nav_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_nav_link_color'];
                    api('qs_nav_link_color').set(color);
                    api.control('qs_nav_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_header_background_color'];
                    api('qs_header_background_color').set(color);
                    api.control('qs_header_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_footer_background_color'];
                    api('qs_footer_background_color').set(color);
                    api.control('qs_footer_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_footer_link_color'];
                    api('qs_footer_link_color').set(color);
                    api.control('qs_footer_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_footer_text_color'];
                    api('qs_footer_text_color').set(color);
                    api.control('qs_footer_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_sidebar_background_color'];
                    api('qs_sidebar_background_color').set(color);
                    api.control('qs_sidebar_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_sidebar_text_color'];
                    api('qs_sidebar_text_color').set(color);
                    api.control('qs_sidebar_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_sidebar_link_color'];
                    api('qs_sidebar_link_color').set(color);
                    api.control('qs_sidebar_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_sidebar_border_color'];
                    api('qs_sidebar_border_color').set(color);
                    api.control('qs_sidebar_border_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_nav_link_hover_background_color'];
                    api('qs_nav_link_hover_background_color').set(color);
                    api.control('qs_nav_link_hover_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_footer_link_hover_color'];
                    api('qs_footer_link_hover_color').set(color);
                    api.control('qs_footer_link_hover_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_post_bg_color'];
                    api('qs_content_post_bg_color').set(color);
                    api.control('qs_content_post_bg_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_post_border_color'];
                    api('qs_content_post_border_color').set(color);
                    api.control('qs_content_post_border_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                    color = colors['qs_content_title_bg_color'];
                    api('qs_content_title_bg_color').set(color);
                    api.control('qs_content_title_bg_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    

                    color = colors['qs_button_color_primary'];
                    api('qs_button_color_primary').set(color);
                    api.control('qs_button_color_primary').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_button_color_secondary'];
                    api('qs_button_color_secondary').set(color);
                    api.control('qs_button_color_secondary').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_content_tag_background_color'];
                    api('qs_content_tag_background_color').set(color);
                    api.control('qs_content_tag_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_content_tag_font_color'];
                    api('qs_content_tag_font_color').set(color);
                    api.control('qs_content_tag_font_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_biography_background_color'];
                    api('qs_biography_background_color').set(color);
                    api.control('qs_biography_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);


                    color = colors['qs_biography_font_color'];
                    api('qs_biography_font_color').set(color);
                    api.control('qs_biography_font_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);

                });
            }
        }
    });
})(wp.customize);
