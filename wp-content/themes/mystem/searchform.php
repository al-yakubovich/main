<?php
	/**
		* default search form
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'mystem' ); ?></span>
		<input type="search" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'mystem' ); ?>"
		value="<?php echo esc_html( get_search_query() ); ?>" name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label', 'mystem' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<span class="font-awesome-search"></span>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'mystem' ); ?></span>
	</button>
</form>
