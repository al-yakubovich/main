<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shuban
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'shuban' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'shuban' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'shuban' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'shuban' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'shuban' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'shuban' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'shuban' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'shuban' ); ?></p>
	<?php
	endif;

		$shuban_comment_field = '<div class="comment-form-textarea form-group col-md-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="'. esc_html__('Enter your comment...', 'shuban') .'"></textarea></div>';
		$sp_fields =  array(

		  'author' =>
			'<div class="comment-form-author form-group col-md-4"><input id="author" placeholder="'. esc_html__('Name', 'shuban') .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" class="form-control" required /></div>',

		  'email' =>
			'<p class="comment-form-email form-group col-md-4"><input id="email" placeholder="'. esc_html__('Email', 'shuban') .'" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" class="form-control" required /></p>',

		  'url' =>
			'<p class="comment-form-url form-group col-md-4"><input id="url" placeholder="'. esc_html__('Website', 'shuban') .'" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" class="form-control" /></p>',
		);

		comment_form(array(
			'comment_field' => $shuban_comment_field,
			'title_reply_before' => '<h4 class="reply-title shuban-reply-title">',
			'title_reply_after' => '</h4>',
			'title_reply' => esc_html__('Leave a Comment', 'shuban'),
			'cancel_reply_link' => esc_html__('Cancel Comment', 'shuban'),
			'label_submit' => esc_html__('Post Comment', 'shuban'),
			'fields' => $sp_fields,
			'class_submit' => 'submit btn btn-primary comment-submit-btn',
			'submit_field' => '<div class="form-submit text-center col">%1$s %2$s</div>',
			'cancel_reply_before' => '<small class="shuban-cancel-reply">',
			'class_form' => 'comment-form row'
		));
	?>

</div><!-- #comments -->
