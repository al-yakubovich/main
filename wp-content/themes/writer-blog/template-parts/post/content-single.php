<?php
/**
 * Displays single post
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="block">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="content-image">
				<?php the_post_thumbnail( 'large' ) ?>
			</div><!-- /.image-container -->
		<?php endif; ?>
		<div class="sub-block">
			<h1 class="single-post-title"><?php the_title(); ?></h1>
			<div class="post-content"><?php the_content(); ?></div>

			<?php
				wp_link_pages(
					array(
						'before'      => '<div class="link-pages">' . __( 'Continue Reading:', 'writer-blog' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-numbers">',
						'link_after'  => '</span>',
					)
				);
			?>

			<div class="content-footer">
				<div class="single-post-info">
					<p class="post-category"><?php writer_blog_list_categories(); ?></p>
					<?php
						if( $tags = get_the_tags() ) {
						    echo '<span class="meta-sep"></span>';
						    foreach( $tags as $tag ) {
						        $sep = ( $tag === end( $tags ) ) ? '' : ', ';
						        echo '<a href="' . esc_url( get_term_link( $tag, $tag->taxonomy ) ) . '">#' . esc_html( $tag->name ) . '</a>' . esc_html( $sep );
						    }
						}
					?>
					<span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>
	      		</div><!-- /.single-post-info -->
			</div><!-- /.content-footer -->

			<div class="author-info">
				<div class="author-image clearfix">
	      			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta('ID') ); ?></a>
				</div><!-- /.author-image -->
				<div class="comment-wrapper">
						<b class="comment-name"><?php esc_html_e( 'Published By', 'writer-blog' );?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a></b>
						<?php if ( get_the_author_meta( 'description' ) ): ?>
							<p><?php the_author_meta( 'description' ); ?></p>
						<?php endif ?>
					<div class="author-link">
						<?php if ( get_the_author_meta( 'user_url' ) ): ?>
							<a href="<?php the_author_meta( 'user_url' ); ?>"><?php esc_html_e( 'Visit Website', 'writer-blog' );?></a>
						<?php endif ?>
					</div><!-- /.author-link -->
				</div><!-- /.comment-wrapper -->
			</div><!-- /.author-info -->

		</div><!-- /.sub-block -->
	</div><!-- /.block -->

</article>