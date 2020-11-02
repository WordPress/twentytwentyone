/* global twentytwentyoneGetHexLum */
( function( api ) {
	// Add listener for the "background_color" control.
	api( 'background_color', function( value ) {
		value.bind( function( to ) {
			var lum = twentytwentyoneGetHexLum( to ),
				isDark = 127 > lum,
				textColor = ! isDark ? 'var(--global--color-dark-gray)' : 'var(--global--color-light-gray)',
				tableColor = ! isDark ? 'var(--global--color-light-gray)' : 'var(--global--color-dark-gray)';

			// Modify the body class depending on whether this is a dark background or not.
			if ( isDark ) {
				if ( ! document.body.classList.contains( 'has-background-dark' ) ) {
					document.body.classList.add( 'has-background-dark' );
				}
			} else {
				document.body.classList.remove( 'has-background-dark' );
			}

			// Toggle the white background class.
			if ( '#ffffff' === to ) {
				document.body.classList.add( 'has-background-white' );
			} else {
				document.body.classList.remove( 'has-background-white' );
			}

			document.documentElement.style.setProperty( '--global--color-primary', textColor );
			document.documentElement.style.setProperty( '--global--color-secondary', textColor );
			document.documentElement.style.setProperty( '--global--color-background', to );

			document.documentElement.style.setProperty( '--button--color-background', textColor );
			document.documentElement.style.setProperty( '--button--color-text', to );
			document.documentElement.style.setProperty( '--button--color-text-hover', textColor );

			document.documentElement.style.setProperty( '--table--stripes-border-color', tableColor );
			document.documentElement.style.setProperty( '--table--stripes-background-color', tableColor );
		} );
	} );
}( wp.customize, _ ) );
