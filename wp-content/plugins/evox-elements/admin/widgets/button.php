<?php
/*
 * Display Button
 * Widgets display button
 */

class tz_templaza_Ui_Button extends WP_Widget{

    /* function construct*/
    function __construct() {
        parent::__construct(
            'tz_view_ui_button',esc_html__('TZ: Ui Button', 'evox-elements'),
            array('description' => esc_html__(' Display Button', 'evox-elements'))
        );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        ?>
        <div class="ui-button uk-text-center">
            <a class="uk-button uk-button-default uk-button-square"
               href="<?php echo esc_url($instance['button-url']);?>" title="<?php echo esc_attr($instance['button-text']);?>"><?php echo esc_attr($instance['button-text']);?>
            </a>
        </div>
        <?php
        echo $args['after_widget'];
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'         => 'Title',
            'button-text'    => '',
            'button-url'       => '',
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
            <label for="<?php echo esc_attr($this->get_field_name('button-text')); ?>">
                <?php esc_html_e('Button Text','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('button-text')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_name('button-text')); ?>" value="<?php echo esc_html($instance['button-text']); ?>" >
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_name('button-url')); ?>">
                <?php esc_html_e('Button Url','evox-elements'); ?>
            </label>
            <br>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('button-url')); ?>" id="<?php echo esc_attr($this->get_field_name('button-url')); ?>" class="widefat" value="<?php echo esc_html($instance['button-url']); ?>" >
        </p>

        <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['button-text']     =   $new_instance['button-text'];
        $instance['button-url']        =   $new_instance['button-url'];

        return $instance;
    }
}

function templaza_register_widgets_ui_button() { register_widget( 'tz_templaza_Ui_Button' ); }
add_action( 'widgets_init', 'templaza_register_widgets_ui_button' );