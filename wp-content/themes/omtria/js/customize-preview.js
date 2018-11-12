;(function($){

    $(document).ready(function(){

        var $logo               = $('#logo'),
            $indexPosts         = $('#index-posts'),
            $archive            = $('#archive'),
            $sidebar            = $('#sidebar'),
            $sidebarArchive     = $('#sidebar-archive'),
            $postNavigation     = $('#post-navigation'),
            $header             = $('#header'),
            $menuHeaderButton   = $('#menu-header-button'),
            $menuHeaderButtonIn = $menuHeaderButton.find('span, i, em'),
            $footer             = $('#footer'),
            $footerCopyright    = $footer.find('.footer-copyright'),
            $footerRegularLinks = $footerCopyright.find('a'),
            $footerSocialLinks  = $footer.find('.menu-footer a');

        var footer_default_hover_color             = wp.customize.settings.values['omtria_footer_social_link_color_hover'];
        var header_logo_default_hover_color        = wp.customize.settings.values['omtria_header_logo_color_hover'];
        var header_menu_botton_default_hover_color = wp.customize.settings.values['omtria_header_menu_button_color_hover'];

        

        //
        // Site logo
        //
        wp.customize('blogname', function(value){
            value.bind(function(to){
                $logo.text(to);
            });
        });



        //
        // Sidebar
        //
        wp.customize('omtria_sidebar_on_home', function(value){
            value.bind(function(to){
                if (to) {
                    $indexPosts.removeClass('col-sm-12');
                    $indexPosts.addClass('col-md-8 col-sm-7');
                    $sidebar.show();
                } else {
                    $indexPosts.addClass('col-sm-12');
                    $indexPosts.removeClass('col-md-8 col-sm-7');
                    $sidebar.hide();
                }
            });
        });

        wp.customize('omtria_sidebar_on_archive_search', function(value){
            value.bind(function(to){
                if (to) {
                    $archive.removeClass('col-sm-12');
                    $archive.addClass('col-md-8 col-sm-7');
                    $sidebarArchive.show();
                } else {
                    $archive.addClass('col-sm-12');
                    $archive.removeClass('col-md-8 col-sm-7');
                    $sidebarArchive.hide();
                }
            });
        });



        //
        // Post navigation
        //
        wp.customize('omtria_navigation_in_post', function(value){
            value.bind(function(to){
                if (to) {
                    $postNavigation.show();
                } else {
                    $postNavigation.hide();
                }
            });
        });



        //
        // Header
        //
        wp.customize('omtria_header_background', function(value){
            value.bind(function(to){
                $header.css({backgroundColor: 'rgba(' + hexToRgb(to) + ', 0.95)'});
            });
        });

        wp.customize('omtria_header_logo_color', function(value){
            value.bind(function(to){
                var defaultColor = to;
                $logo.css({color: to});

                $logo.hover(function(){
                    $(this).css({color: header_logo_default_hover_color});
                }, function(){
                    $(this).css({color: defaultColor});
                });
            });
        });

        wp.customize('omtria_header_logo_color_hover', function(value){
            value.bind(function(to){
                var defaultColor = $logo.css('color');
                header_logo_default_hover_color = to;

                $logo.hover(function(){
                    $(this).css({color: to});
                }, function(){
                    $(this).css({color: defaultColor});
                });
            });
        });

        wp.customize('omtria_header_menu_button_color', function(value){
            value.bind(function(to){
                var defaultColor = to;
                $menuHeaderButtonIn.css({backgroundColor: to});

                $menuHeaderButton.hover(function(){
                    $menuHeaderButtonIn.css({backgroundColor: header_menu_botton_default_hover_color});
                }, function(){
                    $menuHeaderButtonIn.css({backgroundColor: defaultColor});
                });
            });
        });

        wp.customize('omtria_header_menu_button_color_hover', function(value){
            value.bind(function(to){
                var defaultColor = $menuHeaderButtonIn.eq(0).css('backgroundColor');
                header_menu_botton_default_hover_color = to;

                $menuHeaderButton.hover(function(){
                    $menuHeaderButtonIn.css({backgroundColor: to});
                }, function(){
                    $menuHeaderButtonIn.css({backgroundColor: defaultColor});
                });
            });
        });

        wp.customize('omtria_header_border_color', function(value){
            value.bind(function(to){
                $header.css({borderBottomColor: to});
            });
        });



        //
        // Footer
        //
        wp.customize('omtria_footer_background', function(value){
            value.bind(function(to){
                $footer.css({backgroundColor: to});
            });
        });

        wp.customize('omtria_footer_color', function(value){
            value.bind(function(to){
                $footer.css({color: to});
            });
        });

        wp.customize('omtria_footer_regular_link_color', function(value){
            value.bind(function(to){
                $footerRegularLinks.css({color: to});
            });
        });

        wp.customize('omtria_footer_social_link_color', function(value){
            value.bind(function(to){
                var defaultColor = to;
                $footerSocialLinks.css({color: to});

                $footerSocialLinks.hover(function(){
                    $(this).css({color: footer_default_hover_color});
                }, function(){
                    $(this).css({color: defaultColor});
                });
            });
        });

        wp.customize('omtria_footer_social_link_color_hover', function(value){
            value.bind(function(to){
                var defaultColor = $footerSocialLinks.css('color');
                footer_default_hover_color = to;

                $footerSocialLinks.hover(function(){
                    $(this).css({color: to});
                }, function(){
                    $(this).css({color: defaultColor});
                });
            });
        });

        wp.customize('omtria_footer_social_link_border', function(value){
            value.bind(function(to){
                $footerSocialLinks.css({borderColor: to});

                $footerSocialLinks.hover(function(){
                    $(this).css({backgroundColor: to});
                }, function(){
                    $(this).css({background: 'none'});
                });
            });
        });

        wp.customize('omtria_footer_text', function(value){
            value.bind(function(to){
                $footerCopyright.html(to);
            });
        });



        //
        // Helpers
        //
        function hexToRgb(hex){
            var r = parseInt((cutHex(hex)).substring(0, 2), 16);
            var g = parseInt((cutHex(hex)).substring(2, 4), 16);
            var b = parseInt((cutHex(hex)).substring(4, 6), 16);

            return r + ',' + g + ',' + b;
        }

        function cutHex(hex){
            return (hex.charAt(0) == "#") ? hex.substring(1, 7) : hex;
        }

    });

})(jQuery);