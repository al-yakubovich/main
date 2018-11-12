<?php
/**
* The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Cressida
*/
?>
	</main>

	<?php
		/**
		 * Footer full widget area
		 */
		get_sidebar( 'footer-full' );
	?>

	<footer class="footer" role="contentinfo">
		<?php
			/**
			 * Footer columns widgets
			 */
			get_sidebar( 'footer' );
			/**
			 * Copyrights
			 */
			cressida_footer_copyrights();
		?>
        <div class="footer-copyright">
            <div class="lyrathemes-credits">
                <?php
                	// Translators: 1. Author credits URL
                    printf( __( '<a href="%1$s" target="_blank">Cressida</a> by LyraThemes.com', 'cressida' ),
                        esc_url( 'https://www.lyrathemes.com/cressida/' )
                    );
                ?>
            </div>
        </div>
	</footer>
</div><!-- main-wrapper -->

<?php wp_footer(); ?>
</body>
</html>