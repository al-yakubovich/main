<?php
/**
 * The Header template for our theme
 *
 * @package RubberSoul
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper-cabecera">
			<div class="blogname-y-menu">
				<div class="boton-menu-movil"><i class="fa fa-align-justify fa-2x"></i></div>
				<?php
				if (get_header_image()){ ?>
					<div class="header-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php esc_attr( header_image() ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
					</div>
				<?php } ?>

				<?php
				if (get_theme_mod('rubbersoul_pro_mostrar_titulo_descripcion', 1) == 1) { ?>
				<div class="titulo-descripcion">

					<?php
					if ( is_front_page() && is_home() ) { ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					}else{ ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php } ?>

					<p class="site-description"><?php bloginfo( 'description' ); ?></p>

				</div>
			<?php } ?>

				<div class="toggle-search"><i class="fa fa-search"></i></div>

				<div style="position:relative;"><?php get_template_part(RUBBERSOUL_TEMPLATE_PARTS . 'menu-movil'); ?></div>

				<div class="wrapper-site-navigation">
					<nav id="site-navigation" class="main-navigation" role="navigation">

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					<div class="wrapper-search-top-bar"><div class="search-top-bar"><?php get_template_part(RUBBERSOUL_TEMPLATE_PARTS . 'searchform-toggle'); ?></div></div>
				</div><!-- .wrapper-site-navigation -->

			</div><!-- .blogname-y-menu -->

		</div><!-- wrapper-cabecera -->

	</header><!-- #masthead -->

	<div id="page" class="hfeed site">

	<div id="main" class="wrapper">
