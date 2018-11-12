<?php
/**
 * Dynamic css
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_dynamic_css' ) ) :

    function acmeblog_dynamic_css() {

        global $acmeblog_customizer_all_values;
        /*Color options */
        $acmeblog_primary_color = esc_attr( $acmeblog_customizer_all_values['acmeblog-primary-color'] );
        $custom_css = '';

        /*background*/
        $custom_css .= "
            mark,
            .comment-form .form-submit input,
            .slider-section .cat-links a,
            #calendar_wrap #wp-calendar #today,
            #calendar_wrap #wp-calendar #today a,
            .wpcf7-form input.wpcf7-submit:hover,
            .breadcrumb{
                background: {$acmeblog_primary_color};
            }";

        /*color*/
        $custom_css .= "
            a:hover,
            .header-wrapper .menu li a:hover,
            .screen-reader-text:focus,
            .bn-content a:hover,
            .socials a:hover,
            .site-title a,
            .widget_search input#s,
            .besides-slider .post-title a:hover,
            .slider-feature-wrap a:hover,
            .slider-section .bx-controls-direction a,
            .besides-slider .beside-post:hover .beside-caption,
            .besides-slider .beside-post:hover .beside-caption a:hover,
            .featured-desc .above-entry-meta span:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .nav-links a:hover,
            #acmeblog-breadcrumbs a:hover,
            .wpcf7-form input.wpcf7-submit,
            .widget li a:hover,
            .header-wrapper .menu > li.current-menu-item > a,
            .header-wrapper .menu > li.current-menu-parent > a,
            .header-wrapper .menu > li.current_page_parent > a,
            .header-wrapper .menu > li.current_page_ancestor > a{
                color: {$acmeblog_primary_color};
            }";

        /*border*/
         $custom_css .= "
         .nav-links .nav-previous a:hover,
            .nav-links .nav-next a:hover{
                border-top: 1px solid {$acmeblog_primary_color};
            }
            .besides-slider .beside-post{
                border-bottom: 3px solid {$acmeblog_primary_color};
            }
            .page-header .page-title,
            .single .entry-header .entry-title{
                border-bottom: 1px solid {$acmeblog_primary_color};
            }
            .page-header .page-title:before,
            .single .entry-header .entry-title:before{
                border-bottom: 7px solid {$acmeblog_primary_color};
            }
            .wpcf7-form input.wpcf7-submit:hover,
            article.post.sticky,
            .comment-form .form-submit input,
            .read-more:hover{
                border: 2px solid {$acmeblog_primary_color};
            }
            .breadcrumb::after {
                border-left: 5px solid {$acmeblog_primary_color};
            }
            .tagcloud a{
                border: 1px solid {$acmeblog_primary_color};
            }
            .widget-title{
                border-left: 2px solid {$acmeblog_primary_color};
            }
         ";
        /*media width*/
        $custom_css .= "
            @media screen and (max-width:992px){
                .slicknav_btn.slicknav_open{
                    border: 1px solid {$acmeblog_primary_color};
                }
                .slicknav_btn.slicknav_open:before{
                    background: {$acmeblog_primary_color};
                    box-shadow: 0 6px 0 0 {$acmeblog_primary_color}, 0 12px 0 0 {$acmeblog_primary_color};
                }
                .slicknav_nav li:hover > a,
                .slicknav_nav li.current-menu-ancestor a,
                .slicknav_nav li.current-menu-item  > a,
                .slicknav_nav li.current_page_item a,
                .slicknav_nav li.current_page_item .slicknav_item span,
                .slicknav_nav li .slicknav_item:hover a{
                    color: {$acmeblog_primary_color};
                }
            }";
        /*custom css*/
        $acmeblog_custom_css = wp_strip_all_tags ( $acmeblog_customizer_all_values['acmeblog-custom-css'] );
        if ( ! empty( $acmeblog_custom_css ) ) {
            $custom_css .= $acmeblog_custom_css;
        }
        wp_add_inline_style( 'acmeblog-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'acmeblog_dynamic_css', 99 );