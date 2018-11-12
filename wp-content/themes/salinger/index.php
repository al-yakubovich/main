<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since Salinger 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :
					the_post();
					get_template_part( SALINGER_TEMPLATE_PARTS . 'content' );
				endwhile;

				salinger_the_posts_pagination();

			else :
				?>
				<article id="post-0" class="post no-results not-found">

					<?php
					if ( current_user_can( 'edit_posts' ) ) :
					// Show a different message to a logged-in user who can add posts.
						?>
						<header class="entry-header">
							<h1 class="entry-title"><?php esc_html_e( 'No posts to display', 'salinger' ); ?></h1>
						</header>

						<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'salinger' ), admin_url( 'post-new.php' ) ); ?></p>
						</div><!-- .entry-content -->

						<?php
					else :
						// Show the default message to everyone else.
						?>
						<header class="entry-header">
							<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'salinger' ); ?></h1>
						</header>

						<div class="entry-content">
							<p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'salinger' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
						<?php
					endif; // end current_user_can() check.
					?>

				</article><!-- #post-0 -->
				<?php
			endif; // end have_posts() check.
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
