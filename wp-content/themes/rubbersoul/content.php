<?php
/**
 * The default template for displaying content
 *
 * @package RubberSoul
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'rubbersoul' ); ?>
		</div>
		<?php endif; ?>
		
		<header class="entry-header">
			<?php if ( is_single() ) : 
			do_action('rubbersoul_pre_post_title', $post->ID);
			?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php endif; // is_single() ?>
			
			<!-- Author, date and comments -->
            <div class='sub-title'>
				<div class="autor-fecha">
                	<i class="fa fa-user"></i> <?php rubbersoul_entry_author(); ?>
                 	&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php rubbersoul_entry_date(); ?>
					&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); ?>
               </div>
                <!--<div class="popup-comments"> </div>-->
            </div><!-- .sub-title -->
		</header><!-- .entry-header -->
		
		<!-- Subtitle widget area -->
		<?php if (is_single()) { ?>
			<div class="sub-title-widget-area">
				<?php if (!dynamic_sidebar ('wt-sub-title')) {} ?>
			</div><!-- .sub-title-widget-area -->	
		<?php }?>

		<?php if (  (is_home() && get_theme_mod('rubbersoul_entrada_completa_en_home', '') != 1) || (is_search() || is_category() || is_tag() || is_author() || is_archive() ) ) : // Only display Excerpts ?>
		
			<div class="excerpt-wrapper"><!-- Excerpt -->
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" >
						<div class="wrapper-excerpt-thumbnail"><?php the_post_thumbnail('excerpt-thumbnail-zg-176'); ?></div>
						</a>
				<?php endif;?>
				<?php the_excerpt(); ?>
			</div><!-- .excerpt-wrapper -->
		
		<?php else : ?>
		
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rubbersoul' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'rubbersoul' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			
		<?php endif; ?>

		<footer class="entry-meta">
			<!-- Post end widget area -->
			<?php if (is_single()) : ?>
				<div class="post-end-widget-area">
					<?php if (!dynamic_sidebar ('wt-post-end')) {}?>
				</div>
			<?php endif; ?>
			
			<?php //rubbersoul_entry_meta(); ?>
			<div class="entry-meta-term">
			<span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list ($post->ID,'category', '', ', ',''); ?>
			
			<?php $post_tags = get_the_term_list($post->ID,'post_tag'); 
			if ($post_tags) { ?>
			&nbsp;&nbsp;&nbsp;<span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list ($post->ID,'post_tag', '', ', ','');
			}?>
			
			<div style="float:right;"><?php edit_post_link( __( 'Edit', 'rubbersoul' ), '<span class="edit-link">', '</span>' ); ?></div>
			</div>
			
			<?php 
			// Related posts
			if ( is_single() && get_theme_mod('rubbersoul_related_posts', '') == 1) get_template_part(RUBBERSOUL_TEMPLATE_PARTS . 'related-posts'); ?>
			
			<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'rubbersoul_author_bio_avatar_size', 90 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'rubbersoul' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'rubbersoul' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
