<?php
/**
 * Posts navigation
 *
 * Template part for displaying previous and next post link on archives.
 *
 * @package Cressida
 */
$cressida_args = array(
	/* Translators: 1. FontAwesome icon, 2. Previous text. */
	'prev_text' => sprintf( __( '%1$s %2$s', 'cressida' ),
		cressida_fontawesome_icon( 'angle-left', false ),
		esc_html__( 'Previous posts', 'cressida' )
	),
	/* Translators: 1. Next text, 2. FontAwesome icon */
	'next_text' => sprintf( __( '%1$s %2$s', 'cressida' ),
		esc_html__( 'Newer posts', 'cressida' ),
		cressida_fontawesome_icon( 'angle-right', false )
	),
);

the_posts_navigation( $cressida_args );