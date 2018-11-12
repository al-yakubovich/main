<?php
/**
 * Frontpage Featured Links
 *
 * @package Cressida
 */
$cressida_section_show = cressida_get_option( 'cressida_frontpage_featured_links_show' );
if ( ! $cressida_section_show ) {
	return;
}
$cressida_example_content = cressida_get_option( 'cressida_example_content' );

$cressida_links = array();
/* Get pages in our custom array */
for ( $cressida_link_i = 1; $cressida_link_i < 4; $cressida_link_i++ ) {
	$cressida_link_id     = cressida_get_option( 'cressida_frontpage_featured_links_page_' . $cressida_link_i );
	$cressida_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $cressida_link_id ), 'cressida-archive' );

	$cressida_links[] = array(
		'caption' => get_the_title( $cressida_link_id ), // WPCS: XSS ok.
		'url'     => get_permalink( $cressida_link_id ), // WPCS: XSS ok.
		'image'   => $cressida_image_array[0]
	);
}

if ( is_array( $cressida_links ) ) : ?>
	<div class="frontpage-featured-links">
		<div class="container container--background container--featured-links">
			<div class="row">

				<?php foreach ( $cressida_links as $link ) :
					if ( $link['image'] ) :
						$cressida_src = $link['image'];
					elseif ( $cressida_example_content == 1 ) :
						$cressida_src = cressida_get_sample( 'cressida-archive' );
					else :
						$cressida_src = '';
					endif;

					if ( $cressida_src ) : ?>
					<div class="col-md-4 col-xs-12 entry matcheight">

						<?php if ( $link['url'] ) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>">
						<?php endif; // $link['url'] ?>

						<img src="<?php echo esc_url( $cressida_src ); ?>" class="entry-thumb">

						<?php if ( $link['caption'] ) : ?>
							<div class="entry-caption">
								<h3 class="entry-title"><?php echo esc_html( $link['caption'] ); ?></h3>
							</div>
						<?php endif; // $link['caption'] ?>

						<?php if ( $link['url'] ) : ?>
							</a>
						<?php endif; // $link['url'] ?>

					</div><!-- col-md-4 col-xs-12 -->
				<?php endif; // $cressida_src

				endforeach; // $cressida_links as $link ?>

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- frontpage-featured-links -->
<?php endif; // is_array( $cressida_links )
