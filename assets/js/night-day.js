function twentytwentyoneNightDayToggler() {
	var toggler = document.getElementById( 'night-day-toggle-input' ),
		isDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' ).matches,
		html = document.querySelector( 'html' );

	if ( isDarkMode ) {
		toggler.checked = true;
	}

	toggler.addEventListener( 'click', function() {
		if ( toggler.checked ) {
			html.classList.add( 'respect-color-scheme-preference' );
		} else {
			html.classList.remove( 'respect-color-scheme-preference' );
		}
	} );
}
twentytwentyoneNightDayToggler();
