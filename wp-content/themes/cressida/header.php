<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and logo, navigation, header widgets
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cressida
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="main-wrapper">

	<header class="header" role="banner">
		<div class="row">
			<?php
				/**
				 * Header Left Widgets
				 */
				get_sidebar( 'header-left' );
				/**
				 * Main navigation
				 */
				get_template_part( 'parts/navigation', 'header' );
				/**
				 * Header Right Widgets
				 */
				get_sidebar( 'header-right' );
			?>
		</div>
	</header>

	<main class="main" role="main">
		<div class="container container--background container--site-identity">
			<?php

				/**
				 * Site identity
				 */
				get_template_part( 'parts/site', 'identity' );
			?>
		</div><!-- container -->

