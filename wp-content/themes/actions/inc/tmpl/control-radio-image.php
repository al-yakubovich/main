<# if ( data.label ) { #>
	<span class="actionsmb-label">{{ data.label }}</span>
<# } #>

<# if ( data.description ) { #>
	<span class="actionsmb-description">{{{ data.description }}}</span>
<# } #>

<# _.each( data.choices, function( args, choice ) { #>

	<label>
		<input type="radio" value="{{ choice }}" name="{{ data.field_name }}" <# if ( data.value === choice ) { #> checked="checked" <# } #> />
		<span class="screen-reader-text">{{ args.label }}</span>
		<img src="{{ args.url }}" alt="{{ args.label }}" />
	</label>

<# } ) #>
