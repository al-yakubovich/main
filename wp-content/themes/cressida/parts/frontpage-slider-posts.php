<?php
/**
 * Frontpage Posts Slider
 *
 * @package Cressida
 */
$cressida_example_content              = cressida_get_option( 'cressida_example_content' );
$cressida_frontpage_posts_slider_posts = cressida_get_option( 'cressida_frontpage_posts_slider_posts' );

if ( ! empty( $cressida_frontpage_posts_slider_posts ) ) : ?>
	<div class="frontpage-slider frontpage-slider-posts">
		<div class="slick-carousel">

		<?php
			foreach ( $cressida_frontpage_posts_slider_posts as $cressida_frontpage_post ) :
				$cressida_args = array(
					'p' => $cressida_frontpage_post['post']
				);
				$cressida_query = new WP_Query( $cressida_args );

				if ( $cressida_query->have_posts() ) :
					while ( $cressida_query->have_posts() ) : $cressida_query->the_post();

						if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) :
							$cressida_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cressida-slider-sidebar' );
						else :
							$cressida_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'cressida-slider' );
						endif; // is_active_sidebar( 'sidebar-frontpage-top' )

						$cressida_featured_image = '';

						if ( $cressida_src ) :
							$cressida_featured_image = $cressida_src[0];
						elseif ( $cressida_example_content == 1 ) :
							if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) :
								$cressida_featured_image = cressida_get_sample( 'cressida-slider-sidebar' );
							else :
								$cressida_featured_image = cressida_get_sample( 'cressida-slider' );
							endif;
						endif; // $cressida_src

						if ( $cressida_featured_image ) :
							// Get padding based on image aspect ratio
							$cressida_padding = cressida_set_aspect_ratio_padding( $cressida_featured_image ); ?>

							<div class="slick-slide">
								<div class="slide-image" style="background-image:url(<?php echo esc_url( $cressida_featured_image ); ?>); padding-top: <?php echo esc_attr( $cressida_padding ); ?>%"></div>

								<div class="box-caption matcheight">
									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="box-caption--excerpt d-none d-md-block">
										<p><?php the_excerpt(); ?></p>
									</div><!-- box-caption--excerpt d-none d-md-block-->
									<p class="box-caption--readmore">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn btn-primary"><?php esc_html_e( 'View post &raquo;', 'cressida' ); ?></a>
									</p>
								</div><!-- box-caption matcheight -->
							</div><!-- slick-slide--><?php
						endif; // $cressida_featured_image

					endwhile; // $cressida_query->have_posts()
					wp_reset_postdata();
				endif; // $cressida_query->have_posts()
			endforeach; // $cressida_frontpage_posts_slider_posts as $cressida_frontpage_post
		?>

		</div><!-- slick-carousel -->
	</div><!-- frontpage-slider -->
<?php endif; // is_array( $cressida_frontpage_posts_slider_posts )
