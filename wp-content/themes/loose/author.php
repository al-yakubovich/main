<?php
/**
 * The template for displaying all author posts.
 *
 * @package loose
 */

get_header(); ?>

	<div class="row">
	<div id="primary" class="content-area
	<?php
	$loose_home_page_layout = get_theme_mod( 'home_page_layout', 'masonry' );
				echo ( empty( $loose_home_page_layout ) ) ? ' col-md-12' : ' col-lg-8';
				if ( ! empty( $loose_home_page_layout ) && ! is_active_sidebar( 'sidebar-1' ) ) :
echo ' col-lg-push-2';
				endif;
				?>
				">
			<div class="row about-author">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 author-avatar-wrapper">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 360 ); ?>
					</div>
					<?php if ( class_exists( 'UserSocialProfiles' ) ) : ?>

					<div class="loose-author-social-icons">
						<?php
						$loose_user_url = get_the_author_meta( 'user_url' );
						$loose_twitter_url = get_the_author_meta( 'twitter' );
						$loose_facebook_url = get_the_author_meta( 'facebook' );
						$loose_googleplus_url = get_the_author_meta( 'googleplus' );
						$loose_instagram_url = get_the_author_meta( 'instagram' );
						$loose_pinterest_url = get_the_author_meta( 'pinterest' );
						?>

						<?php
						if ( ! empty( $loose_user_url ) ) :
