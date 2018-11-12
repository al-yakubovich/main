<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<?php if ( is_category() ): ?>
<div class="u-full-width">
   <div class="row">
    	<div class="category-header-background" style="background-image: linear-gradient( to bottom, rgba(0, 0, 0, .5 ) 0%, rgba( 0, 0, 0, .5 ) 100% ), url( '<?php echo esc_url( writer_blog_category_image() ); ?>' )">
    		<div class="category-header-content">
    			<div class="category-title">
    				<h1><?php echo single_cat_title(); ?></h1>
    			</div><!-- /.category-title -->
    			<?php echo category_description(); ?>
    		</div><!-- /.header-content -->
    	</div>
   </div> <!-- /.row -->
</div> <!-- /.u-full-width -->
<?php 
	else:
		writer_blog_breadcrumb_switcher();
	endif;
?>
<div class="container <?php echo $check_margin = ( is_category() ) ? 'post-loop-margin' : 'no-header-bg' ; ?> body-container">
	<div class="row">
		<div class="eight columns">
			<?php if ( have_posts() ) : 
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

			endwhile;

				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( '&nbsp;', 'writer-blog' ),
					'next_text' => __( '&nbsp;', 'writer-blog' ),
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif; ?>
		</div><!-- /.eight .columns -->

		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</div><!-- /.container .home-post-loop-->

<?php get_footer(); ?>