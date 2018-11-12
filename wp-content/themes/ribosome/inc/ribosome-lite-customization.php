<?php
/**
 * @package Ribosome
 */

add_action( 'wp_head', 'ribosome_customizer_css' );
function ribosome_customizer_css() {
	?>
	<style type='text/css'>
	<?php
	$color = esc_html(get_theme_mod('ribosome_color_tema', '#00BCD5'));
	?>
	a {color: <?php echo $color; ?>;}
	a:hover {color: <?php echo $color; ?>;}
	.social-icon-wrapper a:hover {color: <?php echo $color; ?>;}
	.toggle-search {color: <?php echo $color; ?>;}
	.prefix-widget-title {color: <?php echo $color; ?>;}
	.sub-title a:hover {color:<?php echo $color; ?>;}
	.entry-content a:visited,.comment-content a:visited {color:<?php echo $color; ?>;}
	button, input[type="submit"], input[type="button"], input[type="reset"] {background-color:<?php echo $color; ?> !important;}
	.bypostauthor cite span {background-color:<?php echo $color; ?>;}
	.entry-header .entry-title a:hover {color:<?php echo $color; ?> ;}
	.archive-header {border-left-color:<?php echo $color; ?>;}
	.main-navigation .current-menu-item > a,
	.main-navigation .current-menu-ancestor > a,
	.main-navigation .current_page_item > a,
	.main-navigation .current_page_ancestor > a {color: <?php echo $color; ?>;}
	.main-navigation li a:hover  {color: <?php echo $color; ?>;}

	.widget-area .widget a:hover {
		color: <?php echo $color; ?> !important;
	}
	footer[role="contentinfo"] a:hover {
		color: <?php echo $color; ?>;
	}
	.author-info a {color: <?php echo $color; ?>;}
	.entry-meta a:hover {
	color: <?php echo $color; ?>;
	}
	.format-status .entry-header header a:hover {
		color: <?php echo $color; ?>;
	}
	.comments-area article header a:hover {
		color: <?php echo $color; ?>;
	}
	a.comment-reply-link:hover,
	a.comment-edit-link:hover {
		color: <?php echo $color; ?>;
	}
	.currenttext, .paginacion a:hover {background-color:<?php echo $color; ?>;}
	.aside{border-left-color:<?php echo $color; ?> !important;}
	blockquote{border-left-color:<?php echo $color; ?>;}
	.logo-header-wrapper{background-color:<?php echo $color; ?>;}
	h3.cabeceras-fp {border-bottom-color:<?php echo $color; ?>;}
	.encabezados-front-page {background-color:<?php echo $color; ?>;}
	.icono-caja-destacados {color: <?php echo $color; ?>;}
	.enlace-caja-destacados:hover {background-color: <?php echo $color; ?>;}
	h2.comments-title {border-left-color:<?php echo $color; ?>;}

	<?php if (get_theme_mod('ribosome_color_top_bar', 1) == 1) { ?>
		.top-bar {
			background-color: <?php echo $color; ?>;
		}
		.social-icon-wrapper a:hover {
			color:#fff;
		}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_color_header_sin_imagen', 1) == 1) { ?>
		.blog-info-sin-imagen {background-color: <?php echo $color; ?>;}
	<?php }else{ ?>
		.blog-info-sin-imagen {
			background-color:#ffffff;
			color:#444444 !important;
		}
		.blog-info-sin-imagen a {
			color:#444444 !important;
		}
		.blog-info-sin-imagen h2 {color:#444444 !important;}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_color_widget_title', 1) == 1) { ?>
		.widget-title-tab{
			background-color:<?php echo $color; ?>;
			color:#fff;
		}
		.widget-title-tab a.rsswidget{color:#fff !important;}
		h3.widget-title { border-bottom:2px solid <?php echo $color; ?>;}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_color_excerpt_title', '') == 1) { ?>
		.entry-title a, entry-title a:visited {color:<?php echo $color; ?>;}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_linea_color_sobre_menu', 1) == 1) { ?>
		.main-navigation {border-top:2px solid <?php echo $color; ?>}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_logo_margins', '') == 1) { ?>
		.logo-header-wrapper {
			padding: 21px 14px;
			padding: 1.5rem 1rem;
		}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_white_header_with_logo', 1) == 1) { ?>
		.logo-header-wrapper {background-color:#ffffff;}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_thumbnail_rounded', '') == 1) { ?>
		.wrapper-excerpt-thumbnail img {
	 		border-radius:50%;
		}
	<?php } ?>

	<?php if (get_theme_mod('ribosome_text_justify', '') == 1) { ?>
		.entry-content {
			text-align:justify;
		}
	<?php } ?>

	<?php $fuente = esc_html(get_theme_mod('ribosome_fonts', 'Open Sans')); ?>
	body.custom-font-enabled {font-family: "<?php echo $fuente; ?>", Arial, Verdana;}

	<?php
	if (get_theme_mod('ribosome_sidebar_position', 'derecha') == 'derecha') : ?>
		@media screen and (min-width: 768px) {
			#primary {float:left;}
			#secondary {float:right;}
			.site-content {
				border-left: none;
				padding-left:0;
				padding-right: 24px;
				padding-right:1.714285714285714rem;
			}

		}
		@media screen and (min-width: 960px) {
			.site-content {
				border-right: 1px solid #e0e0e0;
			}
		}
	<?php endif; ?>

	@media screen and (min-width: 768px) {
	<?php if (get_theme_mod('ribosome_color_excerpt_border', 1) == 1) { ?>
		.excerpt-wrapper{border-left:2px solid <?php echo $color; ?>;}
	<?php } ?>

	<?php if(get_theme_mod( 'ribosome_fondo_menu_negro', 1) == 1) { ?>

		.main-navigation ul.nav-menu,
		.main-navigation div.nav-menu > ul {
			background-color:#222222;
			border-top:none;
			border-bottom:none;
		}
		.main-navigation li a {
			color:#EAEAEA;
		}
		.main-navigation li ul li a {
			color:#444;
		}

		.main-navigation li ul li a {
			background-color:#222222;
			color:#eaeaea;
			border-bottom-color:#444444;
		}
		.main-navigation li ul li a:hover {
			background-color:#222222;
			color:<?php echo $color; ?>;
		}

	<?php } ?>

	<?php if (get_theme_mod( 'ribosome_menu_center', '') == 1) { ?>
		#site-navigation ul{text-align:center;}
		#site-navigation ul li ul{text-align:left;}
	<?php } ?>
	}
	</style>

<?php
}
