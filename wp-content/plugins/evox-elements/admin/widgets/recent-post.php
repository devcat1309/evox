<?php
/*
 * Display posts
 * Widgets display posts by category
 */

class templaza_RecentPost extends WP_Widget{

    /* function construct*/
    function __construct() {
        parent::__construct(
            'tz_view_post',esc_html__('TZ: Recent Post', 'evox-elements'),
            array('description' => esc_html__(' Display post by post type ', 'evox-elements'))
        );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);
        if( $instance['orderby'] != 'views'){
            $tzpostargs = array(
                'post_type'         => 'post',
                'posts_per_page'    => $instance['tzlmpost'],
                'ignore_sticky_posts' => 1,
                'orderby'           => $instance['orderby'],
                'post__not_in' => get_option( 'sticky_posts' )
            );
        }else{
            $tzpostargs = array(
                'post_type'         => 'post',
                'posts_per_page'    => $instance['tzlmpost'],
                'ignore_sticky_posts' => 1,
                'orderby'           => 'meta_value',
                'meta_key'    => 'post_views_count',
                'post__not_in' => get_option( 'sticky_posts' )
            );
        }
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        ?>
            <div class="tz-recent-post">
                <?php
                $tz_query_post = new WP_Query($tzpostargs);
                if( $tz_query_post->have_posts() ):
                    while( $tz_query_post->have_posts() ): $tz_query_post->the_post();
                        ?>
                        <div class="tz-recent-item">
                            <?php
                            if ( has_post_thumbnail() ):
                            ?>
                                <div class="featured_image">
		                            <?php echo wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $instance['image_size']); ?>
                                </div>
                            <?php
                            endif;
                            ?>
                            <div class="tz-information">
                                <span class="tz-post-date uk-text-meta uk-margin-small-bottom"><?php echo get_the_date(); ?></span>
                                <h4 class="uk-margin-remove tz-item-title"><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                        </div>
                        <?php
                    endwhile; // end while(have_posts)
                    wp_reset_postdata();
                endif;  // end if(have_posts)
                ?>
            </div>
        <?php
        echo $args['after_widget'];
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'             => 'Title',
            'tzlmpost'          =>  5,
            'orderby'           => 'date',
            'image_size'           => 'large'
        ) );
	    $all_thumbnails = get_intermediate_image_sizes();
	    $arr_thumbnails = array();
	    foreach ($all_thumbnails as $thumbnail){
		    $arr_thumbnails[$thumbnail] = $thumbnail;
	    }
	    $arr_thumbnails['full'] = 'full';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" value="<?php echo esc_html($instance['title']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tzlmpost')); ?>">
                <?php esc_html_e('Limit post','evox-elements'); ?>
            </label>
            <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id('tzlmpost')); ?>" name="<?php echo esc_attr($this->get_field_name('tzlmpost')); ?>" value="<?php echo esc_html($instance['tzlmpost']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_html_e('Order By','evox-elements'); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>" value="<?php echo $instance['orderby']; ?>">
                <option value="date" <?php if( $instance['orderby']=='date'){?>selected="selected"<?php } ?>><?php esc_html_e('Date','evox-elements') ?></option>
                <option value="ID" <?php if( $instance['orderby']=='date'){?>selected="selected"<?php } ?>><?php esc_html_e('ID','evox-elements') ?></option>
                <option value="none" <?php if( $instance['orderby']=='none'){?>selected="selected"<?php } ?>><?php esc_html_e('None','evox-elements') ?></option>
                <option value="rand" <?php if( $instance['orderby']=='rand'){?>selected="selected"<?php } ?>><?php esc_html_e('Random','evox-elements') ?></option>
                <option value="title" <?php if( $instance['orderby']=='title'){?>selected="selected"<?php } ?>><?php esc_html_e('Title','evox-elements') ?></option>
                <option value="views" <?php if( $instance['orderby']=='views'){?>selected="selected"<?php } ?>><?php esc_html_e('Views','evox-elements') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image_size')); ?>"><?php esc_html_e('Image Size','evox-elements'); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'image_size' ); ?>" id="<?php echo $this->get_field_id( 'image_size' ); ?>" value="<?php echo $instance['image_size']; ?>">
                <?php
                foreach ($all_thumbnails as $thumbnail){
                    if ($instance['image_size'] == $thumbnail) {
	                    echo '<option value="'.esc_attr($thumbnail).'" selected="selected">'.esc_html($thumbnail).'</option>';
                    } else {
	                    echo '<option value="'.esc_attr($thumbnail).'">'.esc_html($thumbnail).'</option>';
                    }
                }
                ?>
            </select>
        </p>
        <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['tzlmpost']       =   $new_instance['tzlmpost'];
//        $instance['post_type']       =   $new_instance['post_type'];
        $instance['orderby']       =   $new_instance['orderby'];
        $instance['image_size']       =   $new_instance['image_size'];
        return $instance;
    }
}

function templaza_register_widgets_recentpost() { register_widget( 'templaza_RecentPost' ); }
add_action( 'widgets_init', 'templaza_register_widgets_recentpost' );
?>