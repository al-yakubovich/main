<?php get_header(); ?>
<div class="banner">
	<div class="container">
		<div class="col-12 text-center white">
			<?php the_archive_title( '<h1 class="md24 sm18 xs16 w600 lh130 ls2 text-center white upper">', '</h1>' ); ?>
			<?php the_archive_description( '<p">', '</p>' ); ?>
			<div class="md17 sm15 xs13 gray w400 ls2 text-center"><?php if (function_exists('mega_ui_breadcrumbs')){ mega_ui_breadcrumbs(); } ?></div>
		</div>
	</div>
</div>

<div class="blog-ui-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
			<?php if(have_posts()){ ?>
				<div class="row">
			<?php while(have_posts()){  the_post(); ?>
					<div class="col-md-6 col-sm-12 mt5">
						<div class="card text-center entry-thumb">
						<?php if(has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php $data= array('class' =>'img-fluid center-block'); 
									the_post_thumbnail('mega_ui_thumb', $data); ?>
							</a>	
						<?php endif; ?>							
							<div class="card-body">
								<h4 class="card-title"><a class="blue2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<div class="card-text xsmb0"><?php the_excerpt(); ?></div>
								
								<ul class="md16 sm15 xs14 mt3 entry-meta">
									<li><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php the_author(); ?></a></li>
									<li><i class="fa fa-clock-o"></i>  <?php echo esc_html(human_time_diff( get_the_time('U'), current_time('timestamp') )) .' '. esc_html__(' ago','mega-ui'); ?> </li>
								</ul>
								
								<a class="btn btn-primary btn-md waves-effect waves-light mt5" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','mega-ui'); ?> <i class="fa fa-play ml-2"></i></a>
																
							</div>
						</div>
					</div>
			<?php } ?>
				</div><?php } ?>
				<div class="row justify-content-center">
					<div class="mt5 text-center">
						<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
					</div>
				</div>
			</div>
			
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>