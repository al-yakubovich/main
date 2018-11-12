<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */

global $acmeblog_customizer_all_values;
$acmeblog_blog_single_image_layout = $acmeblog_customizer_all_values['acmeblog-single-image-size'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php acmeblog_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php
    /*<!--post thumbnal options-->*/
	if ( has_post_thumbnail() &&
	     ( $acmeblog_customizer_all_values['acmeblog-single-post-layout'] == 'left-image' ||
	       $acmeblog_customizer_all_values['acmeblog-single-post-layout'] == 'large-image' )
	){
		?>
        <div class="single-feat clearfix">
            <figure class="single-thumb single-thumb-full">
				<?php the_post_thumbnail( $acmeblog_blog_single_image_layout );?>
            </figure>
        </div><!-- .single-feat-->
		<?php
	}
	?>
	<div class="entry-content">
		<?php
        the_content();
        wp_link_pages(
                array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acmeblog' ),
                        'after'  => '</div>',
                    )
        );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php acmeblog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->