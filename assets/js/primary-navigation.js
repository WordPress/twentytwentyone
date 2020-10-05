/**
 * File primary-navigation.js.
 *
 * Required to open and close the mobile navigation.
 */

/**
 * Toggle an attribute's value
 *
 * @param {Element} el - The element.
 * @since 1.0.0
 */
function twentytwentyoneToggleAriaExpanded( el ) {
	if ( 'true' !== el.getAttribute( 'aria-expanded' ) ) {
		el.setAttribute( 'aria-expanded', 'true' );
	} else {
		el.setAttribute( 'aria-expanded', 'false' );
	}
}

function twentytwentyoneCollapseAllOtherSubMenus(element) {
	var nav = element.closest( 'nav' );
	nav.querySelectorAll( '.sub-menu-toggle' ).forEach( function( button ) {
		if ( button !== element ) {
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );
}

/**
 * Handle clicks on submenu toggles.
 *
 * @param {Element} el - The element.
 */
function twentytwentyoneExpandSubMenu( el ) {
	twentytwentyoneCollapseAllOtherSubMenus( el );
	twentytwentyoneToggleAriaExpanded( el );
}

( function() {

	/**
	 * Menu Toggle Behaviors
	 *
	 * @param {Element} element
	 */
	var navMenu = function ( id ){
		var wrapper      = document.body, // this is the element to which a CSS class is added when a mobile nav menu is open
			mobileButton = document.getElementById( `${ id }-mobile-menu` );

		if ( mobileButton ){
			mobileButton.onclick = function() {
				wrapper.classList.toggle( `${ id }-navigation-open` );
				wrapper.classList.toggle( 'lock-scrolling' );
				twentytwentyoneToggleAriaExpanded( mobileButton );
				mobileButton.focus();
			}
		}
		/**
		 * Trap keyboard navigation in the menu modal.
		 * Adapted from TwentyTwenty
		 */
		document.addEventListener( 'keydown', function( event ) {
			var modal, elements, selectors, lastEl, firstEl, activeEl, tabKey, shiftKey, escKey;
			if ( ! wrapper.classList.contains( `${ id }-navigation-open` ) ){
				return;
			}

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
				twentytwentyoneToggleAriaExpanded( mobileButton );
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

		document.getElementById( 'site-navigation' ).querySelectorAll( '.menu-wrapper > .menu-item-has-children' ).forEach( function( li ) {
			li.addEventListener( 'mouseenter', function() {
				this.classList.add( 'hover' );
			} );
			li.addEventListener( 'mouseleave', function() {
				this.classList.remove( 'hover' );
			} );
		} );
	}

	window.addEventListener( 'load', function() {
		new navMenu( 'primary' );
	});
} )();
