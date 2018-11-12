/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 *
 * @package Authorize
 */

( function() {
	var container, button, menu, links, subMenus, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
	
	/**
	 * If element has children, add arrow to display sub menus.
	 * When clicked, display sub-menu
	 */
	 
	//Menu first Level
	first_level = jQuery(".menu-item-has-children a").not(".sub-menu a");
	
	jQuery( "<span class='span_children'><i class = 'fa fa-sort-desc' aria-hidden='true'></i></span>" ).insertAfter( first_level );
	
	//Show sub menu if clicked
	jQuery( ".main-navigation .span_children" ).click(function() {

	  jQuery( this ).siblings('.sub-menu').toggleClass('sub-menu-show');
	  
	});
	
	
	//Sub Menu
	jQuery( "<span class='span_children'><i class='fa fa-caret-right' aria-hidden='true'></i></span>" ).insertAfter( '.sub-menu .menu-item-has-children > a' );
	
	//Show next menu if clicked
	jQuery( ".main-navigation .sub-menu .span_children" ).click(function() {
		jQuery( this ).siblings('.sub-menu').toggleClass('sub-menu-show2');
		jQuery( this ).parent().toggleClass('parent_item');
	  
	});
	
	 

	
} )();
