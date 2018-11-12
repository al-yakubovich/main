<?php
/**
 * The template for displaying the search form
 *
 * @package Cressida
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search', 'cressida' ); ?>" />
	<button type="submit" class="search-submit">
		<?php cressida_fontawesome_icon( 'search' ); ?>
		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'cressida' ); ?></span>
	</button>
</form>

<span class="search-trigger"><?php cressida_fontawesome_icon( 'search' ); ?></span>