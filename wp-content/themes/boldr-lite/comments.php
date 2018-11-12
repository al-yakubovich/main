<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Comments template
 *
 */

// Do not delete these lines
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) :
	die( esc_html__( 'Please do not load this page directly. Thanks!', 'boldr-lite' ) );
endif;

if ( post_password_required() ) :
	?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'boldr-lite' ); ?></p>
	<?php
	return;
endif;

if ( have_comments() ) :

	?>
	<h3 id="comments">
		<?php
		printf(
			// Translators: %1$s is the number of comments, %2$s is the post title
			esc_html( _n( '%1$s Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'boldr-lite' ) ),
			esc_html( number_format_i18n( get_comments_number() ) ),
			get_the_title()
		);
		?>
	</h3>

	<ol class="commentlist">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => 64,
				'reply_text'  => '<div class="reply-button"><span>' . __( 'Reply', 'boldr-lite' ) . '</span></div>',
			)
		);
		?>
	</ol>
	<?php

	if ( boldr_page_has_comments_nav() ) :
		?>
		<div class="comments_nav">
			<?php
			if ( boldr_page_has_previous_comments_link() ) :
				?>
				<div class="previous">
					<?php previous_comments_link( __( 'Older comments', 'boldr-lite' ) ); ?>
				</div>
				<?php
			endif;

			if ( boldr_page_has_next_comments_link() ) :
				?>
				<div class="next">
					<?php next_comments_link( __( 'Newer comments', 'boldr-lite' ) ); ?>
				</div>
				<?php
			endif;
	?>
	</div>
	<?php
	endif;

else : // this is displayed if there are no comments so far

	if ( ! comments_open() ) : // comments are closed
		?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'boldr-lite' ); ?></p>
		<?php
	endif;

endif;

if ( comments_open() ) :
	comment_form();
endif;
