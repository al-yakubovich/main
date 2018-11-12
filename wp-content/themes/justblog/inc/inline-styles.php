<?php
/**
 * Add inline styles to the head area
 * @package JustBlog
*/
 
 // Dynamic styles
function justblog_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	

// content
	$justblog_sitetitle = get_theme_mod( 'justblog_sitetitle', '#000' );
	$justblog_site_tagline = get_theme_mod( 'justblog_site_tagline', '#989898' );
	$justblog_curve_header_bg = get_theme_mod( 'justblog_curve_header_bg', '#c9b04c' );
	$justblog_curve_mask = get_theme_mod( 'justblog_curve_mask', '#ffffff' );
	$justblog_body_text = get_theme_mod( 'justblog_body_text', '#656565' );
	$content_bg = get_theme_mod( 'content_bg', '#ffffff' );
	$justblog_content_top_borders = get_theme_mod( 'justblog_content_top_borders', '#dedede' );
	$justblog_copyright_bg = get_theme_mod( 'justblog_copyright_bg', '#000' );
	$justblog_copyright_text = get_theme_mod( 'justblog_copyright_text', '#c1c1c1' );
	$justblog_headings = get_theme_mod( 'justblog_headings', '#484848' );
	$justblog_meta = get_theme_mod( 'justblog_meta', '#989898' );
	$justblog_featured_bg = get_theme_mod( 'justblog_featured_bg', '#484848' );
	$justblog_featured_label = get_theme_mod( 'justblog_featured_label', '#fff' );
	$justblog_alternate_blog_bg = get_theme_mod( 'justblog_alternate_blog_bg', '#f5f5f5' );
	$justblog_footer_sidebar_bg = get_theme_mod( 'justblog_footer_sidebar_bg', '#a6966f' );
	$justblog_footer_sidebar_text = get_theme_mod( 'justblog_footer_sidebar_text', '#f2efea' );
	$justblog_links = get_theme_mod( 'justblog_links', '#c0a127' );
	$justblog_vlinks = get_theme_mod( 'justblog_vlinks', '#a98e22' );
	$justblog_tags_bg = get_theme_mod( 'justblog_tags_bg', '#c9b04c' );
	$justblog_tags_text = get_theme_mod( 'justblog_tags_text', '#fff' );
	$justblog_entry_tags_bg = get_theme_mod( 'justblog_entry_tags_bg', '#909090' );
	$justblog_entry_tags_text = get_theme_mod( 'justblog_entry_tags_text', '#fff' );
	$justblog_comments_container = get_theme_mod( 'justblog_comments_container', '#f8f8f8' );
	$custom .= "body {color:" . esc_attr($justblog_body_text) . "}
	#site-title a, .site-title a:visited {color:" . esc_attr($justblog_sitetitle) . "}
	#site-description {color:" . esc_attr($justblog_site_tagline) . "}
	#site-header-wrapper {background-color:" . esc_attr($justblog_curve_header_bg) . " }
	#header-curve {border-color:" . esc_attr($justblog_curve_mask) . "}
	#header-curve path {fill: " . esc_attr($justblog_curve_mask) . "!important}
	#page {background-color:" . esc_attr($content_bg) . "}
	.blog14 .hentry {background-color:" . esc_attr($justblog_alternate_blog_bg) . "}
	#site-footer {background-color:" . esc_attr($justblog_copyright_bg) . "}
	#site-footer, #site-footer a, #site-footer a:visited, #site-footer .social-menu a:before {color:" . esc_attr($justblog_copyright_text) . "}
	#main, #left-sidebar .widget:first-child, #right-sidebar .widget:first-child {border-color:" . esc_attr($justblog_content_top_borders) . "}
	h1, h2, h3, h4, h5, h6, .entry-title a, .entry-title a:visited {color:" . esc_attr($justblog_headings) . "}
	a, #left-sidebar li a:hover, #right-sidebar li a:hover {color:" . esc_attr($justblog_links) . "}	
	a:visited {color:" . esc_attr($justblog_vlinks) . "}
	.entry-meta, .entry-meta a {color:" . esc_attr($justblog_meta) . "}
	 li.sticky-post span {background-color:" . esc_attr($justblog_featured_bg) . "; color:" . esc_attr($justblog_featured_label) . "}
	#footer-sidebar {background-color:" . esc_attr($justblog_footer_sidebar_bg) . "}
	#footer-sidebar, #footer-sidebar .widget-title {color:" . esc_attr($justblog_footer_sidebar_text) . "}	
	.widget_tag_cloud a {background-color:" . esc_attr($justblog_tags_bg) . "; color:" . esc_attr($justblog_tags_text) . " }
	.entry-tags a {background-color:" . esc_attr($justblog_entry_tags_bg) . "; color:" . esc_attr($justblog_entry_tags_text) . " }
	#comments {background-color:" . esc_attr($justblog_comments_container) . "; }
	"."\n";
	
