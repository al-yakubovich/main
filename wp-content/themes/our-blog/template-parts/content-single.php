<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our_blog
 */

?>
<div class="thumb">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if(has_post_thumbnail()): ?>
			<a href="" class="img-holder">
				<?php
				the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
				?>
			</a>
		<?php endif;?>	
		<div class="thumb-body">
			<div class="tag-date-comment">
				<span class="tag">
					<?php foreach (get_the_category( get_the_ID() ) as $category){
						echo esc_html($category->name);
					};?>
				</span>
				<ul class="date-comment">
					<li><?php our_blog_posted_on();?></li>
					<li><?php /* translators: %s: Comments Number. */
					printf( esc_attr__( 'Comments %s', 'our-blog' ), esc_html(get_comments_number()) );?></li>
				</ul>
			</div>
			<h3 class="card-title"><?php the_title();?></h3>
			<?php the_content();?>
		</div>
		<div class="author">
			<div class="title-holder text-center">
				<h3><?php echo esc_html__('Author','our-blog');?></h3>
			</div>
			<div class="media">
				<?php 
				?>
				<div class="img-holder mr-4">
					<?php echo get_avatar(get_the_author_meta( 'ID' ),'','','',array('width'=>100,'height'=>100));?>
				</div>
				<div class="media-body">
					<div class="title-share">
						<h6 class="mr-auto"><?php echo esc_html(get_the_author());?></h6>
					</div>
					<p><?php echo esc_html(get_the_author_meta('description'));?></p>
				</div>
			</div>
		</div>
		<div class="related-posts">
			<div class="title-holder text-center">
				<h3><?php echo esc_html__('Related Posts','our-blog');?></h3>
			</div>
			<div class="row">
				<?php
				if ( function_exists( 'our_blog_get_related_posts' ) ) {

					$related_posts = our_blog_get_related_posts( 'category', array( 'posts_per_page' => 10) );
					if ( $related_posts ) {
						foreach ( $related_posts as $post ) {
							setup_postdata( $post );
							?>
							<div class="col-md-6">
								<div class="card">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail('our-blog-single-page-730x389'); 
									}
									?>
									<div class="card-body">
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
										<a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>
										<?php the_excerpt();?>
									</div>
								</div>
							</div>
							<?php
						}
						wp_reset_postdata();
					}
				}
				?>
			</div>
		</div>

	</article>
</div>

