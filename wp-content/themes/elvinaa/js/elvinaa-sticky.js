
  (function ($) {
    $(document).ready(function () { 
        /*-- Window scroll function --*/
        $(window).on('scroll', function () {
          /* sticky header */        
            var sticky = $('header'),
            scroll = $(window).scrollTop();            
            if (scroll > 250) {
                $('.loader-wrapper').after('<div class="header-outer"></div>');
                $('.header-outer').filter(function() {
                    return this.textContent === '';
                }).slice(0, -1).remove();
                $('.header-outer').css({'margin-top': '250px'}); 
                sticky.addClass('fixed');   
            }
            else {               
                $('.header-outer').remove();
                sticky.removeClass('fixed');
                
            }
        });
   });    

})(this.jQuery);