<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Page Template
 *
 */

get_header();

?>
<div class="container" id="main-content">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div id="page-container" <?php post_class( 'left with-sidebar' ); ?>>
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :

				the_post();

				the_content();

				wp_link_pages(
					array(
						'before'           => '<br class="clear" /><div class="paged_nav">' . __( 'Pages:', 'boldr-lite' ),
						'after'            => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'nextpagelink'     => __( 'Next page', 'boldr-lite' ),
						'previouspagelink' => __( 'Previous page', 'boldr-lite' ),
						'pagelink'         => '%',
						'echo'             => 1,
					)
				);

				?>
				<br class="clear" />
				<?php
				edit_post_link(
					__( 'Edit', 'boldr-lite' ),
					'<span class="editlink">',
					'</span><br class="clear" />'
				);
				?>
				<br class="clear" />
				<?php

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || '0' !== get_comments_number() ) :

					?>
					<div class="comments">
						<?php
						comments_template( '', true );
						next_comments_link();
						previous_comments_link();
						?>
					</div>
					<?php

				endif;

			endwhile;

		else :

			?>
			<h2><?php esc_html_e( 'Not Found', 'boldr-lite' ); ?></h2>
			<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'boldr-lite' ); ?></p>
			<?php

		endif;

	?>
	</div>

	<div id="sidebar-container" class="right">
		<ul id="sidebar"><?php dynamic_sidebar( 'sidebar' ); ?></ul>
	</div>

</div>
<?php

get_footer();
