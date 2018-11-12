<!-- Breadcum start -->
<div class="banner">
	<div class="container">
		<div class="col-12 text-center">
			<?php if(is_singular()){ ?>
			<h1 class="md32 sm24 xs18 w600 lh130 ls2 text-center white"><?php the_title(); ?></h1>
		<?php }else{
			the_archive_title( '<h1 class="md32 sm24 xs18 w600 lh130 ls2 text-center white">', '</h1>' );
			} ?>
			<div class="md17 sm15 xs13 gray w400 ls2 text-center"><?php if (function_exists('mega_ui_breadcrumbs')){ mega_ui_breadcrumbs(); } ?></div>
		</div>
				
	</div>
</div>
<!-- Breadcum End -->

