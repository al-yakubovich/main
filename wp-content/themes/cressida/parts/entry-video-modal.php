<?php
/**
 * Template for displaying video modal for video post formats
 *
 * @package Cressida
 */
if ( 'video' === get_post_format() && cressida_get_first_embed_media( get_the_ID() ) ) : ?>
	<div class="modal fade cressida-modal-video" id="cressida-video-modal-<?php the_ID(); ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<?php echo cressida_get_first_embed_media( get_the_ID() ); ?>
				</div>
				<div class="modal-footer">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php esc_html_e( 'Read more', 'cressida' ); ?></a>
				</div>
			</div>
		</div>
	</div>
<?php endif;
