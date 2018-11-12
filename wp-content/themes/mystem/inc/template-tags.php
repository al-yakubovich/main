<?php
	/**
		* Custom template tags for this theme.
		*
		* Eventually, some of the functionality here could be replaced by core features.
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	
	if ( ! function_exists( 'mystem_post_nav' ) ) :
	/**
		* Display navigation to next/previous post when applicable.
		*
		* @return void
	*/
	function mystem_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		
		if ( ! $next && ! $previous ) {
			return;
		}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'mystem' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><i class="far fa-arrow-alt-circle-left"></i> %link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link <i class="far fa-arrow-alt-circle-right"></i></div>', '%title' );
			?>
		</div>
	</nav>
	<?php
	}
	endif;
	
	if ( ! function_exists( 'mystem_posted_on' ) ) :
	/**
		* Prints HTML with meta information for the current post-date/time and author.
	*/
	function mystem_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}
		
		$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
		);
	?>
	<span class="byline mystem-cat">
		<i class="far fa-folder"></i>
		<?php the_category(' / '); ?>
	</span>
	<span class="posted-on mystem-author">
		<i class="far fa-user"></i>
		<?php
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
			);
		?>
	</span>
	<span class="posted-on mystem-clock">
		<i class="far fa-clock"></i>
		<?php
			printf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
			);
		?>
	</span>
	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
	<span class="comments-link"><i class="far fa-comment"></i><?php comments_popup_link( __( 'Comments', 'mystem' ), __( '1 comment', 'mystem' ), __( '% comments', 'mystem' ) ); ?></span>
	<?php endif;
	}
	endif;
	
	if ( ! function_exists( 'mystem_related_posts' ) ) :
	function mystem_related_posts() {
		$tags = wp_get_post_tags( get_the_ID() );
		if ( $tags ) {
			$tag_ids = array();
			foreach ( $tags as $individual_tag ) {
				$tag_ids[] = $individual_tag->term_id;
			}
			$args = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array( absint( get_the_ID() ) ),
			'showposts' => get_theme_mod( 'mystem_post_related_posts_number', '5' ),
			);
			$my_query = new wp_query( $args );
			if ( $my_query->have_posts() ) {
				echo '<ul>';
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
				?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php the_title();?></a></li>
				<?php
				}
				echo '</ul>';
			}
			wp_reset_postdata();
		}
	}
	
	endif;
	
	if ( ! function_exists( 'mystem_credits_copyright' ) ) :
	function mystem_credits_copyright() {
		$site_info = get_bloginfo( 'description' ) . ' - ' . get_bloginfo( 'name' ) . ' &copy; ' . date_i18n( __('Y','mystem') );
		$credits_copyright = get_theme_mod( 'mystem_credits_copyright' );
		if ( ! empty( $credits_copyright ) ){
			$footer_text = wp_kses_post( $credits_copyright );
		}
		else {
			$footer_text = esc_attr( $site_info );
		}
		if ( function_exists( 'the_privacy_policy_link' ) && empty( get_theme_mod( 'mystem_private_policy' ) ) ) {
			$footer_text .= the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		echo $footer_text;	
	}
	endif;