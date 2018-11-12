<?php
/**
 * The template for displaying Archive pages
 *
 * @package Ribosome
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'ribosome' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'ribosome' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ribosome' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'ribosome' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ribosome' ) ) . '</span>' );
					else :
						esc_attr_e( 'Archives', 'ribosome' );
					endif;
				?>
				</h1>
			</header><!-- .archive-header -->

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

			ribosome_the_posts_pagination();
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
