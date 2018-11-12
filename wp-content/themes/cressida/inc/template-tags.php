<?php
/**
 * Template tags
 *
 * @package Cressida
 */
if ( ! function_exists( 'cressida_fontawesome_icon' ) ) :
	/**
	 * Font Awesome Icon
	 * @param  string  $icon Name of icon
	 * @param  boolean $echo Echo or return
	 * @return string        Markup for Font Awesome icon
	 */
	function cressida_fontawesome_icon( $icon = '', $echo = true ) {
		if ( $icon ) {
			if ( $echo ) {
				echo '<i class="fa fa-' . esc_attr( $icon ) . '"></i>';
			} else {
				return '<i class="fa fa-' . esc_attr( $icon ) . '"></i>';
			}
		}
	}
endif; // ! function_exists( 'cressida_fontawesome_icon' )

if ( ! function_exists( 'cressida_entry_title' ) ) :
	/**
	 * Entry Title
	 * @return string Prints current post title, inside link for archives and without link for singles
	 */
	function cressida_entry_title() {
		if ( ( is_singular() && is_front_page() ) || ! is_singular() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
	}
endif; // ! function_exists( 'cressida_entry_title' )

if ( ! function_exists( 'cressida_entry_tags' ) ) :
	/**
	 * Entry Tags
	 * @return string Displays tags for current post
	 */
	function cressida_entry_tags() {
		$cressida_posts_meta_show = cressida_get_option( 'cressida_posts_meta_show' );
		$cressida_posts_tags_show = cressida_get_option( 'cressida_posts_tags_show' );

		if ( $cressida_posts_meta_show && $cressida_posts_tags_show && has_tag() ) :
			the_tags( '<div class="entry-tags"><h3>' . esc_html__( 'Tags:', 'cressida' ) . '</h3><ul><li>', '</li>, <li>', '</li></ul></div>' );
		endif;
	}
endif; // ! function_exists( 'cressida_entry_tags' )

if ( ! function_exists( 'cressida_entry_thumbnail_markup' ) ) :
	/**
	 * Entry thumbnail markup
	 * @param  string  $size                     Registered image size
	 * @param  boolean $cressida_example_content  Whether example content is enabled or not
	 * @return string                            Returns image markup
	 */
	function cressida_entry_thumbnail_markup( $size = 'thumbnail', $cressida_example_content = false ) {
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( $size, array( 'alt' => esc_attr( get_the_title() ), 'class' => 'img-responsive' ) );
		elseif ( $cressida_example_content == 1 ) : ?>
			<img src="<?php echo esc_url( cressida_get_sample( $size ) ); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
		<?php endif;
	}
endif; // ! function_exists( 'cressida_entry_thumbnail_markup' )

if ( ! function_exists( 'cressida_video_play_icon_markup' ) ) :
	/**
	 * Play video icon markup
	 *
	 * @return string Echoes play icon markup
	 */
	function cressida_video_play_icon_markup() { ?>
		<a href="#" class="cressida-video-modal" data-toggle="modal" data-target="#cressida-video-modal-<?php the_ID(); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Launch video modal', 'cressida' ); ?></span>
			<span class="entry-play-icon">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/play.png' ) ); ?>" alt="<?php esc_attr_e( 'Launch video modal', 'cressida' ); ?>">
			</span>
		</a><?php
	}
endif; // ! function_exists( 'cressida_video_play_icon_markup' )

if ( ! function_exists( 'cressida_entry_thumbnail' ) ) :
	/**
	 * Entry Thumbnail
	 * @param  string $size      Image size
	 * @param  bool $show_modal  Whether to display 'play' icon and trigger video modal
	 * @return string            Print featured image for current post
	 */
	function cressida_entry_thumbnail( $size = 'thumbnail', $show_modal = false ) {
		$cressida_example_content = cressida_get_option( 'cressida_example_content' );
		$video_class = '';
		if ( 'video' === get_post_format() && cressida_get_first_embed_media( get_the_ID() ) && $show_modal ) :
			$video_class = 'entry-thumb-video';
		endif;

		if ( has_post_thumbnail() || $cressida_example_content == 1 ) : ?>
			<div class="entry-thumb <?php echo esc_attr( $video_class ); ?>">
				<?php
					/**
					 * Featured image markup
					 */
					if ( 'video' === get_post_format() && cressida_get_first_embed_media( get_the_ID() ) && $show_modal ) :
						cressida_entry_thumbnail_markup( $size, $cressida_example_content );
						cressida_video_play_icon_markup();
					else :
						echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => false ) ) . '">';
							cressida_entry_thumbnail_markup( $size, $cressida_example_content );
						echo '</a>';
					endif;
				?>
			</div><!-- entry-thumb --><?php
		endif;
	}
