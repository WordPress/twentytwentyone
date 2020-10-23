function twentytwentyoneResponsiveEmbeds() {
	var proportion, parentWidth;
	document.querySelectorAll( 'iframe' ).forEach( function( iframe ) {
		if ( iframe.width && iframe.height ) {
			proportion = parseFloat( iframe.width ) / parseFloat( iframe.height );
			parentWidth = parseFloat( getComputedStyle( iframe.parentElement, null ).width.replace( 'px', '' ) );

			iframe.style.maxWidth = '100%';
			iframe.style.maxHeight = Math.round( parentWidth / proportion ).toString() + 'px';
		}
	} );
}

// Run on initial load.
twentytwentyoneResponsiveEmbeds();

// Run on resize.
window.onresize = twentytwentyoneResponsiveEmbeds;
