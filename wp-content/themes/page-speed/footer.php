<?php do_action( 'pagespeed_before_footer' ); ?>
<?php global $helium; ?>
<?php if ( ! $helium->get_meta( 'hide_footer_widgets' ) && ( is_active_sidebar( "footer-1" ) || is_active_sidebar( "footer-2" ) || is_active_sidebar( "footer-3" ) || is_active_sidebar( "footer-4" ) || is_active_sidebar( "footer-5" ) ) ): ?>
    <footer id="site-footer-container" class="cf">
        <div id="site-footer" class="sb hybrid">
			<?php
			$columns = get_theme_mod( 'footer_column_count', 4 );

			for ( $i = 1; $i <= $columns; $i ++ ):
				?>
            <div class="fc-<?php echo $i ?> fc">
                <div class="inner">
				<?php if ( dynamic_sidebar( "footer-$i" ) ) ?>
                </div>
                </div>
                <!--End of footer-1 -->
				<?php
			endfor;
			?>
        </div>
    </footer>
<?php endif; ?>

<div id="copyright-container">
    <div class="inner hybrid">
		<?php
		wp_nav_menu( array(
				'container'      => '',
				'menu_class'     => '',
				'menu_id'        => 'footer-links',
				'fallback_cb'    => '',
				'theme_location' => 'footer_links'
			)
		);
		?>
		<?php echo wp_kses_post( do_shortcode( get_theme_mod( 'copyright_text', __( 'Copyright', 'page-speed' ) . ' &copy; ' . date_i18n( __( 'Y', 'page-speed' ) ) . ' ' . '<a href="' . esc_url( home_url() ) . '"
                                                                                                          rel="home">' . get_bloginfo( "name" ) . '</a>' ) ) ) ?>

		<?php if ( get_theme_mod( 'remove_footer_credit_link', true ) ) {
			?>
            <p class="credit"><a href="https://swiftthemes.com" rel="nofollow">PageSpeed WordPress theme</a> by
                    SwiftThemes.Com</p>
			<?php
		} ?>

    </div>

</div>

</div><!-- #wrapper -->

<?php
wp_footer();
?>
<div id="side-pane">
    <div id="side-pane-inner"></div>
</div>
</body>
</html>
