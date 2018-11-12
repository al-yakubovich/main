( function( api ) {

	// Extends our custom "gist" section.
	api.sectionConstructor['gist'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
