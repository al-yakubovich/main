<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package words
 */
 global $words_theme_options;
  $copyright= wp_kses_post($words_theme_options['words-footer-copyright']);
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="top-bottom wrapper">
			    <div id="footer-top">
			        <div class="footer-columns">
			            <?php if( is_active_sidebar( 'footer-1' ) ) : ?>
			                <div class="footer-sidebar-1">
			                    <?php dynamic_sidebar( 'footer-1' ); ?>
			                </div>
			            <?php endif; ?>
			            <?php if( is_active_sidebar( 'footer-2') ) : ?>
			                <div class="footer-sidebar-1">
			                    <?php dynamic_sidebar( 'footer-2' ); ?>
			                </div>
			            <?php endif; ?>

			            <?php if( is_active_sidebar( 'footer-3') ) : ?>
			                <div class="footer-sidebar-1">
			                    <?php dynamic_sidebar( 'footer-3'); ?>
			                </div>
			            <?php endif; ?>
			        </div>
			    </div><!-- #foter-top -->
			</div><!-- top-bottom-->
		</div>
		<div class="site-info">
			<div class="container">
				<span class="copy-right-text"><?php echo $copyright; ?></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'words' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'words' ), 'WordPress' ); ?></a>
				<span class="sep"> | <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'words' ), 'Words', '<a href="http://www.kafleg.com.np" rel="designer">Kafle G</a>' ); ?> </span>				
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #row -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
