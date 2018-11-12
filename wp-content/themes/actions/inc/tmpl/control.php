<label>
	<# if ( data.label ) { #>
		<span class="actionsmb-label">{{ data.label }}</span>
	<# } #>

	<# if ( data.description ) { #>
		<span class="actionsmb-description">{{{ data.description }}}</span>
	<# } #>

	<input type="{{ data.type }}" value="{{ data.value }}" {{{ data.attr }}} />
</label>
