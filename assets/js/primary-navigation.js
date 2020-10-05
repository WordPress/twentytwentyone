/**
 * File primary-navigation.js.
 *
 * Required to open and close the mobile navigation.
 */
( function() {
	/**
	 * Toggle an attribute's value
	 *
	 * @param {Element} element
	 * @param {string} attribute
	 * @param {string} trueVal
	 * @param {string} falseVal
	 * @since 1.0.0
	 */
	function toggleAttribute( element, attribute, trueVal, falseVal ) {
		if ( undefined === trueVal ) {
			trueVal = true;
		}
		if ( undefined === falseVal ) {
			falseVal = false;
		}
		if ( trueVal !== element.getAttribute( attribute ) ) {
			element.setAttribute( attribute, trueVal );
		} else {
			element.setAttribute( attribute, falseVal );
		}
	}

	/**
	 * Menu Toggle Behaviors
	 *
	 * @param {string} id - The ID.
	 */
	function navMenu( id ) {
		var wrapper = document.body; // this is the element to which a CSS class is added when a mobile nav menu is open
		var mobileButton = document.getElementById( id + '-mobile-menu' );

		if ( mobileButton ) {
			mobileButton.onclick = function() {
				wrapper.classList.toggle( id + '-navigation-open' );
				wrapper.classList.toggle( 'lock-scrolling' );
				toggleAttribute( mobileButton, 'aria-expanded', 'true', 'false' );
				mobileButton.focus();
			};
		}

		/**
		 * Trap keyboard navigation in the menu modal.
		 * Adapted from TwentyTwenty
		 */
		document.addEventListener( 'keydown', function( event ) {
			var modal, elements, selectors, lastEl, firstEl, activeEl, tabKey, shiftKey, escKey;
			if ( ! wrapper.classList.contains( id + '-navigation-open' ) ) {
				return;
			}

			modal = document.querySelector( '.' + id + '-navigation' );
			selectors = 'input, a, button';
			elements = modal.querySelectorAll( selectors );
			elements = Array.prototype.slice.call( elements );
			tabKey = event.keyCode === 9;
			shiftKey = event.shiftKey;
			escKey = event.keyCode === 27;
			activeEl = document.activeElement;
			lastEl = elements[ elements.length - 1 ];
			firstEl = elements[0];

			if ( escKey ) {
				event.preventDefault();
				wrapper.classList.remove( id + '-navigation-open', 'lock-scrolling' );
				toggleAttribute( mobileButton, 'aria-expanded', 'true', 'false' );
				mobileButton.focus();
			}

			if ( ! shiftKey && tabKey && lastEl === activeEl ) {
				event.preventDefault();
				firstEl.focus();
			}

			if ( shiftKey && tabKey && firstEl === activeEl ) {
				event.preventDefault();
				lastEl.focus();
			}

			// If there are no elements in the menu, don't move the focus
			if ( tabKey && firstEl === lastEl ) {
				event.preventDefault();
			}
		} );
	}

	window.addEventListener( 'load', function() {
		new navMenu( 'primary' );
	} );
}() );
