<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plaser
 */

$GLOBALS['plaser_theme_options']  = plaser_get_theme_options();
global $plaser_theme_options;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="boxed">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'plaser' ); ?></a>
	<header id="masthead" class="site-header" role="banner">

		<div class="mid-header">
			<div class="container">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
					<?php 
					if(  has_nav_menu( 'primary' ) ){
					 wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
					} ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<div class="top-header">
			<div class="container">
				<div class="site-branding">
					<?php if(!has_custom_logo()){
					     if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;
						   $description = get_bloginfo( 'description', 'display' );
						?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php }else{
								if ( function_exists( 'the_custom_logo' ) ) :
			                          the_custom_logo();
			            endif;
						} ?>
				</div><!-- .site-branding -->
				 
			</div>
		</div>

	</header><!-- #masthead -->


	<div id="content" class="site-content">
		<div class="container">
		<?php if(is_front_page() || is_home() ) : ?>
			<?php if ( get_header_image() ) : ?>
			<img src="<?php echo esc_url( get_header_image()) ; ?>">
		<?php endif; endif;


		
