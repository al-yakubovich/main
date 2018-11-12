<?php
/**
 * Displays slider on homepage
 */
?>

<div class="owl-slide" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .5) 100%), url('<?php echo esc_url( writer_blog_owl_carousal_slider_image() ); ?>')">
	<div class="container">
		<div class="row">
			<div class="nine columns">
				<div class="owl-slide-content">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php
						$trim_excerpt = get_the_excerpt();
						$short_excerpt = wp_trim_words( $trim_excerpt, $num_words = 55, $more = '... ' );
					?>
					<p class="description"><?php echo esc_html( $short_excerpt ); ?></p>
					<p class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /.owl-slide -->