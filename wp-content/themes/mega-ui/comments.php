<?php if ( post_password_required() ) : ?>
<div class="alert alert-info mt5 fade show">
    <?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'mega-ui' ); ?>
</div>
	<?php return; endif; ?>
<div class="card author mt5" >
    <?php if ( have_comments() ) : ?>
	<div id="comments">
		<div class="card-header">
			<h1 class="md20 xs18 w600"><?php comments_number(); ?></h1>						
		</div>
		<div class="card-body">
			<?php wp_list_comments( array( 'callback' => 'mega_ui_comment' ) ); ?>
		</div>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<ul class="pager">
			<li class="float-left"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mega-ui' ) ); ?></li>
			<li class="float-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mega-ui' ) ); ?></li>
		</ul>
		<?php endif;  ?>
	</div>		
	<?php endif; ?>
	
<?php if ( comments_open() ) : ?>
<div class="subscribe-form">
	<div class="card-body">
	<?php $fields=array(
		'author' => '<label for="replyFormName">' . esc_html__( "Your name","mega-ui" ).'</label><input type="text" name="author" id="name"  class="form-control" required><br>',
		'email' => '<label for="replyFormEmail">' . esc_html__( "Your e-mail","mega-ui" ).'</label><input type="email" name="email" id="email" class="form-control" required><br>',
		'url' => '<label for="replyFormEmail">' . esc_html__( "Website","mega-ui" ).'</label><input type="text" name="url" id="url" class="form-control"><br>',
	);
	function mega_ui_comment_fields($fields) { 
		return $fields;
	}
	add_filter('wl_comment_form_default_fields','mega_ui_comment_fields');
		$defaults = array(
		'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group"><label for="replyFormComment">' . esc_html__( "Your comment","mega-ui" ).'</label><textarea class="form-control" id="comment" name="comment" rows="5" required></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . esc_html__( "Logged in as ","mega-ui" ).'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="'. esc_html__('Log out of this account','mega-ui').'">'.esc_html__(" Log out?","mega-ui").'</a>' . '</p>',
		'class_submit' => 'btn btn-primary btn-md waves-effect waves-light',
		'label_submit'=>esc_html__( 'Post Comment','mega-ui'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> esc_html__('Leave Your Comment Here','mega-ui'),		
		'role_form'=> 'form',		
		);
		comment_form($defaults); ?>	
	</div>
</div>
<?php endif; // If registration required and not logged in ?>
</div>