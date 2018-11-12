<form role="search" method="get" class="row searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="col-8">	
		<input type="text" placeholder="<?php esc_html_e( 'What do you want to find?','mega-ui'); ?>" value="<?php the_search_query(); ?>" id="s" name="s" class="form-control" required >
	</div>
	<div class="col-4">
		<button type="submit" class="btn-primary btn-md waves-effect waves-light btn"><?php esc_html_e( 'Search','mega-ui'); ?></button>
	</div>
</form>