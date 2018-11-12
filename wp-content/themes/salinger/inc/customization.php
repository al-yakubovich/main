<?php
/**
 * This file adds custom CSS (Customizer options).
 *
 * @package Salinger
 */

add_action( 'wp_enqueue_scripts', 'salinger_customization', 11 );
/**
 * Output CSS (Customizer options).
 *
 * @since 1.0.0
 */
function salinger_customization() {

	$color          = esc_html( get_theme_mod( 'salinger_theme_color', '#DD4040' ) );
	$color_contrast = salinger_color_contrast( $color );
	$font_opt       = esc_html( get_theme_mod( 'salinger_fonts', 'Arimo' ) );

	$font = "body.custom-font-enabled {font-family: '$font_opt', Arial, Verdana;}";

	$top_bar_color = get_theme_mod( 'salinger_top_bar_color', '#222222' );
	$top_bar_color_contrast = salinger_color_contrast( $top_bar_color, '#cacaca' );

	$menu_position = get_theme_mod( 'salinger_menu_position', 'inline_with_logo' ) === 'below_the_logo' ?
	'.site-header > .inner-wrap{
		max-width:100%;
	}
	.site-branding-wrapper,
	.main-navigation-wrapper{
		float:none;
		text-align:center;
		max-width:100%;
	}
	.site-branding-wrapper{
		margin-top:7px;
	}
	.main-navigation{
		margin-top:14px;
	}
	.main-navigation ul.nav-menu{
		text-align:center;
	}' : '';

	$color_widget_title = ( get_theme_mod( 'salinger_color_widget_title', '' ) == 1 ) ?
	"h3.widget-title{background-color:$color;}
	.widget-title-tab{color:$color_contrast;}
	.widget-title-tab a.rsswidget{color:$color_contrast !important;}" : '';

	$excerpt_title_color = ( get_theme_mod( 'salinger_color_excerpt_title', '' ) == 1 ) ?
	".entry-title a, entry-title a:visited {color:$color;}" : '';

	$thumbnail_rounded = ( get_theme_mod( 'salinger_thumbnail_rounded', '' ) == 1 ) ?
	'.wrapper-excerpt-thumbnail img {border-radius:50%;}' : '';

	$text_justify = ( get_theme_mod( 'salinger_text_justify', '' ) == 1 ) ?
	'.entry-content {text-align:justify;}' : '';

	$sidebar_position = ( get_theme_mod( 'salinger_sidebar_position', 'right' ) === 'left' ) ?
	'@media screen and (min-width: 960px) {
		.site-content {float:right;}
		.widget-area {float:left;}
	}' : '';

	$excerpt_border_color = ( get_theme_mod( 'salinger_color_excerpt_border', '' ) == 1 ) ?
	".excerpt-wrapper{border-left:2px solid $color;}" : '';

	$css = "$font
	$menu_position $color_widget_title $excerpt_title_color $thumbnail_rounded $text_justify $sidebar_position $excerpt_border_color
	.site-header,
	.main-navigation .sub-menu{
		border-top-color:$color;
	}
	.top-bar {
		background-color:$top_bar_color;
		color:$top_bar_color_contrast;
	}
	.top-bar a,
	.top-bar .fa-search{
		color: $top_bar_color_contrast;
	}
	a,
	a:hover,
	a:focus,
	.main-navigation .current-menu-item > a,
	.main-navigation li a:hover,
	.site-header h1 a:hover,
	.social-icon-wrapper a:hover,
	.sub-title a:hover,
	.entry-header .entry-title a:hover,
	.entry-content a,
	.entry-content a:visited,
	.entry-meta a:hover,
	.site-content .nav-single a:hover,
	.comment-content a:visited,
	.comments-area article header a:hover,
	a.comment-reply-link:hover,
	a.comment-edit-link:hover,
	.widget-area .widget a:hover,
	footer[role='contentinfo'] a:hover {
		color: $color;
	}
	button,
	input[type='submit'],
	input[type='button'],
	input[type='reset'],
	.bypostauthor cite span,
	.wrapper-widget-area-footer .widget-title:after,
	.ir-arriba:hover,
	.currenttext,
	.paginacion a:hover,
	.sticky-excerpt-label,
	.read-more-link:hover  {
		background-color:$color;
		color:$color_contrast;
	}
	#wp-calendar a{
		font-weight:bold; color: $color;
	}
	.widget .widget-title-tab a.rsswidget{
		color:$color_contrast;
	}
	.page-numbers.current,
	.page-numbers:not(.dots):hover,
	.widget-area .widget a.tag-cloud-link:hover,
	.wrapper-widget-area-footer .tag-cloud-link:hover{
		background-color: $color;
		color: $color_contrast !important;
	}";

	wp_add_inline_style( 'salinger-style', $css );

}
