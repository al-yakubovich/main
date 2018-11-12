<?php
/**
 * Frontpage Banner / Slider
 *
 * @package Cressida
 */
$cressida_frontpage_banner = cressida_get_option( 'cressida_frontpage_banner' );

if ( $cressida_frontpage_banner == 'posts' ) :

	get_template_part( 'parts/frontpage-slider', 'posts' );

elseif ( $cressida_frontpage_banner == 'banner' ) :

	get_template_part( 'parts/frontpage', 'banner' );

endif; // $cressida_frontpage_banner
