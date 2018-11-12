<?php
/**
 * Template part for displaying post navigation - next and previous posts
 * @package JustBlog
*/

the_post_navigation( array(
	'next_text' => '<i class="fa fas fa-arrow-circle-right"></i><div class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'justblog' ) . '</div> ' .
		'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'justblog' ) . '</span> ' .
		'<span class="post-title">%title</span>',
	'prev_text' => '<i class="fa fas fa-arrow-circle-left"></i><div class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'justblog' ) . '</div> ' .
		'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'justblog' ) . '</span> ' .
		'<span class="post-title">%title</span>',
) );	
							
?>