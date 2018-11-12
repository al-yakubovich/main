/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header Color.
	wp.customize( 'top_header_background_color', function( value ) {
		value.bind( function( to ) {
			$( '#site-header' ).css( {
				'background':to
			});
		} );
	} );

	wp.customize( 'navigation_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.primary-navigation, #navigation ul ul li, #navigation.mobile-menu-wrapper' ).css( {
				'background-color':to
			});
		} );
	} );
	wp.customize( 'navigation_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a#pull, #navigation .menu a, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_headline_color', function( value ) {
		value.bind( function( to ) {
			$( '#sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#sidebars .widget a, #sidebars a, #sidebars li a' ).css( {
				'color':to
			});
		} );
	} );

	
	wp.customize( 'sidebar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#sidebars .widget, #sidebars, #sidebars .widget li' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'all_blog_posts_text', function( value ) {
		value.bind( function( to ) {
			$( '.post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'all_blog_posts_headline', function( value ) {
		value.bind( function( to ) {
			$( '.post.excerpt h2.title a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'all_blog_posts_text', function( value ) {
		value.bind( function( to ) {
			$( '.pagination a, .pagination2, .pagination .dots' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'all_blog_posts_date', function( value ) {
		value.bind( function( to ) {
			$( 'span.entry-meta' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'post_page_headline', function( value ) {
		value.bind( function( to ) {
			$( '.article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th' ).css( {
				'color':to
			});
		} );
	} );

	wp.customize( 'post_page_text', function( value ) {
		value.bind( function( to ) {
			$( '.article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea' ).css( {
				'color':to
			});
		} );
	} ); 
	wp.customize( 'post_page_link', function( value ) {
		value.bind( function( to ) {
			$( '.article a, .breadcrumb a, #commentform a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'post_page_link', function( value ) {
		value.bind( function( to ) {
			$( '#commentform input#submit, #commentform input#submit:hover' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'post_page_date', function( value ) {
		value.bind( function( to ) {
			$( '.post-date-feather, .comment time' ).css( {
				'color':to
			});
		} );
	} );

	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover' ).css( {
				'color':to
			});
		} );
	} );

	wp.customize( 'footer_headline_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets .widget li, .footer-widgets .widget, #copyright-note' ).css( {
				'color':to
			});
		} );
	} );

	wp.customize( 'primary_colors', function( value ) {
		value.bind( function( to ) {
			$( '#navigation ul li.current-menu-item a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .pagination .current, .tagcloud a' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'primary_colors', function( value ) {
		value.bind( function( to ) {
			$( '.#tabber .inside li .meta b,footer .widget li a:hover,.fn a,.reply a,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, .sidebar.c-4-12 .textwidget a, #site-footer .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, .top a:hover, footer .tagcloud a:hover,.sticky-text' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'primary_colors', function( value ) {
		value.bind( function( to ) {
			$( '.total-comments span:after, span.sticky-post, .nav-previous a:hover, .nav-next a:hover, #commentform input#submit, .home_menu_item, .currenttext, .pagination a:hover, .readMore a, .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, #sidebars h3.widget-title:after, .postauthor h4:after, .related-posts h3:after, .archive .postsby span:after, .comment-respond h4:after' ).css( {
				'background-color':to
			});
		} );
	} );


	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-branding .site-title, .site-branding .site-title a, .site-branding .site-description, .site-title' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-branding .site-title, .site-branding .site-title a, .site-branding .site-description, .site-title' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding .site-title, .site-branding .site-title a, .site-branding .site-description, .site-title' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
