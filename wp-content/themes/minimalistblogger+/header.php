<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minimalistblogger
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="masthead" class="sheader site-header clearfix">
			<div class="content-wrap">
				<?php if ( has_custom_logo() ) : ?>
				<div class="site-branding branding-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php else : ?>
			<div class="site-branding">
				<!-- If frontpage, make title h1 -->
				<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
			$description = esc_html( get_bloginfo( 'description', 'display' ) );
			if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif;
			?>
		</div>
		<?php
		endif;
		?>
	</div>
	<nav id="primary-site-navigation" class="primary-menu main-navigation clearfix">
		<a href="#" id="pull" class="smenu-hide toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'minimalistblogger' ); ?></a>
		<div class="content-wrap text-center">
			<div class="center-main-menu">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'menu-1',
					'menu_id'			=> 'primary-menu',
					'menu_class'		=> 'pmenu'
					) );
					?>
				</div>
			</div>
		</nav>
		<div class="super-menu clearfix">
			<div class="super-menu-inner">
				<a href="#" id="pull" class="toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'minimalistblogger' ); ?></a>
			</div>
		</div>
		<div id="mobile-menu-overlay"></div>
	</header>

	<?php if ( get_header_image() ) : ?>
	<div class="content-wrap">
		<div class="bottom-header-wrapper">
			<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt="<?php echo esc_attr(( get_bloginfo( 'title' )) ); ?>" />
		</div>
	</div>
<?php endif; ?>

<div class="content-wrap">
	<div class="header-widgets-wrapper">
		<?php if ( is_active_sidebar( 'headerwidget-1' ) ) : ?>
		<div class="header-widgets-three header-widgets-left">
			<?php dynamic_sidebar( 'headerwidget-1' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'headerwidget-2' ) ) : ?>
	<div class="header-widgets-three header-widgets-middle">
		<?php dynamic_sidebar( 'headerwidget-2' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'headerwidget-3' ) ) : ?>
	<div class="header-widgets-three header-widgets-right">
		<?php dynamic_sidebar( 'headerwidget-3' ); ?>				
	</div>
<?php endif; ?>
</div>
</div>

<div id="content" class="site-content clearfix">
	<div class="content-wrap">
