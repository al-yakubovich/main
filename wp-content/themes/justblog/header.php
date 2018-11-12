<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package JustBlog
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site <?php echo esc_attr(get_theme_mod( 'justblog_boxed_layout', 'full' ) ) ; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'justblog' ); ?></a>

	<div id="site-header-wrapper">
		<header id="site-header">
		<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
			<div id="header-curve">
					<canvas width="736" height="15"></canvas>
					<svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 736 15">
						<path d="M1040,301V285s-75,12-214,12-284-26-524,0v4Z" transform="translate(-302 -285)" fill="#ffffff"></path>
					</svg>					
				</div>
		</header>
	</div><!-- #site-header-wrapper -->

<div id="jbheader1">
<div id="site-branding" class="container">
	<div class="row align-items-center">
		<div class="col-lg-8">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif; ?>
		</div>
		
		<div class="col-lg-4">
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
			<p id="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>
	</div>
</div><!-- .site-branding -->

	<div id="menu-wrapper" class="container">
		<div class="row">
			<div class="col-lg-12">
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class' => 'nav-menu ',
								'menu_id' => 'main-nav',
								'container' => 'nav',
								'container_id' => 'main-nav-container'
							) ); 
						?>
			</div>
		</div>
	</div>

</div>
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>
	
	<div id="content" class="site-content container">
	<div class="row">