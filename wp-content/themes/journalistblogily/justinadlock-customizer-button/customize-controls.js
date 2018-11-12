( function( api ) {

	// Extends our custom "journalistblogily" section.
	api.sectionConstructor['journalistblogily'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
