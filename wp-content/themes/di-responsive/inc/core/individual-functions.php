<?php

// Post navigation.
function di_responsive_post_navigation() {
	if( get_previous_post_link() || get_next_post_link() ) {
	?>
		<div class="clearfix"></div>
		<nav class="navigation post-navigation dipostnav" role="navigation">
		 	<?php
			if( get_previous_post_link() ) {
				previous_post_link( '<div class="nav-previous"> %link </div>', '&larr; %title' );
			}
			?>

			<?php
			if( get_next_post_link() ) {
				next_post_link( '<div class="nav-next"> %link </div>', '%title &rarr;' );
			}
			?>
		</nav>
		<div class="clearfix"></div>

	<?php
	}
}

// Posts navigation or pagination.
function di_responsive_posts_pagination() {
	if( get_theme_mod( 'display_archive_pagination', 'nextprev' ) == 'nextprev' ) {
		// Navigation.
		if( get_next_posts_link() || get_previous_posts_link() ) {
		?>
			<div class="clearfix"></div>
			<nav class="navigation post-navigation dipostsnav" role="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '&larr; Older Entries ', 'di-responsive' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer Entries &rarr;', 'di-responsive' ) ); ?></div>
			</nav>
			<div class="clearfix"></div>
		<?php
		}
	} else {
		// Pagination.
		the_posts_pagination( array(
			'prev_text' => __( '&laquo;', 'di-responsive' ),
			'next_text' => __( '&raquo;', 'di-responsive' ),
		) );
	}
}

function di_responsive_post_thumbnail() {
	if( has_post_thumbnail() ) {
	?>
		<div class="alignc pdt10 pdb10">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'aligncenter' ) ); ?>
		</div>
	<?php
	}
}


function di_responsive_comment_panel_headline() {
	return wp_kses_post( get_theme_mod( 'comment_panel_title', __( 'Have any Question or Comment?', 'di-responsive' ) ) );
}


// Menu Fallback.
function di_responsive_nav_fallback( $args ) {
	extract( $args );
	$output = null;
	if( $container ) {
		$output = '<' . $container;
		if ( $container_id ) {
			$output .= ' id="' . $container_id . '"';
		}
		if ( $container_class ) {
			$output .= ' class="' . $container_class . '"';
		}
		$output .= '>';
	}
	
	$output .= '<ul';
	if( $menu_id ) {
		$output .= ' id="' . $menu_id . '"';
	}
	if( $menu_class ) {
		$output .= ' class="' . $menu_class . '"';
	}
	$output .= '>';
	
	$output .= '<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item current_page_item active"><a class="nav-link" href="' . esc_url( home_url( '/' ) ) . '">'. __( 'Home', 'di-responsive' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Blog', 'di-responsive' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Responsive', 'di-responsive' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'SEO Friendly', 'di-responsive' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Customizable', 'di-responsive' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Page Builder', 'di-responsive' ) .'</a></li>';
	
	if( current_user_can( 'manage_options' ) ) {
		$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">'. __( 'Add Menu', 'di-responsive' ) .'</a></li>';
	}
	
	$output .= '</ul>';
	if( $container ) {
		$output .= '</' . $container . '>';
	}
	echo $output;
}

function di_responsive_comments( $comment, $args, $depth ) {
?>
	<div <?php comment_class(); ?>>
		<div class="comment-author vcard" itemtype="http://schema.org/Comment" itemscope itemprop="comment">
			<div id="comment-<?php comment_ID(); ?>" class="dimedia" >
				
				<div class="dimedia-left">
					<?php echo get_avatar( $comment, 60 ); ?>
				</div>
						
				<div class="dimedia-body">
					
					<?php if( get_comment_author_url() ) { ?>
						<h6 class="dimedia-heading fn" itemtype="http://schema.org/Person" itemscope itemprop="author">
							<a class="url" target="_blank" rel="external nofollow" itemprop="url" href="<?php echo esc_url( get_comment_author_url() ); ?>"><span itemprop="name"><?php echo esc_attr( get_comment_author() ); ?></span></a>
						</h6>
					<?php } else { ?>
						<h6 class="dimedia-heading fn"><span itemprop="name"><?php echo esc_attr( get_comment_author() ); ?></span></h6>
					<?php } ?>
					
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="alert alert-info" ><?php _e( 'Your comment is awaiting approval.', 'di-responsive' ); ?></p>
					<?php endif; ?>
							
					<small><?php //_e( 'On ', 'di-responsive' ); comment_date(); ?>
						<a itemprop="url" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"> <?php printf( __( '%1$s at %2$s', 'di-responsive' ), '<span itemprop="datePublished">' . get_comment_date() . '</span>',  get_comment_time() ); ?></a>
					</small>
					
					<div itemprop="text"><?php comment_text(); ?></div>
					
					<small>
					<?php comment_reply_link( array_merge( $args,
						array(
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text' => __( 'Reply', 'di-responsive' ),
							)
					) );
					?>
					
					<?php edit_comment_link( __( 'Edit', 'di-responsive' ), '', '' ) ?>
					</small>
					
				</div>
			</div>
		</div>
<!--</div> is added by wordpress automatically -->
<?php
}
