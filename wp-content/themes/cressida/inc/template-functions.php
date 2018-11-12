<?php
/**
 * Additional features for Cressida theme
 *
 * @package Cressida
 */
if ( ! function_exists( 'cressida_default_nav' ) ) :
	/**
	 * Set and display default main nav if no menu is assigned
	 *
	 * @return  Returns menu markup
	 */
	function cressida_default_nav() {
		echo '<div id="main-menu" class="menu-container navbar-collapse collapse">';
		echo '<ul class="menu nav navbar-nav">';
		$pages = get_pages();

		foreach ( $pages as $page ) {
			$menu_name = esc_html( $page->post_title );
			$menu_link = get_page_link( $page->ID );
			$menu_class = "nav-link page-item-" . $page->ID;

			if ( get_the_ID() == $page->ID ) {
				$current_class = "current_page_item current-menu-item";
			} else {
				$current_class = '';
			}

			echo "<li class='page_item $menu_class $current_class'><a href='$menu_link'>$menu_name</a></li>";
		}

		echo '</ul>';
		echo '</div>';
	}
endif; // function_exists( 'cressida_default_nav' )

add_filter( 'wp_page_menu', 'cressida_wp_page_menu_class' );
/**
 * Add class to default page nav
 *
 * This function is attached to 'wp_page_menu' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'wp_page_menu', 'cressida_wp_page_menu_class' );
 *
 * @param  string $class HTML output of a page-based menu
 * @return string        Returns filtered page memnu markup
 */
function cressida_wp_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
}

add_filter( 'comment_form_fields', 'cressida_move_comment_field_to_bottom' );
/**
 * Reverse Comment Form fields order and set cookies
 * consent field after the comment field.
 *
 * This function is attached to 'comment_form_fields' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'comment_form_fields', 'cressida_move_comment_field_to_bottom' );
 *
 * @param  array $fields The comment fields.
 * @return array Returns filtered comment form fields
 */
function cressida_move_comment_field_to_bottom( $fields ) {
	if ( get_post_type() == 'post' ) :
		$comment_field = $fields['comment'];
		$cookies       = $fields['cookies'];
		unset( $fields['comment'] );
		unset( $fields['cookies'] );
		$fields['comment'] = $comment_field;
		$fields['cookies'] = $cookies;
	endif;
	return $fields;
}

add_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
/**
 * Filter number of words for excerpt
 *
 * This function is attached to 'excerpt_length' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
 *
 * @param  int $length Number of words, default 55
 * @return int         Returns filtered number of words
 */
function cressida_excerpt_length( $length ) {
	if ( ! is_admin() ) :
		return 22;
	else :
		return $length;
	endif;
}
/**
 * Filter number of words for excerpt
 *
 * This function is attached to 'excerpt_length' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'excerpt_length', 'cressida_featured_excerpt_length', 999 );
 *
 * @param  int $length Number of words, default 55
 * @return int         Returns filtered number of words
 */
function cressida_featured_excerpt_length( $length ) {
	if ( ! is_admin() ) :
		return 14;
	else :
		return $length;
	endif;
}
/**
 * Filter number of words for excerpt
 *
 * This function is attached to 'excerpt_length' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'excerpt_length', 'cressida_featured_excerpt_length', 999 );
 *
 * @param  int $length Number of words, default 55
 * @return int         Returns filtered number of words
 */
function cressida_highlight_excerpt_length( $length ) {
	if ( ! is_admin() ) :
		return 35;
	else :
		return $length;
	endif;
}

add_filter( 'excerpt_more', 'cressida_excerpt_more' );
/**
 * Excerpt more
 * @param  string $more Content appended to excerpt
 * @return string       Returnes filtered content appended to excerpt
 */
function cressida_excerpt_more( $more ) {
	if ( ! is_admin() ) :
		return '&hellip;';
	else :
		return $more;
	endif;
}

add_filter( 'embed_oembed_html', 'cressida_embed_oembed_html', 99, 4 );
/**
 * Wrap oEmbed-embedded video in <div>
 *
 * This function is attached to 'embed_oembed_html' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'embed_oembed_html', 'cressida_embed_oembed_html', 99, 4 );
 *
 * @link https://wordpress.stackexchange.com/a/50781
 *
 * @param  [type] $html    oEmbed HTML
 * @param  string $url     oEmbed URL
 * @param  array $attr     Array of attributes
 * @param  int $post_id    Post ID
 * @return string          Returns filtered oEmbed HTML
 */
