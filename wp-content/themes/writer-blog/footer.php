<?php
/**
 * This template is for displaying the footer and bottom bar.
 */
?>
	<div class="footer-container">
		<?php if(is_active_sidebar( 'ct-footer-left' ) || is_active_sidebar( 'ct-footer-middle' ) || is_active_sidebar( 'ct-footer-right' ) ):?>
		    <footer id="footer">
		    	<div class="container footer">
		    		<div class="row">
						<?php dynamic_sidebar( 'ct-footer-left' ); ?>
						<?php dynamic_sidebar( 'ct-footer-middle' ); ?>
						<?php dynamic_sidebar( 'ct-footer-right' ); ?>
		    		</div><!-- /.row -->
		    	</div><!-- /.container -->
		    </footer>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
	</div><!-- /.footer-container -->
    <?php wp_footer();?>
  </body>
</html>