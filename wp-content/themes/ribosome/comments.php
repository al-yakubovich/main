<?php
/**
 * The template for displaying Comments
 *
 * @package Ribosome
 */

/**
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
		<h2 class="comments-title">
			<?php
				printf( _n( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'ribosome' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist">
			<?php
			wp_list_comments( array(
				'callback' => 'ribosome_comment',
				'style'    => 'ol',
			) );
			?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php esc_attr_e( 'Comment navigation', 'ribosome' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'ribosome' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'ribosome' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation. ?>

		<?php

		/*
		 * If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) :
		?>
		<p class="nocomments"><?php esc_attr_e( 'Comments are closed.', 'ribosome' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments. ?>

	<div class="wrapper-form-comments">
	<?php comment_form(); ?>
	</div>

</div><!-- #comments .comments-area -->
