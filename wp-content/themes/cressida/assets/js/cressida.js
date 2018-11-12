'use strict';

var $ = window.jQuery;
/**
 * CSS Breakpoints
 *
 * Get :before <body> content,
 * where we placed all our breakpoints.
 *
 * @link https://davidwalsh.name/pseudo-element
 * @link https://www.lullabot.com/articles/importing-css-breakpoints-into-javascript
 */
var $breakpoint = window.getComputedStyle(
	document.querySelector('body'), ':before'
).getPropertyValue('content').replace(/['"]+/g, '');

//ON DOCUMENT READY
$(document).ready(function() {

	$('.search-trigger').on( 'click', function() {
		$(this).siblings('form').find('input').toggleClass('visible').focus();
	});

	/* Stop playing video once Bootstrap's modal is closed */
	$('.cressida-modal-video').on('hidden.bs.modal', function () {
		$('.cressida-modal-video iframe').attr('src', $('.cressida-modal-video iframe').attr('src'));
	});

	/* Home Slider */
	$('.slick-carousel').slick({
		speed: 400,
		dots: false,
		arrows: true,
		slidesToShow: 1,
		autoplay: false,
		infinite: true,
		fade: true,
		prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-angle-right"></i></button>',
	});

	/* Recent posts with thumbnails sidebar carousel */
	$('.sidebar-widgets .rpwwt-widget ul').slick({
		speed: 200,
		dots: false,
		arrows: true,
		slidesToShow: 1,
		autoplay: false,
		infinite: true,
		fade: true,
		prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-angle-right"></i></button>',
	});
	$('.sidebar-widgets .instagram-pics').slick({
		speed: 1000,
		dots: false,
		arrows: false,
		slidesToShow: 1,
		autoplay: true,
		infinite: true,
		fade: true,
	});

	/**
	 * Smooth scrolling
	 * @link https://css-tricks.com/snippets/jquery/smooth-scrolling/
	 */
	$('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		// On-page links
		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
			&&
			location.hostname == this.hostname
		) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target     = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();

				$('html, body').animate({
					scrollTop: target.offset().top - 150 // add header and admin bar into calculation
					}, 800, function() {
					// Callback after animation
					// Must change focus!
					var $target = $(target);
					$target.focus();

					if ($target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					};
				});
			}
		}
	});

	/* Initialize Match Height plugin */
	$('.matcheight').matchHeight();

	$('.slick-slide').each( function() {
		var $boxHeight = $(this).find('.box-caption').outerHeight();
		var $top = $boxHeight / 2;

		$(this).find('.box-caption').css('margin-top', -$top);
	});

}); //end of document ready

