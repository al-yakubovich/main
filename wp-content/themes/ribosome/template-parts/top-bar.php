<?php
/**
 * Display Top Bar
 *
 * @package Ribosome
 */

?>
<div class="top-bar">
		<?php $palabra_menu = ( get_theme_mod( 'ribosome_mostrar_menu_junto_icono', '' ) == 1 ) ? ' ' . esc_attr( __( 'MENU', 'ribosome' ) ) : ''; ?>

		<div class="boton-menu-movil"><i class="fa fa-align-justify"></i><?php echo $palabra_menu; ?></div>

		<?php if ( get_theme_mod( 'ribosome_blog_title_top_bar', 1 ) == 1 ) { ?>
			<div class="blog-title-wrapper">
				<?php
				if ( is_front_page() && is_home() ) {
					?>
					<h1 class="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
					<?php
				} else {
					echo esc_attr( get_bloginfo( 'name', 'display' ) );
				}
				?>
			</div>
		<?php } ?>

		<div class="toggle-search"><i class="fa fa-search"></i></div>
		<div class="social-icon-wrapper">
			<?php if ( get_theme_mod( 'ribosome_twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_twitter_url', 'https://twitter.com' ) ); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_facebook_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_facebook_url', 'https://facebook.com' ) ); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_googleplus_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_googleplus_url', 'https://plus.google.com' ) ); ?>" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_linkedin_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_linkedin_url', 'https://linkedin.com' ) ); ?>" title="LindedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_youtube_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_youtube_url', 'https://youtube.com' ) ); ?>" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_instagram_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_instagram_url', 'http://instagram.com' ) ); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_pinterest_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_pinterest_url', 'https://pinterest.com' ) ); ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_whatsapp_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'ribosome_whatsapp_url', 'https://www.whatsapp.com' ) ); ?>" title="WhatsApp" target="_blank"><i class="fa fa-whatsapp"></i></a>
			<?php } ?>

			<?php if ( get_theme_mod( 'ribosome_rss_url' ) !== '' ) { ?>
				<a class="rss" href="<?php echo esc_url( get_theme_mod( 'ribosome_rss_url', 'http://wordpress.org' ) ); ?>" title="RSS" target="_blank"><i class="fa fa-rss"></i></a>
			<?php } ?>
		</div><!-- .social-icon-wrapper -->
	</div><!-- .top-bar -->

	<div class="wrapper-search-top-bar">
		<div class="search-top-bar">
			<?php get_template_part( RIBOSOME_TEMPLATE_PARTS . 'searchform-toggle' ); ?>
		</div>
	</div>
