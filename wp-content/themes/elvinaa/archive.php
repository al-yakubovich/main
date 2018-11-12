<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package elvinaa
 */


get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php elvinaa_get_page_title(false,true,false,false); ?>
		<div class="content-inner">
			<div id="blog-section">
			    <div class="container">
			        <div class="row">
			        	<?php
			        		if('right'===esc_attr(get_theme_mod('el_blog_sidebar','right'))) {
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
			        	?>			            
			        </div>
			    </div>
			</div>
		</div>
	</main>
</div>

<?php

get_footer();