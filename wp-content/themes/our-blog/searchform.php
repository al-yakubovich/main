<form role="search" method ="get" id="searchform" action="<?php echo esc_url(home_url('/'));?>" class="search-form">
	<input type="search" value="" name="<?php esc_attr_e( 's', 'our-blog' );?>" placeholder="<?php the_search_query();?>" class="form-control mr-sm-2"/>
	<button type="submit" class="btn search-submit"><?php esc_attr_e( 'Search', 'our-blog' );?></button>
</form>

