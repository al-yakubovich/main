<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package placid
 */
 global $placid_theme_options;
  $copyright= wp_kses_post($placid_theme_options['placid-footer-copyright']);
?>

	</div><!-- #content -->
<?php
  $value ="";
  	if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
  	{
		 

		 $value = "style='background: #fff none repeat scroll 0 0;'";		    


	}
 

?>

	<footer id="colophon" class="site-footer" role="contentinfo" <?php echo  $value; ?> >
		
		<?php
		   if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
  	        {
  
		     	$count = 0;
					for ( $i = 1; $i <= 3; $i++ )
					    {
						  if ( is_active_sidebar( 'footer-' . $i ) )
						        {
									$count++;
								}
						}
					$column=4;
					if( $count == 3 ) 
					{
					   	$column = 4;  
				   
					}
			        elseif( $count == 2) 
			        {
			             	$column = 6;
			        }
			       elseif( $count == 1) 
			        {
			             	$column = 12;
			        }
			?>

				<div class="container">
					<div class="top-bottom clearfix">
					    <div id="footer-top">
					        <div class="footer-columns">
					          
               <?php
			    	for ( $i = 1; $i <=3 ; $i++ )
			    	{
    				  	if ( is_active_sidebar( 'footer-' . $i ) )
    				  	{
				?>          <div class="footer-sidebar-1">
					            <?php dynamic_sidebar( 'footer-' . $i ); ?>
					        </div>
					          
					            
                         <?php   

                        } 
              
                   }     ?>    

					        </div>
					    </div><!-- #foter-top -->
					</div><!-- top-bottom-->
				</div>
             <?php } ?>
				<div class="site-info">
					<div class="container">
						<span class="copy-right-text"><?php echo $copyright; ?></span>
						<span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'placid' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'placid' ), 'WordPress' ); ?></a></span><span class="sep"> | </span>
						<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'placid' ), 'Placid', '<a href="https://paragonthemes.com" rel="designer">ParagonThemes</a>' ); ?>
					</div>
					<?php placid_go_to_top();?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
			</div><!-- #row -->
		</div><!-- #page -->	

<?php wp_footer(); ?>

</body>
</html>
