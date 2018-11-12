<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ForDummies
 * @subpackage For_dummies
 * @since For dummies 1.0
 */
get_header(); 
$fordummies_blog_sidebar_single = trim(get_theme_mod('fordummies_show_sidebar_singlepage','1'));
$fordummies_blog_sidebar_single = esc_attr($fordummies_blog_sidebar_single);
if($fordummies_blog_sidebar_single != '1')
  echo '<div id="primary" class="content-area-full-with">';
else
  echo '<div id="primary" class="content-area-single">';
?>
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'fordummies' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'fordummies' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'fordummies' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'fordummies' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'fordummies' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}
			// End of the loop.
		endwhile;
		?>
	</main><!-- .site-main -->
	<?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php 
$fordummies_blog_sidebar = trim(get_theme_mod('fordummies_show_sidebar_singlepage', '1'));
$fordummies_blog_sidebar = esc_attr($fordummies_blog_sidebar);
if ($fordummies_blog_sidebar == '1')
  get_sidebar(); 
?>
<?php get_footer(); ?>