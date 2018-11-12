;(function($){
    'use strict';

    $(document).ready(function(){

        //
        //  Menu header & Menu button 
        //
        var $body               = $("body"),
            $menuWrapper        = $("#header-menu"),
            $menuButton         = $("#menu-header-button"),
            buttonClassOpened   = 'menu-header-button--opened',
            buttonClassHidden   = 'menu-header-button--hidden',
            bodyClassMenuOpened = 'body--menu-opened',
            animateClassOn      = 'menu-header--animate-on',
            animateClassOff     = 'menu-header--animate-off',
            $menuLinks          = $menuWrapper.find('a'),
            $submenuLinks       = $menuWrapper.find('.menu-item-has-children > a'),
            $menuFirstLinks     = $menuWrapper.find('.menu-header > li'),
            animationTimeout    = null;


        //  Default menu settings
        function menuInit(){
            if (!$body.hasClass('body--menu-opened')) {
                $menuFirstLinks.addClass(animateClassOff);
            }
            $menuWrapper.find('.sub-menu').hide();
            $submenuLinks.after("<span class='fa fa-caret-down'></span>");
        }
        menuInit();

        //  Customizer - Refresh after menu changes
        $(document).on('customize-preview-menu-refreshed', function(){
            $menuWrapper    = $("#header-menu");
            $menuButton     = $("#menu-header-button");
            $menuLinks      = $menuWrapper.find('a');
            $submenuLinks   = $menuWrapper.find('.menu-item-has-children > a');
            $menuFirstLinks = $menuWrapper.find('.menu-header > li');
            menuInit();
            unbindEvents();
            bindEvents();
        });

        function bindEvents(){
            //  Menu events
            $menuWrapper.find('.fa').click(function(ev){
                ev.stopPropagation();
                $(this).next().slideToggle();
            });

            $menuButton.click(function(ev){
                ev.preventDefault();
                ev.stopPropagation();

                if ($(this).hasClass(buttonClassOpened)) {
                    closeMenu(this)
                } else {
                    openMenu(this);
                }
            });

            $menuLinks.click(function(ev){
                ev.stopPropagation();
            });

            $menuWrapper.click(function(){
                $menuButton.click();
            });
        }
        bindEvents();

        function unbindEvents(){
            $menuWrapper.find('.fa').unbind('click');
            $menuButton.unbind('click');
            $menuLinks.unbind('click');
            $menuWrapper.unbind('click');
        }


        //  Menu helpers
        function menuHeaderLinkAnimate(){
            var delay = 0;

            $menuFirstLinks.each(function(){
                var that = $(this);
                delay += 100;

                animationTimeout = setTimeout(function(){
                    that.addClass(animateClassOn);
                }, delay);
            });
        }

        function resetMenu(){
            $menuWrapper.find('.sub-menu').hide();
        }

        function openMenu(that){
            if ($(that).hasClass(buttonClassHidden)) {
                $(that).removeClass(buttonClassHidden);
            }

            $(that).addClass(buttonClassOpened);
            $body.addClass(bodyClassMenuOpened);
            resetMenu();
            bindEscEventOnMenu();

            $menuWrapper.stop().fadeIn(200, function(){
                menuHeaderLinkAnimate();
            });
        }

        function closeMenu(that){
            $(that).removeClass(buttonClassOpened);
            $(that).addClass(buttonClassHidden);
            $body.removeClass(bodyClassMenuOpened);
            unBindEscEventOnMenu();

            $menuWrapper.stop().fadeOut(200, function(){
                $menuFirstLinks.removeClass(animateClassOn);
            });
        }

        //  Close menu by ESC
        function bindEscEventOnMenu(){
            $body.bind('keydown', function(ev){
                if (ev.keyCode == 27) {
                    $menuButton.click();
                }
            });
        }

        function unBindEscEventOnMenu(){
            $body.unbind('keydown');
        }

    });

})(jQuery);