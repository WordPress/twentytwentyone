/* global backgroundColorNotice */

( function() {
	// Wait until the customizer has finished loading.
	wp.customize.bind( 'ready', function() {
		// Early exit if not on dark mode.
		if ( ! window.matchMedia( '(prefers-color-scheme: dark)' ).matches || ! backgroundColorNotice.isDarkMode ) {
			return;
		}

		/**
		 * Add initial notice to the `background_color` setting.
		 *
		 * @since 1.0.0
		 */
		wp.customize( 'background_color' ).notifications.add( 'backgroundColorNotice', new wp.customize.Notification( 'backgroundColorNotice', {
			type: 'info',
			message: backgroundColorNotice.darkModeEnabledMessage
		} ) );

		wp.customize( 'background_color', function( setting ) {
			setting.bind( function( value ) {
				/**
				 * Remove the notice if the value changes.
				 *
				 * @since 1.0.0
				 */
				setting.notifications.remove( 'backgroundColorNotice' );

				/**
				 * If the background color selected is not one that allows dark-mode, notify the user.
				 */
				if ( -1 === backgroundColorNotice.lightPaletteColors.indexOf( value.toUpperCase() ) ) {
					wp.customize( 'background_color' ).notifications.add( 'backgroundColorNotice', new wp.customize.Notification( 'backgroundColorNotice', {
						type: 'warning',
						message: backgroundColorNotice.darkModeUnavailableMessage
					} ) );
				}
			} );
		} );
	} );
}() );
