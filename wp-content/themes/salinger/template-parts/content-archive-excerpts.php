<?php
/**
 * The default template for displaying excerpts in content.php and archive.php
 *
 * @package Salinger
 */

?>
<div class="excerpt-wrapper"><!-- Excerpt -->
	<div class="excerpt-main-content clear">
		<?php
		if ( has_post_thumbnail() ) :
			?>
			<div class="wrapper-excerpt-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" >
					<?php
					if ( get_theme_mod( 'salinger_thumbnail_rounded', '' ) == '' ) {
						the_post_thumbnail( 'salinger-thumbnail-4x3' );
					} else {
						the_post_thumbnail( 'salinger-thumbnail-1x1' );
					}
					?>
				</a>	
			</div>
			<?php
		endif;
		?>

		<div class="wrapper-excerpt-content">
			<header class="entry-header">
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( get_theme_mod( 'salinger_show_meta_in_excerpts', 1 ) == 1 ) {
					?>
					<div class='entry-info'>
						<span class="author-in-excerpts"><i class="fa fa-user"></i> <?php salinger_entry_author(); ?></span>
						<span class="date-in-excerpts">
							&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php salinger_entry_date(); ?>
						</span>
						<span class="comments-in-excerpts">
							&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); ?>
						</span>
					</div><!-- .entry-info -->
					<?php
				}
				?>
			</header>
			<?php the_excerpt(); ?>

		</div><!-- .wrapper-excerpt-content -->
	</div><!-- excerpt-main-content -->

	<footer class="entry-meta">
		<div class="entry-taxonomies-excerpt">

			<span class="entry-meta-categories"><span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?></span>&nbsp;&nbsp;&nbsp;

			<?php
			$post_tags = get_the_term_list( $post->ID, 'post_tag' );

			if ( $post_tags ) {
				?>
				<span class="entry-meta-tags"><span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' ); ?></span>
				<?php
			}
			?>

			<div style="float:right;">
				<?php edit_post_link( __( 'Edit', 'salinger' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</div>
	</footer>
</div><!-- .excerpt-wrapper -->
