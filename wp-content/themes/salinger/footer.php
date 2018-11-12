<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Salinger
 * @since Salinger 1.0
 */

?>
			</div><!-- .content-sidebar-innner-wrap-->
		</div><!-- inner wrap -->
	</div><!-- #main .wrapper -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-wrap">
			<div class="footer-inner-wrap">
				<?php
				if ( is_active_sidebar( 'salinger-sidebar-footer-1' ) || is_active_sidebar( 'salinger-sidebar-footer-2' ) || is_active_sidebar( 'salinger-sidebar-footer-3' ) || is_active_sidebar( 'salinger-sidebar-footer-4' ) ) { ?>

						<div class="wrapper-widget-area-footer">
							<div class="widget-area-footer-1">
								<?php if ( ! dynamic_sidebar( 'salinger-sidebar-footer-1' ) ) {} ?>
							</div>

							<div class="widget-area-footer-2">
								<?php if ( ! dynamic_sidebar( 'salinger-sidebar-footer-2' ) ) {} ?>
							</div>

							<div class="widget-area-footer-3">
								<?php if ( ! dynamic_sidebar( 'salinger-sidebar-footer-3' ) ) {} ?>
							</div>

							<div class="widget-area-footer-4">
								<?php if ( ! dynamic_sidebar( 'salinger-sidebar-footer-4' ) ) {} ?>
							</div>

						</div><!-- .wrapper-widget-area-footer -->

				<?php } // if is active widget areas ; ?>

				<div class="site-info">
					<div class="footer-text-left"><?php echo wp_kses_post( get_theme_mod( 'salinger_footer_text_1', '' ) ); ?></div>
					<div class="footer-text-center"><?php echo wp_kses_post( get_theme_mod( 'salinger_footer_text_2', '' ) ); ?></div>
					<div class="footer-text-right"><?php echo wp_kses_post( get_theme_mod( 'salinger_footer_text_3', '' ) ); ?></div>
				</div><!-- .site-info -->

				<?php
				if ( '' == get_theme_mod( 'salinger_hide_credits', '' ) ) {
					?>
					<div class="salinger-theme-credits">
							Theme <a href="<?php echo SALINGER_THEME_URI; ?>"><?php echo SALINGER_NAME; ?></a> <?php esc_html_e( 'by', 'salinger' ); ?> GalussoThemes |
							<?php esc_html_e( 'Powered by', 'salinger' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'salinger' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'salinger' ); ?>">WordPress</a>
					</div><!-- .credits-blog-wp -->
					<?php
				}
				?>
			</div><!-- .footer-inner-wrap -->
		</div><!-- inner-warp -->
	</footer><!-- #colophon -->

	<?php
	if ( get_theme_mod( 'salinger_back_to_top_button', 1 ) == 1 ) { ?>
		<div class="ir-arriba"><i class="fa fa-arrow-up"></i></div>
	<?php } ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>
