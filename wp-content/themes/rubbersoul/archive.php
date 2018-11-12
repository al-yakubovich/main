<?php
/**
 * The template for displaying Archive pages
 *
 * @package RubberSoul
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'rubbersoul' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'rubbersoul' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rubbersoul' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'rubbersoul' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rubbersoul' ) ) . '</span>' );
					else :
						_e( 'Archives', 'rubbersoul' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

			rubbersoul_the_posts_pagination();
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
