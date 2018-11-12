<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @since RubberSoul 1.0
 */
?>
	</div><!-- #main .wrapper -->

</div><!-- #page -->

	<footer id="colophon" role="contentinfo">
	<div class="social-icon-wrapper">
			<?php if( get_theme_mod('rubbersoul_twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_twitter_url', 'https://twitter.com/' )); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_facebook_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_facebook_url', 'https://facebook.com/' )); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_googleplus_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url(get_theme_mod('rubbersoul_googleplus_url', 'https://plus.google.com/' )); ?>" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_linkedin_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_linkedin_url', 'https://linkedin.com/' )); ?>" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_youtube_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_youtube_url', 'https://youtube.com/' )); ?>" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_instagram_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_instagram_url', 'http://instagram.com/' )); ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_pinterest_url' ) !== '' ) { ?>
		 		<a href="<?php echo esc_url(get_theme_mod('rubbersoul_pinterest_url', 'https://pinterest.com/' )); ?>" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>

			<?php if( get_theme_mod('rubbersoul_rss_url' ) !== '' ) { ?>
				<a class="rss" href="<?php echo esc_url(get_theme_mod('rubbersoul_rss_url', 'http://wordpress.org/' )); ?>" title="Feed RSS" target="_blank"><i class="fa fa-rss"></i></a>
			<?php } ?>
		</div><!-- .social-icon-wrapper -->
		<hr class="hr-oscura" />
		<div class="site-info">
			<div class="credits-left"><?php echo wp_kses_post(get_theme_mod('rubbersoul_footer_text_left', 'Copyright 2015')); ?></div>
			<div class="credits-center"><?php echo wp_kses_post(get_theme_mod('rubbersoul_footer_text_center', 'Footer text center')); ?></div>
			<div class="credits-right">
			<a href="<?php echo RUBBERSOUL_AUTHOR_URI; ?>/wordpress-themes/rubbersoul">RubberSoul</a> <?php esc_attr_e('by', 'rubbersoul'); ?> GalussoThemes.com<br />
			<?php esc_attr_e('Powered by', 'rubbersoul'); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rubbersoul' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'rubbersoul' ); ?>"> WordPress</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php
	if (get_theme_mod('rubbersoul_boton_ir_arriba', 1) == 1){ ?>
		<div class="ir-arriba"><i class="fa fa-chevron-up"></i></div>
	<?php }

wp_footer(); ?>

</body>
</html>
