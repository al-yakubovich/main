<?php
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Register various widgets
 *
 * @since 1.0.0
 */

function our_blog_register_widget() {
	register_widget( 'Our_Blog_About_Me' );
	register_widget( 'Our_Blog_Get_Connected' );
	register_widget( 'Our_Blog_Popular_Posts' );
	register_widget( 'Our_Blog_Recent_Posts' );
}

add_action( 'widgets_init', 'our_blog_register_widget' );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load important files for widgets
 *
 * @since 1.0.0
 */

require get_template_directory() . '/inc/widgets/widget-fields.php';

require get_template_directory() . '/inc/widgets/our-blog-about-me-widget.php';

require get_template_directory() . '/inc/widgets/our-blog-get-connected-widget.php';

require get_template_directory() . '/inc/widgets/our-blog-popular-posts-widget.php';

require get_template_directory() . '/inc/widgets/our-blog-recent-posts-widget.php';


function our_blog_popular_posts( $posts ) {
	$posts_args = array(
		'post_type'			=> 'post',
		'posts_per_page'	=> $posts,
		'orderby'       => 'comment_count',
		'order'				=> 'DESC'
	);
	$popular = new WP_Query( $posts_args );
	$popular_post_num = 1;
	while ($popular->have_posts()) : $popular->the_post();
		?>
		<div class="media">
			<a href="<?php the_permalink();?>" class="img-holder mr-3">
				<?php the_post_thumbnail('our-blog-popular-posts-68x60');?>
			</a>
			<div class="media-body">
				<a href="<?php the_permalink() ?>"><h6 class="mt-0"><?php the_title(); ?></h6></a>
				<div class="bl-date">
					<span><?php echo get_the_date( 'j F, Y'); ?></span>
				</div>
			</div>
		</div>
		<?php
	endwhile; 
}