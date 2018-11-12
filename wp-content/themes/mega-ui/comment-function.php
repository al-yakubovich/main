<?php 
// code for comment
function mega_ui_comment( $comment, $args, $depth ) 
{ global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','mega-ui'); ?>
	<div id="comment-<?php echo esc_html($comment->comment_ID); ?>" class="row comment-body">						
		<div class="col-lg-2 col-md-3 col-xs-3 mt2">
			<?php echo get_avatar( $comment->comment_author_email , 150, 'monsterid', get_comment_author(), array('class'=>'img-fluid center-block') ); ?>
		</div>
		<div class="col-lg-10 col-md-9 col-xs-9 lmt0 xsmt5">
			<h3 class="md20 xs18 w600"><?php if($comment->comment_author_url!='') { ?><a href="<?php echo esc_url($comment->comment_author_url); ?>" rel="nofollow"><?php } comment_author(); if($comment->comment_author_url!='') echo '</a>'; ?> </h3>
			<span class="md14"><?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
				<?php comment_date('F j, Y');?>
				<?php else : ?>
				<?php comment_date(); ?>
				<?php endif; ?>
				<?php esc_html_e('at','mega-ui');?>&nbsp;<?php comment_time('g:i a'); ?></span>
			<span class="float-right"><?php comment_reply_link( 
                    array_merge( 
                        $args, 
                        array(
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?></span>
			<div class="md16 sm15 xs13 w400 mt2"><?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'mega-ui' ); ?></em>
				<br/>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php
} ?>