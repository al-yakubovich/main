<form method="get" id="searchform-toggle" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text"><?php esc_attr_e( 'Search', 'salinger' ); ?></label>
	<input type="search" class="txt-search" name="s" id="s"  placeholder="<?php esc_attr_e( 'Search...', 'salinger' ); ?>" />
	<input type="submit" name="submit" id="btn-search" value="<?php esc_attr_e( 'Search', 'salinger' ); ?>" />
</form>

