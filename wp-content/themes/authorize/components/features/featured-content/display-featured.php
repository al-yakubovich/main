<?php
/**
 * The template for displaying featured content
 *
 * @package Authorize
 */

$featured_posts = authorize_get_featured_posts();

?>

<div id="featured-content" class="featured-content">
	<div class="featured-content-inner"> 
		<?php
			
			/* If no content, tell admin where to add it */
			
			if( empty( $featured_posts ) ) { 
				
				if( current_user_can('administrator') ) {

					$featured_content = get_option( 'featured-content' );
		?> 
                    <div class="admin_notice">
                        <h2>Featured Content Here</h2>
                        <p style="text-align:center; font-weight:bold">This theme uses WordPress' Jetpack - Featured Content</p>
                        <p>You will need to have the Jetpack plugin installed on your site to use Featured Content. </p>
                        <p>When Jetpack is installed and Featured Content is activated, posts with the tag or category ' <strong><?php echo esc_attr( $featured_content['tag-name'] ) ?></strong> ' will be displayed here in a 2 column format.</p>
                        <ul>
                            <li><a href="https://jetpack.com/pricing/" target="_blank">Install Jetpack <small>[<strong>Free</strong> version works!]</small></a></li>
                            <li><a href="https://jetpack.com/support/featured-content/" target="_blank">More about Featured Content</a></li>
                        </ul>
                        
                        <p>
                        <small style="font-style:italic">This notice only appears to site administrators. Regular site visitors do not see it.</small></p>
                        
                    </div>
		<?php 
				}	// end if user admin
			}else{ 
			
				//If there are featured posts
				foreach ( $featured_posts as $post ) {
					setup_postdata( $post );
	
					 // Include the featured content template.
					get_template_part( 'components/features/featured-content/content', 'featured' );
				}
	
				wp_reset_postdata();

			}	// end if featured content
            ?>
	</div>
</div>
