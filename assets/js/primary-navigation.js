/**
 * File primary-navigation.js.
 *
 * Required to open and close the mobile navigation.
 */

/**
 * Toggle an attribute's value
 *
 * @param {Element} element
 * @param {Attribute} attribute
 * @param {String} trueVal
 * @param {String} falseVal
 * @since 1.0.0
 */
function twentytwentyoneToggleAttribute(element, attribute, trueVal, falseVal) {
	if (undefined === trueVal) {
		trueVal = true;
	}
	if (undefined === falseVal) {
		falseVal = false;
	}
	if (trueVal !== element.getAttribute(attribute)) {
		element.setAttribute(attribute, trueVal);
	} else {
		element.setAttribute(attribute, falseVal);
	}
}

/**
 * Handle clicks on submenu toggles.
 *
 * @param {Element} el
 */
function twentytwentyoneExpandSubMenu(el) { // eslint-disable-line no-unused-vars
	twentytwentyoneToggleAttribute(el, 'aria-expanded', 'true', 'false');
}

( function() {

	/**
	 * Menu Toggle Behaviors
	 *
	 * @param {Element} element
	 */
	var navMenu = function ( id ){
		var wrapper      = document.body; // this is the element to which a CSS class is added when a mobile nav menu is open
		var mobileButton = document.getElementById( `${ id }-mobile-menu` );

		if ( mobileButton ){
			mobileButton.onclick = function() {
				wrapper.classList.toggle( `${ id }-navigation-open` );
				wrapper.classList.toggle( 'lock-scrolling' );
				twentytwentyoneToggleAttribute( mobileButton, 'aria-expanded', 'true', 'false' );
				mobileButton.focus();
			}
		}
		/**
		 * Trap keyboard navigation in the menu modal.
		 * Adapted from TwentyTwenty
		 */
		document.addEventListener( 'keydown', function( event ) {
			if ( ! wrapper.classList.contains( `${ id }-navigation-open` ) ){
				return;
			}
			var modal, elements, selectors, lastEl, firstEl, activeEl, tabKey, shiftKey, escKey;

			modal = document.querySelector( `.${ id }-navigation` );
			selectors = "input, a, button";
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
				wrapper.classList.remove( `${ id }-navigation-open`, 'lock-scrolling' );
				twentytwentyoneToggleAttribute( mobileButton, 'aria-expanded', 'true', 'false' );
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
		});
	}

	window.addEventListener( 'load', function() {
		new navMenu( 'primary' );
	});
} )();
