<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div class="container no-header-bg body-container page-404">
	<div class="row">
		<div class="eight columns">
			<div class="block">
				<div class="sub-block">
					<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'writer-blog' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'writer-blog' ); ?></p>

						<?php get_search_form(); ?>
				</div><!-- /.sub-block -->
			</div><!-- /.block -->	
		</div><!-- /.eight .columns -->

		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();