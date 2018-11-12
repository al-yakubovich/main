<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Template Name: Full-width Page Template, No Sidebar
 *
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		?>
		<div class="container" id="main-content">
			<h1 class="page-title"><?php the_title(); ?></h1>

			<div id="page-container" <?php post_class(); ?>>
				<?php

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

				?>
			</div>
		</div>
		<?php

	endwhile;

else :

	?>
	<div class="container" id="main-content">
		<h1 class="page-title"><?php esc_html_e( '404', 'boldr-lite' ); ?></h1>

		<div id="page-container">

			<h2><?php esc_html_e( 'Not Found', 'boldr-lite' ); ?></h2>
			<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'boldr-lite' ); ?></p>

		</div>
	</div>
	<?php

endif;

get_footer();
