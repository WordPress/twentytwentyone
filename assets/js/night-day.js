function twentytwentyoneNightDayToggler() {
	var toggler = document.getElementById( 'night-day-toggle-input' ),
		isDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' ).matches,
		html = document.querySelector( 'html' );

	if ( 'yes' === window.localStorage.getItem( 'twentytwentyoneDarkMode' ) ) {
		isDarkMode = true;
	} else if ( 'no' === window.localStorage.getItem( 'twentytwentyoneDarkMode' ) ) {
		isDarkMode = false;
	}

	if ( isDarkMode ) {
		toggler.checked = true;
	}

	if ( isDarkMode ) {
		html.classList.add( 'respect-color-scheme-preference' );
	} else {
		html.classList.remove( 'respect-color-scheme-preference' );
	}

	toggler.addEventListener( 'click', function() {
		if ( toggler.checked ) {
			html.classList.add( 'respect-color-scheme-preference' );
			window.localStorage.setItem( 'twentytwentyoneDarkMode', 'yes' );
		} else {
			html.classList.remove( 'respect-color-scheme-preference' );
			window.localStorage.setItem( 'twentytwentyoneDarkMode', 'no' );
		}
	} );

	toggler.addEventListener( 'focus', function() {
		document.getElementById( 'night-day-toggle' ).classList.add( 'focused' );
	} );

	toggler.addEventListener( 'blur', function() {
		document.getElementById( 'night-day-toggle' ).classList.remove( 'focused' );
	} );
}
twentytwentyoneNightDayToggler();
