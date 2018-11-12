<?php
/**
 *
 * The template used for displaying articles & search results
 *
 * @package serenti
 */
$serenti_options = get_theme_mods();

?>
					<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="post-inner-content">

							<div class="post-image">
								<?php if ( has_post_thumbnail() ) : 

										$serenti_thumb_size = array_key_exists('serenti_sidebar_position', $serenti_options) ? $serenti_options['serenti_sidebar_position'] : '';
										$serenti_thumbs_layout = array_key_exists('serenti_thumbs_layout', $serenti_options) ? $serenti_options['serenti_thumbs_layout'] : '';

										if ($serenti_thumbs_layout == "portrait") $serenti_thumbnail = 'serenti-portrait-thumbnail';
										else $serenti_thumbnail = 'serenti-landscape-thumbnail';
										if ($serenti_thumb_size == 'mz-full-width') $serenti_thumbnail = 'serenti-large-thumbnail';

									?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php echo get_the_post_thumbnail( get_the_ID(), $serenti_thumbnail ); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="post-header">
								<span class="cat"><?php the_category( ' | ' ); ?></span>
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							</div>
							<div class="post-entry">

								<?php the_excerpt(); ?>
								
								<p class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'serenti' ); ?></a></p>
							</div>

						</div><!-- end: post-inner-content -->

					</article>
