<?php
/**
 * The template for displaying comments
 *
 * @package Cressida
 */
if ( post_password_required() ) { return; }

$commenter = wp_get_current_commenter();
$req       = get_option( 'require_name_email' );
$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$fields = array(
	'author' => '<div class="form-group form-group-author">
					<input type="text" class="form-control" id="author" name="author"
						placeholder="' . esc_html__( 'Name', 'cressida' ) . ( $req ? '*' : '' ) . '"
						value="' . esc_attr( $commenter['comment_author'] ) . '" />
				</div><!-- form-group form-group-author -->',

	'email'  => '<div class="form-group form-group-email">
					<input type="email" class="form-control" name="email" id="email"
						placeholder="' . esc_html__( 'Email Address', 'cressida' ) .( $req ? '*' : '' ) . '"
						value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />
				</div><!-- form-group form-group-email -->',

	'url'    => '<div class="form-group form-group-url">
					<input type="url" class="form-control" name="url" id="url"
						placeholder="' . esc_html__( 'Website', 'cressida' ) . '"
						value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
				</div><!-- form-group form-group-url -->',

	'cookies' => '<div class="form-group-cookie"><input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'cressida' ) . '</label></div>'
);

$comment_field = '<div class="form-group form-group-comment">
					<textarea rows="5" cols="" class="form-control" id="comment" name="comment"
					placeholder="' . esc_html__( 'Comments', 'cressida' ) .'"></textarea>
				</div><!-- form-group form-group-comment -->';

$comment_form_args = array(
	'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => $comment_field,
	'class_submit'  => esc_attr( 'submit-comment col-xs-12' ),
	'title_reply'   => esc_html__( 'Leave a comment', 'cressida' ),
	'label_submit'  => esc_html__( 'Post your comment &raquo;', 'cressida' )
);

// Set class based on whether user is logged in
$cressida_comments_class = cressida_set_conditional_class(
	is_user_logged_in(),
	' logged-in',
	' not-logged-in'
);
// Check if Jetpack subscriptions is enabled and add class.
if ( class_exists( 'Jetpack_Subscriptions' ) ) :
	$cressida_comments_class .= ' cressida-subscriptions';
endif;
?>

<div id="comments" class="comments">

	<div class="container container--background">
		<div class="row">

			<div class="col-lg-8 col-xs-12 sidebar-on <?php echo esc_attr( $cressida_comments_class ); ?>">
				<?php
					if ( comments_open() ) :
						if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
							// Translators: 1. Log in URL
							printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'cressida' ),
								esc_url( wp_login_url( get_permalink() ) ) // WPCS: XSS ok.
							);
						else :
							comment_form( $comment_form_args );
						endif;
					endif;
				?>
			</div>

		</div><!-- row -->
	</div><!-- container -->

	<?php if ( have_comments() ) : ?>
		<div class="comment-list-wrap">
			<div class="container">
				<div class="row">

				<div class="col-lg-8 col-xs-12 sidebar-on <?php echo esc_attr( $cressida_comments_class ); ?>">

					<h3 class="comment-title">
						<?php
							printf(
								/* translators: 1: number of comments */
								_nx(
									'%s Comment',
									'%s Comments',
									get_comments_number(),
									'comments title',
									'cressida'
								),
								number_format_i18n( get_comments_number() )
							);
						?>
					</h3>

					<?php the_comments_navigation(); ?>

					<ul class="comment-list">
						<?php
							wp_list_comments( array(
								'style'       => 'ul',
								'short_ping'  => true,
								'avatar_size' => 0,
							) );
						?>
					</ul>

					<?php the_comments_navigation(); ?>

					<?php
						if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
							esc_html_e( 'Comments are closed.', 'cressida' );
						endif;
					?>
				</div>

				</div><!-- row -->
			</div><!-- container -->
		</div><!-- comment-list-wrap -->
	<?php endif; // have_comments() ?>
</div><!-- comments -->