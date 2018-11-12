<?php
/**
 * Archive pagination
 *
 * Template part for displaying numbered pagination on archives.
 *
 * @package Cressida
 */
$args['prev_text'] = esc_html__( 'Prev', 'cressida' );
$args['next_text'] = esc_html__( 'Next', 'cressida' );

the_posts_pagination( $args );