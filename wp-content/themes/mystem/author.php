<?php
/**
 * The template for displaying Author pages.
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.2
 */

get_header(); 
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 90, '', get_the_author_meta( 'display_name' ), array('class'=>'alignleft') ) . get_the_author_meta( 'display_name' ); ?>
				</h1>
				<?php the_author_meta('description'); ?>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_pagination(); ?>	

		<?php else : ?>

			<?php get_template_part( 'content/content', 'none' ); ?>

		<?php endif; ?>

		</main>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
