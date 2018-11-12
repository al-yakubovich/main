( function( api ) {

	// Extends our custom "feather-magazine" section.
	api.sectionConstructor['feather-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
