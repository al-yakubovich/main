
jQuery(document).ready(function( $ ) {
	"use strict";	
	// Search Form
		$('.main-nav-icons').after($('.main-nav-search .search-form').remove());
		var mainNavSearch = $('#site-navigation .search-form');
		$('#site-navigation .search-form').css('display', 'none');
		$('.main-nav-search').click(function() {
		if ( mainNavSearch.css('display') === 'none' ) {
			mainNavSearch.fadeIn();
			$('.main-nav-search i:first-of-type').hide();
			$('.main-nav-search i:last-of-type').show();
		} else {
			mainNavSearch.fadeOut();
			$('.main-nav-search i:first-of-type').show();
			$('.main-nav-search i:last-of-type').hide();
		}
	});
		// Sticky Menu
		// When the user scrolls the page, execute myFunction 
		window.onscroll = function() {blog_path_function()};
		// Get the navbar
		var navbar = document.getElementById("navbar");
		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;
		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function blog_path_function() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}

}); // end dom ready

