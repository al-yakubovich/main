<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package elvinaa
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="main" class="site-main" role="main">	
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
														if(have_posts() ) {									

															while(have_posts() ) {
																the_post();
																/*
																 * Include the Post-Format-specific template for the content.
																 * If you want to override this in a child theme, then include a file
																 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
																 */
																get_template_part( 'template-parts/content', get_post_format());										
															}									

															?>
									                			<nav class="pagination">
									                    			<?php the_posts_pagination(); ?>
									                			</nav>
															<?php	
														}
														
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
														if(have_posts() ) {									

															while(have_posts() ) {
																the_post();
																/*
																 * Include the Post-Format-specific template for the content.
																 * If you want to override this in a child theme, then include a file
																 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
																 */
																get_template_part( 'template-parts/content', get_post_format());										
															}									

															?>
									                			<nav class="pagination">
									                    			<?php the_posts_pagination(); ?>
									                			</nav>
															<?php	
														}
														
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
														if(have_posts() ) {									

															while(have_posts() ) {
																the_post();
																/*
																 * Include the Post-Format-specific template for the content.
																 * If you want to override this in a child theme, then include a file
																 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
																 */
																get_template_part( 'template-parts/content', get_post_format());										
															}									

															?>
									                			<nav class="pagination">
									                    			<?php the_posts_pagination(); ?>
									                			</nav>
															<?php	
														}
														
													?>
									            </div>
        									<?php
        								}
        								else{
        									?>
        										<div class="col-md-12">
													<?php
														if(have_posts() ) {									

															while(have_posts() ) {
																the_post();
																/*
																 * Include the Post-Format-specific template for the content.
																 * If you want to override this in a child theme, then include a file
																 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
																 */
																get_template_part( 'template-parts/content', get_post_format());										
															}									

															?>
									                			<nav class="pagination">
									                    			<?php the_posts_pagination(); ?>
									                			</nav>
															<?php	
														}
														
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
	</div>
</div>


<?php

get_footer();
