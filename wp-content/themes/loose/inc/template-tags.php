<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package loose
 */

if ( ! function_exists( 'loose_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function loose_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
		);

		$posted_on = sprintf(
			/* translators: time ago */
			esc_html_x( '%s ago', 'post date', 'loose' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: post author */
			esc_html_x( ' by %s', 'post author', 'loose' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span><span class="posted-on"> / ' . $posted_on . '</span>'; // WPCS: XSS OK.
	}

endif;

if ( ! function_exists( 'loose_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function loose_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				/* translators: tag list */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'loose' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'loose' ), esc_html__( '1 Comment', 'loose' ), esc_html__( '% Comments', 'loose' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'loose' ), '<span class="edit-link">', '</span>' );
	}

endif;

if ( ! function_exists( 'loose_categorized_blog' ) ) :

	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function loose_categorized_blog() {
		$all_the_cool_cats = get_transient( 'loose_categories' );
		if ( false === $all_the_cool_cats ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories(
				array(
					'fields' => 'ids',
					'hide_empty' => 1,
					// We only need to know if there is more than one category.
					'number' => 2,
				)
			);

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'loose_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so loose_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so loose_categorized_blog should return false.
			return false;
		}
	}

endif;

/**
 * Flush out the transients used in loose_categorized_blog.
 */
function loose_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'loose_categories' );
}

add_action( 'edit_category', 'loose_category_transient_flusher' );
add_action( 'save_post', 'loose_category_transient_flusher' );

if ( ! function_exists( 'loose_comment' ) ) :

	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since loose 1.0
	 * @param type $comment comment.
	 * @param type $args comment args.
	 * @param type $depth comments depth.
	 */
	function loose_comment( $comment, $args, $depth ) {
		// $GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
				<?php $avatar = get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php if ( ! empty( $avatar ) ) : ?>
					<div class="comments-avatar">
						<?php echo wp_kses_post( $avatar ); ?>
					</div>    
				<?php endif; ?>
				<div class="comment-meta commentmetadata">
					<?php printf( sprintf( '<cite class="fn"><b>%s</b></cite>', get_comment_author_link() ) ); ?>
					<br />
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( esc_html__( '%s ago', 'loose' ), esc_html( human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ) );
						?>
					</time></a>
					<span class="reply">
					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
								'reply_text' => 'REPLY',
								'before' => ' &#8901; ',
							)
						)
					);
					?>
					</span><!-- .reply -->
					<?php edit_comment_link( __( 'Edit', 'loose' ), ' &#8901; ' ); ?>
				</div><!-- .comment-meta .commentmetadata -->
				</div><!-- .comment-author .vcard -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'loose' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			</article><!-- #comment-## -->
			<?php
		}

	endif; // Ends check for loose_comment().

	if ( ! function_exists( 'loose_comments_fields' ) ) :

	/**
	 * Customized comment form
	 *
	 * @param array $fields comment form fields.
	 * @return string
	 */
	function loose_comments_fields( $fields ) {

		$commenter = wp_get_current_commenter();
		// $user = wp_get_current_user();
		// $user_identity = $user->exists() ? $user->display_name : '';
		if ( ! isset( $args['format'] ) ) {
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
			}

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? ' aria-required="true"' : '' );
		$html_req = ( $req ? ' required="required"' : '' );
		$html5 = 'html5' === $args['format'];

		$fields = array(
			'author' => '<div class="comment-fields"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'loose' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Name', 'loose' ) . '" /></p>',
			'email' => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'loose' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Email', 'loose' ) . '" /></p>',
			'url' => '<p class="comment-form-ur"><label for="url">' . esc_html__( 'Website', 'loose' ) . '</label> ' .
			'<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( 'Website', 'loose' ) . '" /></p></div>',
		);

		return $fields;
	}

	add_filter( 'comment_form_default_fields', 'loose_comments_fields' );
	endif;

	/**
	 * Gets the excerpt using the post ID outside the loop.
	 *
	 * @author      Withers David
	 * @link        http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
	 * @param       int $post_id WP post ID.
	 * @return      string
	 */
	function loose_get_excerpt_by_id( $post_id ) {
	$the_post = get_post( $post_id ); // Gets post ID.
	$the_excerpt = $the_post->post_content; // Gets post_content to be used as a basis for the excerpt.
	$excerpt_length = 35; // Sets excerpt length by word count.
	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); // Strips tags and images.
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) :
		array_pop( $words );
		array_push( $words, '...' );
		$the_excerpt = implode( ' ', $words );
		endif;

	$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
	}

	if ( ! function_exists( 'loose_custom_popular_posts_html_list' ) ) :

	/**
	 * Builds custom HTML
	 *
	 * With this function, I can alter WPP's HTML output from my theme's functions.php.
	 * This way, the modification is permanent even if the plugin gets updated.
	 *
	 * @param   array $mostpopular WPP mostpopular.
	 * @param   array $instance WPP instance.
	 * @return  string
	 */
	function loose_custom_popular_posts_html_list( $mostpopular, $instance ) {
		$output = '<ul class="fat-wpp-list">';

		// Loop the array of popular posts objects.
		foreach ( $mostpopular as $popular ) {

			$post_cat = get_the_category_list( __( '<span>&#124;</span>', 'loose' ), '', $popular->id );

			$thumb = get_the_post_thumbnail( $popular->id, 'medium' );

			$output .= '<li>';
			$output .= ( ! empty( $thumb ) ) ? '<div class="fat-wpp-image"><a href="' . esc_url( get_the_permalink( $popular->id ) ) . '" title="' . esc_attr( $popular->title ) . '">' /* . loose_post_format_icon( $popular->id ) */ . $thumb . '</a>' : '';
			$output .= loose_post_format_icon( $popular->id );
			$output .= ( ! empty( $post_cat ) ) ? '<div class="fat-wpp-image-cat">' . $post_cat . '</div>' : '';
			$output .= ( ! empty( $thumb ) ) ? '</div>' : '';
			$output .= '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink( $popular->id ) ) . '" title="' . esc_attr( $popular->title ) . '">' . $popular->title . '</a></h2>';
			$output .= '</li>';
		}

		$output .= '</ul>';

		return $output;
		}

	if ( ! get_theme_mod( 'wpp_styling', 0 ) ) {
		add_filter( 'wpp_custom_html', 'loose_custom_popular_posts_html_list', 10, 2 );
		}
	endif;

	if ( ! function_exists( 'loose_gallery_content' ) ) :

	/**
	 * Template for cutting images from gallery post format.
	 *
	 * @since loose 1.0
	 */
	function loose_gallery_content() {
		/* translators: post title */
		$content = get_the_content( sprintf( __( 'Read more %s <span class="meta-nav">&rarr;</span>', 'loose' ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );
		$pattern = '#\[gallery[^\]]*\]#';
		$replacement = '';

		$newcontent = preg_replace( $pattern, $replacement, $content, 1 );
		$newcontent = apply_filters( 'the_content', $newcontent );
		$newcontent = str_replace( ']]>', ']]&gt;', $newcontent );
		echo $newcontent; // WPCS: XSS OK.
		}

	endif;

	if ( ! function_exists( 'loose_media_content' ) ) :

	/**
	 * Template for cutting media from audio/video post formats.
	 *
	 * @since loose 1.0
	 */
	function loose_media_content() {
		/* translators: post title */
		$content = get_the_content( sprintf( esc_html__( 'Read more %s <span class="meta-nav">&rarr;</span>', 'loose' ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );
		$content = apply_filters( 'the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );

		$tags = 'audio|video|object|embed|iframe';

		$replacement = '';

		$newcontent = preg_replace( '#<(?P<tag>' . $tags . ')[^<]*?(?:>[\s\S]*?<\/(?P=tag)>|\s*\/>)#', $replacement, $content, 1 );

		echo $newcontent; // WPCS: XSS OK.
		}

	endif;

	if ( ! function_exists( 'loose_gallery_shortcode' ) ) :

	/**
	 * Custom gallery shortcode output.
	 *
	 * @param type  $output gellery shortcode output.
	 * @param array $atts gellery shortcode atts.
	 * @param type  $instance gellery shortcode instance.
	 * @return type
	 */
	function loose_gallery_shortcode( $output = '', $atts, $instance ) {
		$return = $output; // Fallback.

		$atts = array(
			'size' => 'medium',
		);

		return $output;
	}

	add_filter( 'post_gallery', 'loose_gallery_shortcode', 10, 3 );
	endif;

	if ( ! function_exists( 'loose_post_format_icon' ) ) :

	/**
	 * Function for getting post format icon.
	 *
	 * @param type $post_id WP post ID.
	 * @return string
	 */
	function loose_post_format_icon( $post_id ) {

		if ( empty( $post_id ) ) {
			return;
			}

		$format = get_post_format( $post_id );

		if ( ! $format ) {

			return;
			} else {
			if ( 'audio' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 24 24"><path d="M17.297 12h1.688q0 2.531-1.758 4.43t-4.242 2.273v3.281h-1.969v-3.281q-2.484-0.375-4.242-2.273t-1.758-4.43h1.688q0 2.203 1.57 3.656t3.727 1.453 3.727-1.453 1.57-3.656zM12 15q-1.219 0-2.109-0.891t-0.891-2.109v-6q0-1.219 0.891-2.109t2.109-0.891 2.109 0.891 0.891 2.109v6q0 1.219-0.891 2.109t-2.109 0.891z"></path></svg></div>';
				} elseif ( 'video' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 18 18"><path d="M0 2.25v13.5h18v-13.5h-18zM3.375 14.625h-2.25v-2.25h2.25v2.25zM3.375 10.125h-2.25v-2.25h2.25v2.25zM3.375 5.625h-2.25v-2.25h2.25v2.25zM13.5 14.625h-9v-11.25h9v11.25zM16.875 14.625h-2.25v-2.25h2.25v2.25zM16.875 10.125h-2.25v-2.25h2.25v2.25zM16.875 5.625h-2.25v-2.25h2.25v2.25zM6.75 5.625v6.75l4.5-3.375z"></path></svg></div>';
				} elseif ( 'gallery' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 18 18"><path d="M5.344 10.688c0 2.019 1.637 3.656 3.656 3.656s3.656-1.637 3.656-3.656-1.637-3.656-3.656-3.656-3.656 1.637-3.656 3.656zM16.875 4.5h-3.938c-0.281-1.125-0.563-2.25-1.688-2.25h-4.5c-1.125 0-1.406 1.125-1.688 2.25h-3.938c-0.619 0-1.125 0.506-1.125 1.125v10.125c0 0.619 0.506 1.125 1.125 1.125h15.75c0.619 0 1.125-0.506 1.125-1.125v-10.125c0-0.619-0.506-1.125-1.125-1.125zM9 15.68c-2.757 0-4.992-2.235-4.992-4.992s2.235-4.992 4.992-4.992c2.757 0 4.992 2.235 4.992 4.992s-2.235 4.992-4.992 4.992zM16.875 7.875h-2.25v-1.125h2.25v1.125z"></path></svg></div>';
				} elseif ( 'image' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 18 18"><path d="M16.873 2.25c0.001 0.001 0.001 0.001 0.002 0.002v13.496c-0.001 0.001-0.001 0.001-0.002 0.002h-15.746c-0.001-0.001-0.001-0.001-0.002-0.002v-13.496c0.001-0.001 0.001-0.001 0.002-0.002h15.746zM16.875 1.125h-15.75c-0.619 0-1.125 0.506-1.125 1.125v13.5c0 0.619 0.506 1.125 1.125 1.125h15.75c0.619 0 1.125-0.506 1.125-1.125v-13.5c0-0.619-0.506-1.125-1.125-1.125v0z"></path><path d="M14.625 5.063c0 0.932-0.756 1.688-1.688 1.688s-1.688-0.756-1.688-1.688 0.756-1.688 1.688-1.688 1.688 0.756 1.688 1.688z"></path><path d="M15.75 14.625h-13.5v-2.25l3.938-6.75 4.5 5.625h1.125l3.938-3.375z"></path></svg></div>';
				} elseif ( 'link' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 18 18"><path d="M7.739 11.176c-0.234 0-0.468-0.089-0.646-0.268-1.672-1.672-1.672-4.393 0-6.066l3.375-3.375c0.81-0.81 1.887-1.256 3.033-1.256s2.223 0.446 3.033 1.256c1.672 1.672 1.672 4.393 0 6.066l-1.543 1.543c-0.357 0.357-0.936 0.357-1.293 0s-0.357-0.936 0-1.293l1.543-1.543c0.959-0.96 0.959-2.521 0-3.48-0.465-0.465-1.083-0.721-1.74-0.721s-1.275 0.256-1.74 0.721l-3.375 3.375c-0.96 0.96-0.96 2.521 0 3.48 0.357 0.357 0.357 0.936 0 1.293-0.178 0.178-0.412 0.268-0.646 0.268z"></path><path d="M4.5 17.789c-1.146 0-2.223-0.446-3.033-1.256-1.672-1.672-1.672-4.393 0-6.066l1.543-1.543c0.357-0.357 0.936-0.357 1.293 0s0.357 0.936 0 1.293l-1.543 1.543c-0.96 0.96-0.96 2.521 0 3.48 0.465 0.465 1.083 0.721 1.74 0.721s1.275-0.256 1.74-0.721l3.375-3.375c0.959-0.96 0.959-2.521 0-3.48-0.357-0.357-0.357-0.936 0-1.293s0.936-0.357 1.293 0c1.672 1.672 1.672 4.393 0 6.066l-3.375 3.375c-0.81 0.81-1.887 1.256-3.033 1.256z"></path></svg></div>';
				} elseif ( 'quote' === $format ) {
				return '<div class="loose-post-format-icon"><svg viewBox="0 0 18 18"><path d="M14.063 11.25c-2.175 0-3.938-1.763-3.938-3.938s1.763-3.938 3.938-3.938 3.938 1.763 3.938 3.938l0.018 0.563c0 4.349-3.526 7.875-7.875 7.875v-2.25c1.502 0 2.915-0.585 3.977-1.648 0.205-0.205 0.391-0.422 0.56-0.651-0.201 0.032-0.407 0.048-0.617 0.048zM3.938 11.25c-2.175 0-3.938-1.763-3.938-3.938s1.763-3.938 3.938-3.938 3.938 1.763 3.938 3.938l0.018 0.563c0 4.349-3.526 7.875-7.875 7.875v-2.25c1.502 0 2.915-0.585 3.977-1.648 0.205-0.205 0.391-0.422 0.56-0.651-0.201 0.032-0.407 0.048-0.617 0.048z"></path></svg></div>';
				}
			}
		}

	endif;

	/*
     * CSS output from customizer settings
     */
	if ( ! function_exists( 'loose_customize_css' ) ) :

	/**
	 * Custom css header output
	 */
	function loose_customize_css() {
		$hide_title_on_home_archive = get_theme_mod( 'hide_title_on_home_archive', 0 );
		$hide_meta_on_home_archive = get_theme_mod( 'hide_meta_on_home_archive', 0 );

		$custom_css = '.site-branding { background-color:' . esc_attr( get_theme_mod( 'header_bg_color', '#f5f8fa' ) ) . ';}';
		$custom_css .= '.loose-featured-slider, .loose-featured-slider .featured-image, .loose-featured-slider .no-featured-image {height:' . ( absint( get_theme_mod( 'home_page_slider_height', 500 ) ) * 0.6 ) . 'px;}';
		$custom_css .= '.loose-home-intro, .loose-home-intro span, .widget-title span {background-color: #' . esc_attr( get_theme_mod( 'background_color', 'ffffff' ) ) . ';}';
		$custom_css .= '#secondary .widget:nth-of-type(3n+1){background-color:' . esc_attr( get_theme_mod( 'sidebar_bg_color_1', '#f1f0ec' ) ) . ';}';
		$custom_css .= '#secondary .widget:nth-of-type(3n+2){background-color:' . esc_attr( get_theme_mod( 'sidebar_bg_color_2', '#fbf5bc' ) ) . ';}';
		$custom_css .= '#secondary .widget:nth-of-type(3n+3){background-color:' . esc_attr( get_theme_mod( 'sidebar_bg_color_3', '#f5f8fa' ) ) . ';}';
		$custom_css .= '.home .container, .archive .container, .search .container {max-width:' . absint( get_theme_mod( 'home_page_container_width', 1156 ) ) . 'px;}';
		$custom_css .= '.home .post_format-post-format-quote, .archive .post_format-post-format-quote, .search .post_format-post-format-quote, .single .post_format-post-format-quote blockquote {background-color:' . esc_attr( get_theme_mod( 'quote_post_format_bg', '#ea4848' ) ) . ';}';
		$custom_css .= '.home .post_format-post-format-link, .archive .post_format-post-format-link, .search .post_format-post-format-link {background-color:' . esc_attr( get_theme_mod( 'link_post_format_bg', '#414244' ) ) . ';}';
		$custom_css .= '.home .post_format-post-format-aside, .archive .post_format-post-format-aside, .search .post_format-post-format-aside {background-color:' . esc_attr( get_theme_mod( 'aside_post_format_bg', '#ffffff' ) ) . ';}';
		if ( $hide_title_on_home_archive ) {
			$custom_css .= '.blog .content-area .entry-title, .archive .content-area .entry-title, .search .content-area .entry-title {display:none;}';
			}
		if ( $hide_meta_on_home_archive ) {
			$custom_css .= '.blog .content-area .entry-meta, .archive .content-area .entry-meta, .search .content-area .entry-meta {display:none;}';
			}
		$custom_css .= '@media screen and (min-width: ' . absint( get_theme_mod( 'show_top_menu_width', 768 ) ) . 'px )  {';
		$custom_css .= '.menu-logo {float:left;}';
		$custom_css .= '.navbar-navigation ul, .nav-social {display:block;}';
		$custom_css .= '.loose-featured-slider, .loose-featured-slider .featured-image, .loose-featured-slider .no-featured-image {height:' . absint( get_theme_mod( 'home_page_slider_height', 500 ) ) . 'px;}';
		$custom_css .= '.entry-content a {color:' . esc_attr( get_theme_mod( 'content_link_color', '#000' ) ) . ';}';

		wp_add_inline_style( 'loose-style', $custom_css );
		}

	add_action( 'wp_enqueue_scripts', 'loose_customize_css' );

	endif;


	if ( ! function_exists( 'loose_months' ) ) :

	/**
	 * Months with translations for js.
	 *
	 * @return type
	 */
	function loose_months() {

		$months = array();

		$jan = esc_html__( 'January', 'loose' );
		$feb = esc_html__( 'February', 'loose' );
		$mar = esc_html__( 'March', 'loose' );
		$apr = esc_html__( 'April', 'loose' );
		$may = esc_html__( 'May', 'loose' );
		$jun = esc_html__( 'June', 'loose' );
		$jul = esc_html__( 'July', 'loose' );
		$aug = esc_html__( 'August', 'loose' );
		$sep = esc_html__( 'September', 'loose' );
		$oct = esc_html__( 'October', 'loose' );
		$nov = esc_html__( 'November', 'loose' );
		$dec = esc_html__( 'December', 'loose' );

		$months = array( $jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec );

		return $months;
		}

	endif;


	if ( ! function_exists( 'loose_days' ) ) :

	/**
	 * Days with translations for js.
	 *
	 * @return type
	 */
	function loose_days() {
		$days = array();

		$sun = esc_html__( 'Sunday', 'loose' );
		$mon = esc_html__( 'Monday', 'loose' );
		$tue = esc_html__( 'Tuesday', 'loose' );
		$wed = esc_html__( 'Wednesday', 'loose' );
		$thu = esc_html__( 'Thursday', 'loose' );
		$fri = esc_html__( 'Friday', 'loose' );
		$sat = esc_html__( 'Saturday', 'loose' );

		$days = array( $sun, $mon, $tue, $wed, $thu, $fri, $sat );

		return $days;
		}

	endif;


	if ( ! function_exists( 'loose_submenu_span' ) ) :

	/**
	 * Function add span to menu elements which has children.
	 *
	 * @param string $item_output html output.
	 * @param type   $item menu element object.
	 * @param type   $depth menu depth level.
	 * @param type   $args nwv walker args.
	 * @return string
	 */
	function loose_submenu_span( $item_output, $item, $depth, $args ) {

		$needle1 = 'menu-item-has-children';
		$needle2 = 'page_item_has_children';
		$haystack = $item->classes;
		if ( in_array( $needle1, $haystack ) || in_array( $needle2, $haystack ) ) {
			$item_output = $item_output . '<span class="expand-submenu" title="' . esc_html__( 'Expand', 'loose' ) . '">&#43;</span>';
			}

		return $item_output;
		}

	add_filter( 'walker_nav_menu_start_el', 'loose_submenu_span', 10, 4 );


	endif;


	if ( ! function_exists( 'loose_social_profiles' ) ) :

	/**
	 * Function for displaying social profiles from customizer settings.
	 *
	 * @return string
	 */
	function loose_social_profiles() {

		$output = '';

		$loose_social_icons_twitter = get_theme_mod( 'social_icons_twitter' );
		$loose_social_icons_facebook = get_theme_mod( 'social_icons_facebook' );
		$loose_social_icons_googleplus = get_theme_mod( 'social_icons_googleplus' );
		$loose_social_icons_instagram = get_theme_mod( 'social_icons_instagram' );
		$loose_social_icons_pinterest = get_theme_mod( 'social_icons_pinterest' );
		$loose_social_icons_youtube = get_theme_mod( 'social_icons_youtube' );

		if ( ! empty( $loose_social_icons_twitter ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_twitter ) . '" title="' . esc_html__( 'Twitter', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Twitter', 'loose' ) . '</span><svg viewBox="0 0 26 28"><path d="M25.312 6.375q-1.047 1.531-2.531 2.609 0.016 0.219 0.016 0.656 0 2.031-0.594 4.055t-1.805 3.883-2.883 3.289-4.031 2.281-5.047 0.852q-4.234 0-7.75-2.266 0.547 0.063 1.219 0.063 3.516 0 6.266-2.156-1.641-0.031-2.938-1.008t-1.781-2.492q0.516 0.078 0.953 0.078 0.672 0 1.328-0.172-1.75-0.359-2.898-1.742t-1.148-3.211v-0.063q1.062 0.594 2.281 0.641-1.031-0.688-1.641-1.797t-0.609-2.406q0-1.375 0.688-2.547 1.891 2.328 4.602 3.727t5.805 1.555q-0.125-0.594-0.125-1.156 0-2.094 1.477-3.57t3.57-1.477q2.188 0 3.687 1.594 1.703-0.328 3.203-1.219-0.578 1.797-2.219 2.781 1.453-0.156 2.906-0.781z"></path></svg></a>';
			}
		if ( ! empty( $loose_social_icons_facebook ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_facebook ) . '" title="' . esc_html__( 'Facebook', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Facebook', 'loose' ) . '</span><svg viewBox="0 0 16 28"><path d="M14.984 0.187v4.125h-2.453q-1.344 0-1.813 0.562t-0.469 1.687v2.953h4.578l-0.609 4.625h-3.969v11.859h-4.781v-11.859h-3.984v-4.625h3.984v-3.406q0-2.906 1.625-4.508t4.328-1.602q2.297 0 3.563 0.187z"></path></svg></a>';
			}
		if ( ! empty( $loose_social_icons_googleplus ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_googleplus ) . '" title="' . esc_html__( 'Google Plus', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Google Plus', 'loose' ) . '</span><svg viewBox="0 0 36 28"><path d="M22.453 14.266q0 3.25-1.359 5.789t-3.875 3.969-5.766 1.43q-2.328 0-4.453-0.906t-3.656-2.438-2.438-3.656-0.906-4.453 0.906-4.453 2.438-3.656 3.656-2.438 4.453-0.906q4.469 0 7.672 3l-3.109 2.984q-1.828-1.766-4.562-1.766-1.922 0-3.555 0.969t-2.586 2.633-0.953 3.633 0.953 3.633 2.586 2.633 3.555 0.969q1.297 0 2.383-0.359t1.789-0.898 1.227-1.227 0.766-1.297 0.336-1.156h-6.5v-3.938h10.813q0.187 0.984 0.187 1.906zM36 12.359v3.281h-3.266v3.266h-3.281v-3.266h-3.266v-3.281h3.266v-3.266h3.281v3.266h3.266z"></path></svg></a>';
			}
		if ( ! empty( $loose_social_icons_instagram ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_instagram ) . '" title="' . esc_html__( 'Instagram', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Instagram', 'loose' ) . '</span><svg viewBox="0 0 24 28"><path d="M21.281 22.281v-10.125h-2.109q0.313 0.984 0.313 2.047 0 1.969-1 3.633t-2.719 2.633-3.75 0.969q-3.078 0-5.266-2.117t-2.188-5.117q0-1.062 0.313-2.047h-2.203v10.125q0 0.406 0.273 0.68t0.68 0.273h16.703q0.391 0 0.672-0.273t0.281-0.68zM16.844 13.953q0-1.937-1.414-3.305t-3.414-1.367q-1.984 0-3.398 1.367t-1.414 3.305 1.414 3.305 3.398 1.367q2 0 3.414-1.367t1.414-3.305zM21.281 8.328v-2.578q0-0.438-0.313-0.758t-0.766-0.32h-2.719q-0.453 0-0.766 0.32t-0.313 0.758v2.578q0 0.453 0.313 0.766t0.766 0.313h2.719q0.453 0 0.766-0.313t0.313-0.766zM24 5.078v17.844q0 1.266-0.906 2.172t-2.172 0.906h-17.844q-1.266 0-2.172-0.906t-0.906-2.172v-17.844q0-1.266 0.906-2.172t2.172-0.906h17.844q1.266 0 2.172 0.906t0.906 2.172z"></path></svg></a>';
			}
		if ( ! empty( $loose_social_icons_pinterest ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_pinterest ) . '" title="' . esc_html__( 'Pinterest', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Pinterest', 'loose' ) . '</span><svg viewBox="0 0 24 28"><path d="M24 14q0 3.266-1.609 6.023t-4.367 4.367-6.023 1.609q-1.734 0-3.406-0.5 0.922-1.453 1.219-2.562 0.141-0.531 0.844-3.297 0.313 0.609 1.141 1.055t1.781 0.445q1.891 0 3.375-1.070t2.297-2.945 0.812-4.219q0-1.781-0.93-3.344t-2.695-2.547-3.984-0.984q-1.641 0-3.063 0.453t-2.414 1.203-1.703 1.727-1.047 2.023-0.336 2.094q0 1.625 0.625 2.859t1.828 1.734q0.469 0.187 0.594-0.313 0.031-0.109 0.125-0.484t0.125-0.469q0.094-0.359-0.172-0.672-0.797-0.953-0.797-2.359 0-2.359 1.633-4.055t4.273-1.695q2.359 0 3.68 1.281t1.32 3.328q0 2.656-1.070 4.516t-2.742 1.859q-0.953 0-1.531-0.68t-0.359-1.633q0.125-0.547 0.414-1.461t0.469-1.609 0.18-1.18q0-0.781-0.422-1.297t-1.203-0.516q-0.969 0-1.641 0.891t-0.672 2.219q0 1.141 0.391 1.906l-1.547 6.531q-0.266 1.094-0.203 2.766-3.219-1.422-5.203-4.391t-1.984-6.609q0-3.266 1.609-6.023t4.367-4.367 6.023-1.609 6.023 1.609 4.367 4.367 1.609 6.023z"></path></svg></a>';
			}
		if ( ! empty( $loose_social_icons_youtube ) ) {
			$output .= '<a href="' . esc_url( $loose_social_icons_youtube ) . '" title="' . esc_html__( 'Youtube', 'loose' ) . '"><span class="screen-reader-text">' . esc_html__( 'Youtube', 'loose' ) . '</span><svg viewBox="0 0 15 18"><path d="M9.753 12.496v2.119q0 0.673-0.392 0.673-0.231 0-0.452-0.221v-3.023q0.221-0.221 0.452-0.221 0.392 0 0.392 0.673zM13.148 12.506v0.462h-0.904v-0.462q0-0.683 0.452-0.683t0.452 0.683zM3.445 10.316h1.075v-0.944h-3.134v0.944h1.055v5.715h1.004v-5.715zM6.338 16.031h0.894v-4.962h-0.894v3.797q-0.301 0.422-0.573 0.422-0.181 0-0.211-0.211-0.010-0.030-0.010-0.352v-3.656h-0.894v3.927q0 0.492 0.080 0.733 0.121 0.372 0.583 0.372 0.482 0 1.025-0.613v0.542zM10.647 14.545v-1.979q0-0.733-0.090-0.994-0.171-0.563-0.713-0.563-0.502 0-0.934 0.542v-2.18h-0.894v6.66h0.894v-0.482q0.452 0.552 0.934 0.552 0.542 0 0.713-0.552 0.090-0.271 0.090-1.004zM14.042 14.444v-0.131h-0.914q0 0.512-0.020 0.613-0.070 0.362-0.402 0.362-0.462 0-0.462-0.693v-0.874h1.798v-1.035q0-0.794-0.271-1.165-0.392-0.512-1.065-0.512-0.683 0-1.075 0.512-0.281 0.372-0.281 1.165v1.738q0 0.794 0.291 1.165 0.392 0.512 1.085 0.512 0.723 0 1.085-0.532 0.181-0.271 0.211-0.542 0.020-0.090 0.020-0.583zM7.935 5.273v-2.109q0-0.693-0.432-0.693t-0.432 0.693v2.109q0 0.703 0.432 0.703t0.432-0.703zM15.157 12.817q0 2.35-0.261 3.516-0.141 0.593-0.583 0.994t-1.025 0.462q-1.848 0.211-5.575 0.211t-5.575-0.211q-0.583-0.060-1.030-0.462t-0.578-0.994q-0.261-1.125-0.261-3.516 0-2.35 0.261-3.516 0.141-0.593 0.583-0.994t1.035-0.472q1.838-0.201 5.565-0.201t5.575 0.201q0.583 0.070 1.030 0.472t0.578 0.994q0.261 1.125 0.261 3.516zM5.133 0h1.025l-1.215 4.008v2.722h-1.004v-2.722q-0.141-0.743-0.613-2.129-0.372-1.035-0.653-1.878h1.065l0.713 2.642zM8.849 3.345v1.758q0 0.814-0.281 1.185-0.372 0.512-1.065 0.512-0.673 0-1.055-0.512-0.281-0.382-0.281-1.185v-1.758q0-0.804 0.281-1.175 0.382-0.512 1.055-0.512 0.693 0 1.065 0.512 0.281 0.372 0.281 1.175zM12.214 1.718v5.012h-0.914v-0.552q-0.532 0.623-1.035 0.623-0.462 0-0.593-0.372-0.080-0.241-0.080-0.753v-3.958h0.914v3.686q0 0.331 0.010 0.352 0.030 0.221 0.211 0.221 0.271 0 0.573-0.432v-3.827h0.914z"></path></svg></a>';
			}

		return $output;
		}

	endif;

	if ( ! function_exists( 'loose_show_sticky' ) ) :

	/**
	 * Show sticky posts below slider depends on option
	 *
	 * @return bool
	 */
	function loose_show_sticky() {
		if ( is_sticky() && ! get_theme_mod( 'home_page_show_sticky', 0 ) ) {
			return false;
			}
		return true;
		}

	endif;

	if ( ! function_exists( 'loose_excerpt_length' ) ) :

	add_filter( 'excerpt_length', 'loose_excerpt_length', 100 );
	/**
	 * Custom excerpt length
	 *
	 * @return int
	 */
	function loose_excerpt_length() {
		return get_theme_mod( 'excerpt_length', 55 );
		}
	endif;

	if ( ! function_exists( 'loose_the_title' ) ) :
	/**
	 * Title wrapper function to handle multiple post formats.
	 *
	 * @return void
	 */
	function loose_the_title() {
		if ( ! has_post_format( 'aside' ) && ! has_post_format( 'link' ) && ! has_post_format( 'quote' ) && ! has_post_format( 'image' ) ) {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
	}
	endif;

	if ( ! function_exists( 'loose_the_content' ) ) :
	/**
	 * Content wrapper function to handle multiple post formats.
	 *
	 * @return void
	 */
	function loose_the_content() {
		if ( has_post_format( 'aside' ) || has_post_format( 'link' ) ) {
			the_content( __( 'Continue reading &rarr;', 'loose' ) );
		} elseif ( has_post_format( 'quote' ) ) {

			if ( is_single() ) {
				the_content();
			} else {
				$content = get_the_content( __( 'Continue reading &rarr;', 'loose' ) );
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
				$regex = '/<cite>.*<\/cite>/s';
				$content = preg_replace( $regex, '', $content );
				echo '<a href="' . get_permalink() . '">' . $content . '</a>'; // WPCS: XSS OK.
			}
		} else {
			if ( 'content' === get_theme_mod( 'show_content_or_excerpt', 'title' ) ) {
				the_content( __( 'Continue reading &rarr;', 'loose' ) );
			} elseif ( 'excerpt' === get_theme_mod( 'show_content_or_excerpt', 'title' ) ) {
				the_excerpt();
			}
		}
	}
	endif;

	if ( ! function_exists( 'loose_entry_meta' ) ) :
	/**
	 * Function to handle displaying entry meta section for multiple post formats.
	 *
	 * @return void
	 */
	function loose_entry_meta() {
		if ( 'post' == get_post_type() ) :
		?>
			<div class="entry-meta">
			<?php
			if ( ! is_single() && has_post_format( 'link' ) ) {
				// Extracting link from the content.
				$subject = get_the_content();
				$subject = apply_filters( 'the_content', $subject );
				$regex = '#<a\s+(?:[^>]*?\s+)?href=[\"\'](.*?)[\"\']#';
				preg_match( $regex, $subject, $matches );
				if ( ! empty( $matches[1] ) ) {
					$match = $matches[1];
					echo '<span class="loose-post-format loose-link-post-format"><a href="' . esc_url( $match ) . '">' . esc_url( $match ) . '</a></span>';
				}
			} elseif ( ! is_single() && has_post_format( 'quote' ) ) {
				$subject = get_the_content();
				$subject = apply_filters( 'the_content', $subject );
				$regex = '/<cite>.*<\/cite>/s';
				preg_match( $regex, $subject, $matches );
				if ( $matches && $matches[0] ) {
					$match = $matches[0];
					echo '<span class="loose-post-format loose-quote-post-format">' . wp_kses_post( $match ) . '</span>';
				}
			} elseif ( has_post_format( 'image' ) ) {
				echo '';
			} else {
				loose_posted_on();
			}
			?>
			</div><!-- .entry-meta -->
		<?php
		endif;
	}
	endif;

	/**
	 * Function to handle displaying section before single content.
	 *
	 * @return void
	 */
	function loose_single_before_content() {
	if ( is_attachment() ) :
	?>
			<div class="col-md-12">
				<div class="category-list">
					<?php echo esc_html__( 'Attachment page', 'loose' ); ?>
				</div>
			</div>
		<?php elseif ( ! has_post_format( 'quote' ) ) : ?>
			<div class="col-md-12">
				<div class="category-list">
				<?php the_category( __( ' &#124; ', 'loose' ) ); ?>
				</div>
			</div>
		<?php
		endif;
	}
