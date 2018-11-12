<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * 404 Page Template
 *
 */

get_header();

?>
<div class="container" id="main-content">

	<h1 class="page-title"><?php esc_html_e( '404', 'boldr-lite' ); ?></h1>

	<div id="page-container" class="left with-sidebar">

		<h2><?php esc_html_e( 'Page Not Found', 'boldr-lite' ); ?></h2>
		<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'boldr-lite' ); ?></p>
		<p><?php esc_html_e( 'Maybe a search will help ?', 'boldr-lite' ); ?></p>
		<?php

		get_search_form();

		?>
	</div>

	<div id="sidebar-container" class="right">
		<ul id="sidebar">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</ul>
	</div>
</div>
<?php

get_footer();
