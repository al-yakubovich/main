jQuery(function($) {
	"use strict";

	// hide #back-top first
	$("#back-top").hide();

	// fade in #back-top

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('#back-top a').on("click", function(){
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	// slider
	$('.mz-slider').slick({

		centerMode: true,
		variableWidth: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 7000,
		arrows: true,
		prevArrow: '<a href="#" class="prev-arrow"><i class="fa fa-angle-left"></i></a>',
		nextArrow: '<a href="#" class="next-arrow"><i class="fa fa-angle-right"></i></a>',
		touchThreshold: 50,
		dots: false,
		infinite: true,
		responsive: [{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
				centerMode: false,
				variableWidth: false,
				dots: false,
			}
		}]

	});

});