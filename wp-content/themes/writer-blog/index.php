<?php
/**
 * The main template file
 */
?>
<?php get_header(); ?>

<?php

	//  For displaying featured backround image

	$cat_id = intval( get_theme_mod( 'ct-cats-elect-setting', 1 ) );

	$query_args = array(
		'post_type'			=>	'post',
		'posts_per_page'	=>	5,
		'cat'				=> $cat_id,
		'order'				=>	'DESC',
	);

	$slider_post  = new WP_Query( $query_args );
?>

    <div class="u-full-width">
       <div class="row">

			<?php if ( $slider_post->have_posts() ) : ?>
			<div class="owl-carousel owl-theme owl-home-carousel">
				<?php
					while ( $slider_post->have_posts() ) : $slider_post->the_post();
			
						get_template_part( 'template-parts/post/content', 'slider' );

					endwhile;
			?>

			</div> <!-- /.owl-carousal.owl-theme -->
			<div class="slider-navigation">
					<a href="#" class="btn prev"></a>
					<a href="#" class="btn next"></a>
			</div> <!-- /.slider-navigation -->
			<?php
				else :

					get_template_part( 'template-parts/post/content', 'slider-none' );

				endif;

				wp_reset_query();
			?>

	   </div> <!-- /.row -->
    </div> <!-- /.u-full-width .slider -->

    <div class="container post-loop-margin body-container">
    	<div class="row">
    		<div class="eight columns">
				<?php
					if ( have_posts() ) :

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

					endif;
				?>
    		</div><!-- /.eight .columns -->

    		<?php get_sidebar(); ?>
    	</div><!-- /.row -->
    </div><!-- /.container .home-post-loop-->

<?php get_footer(); ?>