<?php
/**
	* Template Name: Full Width
	*
	* @package WordPress
	* @subpackage MyStem
	* @since MyStem 1.0
*/

get_header();


?>
	<div id="full-width" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content/content', 'page' ); ?>

				<?php
				// only allow comments if chosen in theme customizer
				if ( get_theme_mod( 'mystem_page_comments' ) == 1 ) :

					// if comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;
			?>

			<?php endwhile; // end of the loop. ?>

		</main>
	</div>


<?php get_footer(); ?>