endif; // ! function_exists( 'cressida_entry_thumbnail' )

if ( ! function_exists( 'cressida_entry_header_singular' ) ) :
	/**
	 * Singular entry thumbnail - posts and pages
	 * @param  string $size      Image size
	 * @return string            Displays entry thumbnail
	 */
	function cressida_entry_header_singular( $size = 'full' ) {
		$cressida_example_content = cressida_get_option( 'cressida_example_content' );

		$show_image = cressida_singular_show_featured_image();

		/**
		 * If featured image is set to show and
		 * post/page has featured image or example content is enabled
		 * show the image and entry header which goes over it.
		 */
		if ( $show_image && ( has_post_thumbnail() || $cressida_example_content == 1 ) ) : ?>
			<div class="entry-thumb">
				<?php
					/**
					 * Featured image markup
					 */
					cressida_entry_thumbnail_markup( $size, $cressida_example_content );
				?>
				<div class="entry-singular-header">
					<?php
						cressida_get_entry_first_category();
						cressida_entry_title();
						cressida_entry_date();
					?>
				</div><!-- entry-archive-content-->
			</div><!-- entry-thumb --><?php
		else :
			cressida_get_entry_first_category();
			cressida_entry_separator( 'categories-date' );
			cressida_entry_date();
			cressida_entry_title();
		endif; // $show_image && ( has_post_thumbnail() || $cressida_example_content == 1 )
	}
endif; // ! function_exists( 'cressida_entry_header_singular' )

if ( ! function_exists( 'cressida_entry_date_markup' ) ) :
	/**
	 * Date markup
	 * @return string Returns date markup
	 */
	function cressida_entry_date_markup() {
		return '<span class="entry-date">' . esc_html( get_the_date() ) . '</span>';
	}
endif; // ! function_exists( 'cressida_entry_date_markup' )

if ( ! function_exists( 'cressida_entry_date' ) ) :
	/**
	 * Entry Date
	 * @return string Prints date for current post, returns null if page
	 */
	function cressida_entry_date() {

		$cressida_blog_feed_date_show = cressida_get_option( 'cressida_blog_feed_date_show' );
		$cressida_posts_date_show     = cressida_get_option( 'cressida_posts_date_show' );
		/**
		 * Check for date visibility
		 * @var bool
		 */
		$show = cressida_toggle_entry_meta( $cressida_blog_feed_date_show, $cressida_posts_date_show );

		if ( $show ) :
			echo cressida_entry_date_markup();
		endif;
	}
endif; // ! function_exists( 'cressida_entry_date' )

if ( ! function_exists( 'cressida_entry_separator_markup' ) ) :
	/**
	 * Separator markup
	 *
	 * @param  string $separator Separator character
	 * @return string            Returns separator matkup
	 */
	function cressida_entry_separator_markup( $separator = '&#47;' ) {
		return ' <span class="entry-separator">&nbsp;' . esc_html( $separator ) . '&nbsp;</span> ';
	}
endif; // ! function_exists( 'cressida_entry_separator_markup' )

