<?php
/**
 *
 * @package Donna
 */
if ( is_single() ): ?>
	<div class="clearfix"></div>
	<div class="nextprev-postlink-container">
		<div class="nextprev-postlink">
			<ul class="link-pages">
				<li class="previous-link"><?php esc_url(previous_image_link('%link', '<span class="previous-link">'.esc_html('Previous', 'donna').'</span> <span class="nav-title"><i class="fa fa-arrow-circle-left"></i>
</span><span class="time-ago">'. donna_time_ago() .'</span>')); ?></li>
				<li class="next-link"><?php esc_url(next_image_link('%link', '<span class="next-link">'.esc_html('Next', 'donna').'</span> <span class="nav-title"><i class="fa fa-arrow-circle-right"></i></span><span class="time-ago">'. donna_time_ago() .'</span>')); ?></li>
			</ul>
		</div>
	</div>
<?php 
endif; ?>
<div class="clearfix"></div>