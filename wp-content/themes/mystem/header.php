<?php
	/**
		* the header element and the opening of the main content elements
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	$title = get_bloginfo( 'name' );	
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>		
		<?php wp_head(); ?>		
	</head>
	<body <?php body_class(); ?>>
		<div class="header-area full">
			<header id="masthead" class="site-header main inner" role="banner">
				<div class="header-elements">					
					<?php if ( wp_nav_menu( array( 'theme_location' => 'mobileleft', 'echo' => false, 'fallback_cb' => '__return_false' ) ) !== false) { 
					?>
					<span class="mobile-left-menu"><i class="<?php echo get_theme_mod( 'mystem_mobile_menu_left', 'fas fa-bars' );?>"></i></span>
					<div id="mobile-left-menu" class="mobile-menu left closed">					
						<i class="fas fa-times"></i>
						<?php
							wp_nav_menu( array( 'theme_location' => 'mobileleft', 'menu_class' => 'mobile-dropdown' ) );
						?>
					</div>
					<?php
					} 
					else { ?>
					<span></span>
					<?php
					}				
					?>
					<span class="site-title">
						<?php if ( has_custom_logo() ) {
							the_custom_logo();
						} 
						else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $title ); ?>">
							<?php echo esc_html( $title ); ?>
						</a>
						<?php } ?>
					</span>					
					<?php if ( wp_nav_menu( array( 'theme_location' => 'mobileright', 'echo' => false, 'fallback_cb' => '__return_false' ) ) !== false) { 
					?>
					<span class="mobile-right-menu"><i class="<?php echo get_theme_mod( 'mystem_mobile_menu_right', 'fas fa-bars' );?>"></i></span>
					<div id="mobile-right-menu" class="mobile-menu right closed">					
						<i class="fas fa-times"></i>
						<?php
							wp_nav_menu( array( 'theme_location' => 'mobileright', 'menu_class' => 'mobile-dropdown' ) );
						?>
					</div>
					<?php
					} 
					else { ?>
					<span></span>
					<?php
					}				
					?>
					<?php if ( ! get_theme_mod( 'mystem_header_menu' ) ) : ?>
					<nav id="header-navigation" class="header-menu" role="navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'header',
							'fallback_cb' => 'mystem_menu_fallback',
						) ); ?>
					</nav>
					<?php endif; ?>
				</div>
			</header>
			<?php if ( ! get_theme_mod( 'mystem_primary_menu' ) ) : ?>
			<div class="main-menu-container">
				<nav id="site-navigation" class="main main-navigation clear" role="navigation">
					
					<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mystem' );?></a>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'fallback_cb' => 'mystem_menu_fallback',
					) ); ?>
					<?php if ( ! get_theme_mod( 'mystem_search' ) ) : ?>
					<div class="search-form">
						<?php get_search_form(); ?>
					</div>	
					<?php endif; ?>
				</nav>
			</div>
			<?php endif; ?>
		</div>
		<div class="main-content-area full">
			<div class="main">
				<div id="content" class="site-content inner">