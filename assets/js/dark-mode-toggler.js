function toggleDarkMode() { // eslint-disable-line no-unused-vars
	var toggler = document.getElementById( 'dark-mode-toggler' );

	if ( 'false' === toggler.getAttribute( 'aria-pressed' ) ) {
		toggler.setAttribute( 'aria-pressed', 'true' );
		document.documentElement.classList.add( 'is-dark-theme' );
		document.body.classList.add( 'is-dark-theme' );
		window.localStorage.setItem( 'twentytwentyoneDarkMode', 'yes' );
	} else {
		toggler.setAttribute( 'aria-pressed', 'false' );
		document.documentElement.classList.remove( 'is-dark-theme' );
		document.body.classList.remove( 'is-dark-theme' );
		window.localStorage.setItem( 'twentytwentyoneDarkMode', 'no' );
	}
}

function darkModeInitialLoad() {
	var toggler = document.getElementById( 'dark-mode-toggler' ),
		isDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' ).matches;

	if ( 'yes' === window.localStorage.getItem( 'twentytwentyoneDarkMode' ) ) {
		isDarkMode = true;
	} else if ( 'no' === window.localStorage.getItem( 'twentytwentyoneDarkMode' ) ) {
		isDarkMode = false;
	}

	if ( ! toggler ) {
		return;
	}
	if ( isDarkMode ) {
		toggler.setAttribute( 'aria-pressed', 'true' );
	}

	if ( isDarkMode ) {
		document.documentElement.classList.add( 'is-dark-theme' );
		document.body.classList.add( 'is-dark-theme' );
	} else {
		document.documentElement.classList.remove( 'is-dark-theme' );
		document.body.classList.remove( 'is-dark-theme' );
	}
}
console.log('lalalaa');

darkModeInitialLoad();
