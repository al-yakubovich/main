<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our_blog
 */

?>
<div class="col-md-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="media">
			<?php if(has_post_thumbnail()): ?>
				<a href="" class="img-holder">
					<?php
					the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
					?>
				</a>
			<?php endif;?>	
			<div class="media-body">
				<div class="tag-date-comment">
					<span class="tag"><?php foreach (get_the_category( get_the_ID() ) as $category){
						echo esc_html($category->name);
					};?></span>
					<ul class="date-comment">
						<li><?php our_blog_posted_on();?></li>
					</ul>
				</div>
				<a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
				<?php the_content(); ?>
			</div>
		</div>

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'our-blog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article>
</div>