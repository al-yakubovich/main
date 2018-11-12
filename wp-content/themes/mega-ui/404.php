<?php get_header(); ?>
<div class="banner">
	<div class="container">
		<div class="col-12 text-center">
			<div class="col-md-12 md14 white w400 ls2 template-property-name upper text-center"><?php if (function_exists('mega_ui_breadcrumbs')){ mega_ui_breadcrumbs(); } ?></div>
		</div>
	</div>
</div>
<div class="not-found">
	<div class="container">
		<div class="row">			
			<div class="col-12 text-center">
				<h1 class="md100 sm90 xs80 w300 lh100 ls-2 text-center white upper opensans"><span class="bg-blue">4</span> <span class="bg-black2">0</span> <span class="bg-blue">4</span></h1>
				<h1 class="md25 sm23 xs20 w400 lh130 ls2 text-center upper mt5"><?php esc_html_e('oops, sorry we can\'t find that page','mega-ui'); ?></h1>
				<a href="<?php echo esc_url(home_url( '/' )); ?>" class="btn btn-primary btn-md waves-effect waves-light upper mt2"><?php esc_html_e('home page','mega-ui'); ?> <i class="fa fa-play ml-2"></i></a>	
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>