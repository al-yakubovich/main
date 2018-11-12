<?php
/**
 * Frontpage Banner
 *
 * @package Cressida
 */
$cressida_example_content    = cressida_get_option( 'cressida_example_content' );
$cressida_banner_heading     = cressida_get_option( 'cressida_banner_heading' );
$cressida_banner_description = cressida_get_option( 'cressida_banner_description' );
$cressida_banner_url         = cressida_get_option( 'cressida_banner_url' );
$cressida_banner_label       = cressida_get_option( 'cressida_banner_label' );
$cressida_header_image       = get_custom_header(); // WPCS: XSS ok.

$cressida_array = array();
$cressida_src   = '';

// If image is uploaded then we have attachment id.
if ( ! empty( $cressida_header_image->attachment_id ) ) :
	// Get image size depending on whether sidebar is active or not.
	if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) :
		$cressida_array = wp_get_attachment_image_src( $cressida_header_image->attachment_id, 'cressida-slider-sidebar' );
	else :
		$cressida_array = wp_get_attachment_image_src( $cressida_header_image->attachment_id, 'cressida-slider' );
	endif; // is_active_sidebar( 'sidebar-frontpage-top' )
endif;

if ( ! empty( $cressida_array ) ) :
	$cressida_src = $cressida_array[0];
elseif ( $cressida_example_content == 1 ) :
	if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) :
		$cressida_src = cressida_get_sample( 'cressida-slider-sidebar' );
	else :
		$cressida_src = $cressida_header_image->url;
	endif;
endif; // $cressida_array

if ( $cressida_src ) :
	// Get padding based on image aspect ratio
	$cressida_padding = cressida_set_aspect_ratio_padding( esc_url( $cressida_src ) ); ?>

	<div class="frontpage-banner">

			<div class="banner">

				<div class="banner-image" style="background-image:url(<?php echo esc_url( $cressida_src ); ?>); padding-top: <?php echo esc_attr( $cressida_padding ); ?>%"></div>

				<div class="box-caption">
					<?php if ( $cressida_banner_url && $cressida_banner_heading ) : ?>
						<h2><a href="<?php echo esc_url( $cressida_banner_url ); ?>"><?php echo esc_html( $cressida_banner_heading ); ?></a></h2>
					<?php elseif ( ! $cressida_banner_url && $cressida_banner_heading ) : ?>
						<h2><?php echo esc_html( $cressida_banner_heading ); ?></h2>
					<?php endif; // $cressida_banner_url && $cressida_banner_heading ?>

					<?php if ( $cressida_banner_description ) : ?>
						<div class="box-caption--excerpt d-none d-md-block">
							<p><?php echo esc_html( $cressida_banner_description ); ?></p>
						</div>
					<?php endif; // $cressida_banner_description ?>

					<?php if ( $cressida_banner_url && $cressida_banner_label ) : ?>
						<p class="box-caption--readmore">
							<a href="<?php echo esc_url( $cressida_banner_url ); ?>" title="<?php echo esc_attr( $cressida_banner_heading ); ?>" class="btn btn-primary">
								<?php
									// Translators: 1. Link label
									printf( __( '%s &raquo;', 'cressida' ),
										esc_html( $cressida_banner_label )
									);
								?>
							</a>
						</p>
					<?php endif; ?>
				</div><!-- box-caption -->
			</div><!-- banner -->

	</div><!-- frontpage-banner -->
<?php endif; // $cressida_src

