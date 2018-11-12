<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Actions
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

    do_action( 'actions_header_elements_before' ); // Hook in your chosen framework's site opening wrapper(s).
	
        do_action( 'actions_header_elements' ); //hook menu and header e.t.c to this action.
		
    do_action( 'actions_header_elements_after' ); // Hook in your chosen framework's content opening wrapper(s)
	
	// Remember to give all of your hooks for the above actions a suitable priority i.e. 0 will hook in first, 10 will hook in second and 20 will hook in 3rd and so on!
	
	do_action( 'actions_content_body_before' );
	
?>	