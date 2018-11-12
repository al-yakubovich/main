<?php
/**
 * Template for displaying search forms in Simple Days
 *
 * @package WordPress
 * @subpackage Simple Days
 * @since 0.0.1
 * @version 0.0.2
 */

?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) );
if(is_amp() && !is_ssl()){}else{
?>
<form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( is_amp() ){ ?>target="_top"<?php } ?>>
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search_field" placeholder="<?php esc_attr_e( 'Search', 'simple-days' ) ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search_submit opa7"><i class="fa fa-search serch_icon" aria-hidden="true"></i></button>
</form>
<?php }