function cressida_embed_oembed_html( $html, $url, $attr, $post_id ) {
  return '<div class="iframe-video">' . $html . '</div>';
}

add_filter( 'widget_tag_cloud_args', 'cressida_tag_cloud_filter', 90 );
/**
 * Filter tag chould args and set the same font size
 * for all tags. This function is attached to
 * 'widget_tag_cloud_args' filter hook.
 *
 * @param  array  $args Array of arguments
 * @return array        Returns array of filtered args
 */
function cressida_tag_cloud_filter( $args = array() ) {
	$args['smallest'] = 100;
	$args['largest'] = 100;
	$args['unit'] = '%';
	return $args;
}

if ( ! function_exists( 'cressida_html5_comment' ) ) :
	/**
	 * Template for comments and pingbacks list
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments list. @see comments.php
	 *
	 * @param obj    $comment      Comment object
	 * @param array  $args         An array of arguments for displaying comments.
	 * @param int    $depth        The depth of the new comment. Must be greater than 0 and less than the value
	 *                             of the 'thread_comments_depth' option set in Settings > Discussion. Default 0.
	 * @return string   Returns comment markup
	 */
	function cressida_html5_comment( $comment, $args, $depth ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>

		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php comment_author_link( $comment ); ?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php echo get_comment_date( '', $comment ); ?>
							</time>
						</a>
						<?php edit_comment_link( esc_html__( 'Edit', 'cressida' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'cressida' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					/**
					 * Reply link
					 * Merge new args with default ones
					 * @link https://codex.wordpress.org/Function_Reference/comment_reply_link
					 */
					$reply_args = array(
						'reply_text' => esc_html__( 'Reply', 'cressida' ),
						'login_text' => esc_html__( 'Log in to reply.', 'cressida' ),
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>'
					);
					comment_reply_link( array_merge( $args, $reply_args ) );
				?>
			</article><!-- .comment-body --><?php
	}
endif; // ! function_exists( 'cressida_html5_comment' )

if ( ! function_exists( 'cressida_get_first_embed_media' ) ) :
    /**
     * Get first embedded video from post
     *
     * @param  int $post_id Post id
     * @return mix|null     Returns either <iframe> or false
     */
    function cressida_get_first_embed_media( $post_id ) {
        $post    = get_post( $post_id );
        $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
        $embeds  = get_media_embedded_in_content( $content );

        if ( ! empty( $embeds ) ) :
            //check what is the first embed containg video tag, youtube or vimeo
            foreach ( $embeds as $embed ) :
                if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) :

                    $output = '<div class="embedded embedded--16by9">';
                    $output .= $embed;
                    $output .= '</div>';

                    return $output;
                endif;
            endforeach;
        else :
            return false;
        endif;
    }
endif; // ! function_exists( 'cressida_get_first_embed_media' )

add_filter( 'body_class', 'cressida_body_class' );
/**
 * Body classes
 *
 * Custom classes for <body> tag. This function
 * is attached to 'body_class' filter hook. For
 * overriding in child themes, simply remove
 * the filter hook.
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function cressida_body_class( $classes ) {
	if ( function_exists( 'get_theme_mod' ) || is_customize_preview() ) :
		// Set body class based on whether user
		// set custom background color in customizer.
		$cressida_background_color = get_background_color();

		if ( $cressida_background_color == 'ffffff' || empty( $cressida_background_color ) ) :
			$classes[] = 'cressida-background-color-default';
		elseif ( $cressida_background_color != 'ffffff' || ! empty( $cressida_background_color ) ) :
			$classes[] = 'cressida-background-color-custom';
		else :
			$classes[] = 'cressida-background-color-default';
		endif;
	endif;

	if ( ! is_front_page() ) :
		$classes[] = 'cressida-inner-page';
	endif;

	if ( is_singular() ) :
		$classes[] = 'cressida-singular';
	endif;

	return $classes;
}