<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Main Index
 *
 */

get_header();

?>
<div id="main-content" class="container">
	<?php

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ) :
		?>
		<h1 class="page-title">
			<?php
			// Translators: %s is the search term.
			printf( esc_html__( 'Search Results for "%s"', 'boldr-lite' ), get_search_query() );
			?>
		</h1>
		<?php
	endif;

	/* ARCHIVE CONDITIONAL TITLE */
	if ( is_archive() ) :
		?>
		<h1 class="page-title"><?php echo esc_html( get_the_archive_title() ); ?></h1>
		<?php
	endif;

	/* DEFAULT CONDITIONAL TITLE */
	if ( is_home() && ! is_front_page() ) :
		?>
		<h1 class="page-title"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
		<?php
	endif;

	?>
	<div id="page-container" class="left with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php

					if ( 'post' === get_post_type() ) :

						?>
						<div class="postmetadata">
							<span class="meta-date">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
									<span class="month"><?php echo esc_html( date_i18n( 'M', strtotime( get_the_time( 'Y-m-d' ) ) ) ); ?></span>
									<span class="day"><?php the_time( 'd' ); ?></span>
									<span class="year"><?php the_time( 'Y' ); ?></span>
									<?php

									// Echo published and updated dates for hatom-feed - not to be displayed on front end
									?>
									<span class="published"><?php the_time( get_option( 'date_format' ) ); ?></span>
									<span class="updated"><?php the_modified_date( get_option( 'date_format' ) ); ?></span>
								</a>
							</span>
							<?php

							if (
								( comments_open() || '0' !== get_comments_number() )
								&& ! post_password_required()
							) :
								?>
								<span class="meta-comments">
									<?php
									comments_popup_link(
										__( 'No', 'boldr-lite' ),
										__( '1', 'boldr-lite' ),
										__( '%', 'boldr-lite' ),
										'comments-count',
										''
									);
									comments_popup_link(
										__( 'Comment', 'boldr-lite' ),
										__( 'Comment', 'boldr-lite' ),
										__( 'Comments', 'boldr-lite' ),
										'',
										__( 'Comments Off', 'boldr-lite' )
									);
									?>
								</span>
								<?php
							endif;

							?>
							<span class="meta-author vcard author">
								<?php esc_html_e( 'by ', 'boldr-lite' ); ?>
								<span class="fn"><?php the_author(); ?></span>
							</span>
							<?php

							edit_post_link( __( 'Edit', 'boldr-lite' ), '<span class="editlink">', '</span>' );

						?>
						</div>
						<?php

					endif;

					?>
					<div class="post-contents">
						<?php
						if ( '' !== get_the_post_thumbnail() ) : // As recommended from the WP codex, to avoid potential failure of has_post_thumbnail()
							?>
							<div class="thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php
									the_post_thumbnail(
										'post-thumbnail',
										array(
											'class' => 'scale-with-grid',
										)
									);
									?>
								</a>
							</div>
							<?php
						endif;

						?>
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php
						if ( 'post' === get_post_type() ) : // Do not display this for pages
							?>
							<div class="post-category"><?php esc_html_e( 'Posted in', 'boldr-lite' ); ?> <?php the_category( ', ' ); ?></div>
							<?php
						endif;

						?>
						<div class="post-content">
							<?php

							if (
								get_post_format()
								|| post_password_required() ||
								'content' === get_theme_mod( 'boldr_blog_index_content' )
								) :
								the_content();
							else :
								the_excerpt();
							endif;

							if ( has_tag() ) :
								the_tags( '<br class="clear" /><div class="tags"><span class="the-tags">' . __( 'Tags', 'boldr-lite' ) . ':</span>', '', '</div>' );
							endif;

							?>
						</div>
					</div>
					<br class="clear" />

				</div>

				<hr />
				<?php

			endwhile;

		else :

			if ( is_search() ) : // Empty search results

				?>
				<h2><?php esc_html_e( 'Not Found', 'boldr-lite' ); ?></h2>
				<p>
					<?php
					echo sprintf(
						// Translators: %s is the search term
						esc_html__( 'Your search for "%s" did not return any result.', 'boldr-lite' ),
						get_search_query()
					);
					?>
					<br />
					<?php esc_html_e( 'Would you like to try another search ?', 'boldr-lite' ); ?>
				</p>
				<?php
				get_search_form();

			else : // Empty loop (this should never happen!)

				?>
				<h2><?php esc_html_e( 'Not Found', 'boldr-lite' ); ?></h2>
				<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'boldr-lite' ); ?></p>
				<?php

			endif;

		endif;

		?>
		<div class="page_nav">
			<?php

			if ( null !== get_next_posts_link() ) :
				?>
				<div class="previous"><?php next_posts_link( __( 'Previous Posts', 'boldr-lite' ) ); ?></div>
				<?php
			endif;

			if ( null !== get_previous_posts_link() ) :
				?>
				<div class="next"><?php previous_posts_link( __( 'Next Posts', 'boldr-lite' ) ); ?></div>
				<?php
			endif;
			?>

		</div>

	</div>

	<div id="sidebar-container" class="right">
		<?php get_sidebar(); ?>
	</div>

</div>
<?php

get_footer();
