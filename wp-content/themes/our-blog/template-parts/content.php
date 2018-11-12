<?php
/**
 * Template part for displaying posts
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
				<a href="<?php the_permalink(); ?>" class="img-holder">
					<?php
					the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
					?>
				</a>
			<?php endif;?>	
			<div class="media-body">
				
				<a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
				<?php the_excerpt(); ?>
				<?php /* <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','our-blog'); ?></a> */ ?>
				<div class="tag-date-comment">
					<span class="tag"><?php foreach (get_the_category( get_the_ID() ) as $category){
						echo esc_html($category->name);
					};?></span>
					<ul class="date-comment">
						<li><?php our_blog_posted_on();?></li>
						<li><?php /* translators: %s: Comments Number. */
						printf( esc_attr__( 'Comments %s', 'our-blog' ), esc_html(get_comments_number()) );?></li>
					</ul>
				</div>
			</div>
		</div>
	</article>
</div>
