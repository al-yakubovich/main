<?php
/**
 * @package RubberSoul
 */
add_action ('wp_head', 'rubbersoul_customizer_css');
function rubbersoul_customizer_css() {
	?>
	<style type='text/css'>
	<?php
	$color = esc_html(get_theme_mod('rubbersoul_color_tema', '#0098D3'));
	?>
	a {color: <?php echo $color; ?>;}
	a:hover {color: <?php echo $color; ?>;}
	.social-icon-wrapper a:hover {color: <?php echo $color; ?>;}
	.prefix-widget-title {color: <?php echo $color; ?>;}
	.term-icon {color: <?php echo $color; ?>;}
	.wrapper-search-top-bar {background-color:<?php echo $color; ?>;}
	.sub-title a:hover {color:<?php echo $color; ?>;}
	.entry-content a:visited,.comment-content a:visited {color:<?php echo $color; ?>;}
	input[type="submit"] {background-color:<?php echo $color; ?> !important;}
	.bypostauthor cite span {background-color:<?php echo $color; ?>;}
	.wrapper-cabecera {background-color:<?php echo $color; ?>;}
	.main-navigation {background-color:<?php echo $color; ?>;}
	.entry-header .entry-title a:hover {color:<?php echo $color; ?> ;}
	.archive-header {border-left-color:<?php echo $color; ?>;}
	.featured-post {border-left-color:<?php echo $color; ?> !important;}
	.main-navigation a:hover,
	.main-navigation a:focus {
		color: <?php echo $color; ?>;
	}
	.widget-area .widget a:hover {
		color: <?php echo $color; ?> !important;
	}
	footer[role="contentinfo"] a:hover {
		color: <?php echo $color; ?>;
	}
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
	h2.comments-title {border-left-color:<?php echo $color; ?>;}

	<?php if (get_theme_mod('rubbersoul_color_excerpt_title', '') == 1) { ?>
		.entry-title a, entry-title a:visited {color:<?php echo $color; ?>;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_selected_text_bg_color', '') == 1) { ?>
		::selection {background-color:<?php echo $color; ?>; color:#ffffff;}
		::-moz-selection {background-color:<?php echo $color; ?>; color:#ffffff;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_desbordar_logo', 1) == 1) { ?>
		.wrapper-cabecera {
			height:70px;
			height:5rem;
			overflow: inherit;
		}
		#page{clear:both;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_ajustar_tam_logo', 1) == '') { ?>
		.header-logo {max-width:none;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_transparencia_logo', '') == 1) { ?>
		.header-logo {background-color:transparent;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_logo_cuadrado', '') == 1) { ?>
		.header-logo {border-radius:0;}
		.header-logo img {border-radius:0;}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_thumbnail_rounded', 1) == '') { ?>
		.wrapper-excerpt-thumbnail img {
	 		border-radius:0;
		}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_text_justify', '') == 1) { ?>
		.entry-content {
			text-align:justify;
		}
	<?php } ?>

	<?php if (get_theme_mod('rubbersoul_titulo_descripcion_no_mayus', '') == 1) { ?>
		.titulo-descripcion {
	 		text-transform:none;
		}
	<?php } ?>

	<?php $fuente = esc_html(get_theme_mod('rubbersoul_fonts', 'Open Sans')); ?>
	body.custom-font-enabled {font-family: "<?php echo $fuente; ?>", Arial, Verdana;}

	<?php
	if (get_theme_mod('rubbersoul_sidebar_position', 'derecha') == 'derecha') : ?>
		@media screen and (min-width: 600px) {
			#primary {float:left;}
			#secondary {float:right;}
			.site-content {
				border-left: none;
				padding-left:0;
				padding-right: 24px;
				padding-right:1.714285714285714rem;
			}
		}
	<?php endif; ?>
	</style>

<?php
}
