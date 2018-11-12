<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Salinger
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<?php do_action( 'salinger_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<?php
		if ( get_theme_mod( 'salinger_display_top_bar', 1 ) == 1 ) {

			get_template_part( SALINGER_TEMPLATE_PARTS . 'top-bar' );
			?>
			<div style="position:relative">
				<?php get_template_part( SALINGER_TEMPLATE_PARTS . 'menu-movil' ); ?>
			</div>
			<?php
		}
		?>
		<div class="inner-wrap">
			<div class="header-inner-wrap">
				<div class="site-branding-wrapper">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					}

					if ( is_home() && is_front_page() ) {
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></h1>

						<h2 class="site-description"><?php esc_html( bloginfo( 'description' ) ); ?></h2>
						<?php
					} else {
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></p>

						<p class="site-description"><?php esc_html( bloginfo( 'description' ) ); ?></p>
						<?php
					}
					?>
				</div><!-- .site-branding-wrapper -->

				<div class="main-navigation-wrapper">
					<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'salinger' ); ?>"><?php esc_html_e( 'Skip to content', 'salinger' ); ?></a>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav-menu',
					) );
					?>
					</nav><!-- #site-navigation -->
				</div><!-- .main-navigation-wrapper -->

			</div><!-- header-inner-wrap -->
		</div><!-- .inner-wrap -->

		<?php
		if ( get_header_image() ) {
			?>
			<div class="header-image-wrapper">
				<img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</div><!-- .header-image-wrapper -->
			<?php
		}

		if ( get_theme_mod( 'salinger_display_top_bar', 1 ) == '' ) {
			?>
			<div class="boton-menu-movil-sin-top-bar">
			<i class="fa fa-align-justify"></i> <?php esc_html_e( 'MENU', 'salinger' ); ?>
			</div>
			<div style="position:relative">
				<?php get_template_part( SALINGER_TEMPLATE_PARTS . 'menu-movil' ); ?>
			</div>
			<?php
		}
		?>
	</header><!-- #masthead -->

	<?php do_action( 'salinger_after_header' ); ?>

	<div id="main">
		<div class="inner-wrap">
			<div class="content-sidebar-inner-wrap">
