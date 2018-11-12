<?php $colorScheme = quicksand_get_color_scheme(); ?> 
    body,html {
        font-size: <?php echo esc_attr( get_theme_mod('qs_content_font_size', $colorScheme['settings']['qs_content_font_size'])); ?>px;
    } 



    /* === btn-secondary === */
    .btn.btn-secondary, .btn.btn-secondary.nav-search-cancel {
        outline-style: none;
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }
    .btn.btn-secondary a {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?> !important;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border: none; 
    }
    .btn-secondary:hover {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }
    .btn-secondary:hover a {
        text-decoration: none;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?> !important;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
    } 


    /**
     * form: input-group-btn
     * 
     * don't change anything in input-group-btns
     */ 
    .input-group-btn .btn-secondary:hover {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?> !important;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }

    .btn-secondary:focus, .btn-secondary.focus {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; }
    .btn-secondary:active, .btn-secondary.active,
    .open > .btn-secondary.dropdown-toggle {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        background-image: none; }
    .btn-secondary:active:hover, .btn-secondary:active:focus, .btn-secondary:active.focus, .btn-secondary.active:hover, .btn-secondary.active:focus, .btn-secondary.active.focus,
    .open > .btn-secondary.dropdown-toggle:hover,
    .open > .btn-secondary.dropdown-toggle:focus,
    .open > .btn-secondary.dropdown-toggle.focus {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }
    .btn-secondary.disabled:focus, .btn-secondary.disabled.focus, .btn-secondary:disabled:focus, .btn-secondary:disabled.focus {
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }
    .btn-secondary.disabled:hover, .btn-secondary:disabled:hover {
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }





    /* === btn-outline-secondary === */
    .btn.btn-outline-secondary, .btn.btn-outline-secondary a {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?> !important;
        background-image: none;
        background-color: transparent;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }

    .btn.btn-outline-secondary:hover, .btn.btn-outline-secondary a:hover {
        text-decoration: none;
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?> !important;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }

    .btn.btn-outline-secondary:focus, .btn.btn-outline-secondary.focus  {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; }
    .btn.btn-outline-secondary:active,  .btn.btn-outline-secondary.active, 
    .open > .btn.btn-outline-secondary.dropdown-toggle {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; }
    .btn.btn-outline-secondary:active:hover, 
    .btn.btn-outline-secondary:active:focus,  
    .btn.btn-outline-secondary:active.focus,
    .btn.btn-outline-secondary.active:hover,  
    .btn.btn-outline-secondary.active:focus,
    .btn.btn-outline-secondary.active.focus,
    .open > .btn.btn-outline-secondary.dropdown-toggle:hover, 
    .open > .btn.btn-outline-secondary.dropdown-toggle:focus, 
    .open > .btn.btn-outline-secondary.dropdown-toggle.focus {
        color: <?php echo esc_attr( get_theme_mod('qs_button_color_secondary', $colorScheme['colors']['qs_button_color_secondary'])); ?>;
        background-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>;
        border-color: <?php echo esc_attr( get_theme_mod('qs_button_color_primary', $colorScheme['colors']['qs_button_color_primary'])); ?>; 
    }
    .btn.btn-outline-secondary.disabled:focus, .btn.btn-outline-secondary.disabled.focus, .btn.btn-outline-secondary:disabled:focus,.btn.btn-outline-secondary:disabled.focus{
        border-color: #d6e1dd; }
    .btn.btn-outline-secondary.disabled:hover,  .btn.btn-outline-secondary:disabled:hover {
        border-color: #d6e1dd; } 


    /* === navigation === */
    .site-navigation,
    .site-nav-container nav.navbar,
    .site-nav-container nav.navbar .navbar-toggler,
    .site-nav-container .dropdown-menu {
        background: <?php echo esc_attr( get_theme_mod('qs_nav_background_color', $colorScheme['colors']['qs_nav_background_color'])); ?>;
    }
    .site-nav-container .dropdown-menu {
        border-top: 1px solid <?php echo esc_attr( get_theme_mod('qs_nav_background_color', $colorScheme['colors']['qs_nav_background_color'])); ?>;
    }
    .nav-search-mobile-wrapper .nav-search-mobile .fa,
    .nav-search-mobile-wrapper .nav-search-close-mobile .fa,
    .nav-search-wrapper .nav-search .fa,
    .nav-content .navbar-brand,
    .nav-content .navbar-brand:hover,
    .site-nav-container,
    .site-nav-container .menu-item .nav-link , 
    .site-nav-container .menu-item .dropdown-item,    
    .site-nav-container nav.navbar .navbar-toggler,
    .navbar-light .navbar-nav .nav-link,
    .navbar-light .navbar-nav .active .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus,
    .navbar-light .navbar-nav .nav-link:active,  
    .navbar-light .navbar-nav .nav-link:visited,  
    .navbar-light .navbar-nav .open>.nav-link,
    .navbar-light .navbar-nav .open>.nav-link:hover,
    .navbar-light .navbar-nav .open>.nav-link:visited,
    .navbar-light .navbar-nav .open>.nav-link:focus,
    .navbar-light .navbar-nav .open>.nav-link:active {
        color: <?php echo esc_attr( get_theme_mod('qs_nav_link_color', $colorScheme['colors']['qs_nav_link_color'])); ?> !important;
    }    
    .site-nav-container nav.navbar .navbar-toggler {
        border-color: <?php echo esc_attr( get_theme_mod('qs_nav_link_color', $colorScheme['colors']['qs_nav_link_color'])); ?>;
    }

    .site-nav-container .menu-item .dropdown-item.active { 
        background: <?php echo esc_attr( get_theme_mod('qs_nav_link_hover_background_color', $colorScheme['colors']['qs_nav_link_hover_background_color'])); ?>;
    }


    .site-nav-container .menu-item .dropdown-item:hover {
        background: <?php echo esc_attr( get_theme_mod('qs_nav_link_hover_background_color', $colorScheme['colors']['qs_nav_link_hover_background_color'])); ?>;
    } 

    /*searchbar*/ 
    .nav-search-mobile-wrapper .nav-search-mobile,
    .nav-search-mobile-wrapper .nav-search-close-mobile,
    .nav-search-wrapper .nav-search {
        background-color: <?php echo esc_attr( get_theme_mod('qs_nav_background_color', $colorScheme['colors']['qs_nav_background_color'])); ?> !important;
        border: none !important;
    } 
    .nav-search-mobile-wrapper .nav-search-mobile:hover,
    .nav-search-mobile-wrapper .nav-search-close-mobile:hover,
    .nav-search-wrapper .nav-search:hover {
        color: <?php echo esc_attr( get_theme_mod('qs_nav_link_color', $colorScheme['colors']['qs_nav_link_color'])); ?> !important;
        background: <?php echo esc_attr( get_theme_mod('qs_nav_background_color', $colorScheme['colors']['qs_nav_background_color'])); ?> !important;
    }



    /* === slider === */
    .quicksand-slider-header-wrapper {
        margin-top: <?php echo esc_attr( get_theme_mod('qs_slider_margin_top', $colorScheme['settings']['qs_slider_margin_top'])); ?>rem; 
    }
    .quicksand-slider-header-wrapper .flexslider .slides {
        max-height: <?php echo esc_attr( get_theme_mod('qs_slider_height', $colorScheme['settings']['qs_slider_height'])); ?>rem; 
    }
    .quicksand-slider-header-wrapper .flexslider .slides h2 {
        <?php
        $rgb = quicksand_hex2rgb(get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors']['qs_content_secondary_text_color']));
        $rgba = array($rgb['red'], $rgb['green'], $rgb['blue'], "0.5");
        ?>
        background: rgba(<?php echo esc_html(join(",", $rgba)) ?>); 
    }

    a.flex-active {
        background: <?php echo esc_attr( get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors']['qs_content_secondary_text_color'])); ?> !important;
    }

    <?php
    // hide slider in mobile-mode
    if (get_theme_mod('qs_slider_hide_mobile_mode', $colorScheme['settings']['qs_slider_hide_mobile_mode'])) {
        ?>

        @media only screen and (max-width: 768px) {
            .quicksand-slider-header-wrapper {
                display: none!important;
            } 
        } 

    <?php } ?>

    /* === site-header === */
    .site-info-wrapper a,
    .site-info-wrapper .site-description {  
        color: #<?php echo esc_attr( preg_replace('/^#/', '', get_header_textcolor())); ?>; 
    }

    .site-info-wrapper.jumbotron  {
        background: <?php echo esc_attr( get_theme_mod('qs_header_background_color', $colorScheme['colors']['qs_header_background_color'])); ?>;
    }

    .site-info-wrapper h1, 
    .site-info-wrapper p { 
        background: <?php echo esc_html(get_theme_mod('qs_header_background_color', $colorScheme['colors']['qs_header_background_color'])) ?>; 
    }


    /* === content === */
    .site-main-container { 
        background: <?php echo esc_attr( get_theme_mod('qs_content_background_color', $colorScheme['colors']['qs_content_background_color'])); ?>;
        color: <?php echo esc_attr( get_theme_mod('qs_content_text_color', $colorScheme['colors']['qs_content_text_color'])); ?>;
    }

    .site-main-container a { 
        color: <?php echo esc_attr( get_theme_mod('qs_content_link_color', $colorScheme['colors']['qs_content_link_color'])); ?>;
    }  

    /*content: postformats*/
    /*quote*/ 
    .site-main-container .post-quote blockquote { 
        color: <?php echo esc_attr( get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors']['qs_content_secondary_text_color'])); ?>;
    } 

    /* === tags === */ 
    .entry-footer .tag-links .tag {  
        background: <?php echo esc_attr( get_theme_mod('qs_content_tag_background_color', $colorScheme['colors']['qs_content_tag_background_color'])); ?>;
    }  
    .entry-footer .tag-links .tag a { 
        color: <?php echo esc_attr( get_theme_mod('qs_content_tag_font_color', $colorScheme['colors']['qs_content_tag_font_color'])); ?>; 
    }   


    /*2nd text color*/
    .card-header.comments-title,
    .card-subtitle.quicksand_archive_subtitle,
    .card-subtitle.quicksand-search-subtitle,
    .quicksand_search_title,
    .quicksand_archive_title,
    .site-content .card-header.entry-header h1,
    .site-content .card-header.entry-header h2,
    .site-content .card-header.entry-header h3,
    .site-content .card-header.entry-header h4,
    .site-content .card-header.entry-header h5,
    .site-content .card-header.entry-header h6,
    .site-content .card-header.entry-header h1>a,
    .site-content .card-header.entry-header h2>a,
    .site-content .card-header.entry-header h3>a,
    .site-content .card-header.entry-header h4>a,
    .site-content .card-header.entry-header h5>a,
    .site-content .card-header.entry-header h6>a { 
        color: <?php echo esc_attr( get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors']['qs_content_secondary_text_color'])); ?>;
    }


    /*post*/

    .site-content-area .card {
        background: <?php echo esc_attr( get_theme_mod('qs_content_post_bg_color', $colorScheme['colors']['qs_content_post_bg_color'])); ?>;
        border: 1px solid <?php echo esc_attr( get_theme_mod('qs_content_post_border_color', $colorScheme['colors']['qs_content_post_border_color'])); ?>; 
    }     

    .site-content-area .card-header.entry-header {
        border-bottom: 1px solid <?php echo esc_attr( get_theme_mod('qs_content_post_border_color', $colorScheme['colors']['qs_content_post_border_color'])); ?>; 
    }

    .site-content-area .quicksand-meta-list-header,
    .site-content-area .card .entry-header {  
        background: <?php echo esc_attr( get_theme_mod('qs_content_title_bg_color', $colorScheme['colors']['qs_content_title_bg_color'])); ?>;
    }  
    .site-content-area .card .entry-footer  {
        border-top: 1px solid <?php echo esc_attr( get_theme_mod('qs_content_post_border_color', $colorScheme['colors']['qs_content_post_border_color'])); ?>; 
        background: <?php echo esc_attr( get_theme_mod('qs_content_title_bg_color', $colorScheme['colors']['qs_content_title_bg_color'])); ?>; 
    }  

    /*comment*/
    .comment-list ol {
        border-left: 1px solid <?php echo esc_attr( get_theme_mod('qs_content_post_border_color', $colorScheme['colors']['qs_content_post_border_color'])); ?>; 
    }

    .card-header.comments-title {
        background: <?php echo esc_attr( get_theme_mod('qs_content_title_bg_color', $colorScheme['colors']['qs_content_title_bg_color'])); ?>; 
    }


    /*biography*/ 
    .site-content-area .card .author-bio {
        border-top: 1px solid <?php echo esc_attr( get_theme_mod('qs_content_post_border_color', $colorScheme['colors']['qs_content_post_border_color'])); ?>; 
        background: <?php echo esc_attr( get_theme_mod('qs_biography_background_color', $colorScheme['colors']['qs_biography_background_color'])); ?>; 
    }
    .site-content-area .card .author-link,
    .site-content-area .card .author-description {
        color: <?php echo esc_attr( get_theme_mod('qs_biography_font_color', $colorScheme['colors']['qs_biography_font_color'])); ?>;
    }


    /* === sidebar === */ 
    #secondary .widget,
    #third .widget {
        border-color: <?php echo esc_attr( get_theme_mod('qs_sidebar_border_color', $colorScheme['colors']['qs_sidebar_border_color'])); ?>;   
        <?php
        // outer-widget-border-width never more than 1 
        $widgetBorderWidth = get_theme_mod('qs_sidebar_border_width', $colorScheme['settings']['qs_sidebar_border_width']);
        $widgetBorderWidth = $widgetBorderWidth > 1 ? 1 : $widgetBorderWidth;
        ?>
        border-width: <?php echo esc_html($widgetBorderWidth); ?>px;
        border-style: solid;
    }

    #secondary .widget .card-header.widget-title,
    #third .widget .card-header.widget-title {
        border-bottom: none;   
        background: <?php echo esc_attr( get_theme_mod('qs_content_title_bg_color', $colorScheme['colors']['qs_content_title_bg_color'])); ?>; 
        color: <?php echo esc_attr( get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors']['qs_content_secondary_text_color'])); ?>;
    }

    /* search-btn fix for Chrome*/
    #secondary .widget .search-form .input-group-btn,
    #third .widget .search-form .input-group-btn {
        background: #<?php echo esc_attr( get_theme_mod('background_color', $colorScheme['colors']['background_color'])); ?>; 
    }

    /* quicksand-widgets*/
    #secondary .widget .tag.tag-default.tag-pill ,
    #third .widget  .tag.tag-default.tag-pill {   
        background: <?php echo esc_attr( get_theme_mod('qs_sidebar_text_color', $colorScheme['colors']['qs_sidebar_text_color'])); ?>; 
        color: <?php echo esc_attr( get_theme_mod('qs_sidebar_background_color', $colorScheme['colors']['qs_sidebar_background_color'])); ?>;
    }

    #secondary .widget ul li,
    #third .widget ul li,
    #secondary .widget ol li, 
    #third .widget ol li {
        color: <?php echo esc_attr( get_theme_mod('qs_sidebar_text_color', $colorScheme['colors']['qs_sidebar_text_color'])); ?>; 
        background: <?php echo esc_attr( get_theme_mod('qs_sidebar_background_color', $colorScheme['colors']['qs_sidebar_background_color'])); ?>;  
        border-color: <?php echo esc_attr( get_theme_mod('qs_sidebar_border_color', $colorScheme['colors']['qs_sidebar_border_color'])); ?>;   
        border-width: <?php echo esc_attr( get_theme_mod('qs_sidebar_border_width', $colorScheme['settings']['qs_sidebar_border_width'])); ?>px;
        border-style: solid;
    }

    #secondary .widget table a,
    #third .widget table a,
    #secondary .widget li a, 
    #third .widget li a {
        color: <?php echo esc_attr( get_theme_mod('qs_sidebar_link_color', $colorScheme['colors']['qs_sidebar_link_color'])); ?>;   
    }


    /* === footer === */ 
    .site-footer-widgetbar,
    .site-footer-widgetbar .widget li,
    .site-footer .row { 
        background: <?php echo esc_attr( get_theme_mod('qs_footer_background_color', $colorScheme['colors']['qs_footer_background_color'])); ?>; 
        color: <?php echo esc_attr( get_theme_mod('qs_footer_text_color', $colorScheme['colors']['qs_footer_text_color'])); ?>;
        border: none;
    }    


    .site-footer-widgetbar .widget .tag {
        color: <?php echo esc_attr( get_theme_mod('qs_footer_background_color', $colorScheme['colors']['qs_footer_background_color'])); ?>;
        background: <?php echo esc_attr( get_theme_mod('qs_footer_text_color', $colorScheme['colors']['qs_footer_text_color'])); ?>; 
    }

    .site-footer-widgetbar a,
    .site-footer .nav-wrapper a {  
        color: <?php echo esc_attr( get_theme_mod('qs_footer_link_color', $colorScheme['colors']['qs_footer_link_color'])); ?>; 
    }   

    .site-footer .nav-wrapper a:hover {  
        color: <?php echo esc_attr( get_theme_mod('qs_footer_background_color', $colorScheme['colors']['qs_footer_background_color'])); ?>;
        background: <?php echo esc_attr( get_theme_mod('qs_footer_link_hover_color', $colorScheme['colors']['qs_footer_link_hover_color'])); ?>;
    }  

    /*footer-social-menu*/
    .site-footer .site-social .fa-circle {
        color: <?php echo esc_attr( get_theme_mod('qs_footer_link_color', $colorScheme['colors']['qs_footer_link_color'])); ?>; 
    }
    .site-footer .site-social .fa-stack:hover .fa-circle { 
        opacity:0.5;
    }  