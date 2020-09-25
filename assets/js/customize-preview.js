( function( api, _ ) {

	/**
	 * Get luminance from a HEX color.
	 *
	 * @param {string} hex - The hex color.
	 *
	 * @return {number}
	 */
	function twentytwentyoneGetHexLum( hex ) {
		var rgb = twentytwentyoneGetRgbFromHex( hex );
		return Math.round( ( 0.2126 * rgb.r ) + ( 0.7152 * rgb.g ) + ( 0.0722 * rgb.b ) );
	}

	/**
	 * Get RGB from HEX.
	 *
	 * @param {string} hex - The hex color.
	 *
	 * @return {Object} - Returns an object {r, g, b}
	 */
	function twentytwentyoneGetRgbFromHex( hex ) {
		var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i,
			result;

		// Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF").
		hex = hex.replace( shorthandRegex, function( m, r, g, b ) {
			return `${r}${r}${g}${g}${b}${b}`;
		} );

		result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
		return result ? {
			r: parseInt( result[1], 16 ),
			g: parseInt( result[2], 16 ),
			b: parseInt( result[3], 16 )
		} : null;
	}

	// Add listener for the "background_color" control.
	api( 'background_color', function( value ) {
		value.bind( function( to ) {

		var lum = twentytwentyoneGetHexLum( to ),
			textColor = 127 < lum ? '#000' : '#fff';

		document.documentElement.style.setProperty( '--global--color-primary', textColor );
		document.documentElement.style.setProperty( '--global--color-secondary', textColor );
		document.documentElement.style.setProperty( '--global--color-background', to);

		document.documentElement.style.setProperty( '--button--color-background', textColor );
		document.documentElement.style.setProperty( '--button--color-text', to );
		document.documentElement.style.setProperty( '--button--color-text-hover', textColor);
		} );
	} );
}( wp.customize, _ ) );
