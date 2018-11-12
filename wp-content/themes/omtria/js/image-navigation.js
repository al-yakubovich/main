/**
 * Image navigation
 */
;(function($){

    $(document).on('keydown', function(ev){
        var url         = false,
            leftArrow   = 37,
            rightArrow  = 39,
            $prevImgUrl = $("#post-detail-attachment-prev > a").attr('href'),
            $nextImgUrl = $("#post-detail-attachment-next > a").attr('href');

        if (ev.keyCode === leftArrow) {
            url = $prevImgUrl;
        } else if (ev.keyCode === rightArrow) {
            url = $nextImgUrl;
        } else {
            return false;
        }

        if (url && !$('textarea, input').is(':focus')) {
            window.location = url;
        }
    });

})(jQuery);
