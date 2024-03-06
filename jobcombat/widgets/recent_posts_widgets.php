<?php

/**
 * Job Combat Custom Widget Widget.
 */
class footer_recent_posts extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'footer_recent_posts', // Base ID
            __('Footer Recent Post', 'job_combat'), // Name -- 'A' is use to keep in in top.
            array('description' => __('Recent Post For Footer Dark BG', 'job_combat'), 'classname' => 'follow-sajib') // Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        //print_r($args);

        echo $args['before_widget'];
        if (isset($instance['title']) && $instance['title'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title']);
            echo $args['after_title'];
?>
            <ul>
                <li>
                    <a href="<?php echo the_field('fb_link', 'widget_' . $args['widget_id']); ?>" rel="nofollow" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/icons/social/fb1.png" alt="" />
                        <img src="<?php echo get_template_directory_uri(); ?>/icons/social/fb.png" alt="" />
                    </a>
                </li>
            </ul>

        <?php
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
        ?>

        <div class="mt-3 recent-posts">
            <?php
            // Define our WP Query Parameters
            $footer_recent_posts = new WP_Query('posts_per_page=7');
            while ($footer_recent_posts->have_posts()) : $footer_recent_posts->the_post();
                // Display the Post Title with Hyperlink
            ?>
                <div class="post-item mt-3">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                    <div>
                        <h4>
                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h4>
                        <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
                </div>
                <!-- End recent post item-->
            <?php
            // Repeat the process and reset once it hits the limit
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
} // class footer_recent_posts

// register footer_recent_posts widget
add_action('widgets_init', function () {
    register_widget('footer_recent_posts');
});
