<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div class="container no-header-bg body-container">
	<div class="row">
		<div class="eight columns">

		<div class="page-header">
			<?php if ( have_posts() ) : ?>
				<?php /* translators: %s: search term */ ?>
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'writer-blog' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'writer-blog' ); ?></h1>
			<?php endif; ?>
		</div><!-- .page-header -->

		
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

		?>	
				<div class="block">
					<div class="sub-block">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'writer-blog' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- /.sub-block -->
				</div><!-- /.block -->
		<?php
			endif;
		?>
    		</div><!-- /.eight .columns -->

    		<?php get_sidebar(); ?>
    	</div><!-- /.row -->
    </div><!-- /.container .home-post-loop-->

<?php
get_footer();