<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url() ); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php esc_attr_e('Search this site...','feather-magazine'); ?>" onblur="if (this.value == '') {this.value = '<?php esc_attr_e('Search this site...','feather-magazine'); ?>';}" onfocus="if (this.value == '<?php esc_attr_e('Search this site...','feather-magazine'); ?>') {this.value = '';}" >
		<input type="submit" value="<?php esc_attr_e( 'Search', 'feather-magazine' ); ?>" />
	</fieldset>
</form>