// navigation
	$justblog_social_bg = get_theme_mod( 'justblog_social_bg', '#ab9641' );
	$justblog_social_icon = get_theme_mod( 'justblog_social_icon', '#fff8db' );
	$justblog_mobile_toggle_bg = get_theme_mod( 'justblog_mobile_toggle_bg', '#ab9641' );
	$justblog_mobile_toggle_icon = get_theme_mod( 'justblog_mobile_toggle_icon', '#fff' );
	$justblog_mobile_bg = get_theme_mod( 'justblog_mobile_bg', '#000' );
	$justblog_mobile_links = get_theme_mod( 'justblog_mobile_links', '#c5c5c5' );
	$justblog_mobile_hlinks = get_theme_mod( 'justblog_mobile_hlinks', '#bfbb9c' );
	$justblog_menu_links = get_theme_mod( 'justblog_menu_links', '#989793' );
	$justblog_menu_hlinks = get_theme_mod( 'justblog_menu_hlinks', '#c9b04c' );
	$justblog_submenu_border = get_theme_mod( 'justblog_submenu_border', '#f4f4f4' );
	$justblog_submenu_bottom_border = get_theme_mod( 'justblog_submenu_bottom_border', '#c9b04c' );
	$custom .= ".social-menu a {background-color:" . esc_attr($justblog_social_bg) . "}
	.social-menu a:before {color:" . esc_attr($justblog_social_icon) . "}	
	#mobile-nav-toggle, body.mobile-nav-active #mobile-nav-toggle {background-color:" . esc_attr($justblog_mobile_toggle_bg) . "; color:" . esc_attr($justblog_mobile_toggle_icon) . "}	
	#mobile-nav {background-color:" . esc_attr($justblog_mobile_bg) . ";}	
	#mobile-nav ul li a, #mobile-nav ul .menu-item-has-children i.fa-angle-up, #mobile-nav ul i.fa-angle-down {color:" . esc_attr($justblog_mobile_links) . ";}	
	#mobile-nav ul li a:hover, #mobile-nav ul .current_page_item a {color:" . esc_attr($justblog_mobile_hlinks) . ";}
	#main-nav a {color:" . esc_attr($justblog_menu_links) . ";}
	#main-nav a:hover, #main-nav li:hover > a,#main-nav .current-menu-item > a,#main-nav .current-menu-ancestor > a {color:" . esc_attr($justblog_menu_hlinks) . ";}	
	#main-nav a, #main-nav ul {border-color:" . esc_attr($justblog_submenu_border) . ";}
	#main-nav ul {border-bottom-color:" . esc_attr($justblog_submenu_bottom_border) . ";}	
	"."\n";
	
// sidebars
	$justblog_widget_menu = get_theme_mod( 'justblog_widget_menu', '#989898' );
	$custom .= "#right-sidebar .widget_nav_menu a { color:" . esc_attr($justblog_widget_menu) . "}
	"."\n";
	
// forms
	$justblog_button_bg = get_theme_mod( 'justblog_button_bg', '#1a1a1a' );
	$justblog_button_label = get_theme_mod( 'justblog_button_label', '#fff' );
	$justblog_button_hbg = get_theme_mod( 'justblog_button_hbg', '#c9b04c' );
	$justblog_button_hlabel = get_theme_mod( 'justblog_button_hlabel', '#fff' );
	$justblog_field_bg = get_theme_mod( 'justblog_field_bg', '#f7f7f7' );
	$justblog_field_border = get_theme_mod( 'justblog_field_border', '#d1d1d1' );
	$custom .= ".button,button,button:visited,input[type=\"button\"],input[type=\"button\"]:visited,input[type=\"reset\"],input[type=\"reset\"]:visited,input[type=\"submit\"],input[type=\"submit\"]:visited,.image-navigation a,
.image-navigation a:visited {background-color:" . esc_attr($justblog_button_bg) . "; color:" . esc_attr($justblog_button_label) . "}
	.button:hover, .button:focus, button:hover, button:focus,  input[type=\"button\"]:hover,input[type=\"button\"]:focus,input[type=\"reset\"]:hover,input[type=\"reset\"]:focus,input[type=\"submit\"]:hover,input[type=\"submit\"]:focus,.image-navigation a:focus,
.image-navigation a:hover {background-color:" . esc_attr($justblog_button_hbg) . "; color:" . esc_attr($justblog_button_hlabel) . "}
	input[type=\"date\"], input[type=\"time\"], input[type=\"datetime-local\"], input[type=\"week\"], input[type=\"month\"], input[type=\"text\"], input[type=\"email\"], input[type=\"url\"], input[type=\"password\"], input[type=\"search\"], input[type=\"tel\"], input[type=\"number\"], textarea {background-color:" . esc_attr($justblog_field_bg) . "; border-color:" . esc_attr($justblog_field_border) . "}
	"."\n";
	
// dropcap		
	if( esc_attr(get_theme_mod( 'justblog_show_dropcap', false ) ) ) :
		$justblog_dropcap_colour = get_theme_mod( 'justblog_dropcap_colour', '#333' );		
		$custom .= ".single-post .entry-content > p:first-of-type::first-letter {
		font-weight: 700;
		font-style: normal;
		font-family: \"Times New Roman\", Times, serif;
		font-size: 5.25rem;
		font-weight: normal;
		line-height: 0.8;
		float: left;
		margin: 4px 0 0;
		padding-right: 8px;
		text-transform: uppercase;
		}
		.single-post .entry-content h2 ~ p:first-of-type::first-letter {
			font-size: initial;	
			font-weight: initial;	
			line-height: initial; 
			float: initial;	
			margin-bottom: initial;	
			padding-right: initial;	
			text-transform: initial;
		}	
		.single-post .entry-content > p:first-of-type::first-letter {color:" . esc_attr($justblog_dropcap_colour) . "}"."\n";
	endif;

// If no bottom widgets published
 if ( is_active_sidebar( 'bottom1'  )
	|| is_active_sidebar( 'bottom2' )
	|| is_active_sidebar( 'bottom3'  )		
	|| is_active_sidebar( 'bottom4'  ) ) :
	$custom .= "#bottom-background-photo {padding-top: 0;  padding-bottom: 300px;}"."\n";
else :
// If at least 1 widget is published
	$custom .= "#bottom-background-photo {padding-top: 10%;  padding-bottom: 10%;}"."\n";
endif;

 
// END CUSTOM CSS

//Output all the styles
	wp_add_inline_style( 'justblog-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'justblog_inline_styles' );	