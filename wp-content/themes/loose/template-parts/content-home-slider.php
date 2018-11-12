<?php
/**
 * Template part for displaying header slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

$loose_sticky_posts = get_option( 'sticky_posts' );

if ( ! empty( $loose_sticky_posts ) ) :

	$loose_slider_posts_array_args = array(
		'posts_per_page'   => 99,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => $loose_sticky_posts,
		'exclude'          => '',
		// 'meta_key'         => 'loose-meta-slider-checkbox',
		// 'meta_value'       => '1',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'       => '',
		'post_status'      => 'publish',
		'suppress_filters' => true,
	);
	$loose_slider_posts_array = get_posts( $loose_slider_posts_array_args ); ?>
		<div id="slider-container">
				<div class="featured-posts">
					<div class="loose-featured-slider">
						
				<?php foreach ( $loose_slider_posts_array as $slide ) : ?>
						<div class="loose-featured-slider-wrapper">
							<?php if ( has_post_thumbnail( $slide->ID ) ) : ?>
							
						   <?php $loose_wp_get_attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), get_theme_mod( 'home_page_slider_img_size', 'full' ) ); ?>
							
							<div class="featured-image" style="background:#000 url(<?php echo esc_url( $loose_wp_get_attachment_image_src[0] ); ?>) no-repeat center;background-size: cover;">
	
							</div>
							<div class="loose-featured-slider-title-wrapper">
								<div class="loose-featured-slider-title">
									<span class="featured-category">
										<?php the_category( __( '<span> &#124; </span>', 'loose' ), '', $slide->ID ); ?>
									</span>
									<h2 class="loose-featured-slider-header"><a href="<?php echo esc_url( get_permalink( $slide->ID ) ); ?>" rel="bookmark"><?php echo get_the_title( $slide->ID ); ?></a></h2>
								</div>
							</div>
							<?php else : ?>
							<div class="no-featured-image">
								<div class="loose-featured-slider-title">
									<span class="featured-category">
									<?php the_category( __( '<span> &#124; </span>', 'loose' ), '', $slide->ID ); ?>
									</span>
									<h2 class="loose-featured-slider-header"><a href="<?php echo esc_url( get_permalink( $slide->ID ) ); ?>" rel="bookmark"><?php echo get_the_title( $slide->ID ); ?></a></h2>
								</div>
							</div>
							<?php endif; ?>
						</div>

				<?php endforeach; ?>
						
					</div>
				</div>
		</div>
<?php endif; ?>
