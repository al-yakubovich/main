<?php

/**
 * Add ... for more view
 *
 * @since words 0.0.1
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('words_excerpt_more') ) :
    function words_excerpt_more($more) { 

    return '&hellip;';
    }
endif;
add_filter('excerpt_more', 'words_excerpt_more');


/**
* Checkbox santitization
*/
if ( ! function_exists( 'words_sanitize_checkbox' ) ) :

	function words_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

endif;


/**
 * Show/hide post meta 
 */

function words_show_post_meta(){
	global $words_theme_options;
    $hide_post_meta = absint($words_theme_options['words-blog-meta']);
	if( $hide_post_meta == 0 ){
		?>
		<div class="entry-meta">
			<?php 
				words_posted_on();
				words_entry_footer();
			?>
		</div><!-- .entry-meta -->
		<?php
	}
}

// Add specific CSS class by filter
function words_body_class( $classes ) {
	$classes[] = 'at-sticky-sidebar right-sidebar ';
	return $classes;
}
add_filter( 'body_class', 'words_body_class' );