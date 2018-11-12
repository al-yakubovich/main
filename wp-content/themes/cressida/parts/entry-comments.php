<?php
/**
 * Entry comments
 *
 * Template part for displaying entry comments list and form.
 *
 * @package Cressida
 */
if ( comments_open() || get_comments_number() ) : ?>
	<div class="entry-comments">
		<?php comments_template(); ?>
	</div>
<?php endif;