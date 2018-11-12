	<div>
		<form method="get" id="searchform-toggle" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s" class="assistive-text"><?php _e( 'Search', 'rubbersoul' ); ?></label>
			<input type="search" class="txt-search" name="s" id="s" />
			<input type="submit" name="submit" id="btn-search" value="<?php _e( 'Search', 'rubbersoul' ); ?>" />
		</form>
    </div>