<?php
/**
 * Elvinaa: Dynamic CSS Stylesheet
 * 
 */


function elvinaa_dynamic_css_stylesheet() {    
 
    $link_color= sanitize_hex_color(get_theme_mod( 'el_link_color','#555555' ));
    $link_hover_color= sanitize_hex_color(get_theme_mod( 'el_link_hover_color','#555555' ));    

    $heading_color= sanitize_hex_color(get_theme_mod( 'el_heading_color','#444444' ));
    $heading_hover_color= sanitize_hex_color(get_theme_mod( 'el_heading_hover_color','#dd3333' ));    

    $button_color= sanitize_hex_color(get_theme_mod( 'el_button_color','#fe7237' ));
    $button_hover_color= sanitize_hex_color(get_theme_mod( 'el_button_hover_color','#db5218' ));
 

    $footer_bg_color= sanitize_hex_color(get_theme_mod( 'el_footer_bg_color','#000000' ));   
    $footer_content_color= sanitize_hex_color(get_theme_mod( 'el_footer_content_color','#ffffff' ));   
    $footer_links_color= sanitize_hex_color(get_theme_mod( 'el_footer_links_color','#b3b3b3' ));  

    $top_menu_color= sanitize_hex_color(get_theme_mod( 'el_top_menu_color','#000' ));    
    $top_menu_button_color= sanitize_hex_color(get_theme_mod( 'el_top_menu_button_color','#5b9dd9' ));
    $top_menu_button_text_color= sanitize_hex_color(get_theme_mod( 'el_top_menu_button_text_color','#fff' ));
    $top_menu_dd_color= sanitize_hex_color(get_theme_mod( 'el_top_menu_dd_color','#fe7237' ));
    
    //category blinker
    $cat_blinker_color= sanitize_hex_color(get_theme_mod( 'el_cat_blinker_color','#fe7237' ));    
    
 
    $css = '


    a{        
        color: ' . $link_color . '; 
        text-decoration: none;
        transition: all 0.3s ease-in-out; 
    }

    a:hover,a:focus{
        color: ' . $link_hover_color . '; 
        text-decoration: none;
        transition: all 0.3s ease-in-out;   
        
    }  

    h1,h2,h3,h4,h5,h6{        
        color: ' . $heading_color . '; 
    }

    h1:hover,
    h2:hover,
    h3:hover,
    h4:hover,
    h5:hover,
    h6:hover{
        color: ' . $heading_hover_color . ';    
    }

    button,
    input[type=submit]{
        background: ' . $button_color . ';
    }

    button:hover,
    input[type=submit]:hover{
        background: ' . $button_hover_color . ' !important;
    }

    .title-date h1>a{
        color: ' . $heading_color . ';    
    }

    .title-date h1>a:hover{
        color: ' . $heading_hover_color . ';    
    }

    #commentform input[type=submit]{
        background: ' . $button_color . ' !important;
    }

    #commentform input[type=submit]:hover{
        background: ' . $button_hover_color . ' !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out; 
    }

    .slide-bg-section .read-more a:hover,
    .slider .slider-button .read-more a:hover,
    .slider-buttons a:hover{
        background: ' . $button_hover_color . ' !important;
        border: 1px solid ' . $button_hover_color . ' !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out;
    }

    .btn-default{
        background: ' . $button_color . ' !important;
        border: 1px solid ' . $button_color . ' !important;
    }

    .btn-default:hover{
        background: ' . $button_hover_color . ' !important;
    }

    .slider-buttons a .btn-default{
        background:none !important;
    }

    .pagination .nav-links .current{
        background: ' . $link_color . ' !important;
    }

    footer#footer {        
        background: ' . $footer_bg_color . ';
        color: ' . $footer_content_color . ';
    }

    footer h4{
        color: ' . $footer_content_color . ';   
    }

    footer#footer a,
    footer#footer a:hover{
        color: ' . $footer_links_color . ';      
    }

    #elvinaa-main-menu-wrapper .nav>li>a,
    #elvinaa-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a,
    .site-title a, .site-title a:hover, .site-title a:focus, .site-title a:visited,
    p.site-description,
    .navbar-toggle{
        color: ' . $top_menu_color . ';      
    }

    header.menu-wrapper.fixed nav ul li a,
    header.menu-wrapper.style-2.fixed nav ul li a{
        color: #555;
    }

    .main-menu li.menu-button > a {
        background-color: ' . $top_menu_button_color . ';
        color: ' . $top_menu_button_text_color . ' !important;        
    }

    .main-menu li.menu-button > a:active,
    .main-menu li.menu-button > a:hover {
        background-color: ' . $top_menu_button_color . ';
        color: ' . $top_menu_button_text_color . ' !important;
    }

    header.menu-wrapper.fixed nav ul li.menu-button a, 
    header.menu-wrapper.style-2.fixed nav ul li.menu-button a{
        color: ' . $top_menu_button_text_color . ' !important;   
    }

    .slide-bg-section h1,
    .slide-bg-section,
    .slide-bg-section .read-more a{
        color: #fff !important;         
    }

    .slide-bg-section .read-more a,
    .scroll-down .mouse{
        border: 1px solid: #fff !important;         
    }

    .slide-bg-section .read-more a{
        background: #fff;
        color: ' . $button_color . ' !important; 
    }

    .slider .slider-button .read-more a{
        background: #fff;
        color: ' . $button_color . ' !important; 
    }

    .blog-wrapper .read-more a{
        background: ' . $button_color . ' !important;
    }

    .blog-wrapper .read-more a:hover{
        background: ' . $button_hover_color . ' !important;   
    }

    form.wpcf7-form input,
    form.wpcf7-form textarea,
    form.wpcf7-form radio,
    form.wpcf7-form checkbox{
        border: none;
        color: #555;
    }

    form.wpcf7-form input::placeholder,
    form.wpcf7-form textarea::placeholder{
        color: #555;
    }

    form.wpcf7-form input[type="submit"]{
        color: #fff;
    }

    form.wpcf7-form input[type="submit"]:hover{
        background: ' . $button_hover_color . ' !important;
        color: #fff;
    }

    form.wpcf7-form label{
        color: #555;               
    }

    button.navbar-toggle,
    button.navbar-toggle:hover{
        background: none !important;
        box-shadow: none;
    }

    .style1 button.navbar-toggle,
    .style1 button.navbar-toggle:hover{
        margin: auto !important;
    }

    .style1 .navbar-toggle {
        float: none;
    }

    .title-date p:after{
        border-bottom: 2px solid ' . $cat_blinker_color . ';   
    }

    .btntoTop.active:hover{
        background: ' . $button_color . ';
        border: 1px solid ' . $button_color . ';
    }

    .menu-social li a{
        color: ' . $link_color . '; 
    }

    .menu-social li a:hover{
        color: ' . $link_hover_color . '; 
    }

