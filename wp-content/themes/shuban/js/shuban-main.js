jQuery(document).ready(function($) {

    "use strict";

    // For Fixed header & Scroll to top
	$(window).on("scroll resize", function() {
		if ($(window).scrollTop() >= 500) {
            $(".scroll-to-top").css("bottom", "15px");
		}
		if ($(window).scrollTop() < 500) {
            $(".scroll-to-top").css("bottom", "-60px");
		}
	});

    // For Scroll to top
    $(".scroll-to-top").on("click", function() {
		return $("html, body").animate({
			scrollTop: 0
		});
    });

    
/* Premium Code Stripped by Freemius */


    // Add dropdown arrow to parent menu
    $(".shuban-main-menu .menu-item-has-children > a").append("<i class='fa fa-chevron-down pull-right'></i>");

    // For menu on mobile
    $(".shuban-main-menu .menu-item-has-children a .fa").on("click", function(e){
        e.preventDefault();
        // console.log(this);
        $(this).parent().parent().find(" > .sub-menu").toggleClass("showSubMenu");
    });

    // For Featured Posts
    var featuredPosts = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
    });

});
