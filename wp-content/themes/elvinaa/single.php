<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package elvinaa
 */

get_header();

?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
			    <div class="container">
			        <div class="row">
			        	<?php
			        		if('right'===esc_attr(get_theme_mod('el_blog_sidebar','right'))) {
			        			?>
			        				<?php
			        					if ( is_active_sidebar('sidebar-1')){
			        						?>
			        							<div id="post-wrapper" class="col-md-9">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', get_post_format());

															the_post_navigation();

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
												<div id="sidebar-wrapper" class="col-md-3">
													<?php get_sidebar('sidebar-1'); ?>
												</div>	
			        						<?php
			        					}
			        					else{
			        						?>
			        							<div class="col-md-12">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', get_post_format());

															the_post_navigation();

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
			        						<?php
			        					}
                    				?>
			        				
			        			<?php
			        		}
			        		else{
			        			?>
			        				<?php
			        					if ( is_active_sidebar('sidebar-1')){
			        						?>
			        							<div id="sidebar-wrapper" class="col-md-3">
													<?php get_sidebar('sidebar-1'); ?>
												</div>
						        				<div id="post-wrapper" class="col-md-9">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', get_post_format());

															the_post_navigation();

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>												
			        						<?php
			        					}
			        					else{
			        						?>
			        							<div class="col-md-12">
													<?php
														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', get_post_format());

															the_post_navigation();

															// If comments are open or we have at least one comment, load up the comment template.
															if ( comments_open() || get_comments_number() ) :
																comments_template();
															endif;

														endwhile; // End of the loop.
													?>							
												</div>
			        						<?php
			        					}
			        				?>			        				
			        			<?php
			        		}
			        	?>							
					</div>
				</div>
			</div>
		</div>		
	</main>
</div>

<?php
get_footer();
