<?php
/**
 * Template part for the blog navigation - previous and next
 * @package JustBlog
*/

the_posts_pagination( array(
	'prev_text' => '<span class="prev">' . esc_html__( 'Previous page', 'justblog' ) . '</span>',
	'next_text' => '<span class="next">' . esc_html__( 'Next page', 'justblog' ) . '</span>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'justblog' ) . ' </span>',
) );


?>