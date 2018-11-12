(function($) {
  "use strict";
  $(document).ready(function(){
    $('.banner.slider1').slick({
      dots: false,
      infinite: true,
      arrows:true,
      speed: 1000,
      slidesToShow: 1,
      autoplay:true,
      slidesToScroll: 1,
      fade: true
    });
  });

  $(document).ready(function(){
    $('.banner.slider2').slick({
      dots: false,
      infinite: true,
      arrows:true,
      speed: 1000,
      slidesToShow: 1,
      autoplay:true,
      slidesToScroll: 1,
      fade: true
    });
  });

  $(document).ready(function(){
    $('.banner.slider3').slick({
      dots: true,
      infinite: true,
      arrows:true,
      speed: 1000,
      slidesToShow: 1,
      autoplay:true,
      slidesToScroll: 1,
      fade: false,
      responsive: [
      {
        breakpoint: 768,
        settings: {
          dots: false,
          arrows: true
        }
      }
      ]
    });
  });

  $(document).ready(function(){
    $('.banner.slider4 .row').slick({
      dots: false,
      infinite: true,
      arrows:true,
      speed: 1000,
      slidesToShow: 3,
      autoplay:true,
      slidesToScroll: 1,
      fade: false,
      responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
      ]
    });
  });

  $(document).ready(function(){
    $('.instagram .row').slick({
      dots: false,
      infinite: true,
      arrows:false,
      speed: 500,
      slidesToShow: 6,
      autoplay:true,
      slidesToScroll: 1,
      fade: false,
      swipeToSlide: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
      ]
    });
  });

  $(document).ready(function(){
    $('.related-posts .row').slick({
      dots: true,
      infinite: true,
      arrows:false,
      speed: 500,
      slidesToShow: 2,
      autoplay:true,
      slidesToScroll: 1,
      fade: false,
      swipeToSlide: true,
      responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
      ]
    });
  });


$(function () {
  $('a[href="#search"]').on('click', function(event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });

  $('#search, #search button.close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });
});

$('[data-sidenav]').sidenav();
})(jQuery);
