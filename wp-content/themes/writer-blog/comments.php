<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="block">
	<div class="sub-block">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
			<h3 class="comments-title">
				<?php
				$comments_number = get_comments_number();
				if ( $comments_number === '1' ) {
					/* translators: %s: post title */
					printf( esc_html__( 'One Comment', 'writer-blog' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						esc_html(
							'%1$s Comment',
							'%1$s Comments',
							$comments_number,
							'comments title',
							'writer-blog'
						),
						esc_html( number_format_i18n( $comments_number ) ),
						get_the_title()
					);
				}
				?>
			</h3>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 42,
						'style'       => 'ol',
						'short_ping'  => true,
						//'callback'	  => 'writer_blog_comments_callback',
					) );
				?>
			</ol> <!-- /.comment-list .container -->

			<?php the_comments_pagination( array(
				'prev_text' => '<span class="comment-prev"></span>',
				'next_text' => '<span class="comment-next"></span>',
			) );

		endif; // Check for have_comments().

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'writer-blog' ); ?></p>
		<?php
		endif;

		$commenter = wp_get_current_commenter();
        if ( ! isset( $args['format'] ) ) {
		    $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		        $req = get_option( 'require_name_email' );
		        $aria_req = ( $req ? "aria-required='true'" : '' );
		        $html_req = ( $req ? "required='required'" : '' );
		    $html5    = 'html5' === $args['format'];
		}

	    $comments_args = array(
	        'comment_field' => '<div class="message"><label for="comment">' . esc_html__( 'Comment *', 'writer-blog' ) . '</label><textarea class="form-control" id="comment" name="comment" aria-required="true" rows="10" wrap="hard"></textarea></div>',

			'label_submit'         => esc_html__( 'Post Comment', 'writer-blog' ),
			'class_submit'         => 'submit submit-btn',
			'title_reply'          => esc_html__( 'Leave a Reply', 'writer-blog' ),
			'title_reply_before'   => '<div class="msg-form"><h5 id="reply-title" class="comment-reply-title">',
		    'title_reply_after'    => '</h5></div>',
	        'cancel_reply_before'  => '',
			'cancel_reply_after'   => '',
			'cancel_reply_link'    => '<small>' . esc_html__( 'Cancel reply', 'writer-blog' ) . '</small>',
			'submit_button'		   => '<div class="submit"><button class="submit-right-transition">' . esc_html__( 'Post comment', 'writer-blog' ) . '</button></div>',
			'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.', 'writer-blog' ) . '</span></p>',

			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="author"><label for="author">' . esc_html__( 'Name *', 'writer-blog' ) . '</label><input id="author" type="text" name="author" ' . $aria_req . $html_req  . ' /></div>',

				'email'  => '<div class="email"><label for="email">' . esc_html__( 'Email *', 'writer-blog' ) . '</label><input id="email" type="email" name="email" ' . $aria_req . $html_req  . ' /></div>',
					
		        'url'    => '<div class="url"><label for="url">' . esc_attr__( "Website", "writer-blog" ) . '</label><input id="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' name="url"></div>',
				)
			  ),
			);
		comment_form( $comments_args ); 
	
		?>
	</div><!-- /.sub-block -->
</div><!-- #comments -->