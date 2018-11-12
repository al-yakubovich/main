<?php
/**
 * Frontpage - Featured Posts
 *
 * @package Cressida
 */
$cressida_frontpage_featured_posts_show = cressida_get_option( 'cressida_frontpage_featured_posts_show' );

if ( $cressida_frontpage_featured_posts_show ) :
	$cressida_frontpage_featured_posts_heading = cressida_get_option( 'cressida_frontpage_featured_posts_heading' ); ?>

	<div class="frontpage-featured-posts">
		<h2 class="section-title"><span><?php echo esc_html( $cressida_frontpage_featured_posts_heading ); ?></span></h2>

		<div class="row">
			<?php
				for ( $i = 1; $i < 3; $i++ ) {
					$cressida_frontpage_featured_post = cressida_get_option( 'cressida_frontpage_featured_posts_post_' . $i );

					$cressida_args = array(
						'posts_per_page' => 1,
						'p'              => $cressida_frontpage_featured_post,
					);

					$cressida_query = new WP_Query( $cressida_args );

					if ( $cressida_query->have_posts() ) :
						while ( $cressida_query->have_posts() ) : $cressida_query->the_post();
							get_template_part( 'parts/entry', 'featured' );
						endwhile;
					endif; // $cressida_query->have_posts()

					wp_reset_postdata();
				}
			?>
		</div><!-- row -->
	</div><!-- frontpage-featured-posts -->
<?php endif; // $cressida_frontpage_featured_posts_show