if ( ! function_exists( 'cressida_entry_separator' ) ) :
	/**
	 * Entry Meta Separator
	 *
	 * @param string $check      Unique ID for condition to check
	 * @param string $separator  HTML character for separator. Default is bullet.
	 * @return string            Prints separator dash between meta elements
	 */
	function cressida_entry_separator( $check, $separator = '&#47;' ) {
		$cressida_blog_feed_category_show = cressida_get_option( 'cressida_blog_feed_category_show' );
		$cressida_posts_category_show     = cressida_get_option( 'cressida_posts_category_show' );
		$cressida_blog_feed_date_show     = cressida_get_option( 'cressida_blog_feed_date_show' );
		$cressida_posts_date_show         = cressida_get_option( 'cressida_posts_date_show' );

		$sep = cressida_entry_separator_markup( $separator ); // escaped in cressida_entry_separator_markup()

		/**
		 * Check for item visibility
		 * @var bool
		 */
		$show_category = cressida_toggle_entry_meta( $cressida_blog_feed_category_show, $cressida_posts_category_show );
		$show_date = cressida_toggle_entry_meta( $cressida_blog_feed_date_show, $cressida_posts_date_show );
		if ( $check == 'categories-date' && $show_category && $show_date ) :
			echo $sep;
		endif;
	}
endif; // ! function_exists( 'cressida_entry_separator' )

if ( ! function_exists( 'cressida_entry_excerpt' ) ) :
	/**
	 * Entry Excerpt
	 * @return string Prints current post title, inside link for archives and without link for singles
	 */
	function cressida_entry_excerpt() { ?>
		<div class="entry-summary"><?php the_excerpt(); ?></div><?php
	}
endif; // ! function_exists( 'cressida_entry_excerpt' )

if ( ! function_exists( 'cressida_site_identity_title' ) ) :
	/**
	 * Site title
	 *
	 * Site title markup - heading or div depending on whether
	 * it is home or any other page.
	 *
	 * @param string  $cressida_text_logo Site title or custom text
	 * @return string Display site title markup
	 */
	function cressida_site_identity_title( $cressida_text_logo = '' ) {
		if ( is_front_page() ) : ?>
			<h1 class="header-logo-text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $cressida_text_logo ); ?></a>
			</h1>
		<?php else : ?>
			<div class="header-logo-text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $cressida_text_logo ); ?></a>
			</div>
		<?php endif;
	}
endif; // ! function_exists( 'cressida_site_identity_title' )

if ( ! function_exists( 'cressida_site_identity_tagline' ) ) :
	/**
	 * Site tagline
	 *
	 * @return string Site tagline markup
	 */
	function cressida_site_identity_tagline() {
		if ( get_bloginfo( 'description' ) ) : ?>
			<div class="tagline">
				<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			</div>
		<?php endif;
	}
endif; // ! function_exists( 'cressida_site_identity_tagline' )

if ( ! function_exists( 'cressida_site_identity_logo' ) ) :
	/**
	 * Site logo
	 *
	 * @return Custom logo
	 */
	function cressida_site_identity_logo() {
		if ( function_exists( 'the_custom_logo' ) ) :
			the_custom_logo();
		endif;
	}
endif; // ! function_exists( 'cressida_site_identity_logo' )

if ( ! function_exists( 'cressida_site_identity' ) ) :
	/**
	 * Site identity, custom or default title and tagline
	 *
	 * @return string Display site identity markup
	 */
	function cressida_site_identity() {
		// Custom text logo
		$cressida_text_logo    = cressida_get_option( 'cressida_text_logo' );
		// Toggle tagline
		$cressida_tagline_show = cressida_get_option( 'cressida_tagline_show' );

		/**
		 * If show the logo image is true
		 */
		if ( cressida_get_option( 'cressida_image_logo_show' ) ) :
			/**
			 * If image is selected, show it
			 */
			if ( has_custom_logo() ) :
				cressida_site_identity_logo();
			/**
			 * If no image is selected but custom text logo
			 * is populated (at this moment it's not visible in customizer)
			 * show the custom text logo and Tagline
			 */
			elseif ( ! empty( $cressida_text_logo ) ) :
				cressida_site_identity_title( $cressida_text_logo );
				cressida_site_identity_tagline();
			/**
			 * If no image logo and no custom text logo, but
			 * default WordPress "Display Site Title and Tagline" is checked,
			 * show default Title and Tagline, if populated
			 */
			elseif ( display_header_text() ) :
				cressida_site_identity_title( esc_html( get_bloginfo( 'name' ) ) );
				cressida_site_identity_tagline();
			endif; // has_custom_logo()

		/**
		 * If show the logo image is false
		 * but custom text logo is populated
		 * (at this moment it is visible in customizer)
		 * show the custom text logo
		 */
		elseif ( ! empty( $cressida_text_logo ) ) :
			cressida_site_identity_title( $cressida_text_logo );
			/**
			 * If custom "Show tagline" is true, show it
			 */
			if ( $cressida_tagline_show ) :
				cressida_site_identity_tagline();
			endif;

		/**
		 * If show the logo image is false
		 * and custom text logo is empty, but
		 * default WordPress "Display Site Title and Tagline" is checked,
		 * show default Title and Tagline, if populated
		 */
		elseif ( display_header_text() ) :
			cressida_site_identity_title( esc_html( get_bloginfo( 'name' ) ) );
			cressida_site_identity_tagline();
		endif; // cressida_get_option( 'cressida_image_logo_show' )
	}
