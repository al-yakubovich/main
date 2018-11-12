<?php
/**
 * Gist Featured Post Widget.
 *
 * @since 1.0.0
 */
if (!class_exists('Gist_Featured_Post')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Gist_Featured_Post extends WP_Widget
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'gist-featured-post',
                'description' => esc_html__('Displays Featured Post in Home Page. Place it in Home Widget Area Top.', 'gist'),
            );

            parent::__construct('gist-featured-post', esc_html__('Gist Featured Post', 'gist'), $opts);
        }


        function widget($args, $instance)
        {
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];


            if (!empty($title)) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }
            $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';

            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';

            $query_args = array(
                'post_type' => 'post',
                'cat' => absint($cat_id),
                'posts_per_page' => absint($post_number),
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>
                    <section class="featured-posts-block">

                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <div class="featured-post-thumbnai">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="featured-post-content">
                            <div class="featured-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php
                                global $gist_theme_options;
                                $gist_entry_meta = $gist_theme_options['gist-blog-meta-options'];
                                if (('post' === get_post_type()) && ($gist_entry_meta == 1)) {
                                    ?>
                                    <div class="entry-meta">
                                        <?php gist_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;

            echo $args['after_widget'];

        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            $instance['cat'] = absint($new_instance['cat']);

            $instance['post-number'] = absint($new_instance['post-number']);

            return $instance;

        }

        function form($instance)
        {

            $instance = wp_parse_args((array)$instance, array(
                'cat' => ''
            ));
            $instance = wp_parse_args((array)$instance, array(
                'title' => ''
            ));
            $instance = wp_parse_args((array)$instance, array(
                'post-number' => ''
            ));
            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'gist'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p class="custom-dropdown-posts">
                <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                    <strong><?php esc_html_e('Select Category: ', 'gist'); ?></strong>
                </label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 0,
                    'id' => $this->get_field_id('cat'),
                    'name' => $this->get_field_name('cat'),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'selected' => absint($instance['cat']),
                    'show_option_all' => esc_html__('Show Recent Posts', 'gist')
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'gist'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
                       value="<?php echo esc_attr($instance['post-number']); ?>"/>
            </p>

        <?php
        }
    }

endif;