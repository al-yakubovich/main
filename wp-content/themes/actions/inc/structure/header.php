<?php
/**
 * Template functions used for the site header.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function actions_site_branding() {
		
	?>
		<div class="main">
			<div class="header-elements">				
				<div class="header-title">
					<?php actions_the_custom_logo(); ?>
					<span class="site-title">
					<?php					
						$title = get_bloginfo('name');
						$description = get_bloginfo( 'description'); ?>						
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $description ); /* WPCS: xss ok. */ ?>" alt="<?php echo esc_attr( $title ); ?>">
							<?php bloginfo( 'name' ); ?>
						</a>
					</span>
				</div>
				<?php do_action( 'actions_header_extras' ) ?>
			</div>
		</div>
			
	<?php 
	}
}

if ( ! function_exists( 'actions_header_widgets' ) ) {
	function actions_header_widgets() {
		// Hide header widgets, if both header sidebars are not in use.
		if ( is_active_sidebar( 'header-widgets-left' ) || is_active_sidebar( 'header-widgets-right' ) ) {
		?>
			<div class="header-widgets">
				<!--<div class="main">-->
				<!-- Header widget left area -->
				<?php if ( is_active_sidebar( 'header-widgets-left' ) ) : ?>
					<div class="header-widgets__left">
						<?php dynamic_sidebar( 'header-widgets-left' ); ?>
					</div>
				<?php endif; ?>
				<!-- Header widget right area -->
				<?php if ( is_active_sidebar( 'header-widgets-right' ) ) : ?>
					<div class="header-widgets__right">
						<?php dynamic_sidebar( 'header-widgets-right' ); ?>
					</div>
				<?php endif; ?>
				<!--</div>-->
			</div>
		<?php }
	}
}

if ( ! function_exists( 'actions_header_widget' ) ) {
	function actions_header_widget() {
		if ( is_active_sidebar( 'sidebar-header' )  ) { ?>
			<div id="secondary" class="widget-area" role="complementary">					 
	            <?php dynamic_sidebar( 'sidebar-header' ); ?>
			</div><!-- .sidebar .widget-area -->
		<?php }
	}
}

if ( ! function_exists( 'actions_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function actions_primary_navigation() {
		if ( has_nav_menu( 'primary' ) ) : ?>
			<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'actions' ); ?></button>
			<div id="site-header-menu" class="site-header-menu">
				<div class="main">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'actions' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
							) );
						?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>
				</div>
			</div><!-- .site-header-menu -->
		<?php endif; ?>
	<?php
	}
}

if ( ! function_exists( 'actions_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.4.1
	 * @return void
	 */
	function actions_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php _e( 'Skip to navigation', 'actions' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'actions' ); ?></a>
		<?php
	}
}