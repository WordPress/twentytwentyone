/**
 * Unregister "Wide" Separator Style
 */
wp.domReady( () => {
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
} );