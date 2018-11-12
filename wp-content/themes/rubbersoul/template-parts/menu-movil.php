<?php
/**
 * Menú Móvil
 *
 * @since RubberSoul 1.0
 */
?>

<div id="menu-movil">
	<div class="search-form-movil">
		<form method="get" id="searchform-movil" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s" class="assistive-text"><?php _e( 'Search', 'rubbersoul' ); ?></label>
			<input type="search" class="txt-search-movil" placeholder="<?php _e('Search...', 'rubbersoul'); ?>" name="s" id="s" />
			<input type="submit" name="submit" id="btn-search-movil" value="<?php _e( 'Search', 'rubbersoul' ); ?>" />
		</form>
    </div><!-- search-form-movil -->
	<div class="menu-movil-enlaces">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
	</div>
	
	<div class="social-icon-wrapper-movil">
			<?php if( get_theme_mod( 'rubbersoul_twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_twitter_url', 'https://twitter.com' )); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> 
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_facebook_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_facebook_url', 'https://facebook.com' )); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_googleplus_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_googleplus_url', 'https://plus.google.com' )); ?>" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_linkedin_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_linkedin_url', 'https://linkedin.com' )); ?>" title="LindedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_youtube_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_youtube_url', 'https://youtube.com' )); ?>" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_instagram_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_instagram_url', 'http://instagram.com' )); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_pinterest_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod( 'rubbersoul_pinterest_url', 'https://pinterest.com' )); ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			
			<?php if( get_theme_mod( 'rubbersoul_rss_url' ) !== '' ) { ?>
				<a class="rss" href="<?php echo esc_url(get_theme_mod( 'rubbersoul_rss_url', 'http://wordpress.org' )); ?>" title="RSS" target="_blank"><i class="fa fa-rss"></i></a>			
			<?php } ?>
		</div><!-- .social-icon-wrapper -->	
</div><!-- #menu-movil -->