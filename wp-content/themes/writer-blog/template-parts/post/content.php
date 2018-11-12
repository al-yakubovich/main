<?php
/**
 * Displays blog post loop
 */
?>
<div <?php post_class( 'block' ); ?>>
	<?php
		if( get_the_post_thumbnail() ) :
	?>
		<div class="image-container">
			<?php the_post_thumbnail('large'); ?>
			<a href="<?php the_permalink(); ?>"><span class="icon-overlay"></span></a>
		</div><!-- /.image-container -->
	<?php
		endif;
	?>
	<div class="sub-block">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php
			$trim_excerpt = get_the_excerpt();
			$short_excerpt = wp_trim_words( $trim_excerpt, $num_words = 55, $more = '... ' );
		?>

		<p class="post-excerpt"><?php echo esc_html( $short_excerpt ); ?></p>
		<div class="excerpt-footer">
			<p class="post-read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE', 'writer-blog' ) ?></a></p>
			<div class="post-info">
				<p class="post-category"><?php writer_blog_list_categories(); ?></p>
				<span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>
				<?php writer_blog_excerpt_info(); ?>
      		</div><!-- /.post-info -->
		</div><!-- /.excerpt-footer -->
	</div><!-- /.sub-block -->
</div><!-- /.block -->