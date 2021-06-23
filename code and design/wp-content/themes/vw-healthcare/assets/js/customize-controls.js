( function( api ) {

	// Extends our custom "vw-healthcare" section.
	api.sectionConstructor['vw-healthcare'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );