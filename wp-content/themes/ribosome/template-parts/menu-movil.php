<?php
/**
 * Menú Móvil
 *
 * @package Ribosome
 */

?>

<div id="menu-movil">
	<div class="search-form-movil">
		<form method="get" id="searchform-movil" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s" class="assistive-text"><?php esc_attr_e( 'Search', 'ribosome' ); ?></label>
			<input type="search" class="txt-search-movil" placeholder="<?php esc_attr_e( 'Search...', 'ribosome' ); ?>" name="s" id="s" />
			<input type="submit" name="submit" id="btn-search-movil" value="<?php esc_attr_e( 'Search', 'ribosome' ); ?>" />
		</form>
	</div><!-- search-form-movil -->
	<div class="menu-movil-enlaces">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'nav-menu',
		));
		?>
	</div>

	<div class="social-icon-wrapper-movil">
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
</div><!-- #menu-movil -->
