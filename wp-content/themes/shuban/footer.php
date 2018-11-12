
			</div><!-- #content -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.st-content-area -->



	<div class="st-footer-area" id="st-footer-area">

		<?php 

if ( is_active_sidebar( 'sidebar-footer' ) ) {
    ?>
			<div id="footer-instagram">
				<?php 
    dynamic_sidebar( 'sidebar-footer' );
    ?>
			</div>
		<?php 
}

?>

		<div class="container">
			<footer id="colophon" class="site-footer row" role="contentinfo">

				<aside class="shuban-footer" role="complementary">
					<?php 

if ( is_active_sidebar( 'first-footer' ) ) {
    ?>
					    <div class="col-md-4 widget-area">
					        <?php 
    dynamic_sidebar( 'first-footer' );
    ?>
					    </div><!-- .first .widget-area -->
					<?php 
}

?>

					<?php 

if ( is_active_sidebar( 'second-footer' ) ) {
    ?>
					    <div class="col-md-4 widget-area">
					        <?php 
    dynamic_sidebar( 'second-footer' );
    ?>
					    </div><!-- .second .widget-area -->
					<?php 
}

?>

					<?php 

if ( is_active_sidebar( 'third-footer' ) ) {
    ?>
					    <div class="col-md-4 widget-area">
					        <?php 
    dynamic_sidebar( 'third-footer' );
    ?>
					    </div><!-- .third .widget-area -->
					<?php 
}

?>

				</aside><!-- #shuban-footer -->

			</footer><!-- #colophon -->
		</div>
		<!-- /.container -->

		<div class="site-info">

			<div class="container">
				<footer id="colophon" class="site-footer row" role="contentinfo">
					<div class="col-md-6 copyright text-left">
						<h6 class="mb-0"><?php 
echo  wp_kses_post( get_theme_mod( 'shuban_footer_text_left', '&copy; Copyright 2017 - All Rights Reserved' ) ) ;
?>
</h6>
					</div>

					<?php 

if ( shuban_fs()->is_not_paying() ) {
    ?>
						<div class="col-md-6 builtby text-right">
							<h6 class="mb-0"><?php 
    _e( '<a href="https://themes.salttechno.com/" target="_blank">WordPress Blog Themes</a> by SALT TECHNO', 'shuban' );
    ?>
</h6>
						</div>
					<?php 
}

?>

					<?php 
?>

				</footer><!-- #colophon -->
			</div>
			<!-- /.container -->
		</div><!-- .site-info -->
	</div>
	<!-- /.st-footer-area -->

	<div class="scroll-to-top">
		<i class="fa fa-arrow-up"></i>
	</div>
	<!-- /.scroll-to-top -->


</div><!-- #page -->

<?php 
wp_footer();
?>

</body>
</html>
