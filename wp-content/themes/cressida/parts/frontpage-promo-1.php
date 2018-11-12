<?php
/**
 * Frontpage Promo Category 1
 *
 * @package Cressida
 */
$cressida_section_show = cressida_get_option( 'cressida_section_frontpage_promo_category_1_show' );
if ( ! $cressida_section_show ) {
	return;
}

$cressida_example_content = cressida_get_option( 'cressida_example_content' );
$cressida_posts_number    = cressida_get_option( 'cressida_section_frontpage_promo_category_1_number' );
$cressida_category        = cressida_get_option( 'cressida_section_frontpage_promo_category_1_category' );
/* Default post class */
$cressida_post_class = 'entry col-lg-6 col-xs-12';
$cressida_show_sidebar = false;

if ( is_active_sidebar( 'sidebar-frontpage-promo-1' ) || $cressida_example_content == 1 ) :
	$cressida_show_sidebar = true;
	$cressida_post_class   = 'entry col-xs-12';
endif;

$cressida_frontpage_sidebar_toggle = cressida_get_option( 'cressida_frontpage_sidebar_toggle' );

if ( $cressida_frontpage_sidebar_toggle == 'on' ) :
	$cressida_toggle_class = 'col-xs-12';
else :
	$cressida_toggle_class = 'd-none d-lg-block';
endif;

$cressida_args = array(
	'posts_per_page' => $cressida_posts_number,
	'post_type'      => 'post',
	'category__in'   => array( $cressida_category )
);

$cressida_query = new WP_Query( $cressida_args ); ?>

<div class="frontpage-promo frontpage-promo-1">
	<div class="container container--background">
		<div class="row">

			<?php if ( $cressida_show_sidebar ) : ?>
				<div class="col-lg-8 col-xs-12 sidebar-on">
			<?php endif; // $cressida_show_sidebar

			if ( $cressida_query->have_posts() ) :
				while ( $cressida_query->have_posts() ) : $cressida_query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $cressida_post_class ) ); ?>>
						<div class="row align-items-center">
							<div class="col-sm-6 col-xs-12">
								<?php cressida_entry_thumbnail( 'cressida-archive', true ); ?>
							</div><!-- col-sm-6 col-xs-12 -->
							<div class="col-sm-6 col-xs-12">
								<div class="entry-promo-content">
									<?php
										cressida_get_promo_category( $cressida_category );
										cressida_entry_title();
										cressida_entry_excerpt();
										// Translators: 1. Permalink, 2. Title attribute, 3. Link label
										printf( __( '<a href="%1$s" class="entry-read-more" title="%2$s"><span>%3$s</span></a>', 'cressida' ),
											esc_url( get_permalink() ),
											the_title_attribute( 'echo=0' ),
											esc_html__( 'View Post &raquo;', 'cressida' )
										);
									?>
								</div><!-- entry-promo-content -->
							</div><!-- col-sm-6 col-xs-12 -->
						</div><!-- row -->
					</article><!-- #post-<?php the_ID(); ?> --><?php
					/**
					 * Get video modal for video post format
					 */
					get_template_part( 'parts/entry', 'video-modal' );
				endwhile; // $cressida_query->have_posts()
				wp_reset_postdata();
			endif; // $cressida_query->have_posts()

			if ( $cressida_show_sidebar ) : ?>
				</div><!-- col-lg-8 col-xs-12 sidebar-on -->
			<?php endif; // $cressida_show_sidebar

			if ( is_active_sidebar( 'sidebar-frontpage-promo-1' ) ) : ?>
				<div class="widget-area widget-area-sidebar col-lg-4 <?php echo esc_attr( $cressida_toggle_class ); ?>" role="complementary">
					<div class="sidebar-widgets">
						<?php dynamic_sidebar( 'sidebar-frontpage-promo-1' ); ?>
					</div>
				</div><!-- widget-area widget-area-sidebar -->
			<?php elseif ( $cressida_example_content == 1 ) : ?>
				<div class="widget-area widget-area-sidebar col-lg-4 <?php echo esc_attr( $cressida_toggle_class ); ?>" role="complementary">
					<?php cressida_example_sidebar(); ?>
				</div><!-- widget-area widget-area-sidebar -->
			<?php endif; // is_active_sidebar( 'sidebar-frontpage-promo-1' ) ?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- frontpage-promo frontpage-promo-1 -->