endif; // ! function_exists( 'cressida_site_identity' )

if ( ! function_exists( 'cressida_get_entry_first_category' ) ) :
	/**
	 * Get first category for the entry
	 *
	 * @param  int $post_id   Post id
	 * @return string         Returns first category markup
	 */
	function cressida_get_entry_first_category( $post_id = '' ) {
		if ( $post_id ) {
			$id = $post_id;
		} else {
			$id = get_the_ID();
		}

		$cressida_blog_feed_category_show = cressida_get_option( 'cressida_blog_feed_category_show' );
		$cressida_posts_category_show     = cressida_get_option( 'cressida_posts_category_show' );
		/**
		 * Check for category visibility
		 * @var bool
		 */
		$show = cressida_toggle_entry_meta( $cressida_blog_feed_category_show, $cressida_posts_category_show );

		$categories = get_the_category( $id );

		if ( ! empty( $categories ) ) {
			if ( $show ) :
				echo '<span class="entry-category">';
				echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				echo '</span>';
			endif;
		}
	}
endif; // ! function_exists( 'cressida_get_entry_first_category' )

if ( ! function_exists( 'cressida_get_promo_category' ) ) :
	/**
	 * Get first category for the entry
	 *
	 * @param  int $post_id   Post id
	 * @return string         Returns first category markup
	 */
	function cressida_get_promo_category( $cat_id = null ) {
		if ( $cat_id ) :
			$category = get_category( $cat_id );
			echo '<span class="entry-category">';
			echo '<a href="' . esc_url( get_category_link( $cat_id ) ) . '">' . esc_html( $category->name ) . '</a>';
			echo '</span>';
		endif;
	}
endif; // ! function_exists( 'cressida_get_promo_category' )

if ( ! function_exists( 'cressida_read_more_link' ) ) :
	/**
	 * Get read more link for the entry
	 *
	 * @param  int $post_id   Post id
	 * @return string         Returns first category markup
	 */
	function cressida_read_more_link( $post_id = '' ) {
		if ( $post_id ) {
			$id = $post_id;
		} else {
			$id = get_the_ID();
		}
		// Translators: 1. Permalink, 2. Title attribute, 3. Link label
		printf( __( '<a href="%1$s" class="entry-read-more" title="%2$s">%3$s</a>', 'cressida' ),
			esc_url( get_permalink( $id ) ),
			the_title_attribute( 'echo=0' ),
			esc_html__( 'View post &raquo;', 'cressida' )
		);
	}
endif; // ! function_exists( 'cressida_read_more_link' )

if ( ! function_exists( 'cressida_footer_copyrights' ) ) :
	/**
	 * Footer copyrights
	 * @return string Echoes footer copyrights markup
	 */
	function cressida_footer_copyrights() {
		$cressida_footer_copyright = cressida_get_option( 'cressida_footer_copyright' );

		if ( $cressida_footer_copyright ) : ?>
			<div class="footer-copyright">
				<?php echo wp_kses_post( $cressida_footer_copyright ); ?>
			</div>
		<?php endif; // $cressida_footer_copyright
	}
endif; // ! function_exists( 'cressida_footer_copyrights' )
