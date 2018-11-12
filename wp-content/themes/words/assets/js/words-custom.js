jQuery('document').ready(function ($){
    $('.menu-toggle').click(function () {
        $('#primary-menu').slideToggle()
    })

//sticky sidebar
    var at_body = $("body");
    var at_window = $(window);

   if(at_body.hasClass('at-sticky-sidebar')){
             if(at_body.hasClass('right-sidebar')){
                $('#secondary, #primary').theiaStickySidebar();
            }
            else{
                $('#secondary, #primary').theiaStickySidebar();
            }
        }
})