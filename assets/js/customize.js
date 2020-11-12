/* global twentytwentyoneGetHexLum */

( function() {
	// Wait until the customizer has finished loading.
	wp.customize.bind( 'ready', function() {
		// Get the checkbox element.
		var input = wp.customize.control( 'respect_user_color_preference' ).container.find( 'input' )[0];
		// Disable the "respect_user_color_preference" checkbox if the background-color is dark.
		if ( 127 > twentytwentyoneGetHexLum( wp.customize( 'background_color' ).get() ) ) {
			input.setAttribute( 'disabled', 'disabled' );
		}

		// Handle changes to the background-color.
		wp.customize( 'background_color', function( setting ) {
			setting.bind( function( value ) {
				if ( 127 > twentytwentyoneGetHexLum( value ) ) {
					// Disable the checkbox if the background-color is dark.
					input.setAttribute( 'disabled', 'disabled' );
				} else {
					// Enable the checkbox if the background-color is dark.
					input.removeAttribute( 'disabled' );
				}
			} );
		} );
	} );
}() );