?>
<a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php esc_html_e( 'Website', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Website', 'loose' ); ?></span><svg viewBox="0 0 26 28"><path d="M22 15.453v4.047q0 1.859-1.32 3.18t-3.18 1.32h-13q-1.859 0-3.18-1.32t-1.32-3.18v-13q0-1.859 1.32-3.18t3.18-1.32h3.984q0.203 0 0.352 0.148t0.148 0.352q0 0.422-0.406 0.5-1.203 0.406-2.078 0.938-0.156 0.063-0.25 0.063h-1.75q-1.031 0-1.766 0.734t-0.734 1.766v13q0 1.031 0.734 1.766t1.766 0.734h13q1.031 0 1.766-0.734t0.734-1.766v-3.344q0-0.297 0.281-0.453 0.438-0.203 0.844-0.578 0.25-0.25 0.547-0.125 0.328 0.141 0.328 0.453zM25.703 7.703l-6 6q-0.281 0.297-0.703 0.297-0.187 0-0.391-0.078-0.609-0.266-0.609-0.922v-3h-2.5q-5.047 0-6.844 2.047-1.859 2.141-1.156 7.391 0.047 0.359-0.313 0.531-0.125 0.031-0.187 0.031-0.25 0-0.406-0.203-0.156-0.219-0.328-0.484t-0.617-1.070-0.773-1.555-0.602-1.781-0.273-1.906q0-0.766 0.055-1.422t0.219-1.406 0.438-1.375 0.734-1.273 1.070-1.156 1.477-0.961 1.945-0.758 2.492-0.477 3.070-0.172h2.5v-3q0-0.656 0.609-0.922 0.203-0.078 0.391-0.078 0.406 0 0.703 0.297l6 6q0.297 0.297 0.297 0.703t-0.297 0.703z"></path></svg></a><?php endif; ?>
						<?php
						if ( ! empty( $loose_twitter_url ) ) :
?>
<a href="<?php the_author_meta( 'twitter' ); ?>" title="<?php esc_html_e( 'Twitter', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'loose' ); ?></span><svg viewBox="0 0 26 28"><path d="M25.312 6.375q-1.047 1.531-2.531 2.609 0.016 0.219 0.016 0.656 0 2.031-0.594 4.055t-1.805 3.883-2.883 3.289-4.031 2.281-5.047 0.852q-4.234 0-7.75-2.266 0.547 0.063 1.219 0.063 3.516 0 6.266-2.156-1.641-0.031-2.938-1.008t-1.781-2.492q0.516 0.078 0.953 0.078 0.672 0 1.328-0.172-1.75-0.359-2.898-1.742t-1.148-3.211v-0.063q1.062 0.594 2.281 0.641-1.031-0.688-1.641-1.797t-0.609-2.406q0-1.375 0.688-2.547 1.891 2.328 4.602 3.727t5.805 1.555q-0.125-0.594-0.125-1.156 0-2.094 1.477-3.57t3.57-1.477q2.188 0 3.687 1.594 1.703-0.328 3.203-1.219-0.578 1.797-2.219 2.781 1.453-0.156 2.906-0.781z"></path></svg></a><?php endif; ?>
						<?php
						if ( ! empty( $loose_facebook_url ) ) :
?>
<a href="<?php the_author_meta( 'facebook' ); ?>" title="<?php esc_html_e( 'Facebook', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'loose' ); ?></span><svg viewBox="0 0 16 28"><path d="M14.984 0.187v4.125h-2.453q-1.344 0-1.813 0.562t-0.469 1.687v2.953h4.578l-0.609 4.625h-3.969v11.859h-4.781v-11.859h-3.984v-4.625h3.984v-3.406q0-2.906 1.625-4.508t4.328-1.602q2.297 0 3.563 0.187z"></path></svg></a><?php endif; ?>
						<?php
						if ( ! empty( $loose_googleplus_url ) ) :
?>
<a href="<?php the_author_meta( 'googleplus' ); ?>" title="<?php esc_html_e( 'Google Plus', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'loose' ); ?></span><svg viewBox="0 0 36 28"><path d="M22.453 14.266q0 3.25-1.359 5.789t-3.875 3.969-5.766 1.43q-2.328 0-4.453-0.906t-3.656-2.438-2.438-3.656-0.906-4.453 0.906-4.453 2.438-3.656 3.656-2.438 4.453-0.906q4.469 0 7.672 3l-3.109 2.984q-1.828-1.766-4.562-1.766-1.922 0-3.555 0.969t-2.586 2.633-0.953 3.633 0.953 3.633 2.586 2.633 3.555 0.969q1.297 0 2.383-0.359t1.789-0.898 1.227-1.227 0.766-1.297 0.336-1.156h-6.5v-3.938h10.813q0.187 0.984 0.187 1.906zM36 12.359v3.281h-3.266v3.266h-3.281v-3.266h-3.266v-3.281h3.266v-3.266h3.281v3.266h3.266z"></path></svg></a><?php endif; ?>
						<?php
						if ( ! empty( $loose_instagram_url ) ) :
?>
<a href="<?php the_author_meta( 'instagram' ); ?>" title="<?php esc_html_e( 'Instagram', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'loose' ); ?></span><svg viewBox="0 0 24 28"><path d="M21.281 22.281v-10.125h-2.109q0.313 0.984 0.313 2.047 0 1.969-1 3.633t-2.719 2.633-3.75 0.969q-3.078 0-5.266-2.117t-2.188-5.117q0-1.062 0.313-2.047h-2.203v10.125q0 0.406 0.273 0.68t0.68 0.273h16.703q0.391 0 0.672-0.273t0.281-0.68zM16.844 13.953q0-1.937-1.414-3.305t-3.414-1.367q-1.984 0-3.398 1.367t-1.414 3.305 1.414 3.305 3.398 1.367q2 0 3.414-1.367t1.414-3.305zM21.281 8.328v-2.578q0-0.438-0.313-0.758t-0.766-0.32h-2.719q-0.453 0-0.766 0.32t-0.313 0.758v2.578q0 0.453 0.313 0.766t0.766 0.313h2.719q0.453 0 0.766-0.313t0.313-0.766zM24 5.078v17.844q0 1.266-0.906 2.172t-2.172 0.906h-17.844q-1.266 0-2.172-0.906t-0.906-2.172v-17.844q0-1.266 0.906-2.172t2.172-0.906h17.844q1.266 0 2.172 0.906t0.906 2.172z"></path></svg></a><?php endif; ?>
						<?php
						if ( ! empty( $loose_pinterest_url ) ) :
?>
<a href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php esc_html_e( 'Pinterest', 'loose' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'loose' ); ?></span><svg viewBox="0 0 24 28"><path d="M24 14q0 3.266-1.609 6.023t-4.367 4.367-6.023 1.609q-1.734 0-3.406-0.5 0.922-1.453 1.219-2.562 0.141-0.531 0.844-3.297 0.313 0.609 1.141 1.055t1.781 0.445q1.891 0 3.375-1.070t2.297-2.945 0.812-4.219q0-1.781-0.93-3.344t-2.695-2.547-3.984-0.984q-1.641 0-3.063 0.453t-2.414 1.203-1.703 1.727-1.047 2.023-0.336 2.094q0 1.625 0.625 2.859t1.828 1.734q0.469 0.187 0.594-0.313 0.031-0.109 0.125-0.484t0.125-0.469q0.094-0.359-0.172-0.672-0.797-0.953-0.797-2.359 0-2.359 1.633-4.055t4.273-1.695q2.359 0 3.68 1.281t1.32 3.328q0 2.656-1.070 4.516t-2.742 1.859q-0.953 0-1.531-0.68t-0.359-1.633q0.125-0.547 0.414-1.461t0.469-1.609 0.18-1.18q0-0.781-0.422-1.297t-1.203-0.516q-0.969 0-1.641 0.891t-0.672 2.219q0 1.141 0.391 1.906l-1.547 6.531q-0.266 1.094-0.203 2.766-3.219-1.422-5.203-4.391t-1.984-6.609q0-3.266 1.609-6.023t4.367-4.367 6.023-1.609 6.023 1.609 4.367 4.367 1.609 6.023z"></path></svg></a><?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
					<h3><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h3>
					<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
				</div>
			</div>
						<hr>
		<main id="main" class="site-main row masonry-container" role="main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-home', get_theme_mod( 'home_page_layout', 'masonry' ) );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( ! empty( $loose_home_page_layout ) ) {
get_sidebar();}
?>
	</div><!-- .row -->
<?php get_footer(); ?>
