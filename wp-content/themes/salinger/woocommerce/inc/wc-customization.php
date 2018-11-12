<?php
add_action( 'wp_enqueue_scripts', 'salinger_wc_customization', 12 );
/**
 * Output WooCommerce CSS (Customizer options).
 *
 * @since 1.0.0
 */
function salinger_wc_customization() {

	$color          = esc_html( get_theme_mod( 'salinger_theme_color', '#DD4040' ) );
	$color_contrast = salinger_color_contrast( $color );

	$wc_css = "
	/* WooCommerce */
	nav.woocommerce-MyAccount-navigation ul li a:visited{
		color:#333;
	}
	.star-rating span:before,
	p.stars.selected a.active:before,
	p.stars:hover a:before,
	p.stars.selected a:not(.active):before,
	p.stars.selected a.active:before {
		color: $color;
	}
	.header-cart-menu .header-cart-items-count{
		background-color:$color;
	}
	.widget_shopping_cart_content .button.checkout.wc-forward,
	.woocommerce ul.products li.product a.button:hover,
	.woocommerce .single_add_to_cart_button.button.alt:hover,
	.woocommerce a.button:hover,
	.woocommerce a.button:focus,
	.woocommerce a.button.alt:hover,
	.woocommerce a.button.alt:focus,
	.woocommerce button.button:hover,
	.woocommerce button.button:focus,
	.woocommerce button.button.alt:hover,
	.woocommerce button.button.alt:focus,
	.woocommerce button.button.alt.disabled:hover,
	.woocommerce button.button.alt.disabled:focus,
	.woocommerce input.button:hover,
	.woocommerce input.button:focus,
	.woocommerce input.button.alt:hover,
	.woocommerce input.button.alt:focus,
	.woocommerce input[type='submit']:hover,
	.woocommerce input[type='submit']:focus,
	.woocommerce #respond input#submit:hover,
	.woocommerce #respond input#submit:focus,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce #respond input#submit.alt:focus,
	.woocommerce-page .woocommerce-info a.button:hover,
	.woocommerce-page .woocommerce-message a.button:hover,
	.widget_shopping_cart_content .buttons a.button:hover,
	.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce.widget_price_filter .ui-slider .ui-slider-range{
		background-color: $color;
		color: $color_contrast;
	}
	.woocommerce-error,
	.woocommerce-info,
	.woocommerce-message {
		border-top-color: $color;
	}
	.woocommerce-error::before,
	.woocommerce-info::before,
	.woocommerce-message::before {
		color: $color;
	}
	.pagination .page-numbers li .page-numbers.current,
	.woocommerce-pagination .page-numbers li .page-numbers.current,
	.pagination .page-numbers li a.page-numbers:hover,
	.woocommerce-pagination .page-numbers li a.page-numbers:hover{
		background-color: $color;
		color: $color_contrast;
	 }
	 nav.woocommerce-MyAccount-navigation ul li a:hover{
		color:$color !important;
	}";

	wp_add_inline_style( 'salinger-woocommerce-style', $wc_css );

}
