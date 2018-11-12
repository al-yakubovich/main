<?php
	/**
		* The template for displaying Comments.
		*
		* The area of the page that contains both current comments
		* and the comment form.
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
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
	
	<?php // You can start editing here -- including this comment! ?>
	
	<?php if ( have_comments() ) : ?>
	<div class="comments-list-area">
		<h3 class="comments-title">
			<?php
			/* translators: %s is number of comments */
			printf(  esc_html(_nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'mystem' )) ,
			number_format_i18n( get_comments_number() ) );
			?>
		</h3>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'mystem' ); ?></h1>
			<div class="nav-previous">
				<?php
					previous_comments_link( '<i class="fas fa-arrow-circle-left"></i>' . __( 'Older Comments', 'mystem' ) );
				?>
			</div>
			<div class="nav-next">
				<?php
					next_comments_link( __( 'Newer Comments', 'mystem' ) . '<i class="fas fa-arrow-circle-right"></i>' );
				?>
			</div>
		</nav>
		<?php endif; // check for comment navigation ?>
		
		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'div',
					'short_ping' => true,
					'avatar_size'	=> 75,
				) );
			?>
		</div>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'mystem' ); ?></h1>
			<div class="nav-previous">
				<?php
					previous_comments_link( '<i class="fas fa-arrow-circle-left"></i>' . __( 'Older Comments', 'mystem' ) );
				?>
			</div>
			<div class="nav-next">
				<?php
					next_comments_link( __( 'Newer Comments', 'mystem' ) . '<i class="fas fa-arrow-circle-right"></i>' );
				?>
			</div>
		</nav>
		<?php endif; // check for comment navigation ?>
	</div>
	<?php endif; // have_comments() ?>
	
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'mystem' ); ?></p>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		comment_form( array(
			'id_form'				=> 'commentform',
			'id_submit'				=> 'submit',
			'title_reply'			=> __( 'Leave a Reply', 'mystem' ),
			/* translators: %s title of post */
			'title_reply_to'		=> __( 'Leave a Reply to %s', 'mystem' ),
			'cancel_reply_link'		=> __( 'Cancel Reply', 'mystem' ),
			'label_submit'			=> __( 'Post Comment', 'mystem' ),
			'comment_field'			=> '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>',
			/* translators: %s login url */
			'must_log_in'			=> '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'mystem' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
			/* translators: %1$s is profile url, %2$s is author name, %3$s  is logout url */
			'logged_in_as'			=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'mystem' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'comment_notes_before'	=> '',
			'comment_notes_after'	=> '',
			'fields'				=> apply_filters( 'comment_form_default_fields', array(
				'author'				=> '<p class="comment-form-author comment-form-field"><input id="author" name="author" type="text" placeholder="Name"' . $aria_req . ' /></p>',
				'email'					=> '<p class="comment-form-email comment-form-field"><input id="email" name="email" type="text" placeholder="Email"' . $aria_req . ' /></p>',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">' . __( 'Save my name and email in this browser for the next time I comment.', 'mystem' ) . '</label></p>',
			)	),
			)
		);
	?>
	</div>
