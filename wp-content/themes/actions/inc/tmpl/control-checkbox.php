<label>
	<input type="checkbox" value="true" {{{ data.attr }}} <# if ( data.value ) { #> checked="checked" <# } #> />

	<# if ( data.label ) { #>
		<span class="actionsmb-label">{{ data.label }}</span>
	<# } #>

	<# if ( data.description ) { #>
		<span class="actionsmb-description">{{{ data.description }}}</span>
	<# } #>
</label>
