
(function($){
     'use strict';

$(document).ready(function($) {
   
   var $looseSecondary = $('#secondary');
   
  if(typeof $.fn.theiaStickySidebar === 'function'){
      $looseSecondary.theiaStickySidebar({
        additionalMarginTop: 126 //Number(looseCustomScript.fatNavbarHeight)
      });
  }


if (typeof $.fn.slick === 'function'){

var $lousFeaturedSliderImage = $('.loose-featured-slider-wrapper');

$lousFeaturedSliderImage.show();
// // Slick slider
$('.gallery').slick({
  infinite: true,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.loose-featured-slider').slick({
  dots: true,
  infinite: true,
  autoplaySpeed: 0,
  speed: 1000,
  slidesToShow: Number(loose.home_page_slider_img_number),
  slidesToScroll: 1,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
}

// // Magnific Popup
if (typeof $.fn.magnificPopup === 'function'){
// Gallery Images
$('.gallery').each(function() {
        $(this).magnificPopup({
        delegate: '.gallery-item:not(.slick-cloned) a[href*=".jpg"], .gallery-item:not(.slick-cloned) a[href*=".jpeg"], .gallery-item:not(.slick-cloned) a[href*=".png"], .gallery-item:not(.slick-cloned) a[href*=".gif"]',
                type: 'image',
                gallery: {enabled:true},
                image: {
                        titleSrc: function(item) {
                                return item.el.parents('.gallery-item').text();
                        },
                        cursor: null
                }
        });
}); 

// Single Image
$('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
	if ($(this).parents('.gallery').length === 0) { 
        	$(this).magnificPopup({
		type:'image',
		image: {
			titleSrc: function(item) {
                                return item.el.parent('.wp-caption').children('.wp-caption-text').text();
			},	
                        cursor: null
		}
                });
	}
});	
}

// Top search panelchange image url to placeholder url in xml
var $looseSearchPanel = $('.loose-search-panel');
var $looseSearchToggle = $('.search-toggle');

    $looseSearchToggle.click(function(){
        $looseSearchPanel.slideToggle(250).css('z-index', '1001');
	$(this).attr('aria-expanded', 'true');
        });
    $('.loose-search-panel-close').click(function(){
        $looseSearchPanel.slideToggle(250).css('z-index', '');
	$looseSearchToggle.attr('aria-expanded', 'false');
        });

function looseScroll(){
    var backToTop = document.getElementById('loose-back-to-top');
    if(window.pageYOffset>150) {
        backToTop.className = 'loose-back-to-top loose-show';
    } else {
        backToTop.className = 'loose-back-to-top';
    }
}

if( loose.show_menu_on_scroll ) {
//Sticky menu
var $looseSiteNavigation = $('#top-navigation');
var $looseHomeSiteNavigation = $('.home #top-navigation');
var $looseMenuLogo = $('.home .menu-logo');
var $looseSliderContainer = $('#slider-container');
var $looseContent = $('#content');
var stickyMenuTop = $looseSiteNavigation.offset().top;

    var lastScrollTop = 0;
    $(window).scroll(function(){
       var st = $(this).scrollTop();
       
       if (st > lastScrollTop){
        $looseSliderContainer.css({'padding-top': ''});
        $looseContent.css({'padding-top': ''});
	$looseSiteNavigation.css({'position': '', 'top': '', 'z-index': ''});
	$looseHomeSiteNavigation.css({'box-shadow': 'none'});
       } else {
          var scrollTop = $(window).scrollTop();
	    if (scrollTop > stickyMenuTop) { 
		$looseContent.css({'padding-top': '85px'});
		$looseSiteNavigation.css({'position': 'fixed', 'top': '0', 'z-index': '1000'});
		$looseHomeSiteNavigation.css({'box-shadow': '0 1px 4px #ccc'});
		$looseMenuLogo.show();

	    } else {

		$looseSiteNavigation.css({'position': '', 'top': '', 'z-index': ''});
		$looseContent.css({'padding-top': ''});
		$looseHomeSiteNavigation.css({'box-shadow': 'none'});
		$looseMenuLogo.hide();
	    }
       }
       lastScrollTop = st;
    });
} else {
    
    window.onscroll=looseScroll;
}
	var button, closeButton, menu, bgmenu;

	button = $( '#left-navbar-toggle' );
        bgmenu = $('.left-sidebar-bg');
        menu = $('#left-sidebar');

        closeButton = $('.left-sidebar-close');

        button.click( function() {
                            looseMenuToggle();
			    
                        });
        
        closeButton.click( function() {
                            looseMenuToggle();   
                        });
                   
        bgmenu.click( function() {
                            looseMenuToggle();   
                        });
        
        var looseMenuToggle = function(){
	    if(menu.is(':visible')) {
		button.attr('aria-expanded', 'false');
	    } else {
		button.attr('aria-expanded', 'true');
	    }
            menu.toggle('slide', {direction: 'left' } , 150);
            bgmenu.fadeToggle(500);	    
	    
        };
        
    var $looseMenuPlusLeft = $('#site-navigation .expand-submenu');
    var $looseMenuPlusTop = $('#top-navigation ul .expand-submenu');
        
    $looseMenuPlusLeft.click( function(){
	
	if( $(this).hasClass('submenu-expanded')) {
            $(this).css({'transform': 'none'}).removeClass('submenu-expanded');
	    $(this).parent().children('ul').hide();
        } else {
            $(this).css({'transform': 'rotate(45deg)'}).addClass('submenu-expanded');
	    $(this).parent().children('ul').show();
        }
	
    });
    
    $looseMenuPlusTop.click( function(){

        var $current = $(this).parent().children('ul');
        if( $current.hasClass('item-visible')) {
            $current.css({'left': '-999em'}).removeClass('item-visible');
	    $(this).css({'transform': 'none'}).parent().children('ul').hide();
        } else {
            $current.css({'left': 'auto'}).addClass('item-visible');
	    $(this).css({'transform': 'rotate(45deg)'}).parent().children('ul').show();
        }
    }); 
    var $looseDate = new Date();
    var $looseDay = $looseDate.getDate();
    var $looseFullYear = $looseDate.getFullYear();
    var $looseDayOfWeek = loose.days[$looseDate.getDay()];
    var $looseMonth = loose.months[$looseDate.getMonth()];
    
    var $looseFullDate = $looseDayOfWeek + ', ' + $looseMonth + ' ' + $looseDay + ', ' + $looseFullYear;
    
    $('#today-date').append($looseFullDate);
        


  $('.posts-navigation').hide();
  
  var $looseContainer = $('.masonry-container');
   
  if (typeof Masonry === 'function'){
    imagesLoaded( document.querySelector('.masonry-container'), function() {
    $(function(){

      $looseContainer.imagesLoaded(function(){
        $looseContainer.masonry({
          itemSelector: '.masonry'
        });
      });
    });
  });
  }

  if (typeof $.infinitescroll === 'function'){
    
    $looseContainer.infinitescroll({

        navSelector  : '.posts-navigation',            
                       // selector for the paged navigation (it will be hidden)
        nextSelector : '.nav-previous > a',    
                       // selector for the NEXT link (to page 2)
        itemSelector : '.masonry',
                       // selector for all items you'll retrieve
        loading: {
                finished: undefined,
                finishedMsg: loose.noMorePostsText,
                img: loose.getTemplateDirectoryUri + '/slick/ajax-loader.gif',
                msg: null,
                msgText: loose.loadingText,
                selector: null,
                speed: 'fast',
                start: undefined
            }

        //debug : true
        }, function( newElements ) {
            // hide new items while they are loading
            var $newElems = $( newElements ).css({ opacity: 0 });
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function(){
              // show elems now they're ready
              $newElems.animate({ opacity: 1 });
              $looseContainer.masonry( 'appended', $newElems, true ); 
            }); 
        }
    );
  }

});
})(jQuery);