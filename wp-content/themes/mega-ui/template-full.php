<?php //Template Name: Full Width Page
get_header();
get_template_part('breadcrumbs');
the_post(); ?>
<div class="blog-ui-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<?php if(has_post_thumbnail()): ?>
				<div class="card mt5 entry-thumb">
				<?php $data= array('class' =>'img-fluid center-block'); 
					the_post_thumbnail('mega_ui_thumb', $data); ?>
				</div>
			<?php endif; ?>
				<div class="card mt5">
					<div class="card-body">
						<h1 class="md32 xs24 w600 entry-title"><?php the_title(); ?></h1>
						<div class="md16 sm15 xs13 w400 mt2 entry-content"><?php the_content(); mega_ui_link_pages(); ?></div>
					</div>
				</div>
				<?php if ( comments_open() || get_comments_number() ) :
					comments_template();  endif;?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>