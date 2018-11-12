<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Sidebar Template
 *
 */

?>
<ul id="sidebar">
	<?php

	if ( ! dynamic_sidebar( 'sidebar' ) ) :

		?>
		<li id="recent" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'boldr-lite' ); ?></h3>
			<ul><?php wp_get_archives( 'type=postbypost&limit=5' ); ?></ul>
		</li>

		<li id="archives" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Archives', 'boldr-lite' ); ?></h3>
			<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
		</li>

		<li id="meta" class="widget-container">
			<h3 class="widget-title"><?php esc_html_e( 'Meta', 'boldr-lite' ); ?></h3>
			<ul>
				<?php Wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</li>
		<?php

	endif;

	?>
</ul>
<?php