';

if(false===get_theme_mod( 'el_home_dark_overlay',true)) {
    $css .='        
         #parallax-bg #slider-inner:before{            
            background: none !important;    
            opacity: 0.8;            
        }           
    ';  
}

if(true===get_theme_mod( 'el_page_dark_overlay',false)) {
    $css .='        
         .page-title .img-overlay{
            background: rgba(0,0,0,.5);
            color: #fff;
        }          
    ';  
}

if(false===get_theme_mod( 'el_author_display',true)) {
    $css .='        
        .blog-wrapper .author-image{
            display: none;
         }

        .blog-wrapper .meta {
            margin-top: 20px;
        }           

        .blog-wrapper .content {
            margin-top: 30px;
        }

        .author-whitespace{
            margin-top: 0;
        }
    ';  
}

if(true===get_theme_mod( 'el_cat_blinker',false)) {
    $css .='        
        .circle-ripple .dot:before{
            content:"";
            position: absolute;
            z-index:2;
            left:0;
            top:0px;
            width:10px;
            height:10px; 
            background-color: ' . $cat_blinker_color . ';
            border-radius: 50%;
        }

        .circle-ripple .dot:after {
            content:"";
            position: absolute;
            z-index:1;
            width:10px;
            height:10px; 
            background-color: ' . $cat_blinker_color . ';
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0,0,0,.3) inset;
            -webkit-animation-name:ripple;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: ease;
            -webkit-animation-delay: 0s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: normal;
        }  
    ';  
}
else{
    $css .='
        .circle-ripple .dot:before{
            content:"";
            position: absolute;
            z-index:2;
            left:0;
            top:0px;
            width:10px;
            height:10px; 
            background-color: ' . $cat_blinker_color . ';
            border-radius: 50%;
        }

        .circle-ripple .dot:after {
            content:"";
            position: absolute;
            z-index:1;
            width:10px;
            height:10px; 
            background: none;
            border-radius: 50%;
            box-shadow: 0;
            -webkit-animation-name:none;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: ease;
            -webkit-animation-delay: 0s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: normal;
        }
    ';
}

if('one'===get_theme_mod( 'el_post_columns','two')) {
    $css .='        
         article.post {
            width: 100%;
            display: block;
            vertical-align: top;
        }         
    ';  
}
else{
    $css .='        
         article.post {
            width: 49%;
            display: inline-block;
            vertical-align: top;
        }    

        .blog-wrapper h1{
            font-size: 25px;
        } 

        article.sticky,
        .single article{
            width: 100%;
        }    

        article.sticky .blog-wrapper h1,
        .single article .blog-wrapper h1{
            font-size: 38px;
        }

    '; 
}

if('right'===get_theme_mod( 'el_blog_sidebar','right')) {
    $css .='        
         article{
            padding-right: 20px;
        }         
    ';
}
else{
    $css .='        
         article{
            padding-left: 20px;
        }         
    ';
}

if(is_active_sidebar('footer-column1') || is_active_sidebar('footer-column2') || is_active_sidebar('footer-column3') || is_active_sidebar('footer-column4')){
    $css .='        
        footer#footer{
            padding-top: 50px;
        }
    ';
}

if("slider" != esc_attr(get_theme_mod( 'el_slide_options_radio' ))) {
	$css .='        
        .header-outer{
            margin-top: 0 !important;
        }
    ';
}

if(is_page()) {
    $css .='        
        .header-outer{
            margin-top: 200px !important;
        }
    ';
}

return apply_filters( 'elvinaa_dynamic_css_stylesheet', $css);
}




?>


