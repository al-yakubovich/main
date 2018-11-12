<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Ribosome
 */

?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<div class="credits credits-left">
			<?php
			echo wp_kses_post( get_theme_mod( 'ribosome_footer_text_left', __( 'Copyright 2015', 'ribosome' ) ) );
			?>
			</div>

			<div class="credits credits-center">
			<?php
			echo wp_kses_post( get_theme_mod( 'ribosome_footer_text_center', __( 'Footer text center', 'ribosome' ) ) );
			?>
			</div>

			<div class="credits credits-right">
			<a href="<?php echo RIBOSOME_AUTHOR_URI; ?>/wordpress-themes/ribosome">Ribosome</a> <?php esc_attr_e( 'by', 'ribosome' ); ?> GalussoThemes.com<br />
			<?php esc_attr_e( 'Powered by', 'ribosome' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ribosome' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'ribosome' ); ?>"> WordPress</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
if ( get_theme_mod( 'ribosome_boton_ir_arriba', 1 ) == 1 ) {
	?>
	<div class="ir-arriba"><i class="fa fa-arrow-up"></i></div>
	<?php
}

wp_footer();
?>

</body>
</html>
