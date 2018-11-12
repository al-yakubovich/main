<?php
/**
 * The template for displaying comments.
 *
 * @package Simple Days
 * @since 0.0.1
 * @version 0.0.3
 */






if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	
	if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( $comments_number >= '2' ) {
				printf('<i class="fa fa-comments-o" aria-hidden="true"></i> '.
					
					esc_attr(__('%1$s COMMENTS','simple-days')),
					absint(number_format_i18n( $comments_number ))
				);
			} else {
				
				echo '<i class="fa fa-comment-o" aria-hidden="true"></i> 1'. esc_html__( 'COMMENT', 'simple-days' );
			}
			?>
		</h4>

		<ul class="comment-list">
			<?php wp_list_comments('type=comment&callback=simple_days_comment'); ?>
			<?php
				//wp_list_comments( array('avatar_size' => 100,'style'       => 'ol',					'short_ping'  => true,				) );
			?>
		</ul>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		  <nav>
		    <ul class="comment_pager">
			  <li class="comment_previous"><?php previous_comments_link( '<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> '.__( 'Older Comments', 'simple-days' ) ); ?></li>
			  <li class="comment_next"><?php next_comments_link( __( 'Newer Comments', 'simple-days' ).' <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>' ); ?></li>
			</ul>
		  </nav>
				<!-- .comment-navigation -->
		  <?php } // Check for comment navigation

	endif; 

	
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
	<?php
	endif;
    if ( !is_amp()):
	  comment_form();
    elseif (comments_open()): ?>
      <a class="comment_button_amp" rel="nofollow" href="<?php echo esc_url(get_the_permalink())  ?>#respond"><?php esc_html_e( 'Post a comment', 'simple-days' ); ?></a>
    <?php else: ?>
	  <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
    <?php endif;
	?>

</div><!-- #comments -->
