/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	var $style = $( '#newsbuzz-color-scheme-css' ),
		api = wp.customize;

	if ( ! $style.length ) {
		$style = $( 'head' ).append( '<style type="text/css" id="newsbuzz-color-scheme-css" />' )
		                    .find( '#newsbuzz-color-scheme-css' );
	}

		
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.frontpage-site-title,' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.frontpage-site-title,' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( {
				'background':to
			});
		} );
	} );

	wp.customize( 'footer_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widget-wrapper' ).css( {
				'background':to
			});
		} );
	} );

	wp.customize( 'header_image_before_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-before-title ' ).css( {
				'color':to
			});
		} );
	} );



		wp.customize( 'footer_widget_title_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets h3' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'footer_widget_title_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets h3' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'header_image_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-title' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'navigation_frontpage_logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.home .lh-nav-bg-transform.navbar-default .navbar-brand' ).css( {
				'color':to
			});
		} );
	} );


				wp.customize( 'navigation_frontpage_menu_color', function( value ) {
		value.bind( function( to ) {
			$( '.home .lh-nav-bg-transform .navbar-nav>li>a' ).css( {
				'color':to
			});
		} );
	} );


		wp.customize( 'footer_copyright_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( {
				'background':to
			});
		} );
	} );


		wp.customize( 'footer_copyright_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.row.site-info' ).css( {
				'color':to
			});
		} );
	} );
		wp.customize( 'sidebar_headline_colors', function( value ) {
		value.bind( function( to ) {
			$( '#secondary h3.widget-title, #secondary h4.widget-title' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'sidebar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget .post-date, #secondary .widget p, #secondary .widget' ).css( {
				'color':to
			});
		} );
	} );



		wp.customize( 'sidebar_headline_background_colors', function( value ) {
		value.bind( function( to ) {
			$( '#secondary h4.widget-title' ).css( {
				'background-color':to
			});
		} );
	} );

		wp.customize( 'sidebar_background_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget, #secondary .search-form, #secondary .widget li, #secondary .textwidget, #secondary .tagcloud' ).css( {
				'background':to
			});
		} );
	} );
		wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget a' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'header_image_tagline_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-description' ).css( {
				'color':to
			});
		} );
	} );




		wp.customize( 'header_image_button_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-button' ).css( {
				'border-color':to
			});
		} );
	} );

		wp.customize( 'header_image_button_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-button, .frontpage-site-button:hover, .frontpage-site-button:active, .frontpage-site-button:focus, .frontpage-site-button:visited' ).css( {
				'background-color':to
			});
		} );
	} );


		wp.customize( 'navigation_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-toggle .icon-bar' ).css( {
				'background-color':to
			});
		} );
	} );


		wp.customize( 'sidebar_link_border_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget li' ).css( {
				'border-color':to
			});
		} );
	} );


		wp.customize( 'navigation_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-toggle' ).css( {
				'border-color':to
			});
		} );
	} );

		wp.customize( 'navigation_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default, .dropdown-menu, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-nav .open ul.dropdown-menu' ).css( {
				'background-color':to
			});
		} );
	} );


		wp.customize( 'navigation_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-toggle:active .icon-bar, .navbar-default .navbar-toggle:focus .icon-bar, .navbar-default .navbar-toggle:hover .icon-bar, .navbar-default .navbar-toggle:visited .icon-bar, .navbar-default .navbar-toggle .icon-bar' ).css( {
				'background-color':to
			});
		} );
	} );



		wp.customize( 'navigation_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-nav>li>a, .dropdown-menu > li > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus' ).css( {
				'color':to
			});
		} );
	} );

		wp.customize( 'navigation_logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-brand' ).css( {
				'color':to
			});
		} );
	} );
		wp.customize( 'headline_color', function( value ) {
		value.bind( function( to ) {
			$( 'h1.entry-title, .entry-header .entry-title a' ).css( {
				'color':to
			});
		} );
	} );
		wp.customize( 'post_content_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content, .entry-summary' ).css( {
				'color':to
			});
		} );
	} );


		wp.customize( 'post_content_color', function( value ) {
		value.bind( function( to ) {
			$( '.post-feed-wrapper p' ).css( {
				'color':to
			});
		} );
	} );


		wp.customize( 'author_line_color', function( value ) {
		value.bind( function( to ) {
			$( '.article-grid-single .entry-header-category, .entry-date time, h5.entry-date, h5.entry-date a' ).css( {
				'color':to
			});
		} );
	} );

			wp.customize( 'top_widget_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets' ).css( {
				'background':to
			});
		} );
	} );

			wp.customize( 'top_widget_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
			wp.customize( 'top_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets, .top-widgets p' ).css( {
				'color':to
			});
		} );
	} );


			wp.customize( 'bottom_widget_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets' ).css( {
				'background':to
			});
		} );
	} );

			wp.customize( 'bottom_widget_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
			wp.customize( 'bottom_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets, .bottom-widgets p' ).css( {
				'color':to
			});
		} );
	} );

			wp.customize( 'footer_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets span.post-date, .footer-widgets, .footer-widgets p' ).css( {
				'color':to
			});
		} );
	} );
			wp.customize( 'footer_widget_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets a, .footer-widgets li a' ).css( {
				'color':to
			});
		} );
	} );



			wp.customize( 'footer_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( {
				'border-top-color':to
			});
		} );
	} );
			wp.customize( 'footer_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets h3' ).css( {
				'border-bottom-color':to
			});
		} );
	} );



	// Color Scheme CSS.
	api.bind( 'preview-ready', function() {
		api.preview.bind( 'update-color-scheme-css', function( css ) {
			$style.html( css );
		} );
	} );


} )( jQuery );

