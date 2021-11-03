<?php

/*
 * Display posts
 * Widgets display posts by category
 */

class tz_templaza_Social extends WP_Widget{

    /* function construct*/
    function __construct() {
        parent::__construct(
            'tz_view_social',esc_html__('TZ: Social', 'evox-elements'),
            array('description' => esc_html__(' Display Social', 'evox-elements'))
        );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);
        $array_socials = array( 'facebook', 'twitter', 'google', 'linkedin', 'youtube', 'instagram', 'vimeo', 'pinterest', 'dribbble', 'behance', 'soundcloud');
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        $alignment = (isset( $instance['alignment']) && $instance['alignment']) ? $instance['alignment'] : 'center';
        ?>
        <div class="ui-social uk-text-<?php echo $alignment; ?>">
            <div class="uk-child-width-auto uk-flex-<?php echo $alignment; ?> uk-grid-small" data-uk-grid>
                <?php
                foreach ( $array_socials as $item ){
                    if( isset($instance[$item]) && !empty($instance[$item]) ){
                        ?>
                        <div class="ui-item">
                        <a class="uk-link-muted" href="<?php echo esc_url($instance[$item]);?>">
                            <span data-uk-icon="icon: <?php echo esc_html($item);?>; width: 20"></span>
                        </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'         => 'Title',
            'facebook'    => '',
            'twitter'       => '',
            'google' => '',
            'linkedin'   => '',
            'youtube'       => '',
            'instagram'     => '',
            'vimeo'       => '',
            'pinterest'   => '',
            'dribbble'       => '',
            'behance'         => '',
            'soundcloud'    => ''
        ) );

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" value="<?php echo esc_html($instance['title']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('alignment')); ?>">
		        <?php esc_html_e('Alignment','evox-elements'); ?>
            </label>
            <br />
            <select name="<?php echo esc_attr($this->get_field_name('alignment')); ?>" id="<?php echo esc_attr($this->get_field_id('alignment')); ?>">
                <option value="left"<?php if (isset($instance['alignment']) && $instance['alignment'] == 'left') echo 'selected'; ?>><?php esc_html_e('Left','evox-elements'); ?></option>
                <option value="center"<?php if (isset($instance['alignment']) && $instance['alignment'] == 'center') echo 'selected'; ?>><?php esc_html_e('Center','evox-elements'); ?></option>
                <option value="right"<?php if (isset($instance['alignment']) && $instance['alignment'] == 'right') echo 'selected'; ?>><?php esc_html_e('Right','evox-elements'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
                <?php esc_html_e('Facebook Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" class="widefat" value="<?php echo esc_html($instance['facebook']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
                <?php esc_html_e('Twitter Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" class="widefat" value="<?php echo esc_html($instance['twitter']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google')); ?>">
                <?php esc_html_e('Google Plus Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('google')); ?>" id="<?php echo esc_attr($this->get_field_id('google')); ?>" class="widefat" value="<?php echo esc_html($instance['google']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>">
                <?php esc_html_e('Linkedin Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" class="widefat" value="<?php echo esc_html($instance['linkedin']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
                <?php esc_html_e('Youtube Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" class="widefat" value="<?php echo esc_html($instance['youtube']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>">
                <?php esc_html_e('Instagram Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" class="widefat" value="<?php echo esc_html($instance['instagram']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>">
                <?php esc_html_e('Vimeo Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" class="widefat" value="<?php echo esc_html($instance['vimeo']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>">
                <?php esc_html_e('Pinterest Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" class="widefat" value="<?php echo esc_html($instance['pinterest']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>">
                <?php esc_html_e('Dribble Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" class="widefat" value="<?php echo esc_html($instance['dribbble']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('behance')); ?>">
                <?php esc_html_e('Behance Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" class="widefat" value="<?php echo esc_html($instance['behance']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>">
                <?php esc_html_e('Soundcloud Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" class="widefat" value="<?php echo esc_html($instance['soundcloud']); ?>" >
        </p>

        <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['alignment']      =   $new_instance['alignment'];
        $instance['facebook']       =   $new_instance['facebook'];
        $instance['twitter']        =   $new_instance['twitter'];
        $instance['google']         =   $new_instance['google'];
        $instance['linkedin']       =   $new_instance['linkedin'];
        $instance['youtube']        =   $new_instance['youtube'];
        $instance['instagram']      =   $new_instance['instagram'];
        $instance['vimeo']          =   $new_instance['vimeo'];
        $instance['pinterest']      =   $new_instance['pinterest'];
        $instance['dribbble']       =   $new_instance['dribbble'];
        $instance['behance']        =   $new_instance['behance'];
        $instance['soundcloud']     =   $new_instance['soundcloud'];

        return $instance;
    }
}

function templaza_register_widgets_social() { register_widget( 'tz_templaza_Social' ); }
add_action( 'widgets_init', 'templaza_register_widgets_social' );

//add_action( 'widgets_init', 'sth_register_widgets' );
//add_action('widgets_init',create_function('','return register_widget("tz_templaza_Social");'));

?>