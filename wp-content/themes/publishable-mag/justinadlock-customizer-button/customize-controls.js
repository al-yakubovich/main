( function( api ) {

	// Extends our custom "publishable-mag" section.
	api.sectionConstructor['publishable-mag'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
