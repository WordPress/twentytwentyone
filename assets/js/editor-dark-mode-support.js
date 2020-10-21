if (
	document.body.classList.contains( 'twentytwentyone-supports-dark-theme' ) &&
	window.matchMedia( '(prefers-color-scheme: dark)' ).matches
) {
	document.body.classList.add( 'is-dark-theme' );
}
