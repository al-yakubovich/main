<?php
/**
 * Display related posts.
 *
 * @since Salinger 1.0
 * @package Salinger
 */

$tags = wp_get_post_terms( get_the_ID() );
if ( $tags ) {

	$tagcount = count( $tags );
	for ( $i = 0; $i < $tagcount; $i++ ) {
		$tag_ids[ $i ] = $tags[ $i ]->term_id;
	}

	$args = array(
		'tag__in'            => $tag_ids,
		'post__not_in'       => array( $post->ID ),
		'posts_per_page'     => 4,
		'ignore_sticky_post' => 1,
	);

	$related = new WP_Query( $args );
	if ( $related->have_posts() ) : ?>
		<section class="wrapper-related-posts">
			<p class="related-posts-cabecera">
				<span class="related-post-tab-cabecera"> <?php echo wp_kses_post( get_theme_mod( 'salinger_related_posts_title', __( 'Related posts...', 'salinger' ) ) ); ?>
				</span>
			</p>

			<div class="related-posts">
				<ul>
				<?php
				while ( $related->have_posts() ) :
					$related->the_post();
					?>
					<li>
						<a href='<?php the_permalink(); ?>'>
							<div style="padding:0 7px; padding:0 0.5rem;">
								&raquo; &nbsp;<?php the_title(); ?>
							</div>
						</a>
					</li>
				<?php
				endwhile;
				?>
				</ul>
			</div><!-- .related-posts -->

		</section><!-- .wrapper-related-posts -->

		<?php wp_reset_postdata(); ?>

	<?php endif; // $related have_posts ?>

<?php
}
