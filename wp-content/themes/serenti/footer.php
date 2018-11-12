<?php
/**
 * The template used for displaying content single
 *
 * @package serenti
 */
?>


				</div><!-- END #content -->
			
			</div><!-- END .row -->
		
		</div><!-- END .container -->


		<!-- back to top button -->
		<p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>

		<footer class="mz-footer" id="footer">

			<!-- footer widgets -->
			<div class="container footer-inner">
				<div class="row row-gutter">
					<?php get_sidebar( 'footer' ); ?>
				</div>
			</div>

			<div class="footer-wide">
					<?php get_sidebar( 'footer-wide' ); ?>
			</div>

			<div class="footer-bottom">
				<?php do_action('serenti_footer'); ?>
			</div>
		</footer>

		<?php wp_footer(); ?>
		
	</body>
</html>