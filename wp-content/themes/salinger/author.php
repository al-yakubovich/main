<?php
/**
 * The template for displaying Author Archive pages
 *
 * @package Salinger
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

			<?php
			if ( have_posts() ) :
				the_post();
				?>
				<header class="archive-header">
					<h1 class="archive-title"><?php printf( esc_html__( 'Author Archives: %s', 'salinger' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . esc_html( get_the_author() ) . '</a></span>' ); ?></h1>
				</header><!-- .archive-header -->

				<?php
				rewind_posts();

				// Author info.
				if ( get_the_author_meta( 'description' ) ) :
					?>
					<div class="author-info-box">
						<div class="author-avatar">
							<?php
							// Avatar.
							$author_bio_avatar_size = apply_filters( 'salinger_author_bio_avatar_size', 90 );
							echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
							?>
						</div><!-- .author-avatar -->
						<div class="author-description">
							<h2><?php printf( esc_html__( 'About %s', 'salinger' ), esc_html( get_the_author() ) ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- .author-description	-->
					</div><!-- .author-info-box -->
					<?php
				endif;

				while ( have_posts() ) :
					the_post();
					get_template_part( SALINGER_TEMPLATE_PARTS . 'content-archive' );
				endwhile;

				salinger_the_posts_pagination();
			else :
				get_template_part( SALINGER_TEMPLATE_PARTS . 'content-none' );
			endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
