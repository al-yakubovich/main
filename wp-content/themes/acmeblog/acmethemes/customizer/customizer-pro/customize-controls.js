( function( api ) {

	// Extends our custom "acmeblog" section.
	api.sectionConstructor['acmeblog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );