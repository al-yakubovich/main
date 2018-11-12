<?php
/**
 * Display related posts
 *
 * @package Ribosome
 */

if ( is_single() ) { 
				
	$tags = wp_get_post_terms(get_the_ID());
	if ($tags) { 
	
		$tagcount = count($tags);
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		
		$args = array(
			'tag__in' => $tagIDs,
			'post__not_in' => array ($post->ID),
			'posts_per_page' => 5,
			'ignore_sticky_post' => 1
		);
		
		$relacionadas = new WP_Query ($args);
		if ($relacionadas->have_posts()) : ?>
			<div class="wrapper-related-posts">
				<p><span class="prefix-widget-title"><i class="fa fa-chevron-right"></i></span> <?php _e('Related posts', 'ribosome'); ?></p>
				<div class="recent-post">
				<ul> <?php
					while ($relacionadas->have_posts()) :
						$relacionadas->the_post(); ?>
						<a href='<?php the_permalink(); ?>'>
							<li>
								<div style="padding:0 7px; padding:0 0.5rem;">
									&raquo; &nbsp;<?php the_title(); ?>
								</div>
							</li>
						</a>
				   <?php endwhile; ?>
				 </ul>
				 </div><!-- .recent-post -->
			</div><!-- .wrapper-related-posts -->
			
			<?php wp_reset_postdata(); ?>
			
		<?php endif; // if ($relacionadas->have_posts())?> 
	<?php } //if ($tags)
} //if ( is_single() ?>