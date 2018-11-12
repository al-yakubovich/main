<?php
/**
 * Posts navigation
 *
 * Template part for displaying previous and next post link on single post.
 *
 * @package Cressida
 */
$cressida_posts_nav_show = cressida_get_option( 'cressida_posts_nav_show' );
if ( ! $cressida_posts_nav_show ) {
	return;
}

$args = array(
	'prev_text' => cressida_fontawesome_icon( 'angle-left', false ) . ' %title',
	'next_text' => '%title ' . cressida_fontawesome_icon( 'angle-right', false ),
);

the_post_navigation( $args );