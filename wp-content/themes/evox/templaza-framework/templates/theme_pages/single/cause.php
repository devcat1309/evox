<?php

defined('TEMPLAZA_FRAMEWORK');
use TemPlazaFramework\Functions;
use TemPlazaFramework\CSS;
$evox_id             = isset($atts['id'])?$atts['id']:time();
$evox_post_type       = get_post_type(get_the_ID());
global $wpdb;
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $evox_options = array();
}else{
    $evox_options            = Functions::get_theme_options();
}
$evox_color = isset($evox_options['theme-color'])?$evox_options['theme-color']:'#FED23D';
$theme_color = CSS::make_color_rgba_redux($evox_color);
$evox_show_related           = isset($evox_options['cause-page-related'])?filter_var($evox_options['cause-page-related'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_related_number  = isset($evox_options['cause-page-related-number'])?$evox_options['cause-page-related-number']:'5';
$donate_settings = get_option('tz_cause_settings');
$cause_single_goal = get_post_meta( get_the_ID(), 'cause-single-goal',true );
$cause_single_settings = get_post_meta( get_the_ID(), 'cause-single-donate',true );
if($cause_single_settings == 'custom'){
    $paypal_donate_message = get_post_meta(get_the_ID(),'cause-single-paypal-message',true);
    if($paypal_donate_message ==''){
        $paypal_donate_message = isset($donate_settings['paypal-donate-message'])?$donate_settings['paypal-donate-message']:'';
    }
    $paypal_step = get_post_meta(get_the_ID(),'cause-single-step-donate',true);
    if($paypal_step[0] ==''){
        $paypal_step = isset($donate_settings['paypal-donate'])?$donate_settings['paypal-donate']:'';
    }
    $currency = get_post_meta(get_the_ID(),'cause-single-paypal-currency',true);
    if($currency ==''){
        $currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
    }
    $currency_symbol = get_post_meta(get_the_ID(),'cause-single-paypal-symbol',true);
    if($currency_symbol==''){
        $currency_symbol = isset($donate_settings['paypal-currency-symbol'])?$donate_settings['paypal-currency-symbol']:''.$currency.'';
    }
}else{
    $paypal_step = isset($donate_settings['paypal-donate'])?$donate_settings['paypal-donate']:'';
    $paypal_donate_message = isset($donate_settings['paypal-donate-message'])?$donate_settings['paypal-donate-message']:'';
    $currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
    $currency_symbol = isset($donate_settings['paypal-currency-symbol'])?$donate_settings['paypal-currency-symbol']:''.$currency.'';
}

if(isset($_POST['payment_status']) && $_POST['payment_status']=='Completed'){

    $date_format = get_option('date_format');
    $title = $_POST['first_name']. ' '.$_POST['last_name'];
    $payment_date = $_POST['payment_date'];
    $newDate = date($date_format, strtotime($payment_date));
    $causeID = get_the_ID();
    $id = wp_insert_post(array(
        'post_title'=> $title,
        'post_type'=>'cause_donate',
        'post_status'=>'publish',
        'post_content'=>''
    ));

    if ( ! add_post_meta( $id, 'donate_info_causeID_'.$causeID.'', $_POST['payment_gross'], true ) ) {
        update_post_meta ($id, 'donate_info_causeID_'.$causeID.'', $_POST['payment_gross'] );
    }

    if ( ! add_post_meta( $id, 'donate_info_date', $newDate, true ) ) {
        update_post_meta ($id, 'donate_info_date', $newDate );
    }

    if ( ! add_post_meta( $id, 'total_donate', $_POST['payment_gross'], true ) ) {
        update_post_meta ($id, 'total_donate', $_POST['payment_gross'] );
    }

    if ( ! add_post_meta( $id, 'donate_info_item', $_POST['item_name'], true ) ) {
        update_post_meta ($id, 'donate_info_item', $_POST['item_name'] );
    }

    if ( ! add_post_meta( $id, 'donate_info_currency', $_POST['mc_currency'], true ) ) {
        update_post_meta ($id, 'donate_info_currency', $_POST['mc_currency'] );
    }

    if ( ! add_post_meta( $id, 'donate_info_item_id', $_POST['custom'], true ) ) {
        update_post_meta ($id, 'donate_info_item_id', $_POST['custom'] );
    }

    die();

}
$meta_key = 'donate_info_causeID_'.get_the_ID().'';
$cause_donate_data = $wpdb->get_results($wpdb->prepare( "SELECT  meta_value FROM $wpdb->postmeta WHERE meta_key = %s", $meta_key) , ARRAY_N  );
$total_donate = 0;
foreach($cause_donate_data as $item){
    $total_donate = $total_donate + $item[0];
}
if($total_donate>0){
    $cause_donate_percent = ($total_donate/$cause_single_goal)*100;
}else{
    $cause_donate_percent=0;
}

?>
<div class="templaza-event">
    <div id="templaza-single-<?php echo esc_attr($evox_id); ?>" class="templaza-single templaza-single-<?php
    echo esc_attr($evox_post_type); ?> templaza-event-body">
        <?php
        if ( have_posts() ) : while (have_posts()) : the_post() ;
            $format = get_post_format() ? : 'standard';
            do_action('templaza_set_postviews',get_the_ID());
            ?>
            <div id="post-<?php the_ID(); ?>">
                <div class="templaza-event-item-wrap">
                    <div class="templaza-blog-item-content templaza-archive-item">
                        <div class="templaza-item-heading">
                            <div class="uk-text-center templaza-single-meta">
                                <div class="templaza-blog-item-info templaza-post-meta uk-article-meta">
                                    <span class="date"><?php echo esc_attr(get_the_date()); ?></span>
                                    <span class="author">
                                        <?php echo get_the_author_posts_link();?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="templaza-single-content uk-grid-column-collapse" data-uk-grid>
                            <div class="uk-width-expand ">
                                <div class="cause-single-img">
                                    <?php
                                    if ($format == 'gallery') {
                                        do_action('templaza_gallery_post');
                                    }
                                    if($format == 'standard'){
                                        do_action('templaza_image_post');
                                    }
                                    if ($format =='video') {
                                        if ($evox_show_thumbnail_video){
                                            do_action('templaza_image_post');
                                        }else{
                                            do_action('templaza_video_post');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="templaza-single-box uk-padding-remove-top">
                                    <div class="cause-content-info">
                                        <?php
                                        the_content();
                                        wp_link_pages();
                                        ?>
                                        <div class="clr"></div>
                                        <div class="uk-flex uk-flex-middle  uk-padding-small uk-padding-remove-horizontal templaza-tag-share-box uk-grid-collapse uk-margin-top"
                                             data-uk-grid>
                                            <div class="templaza-single-tags uk-padding-small uk-padding-remove-horizontal  uk-width-auto@m uk-width-1-1">
                                                <?php
                                                do_action('templaza_post_taxonomy','cause_tag');
                                                ?>
                                            </div>
                                            <div class="templaza-single-share uk-padding-small  uk-padding-remove-horizontal uk-width-expand@m uk-width-1-1">
                                                <?php do_action('templaza_share_post'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="templaza-single-comment uk-margin-large-top templaza-single-box">
                                    <?php comments_template( '', true ); ?>
                                </div>
                            </div>
                            <div class="uk-width-1-3@l uk-width-1-1 ">
                                <div class="tz-form-donate cause-sidebar templaza-sidebar">
                                <div class="widget">
                                    <div class="progress-bar position" data-percent="<?php echo esc_attr($cause_donate_percent);?>" data-duration="1000" data-color="#F5F2ED,<?php echo esc_attr($theme_color);?>"></div>
                                    <div class="uk-child-width-1-2 uk-margin-medium-top cause-goal" data-uk-grid>
                                        <div>
                                            <span><?php echo esc_html__('Raised:','evox');?> <span class="goal"><?php echo esc_html($currency_symbol.$total_donate); ?></span></span>
                                        </div>
                                        <div class="uk-text-right">
                                            <span><?php echo esc_html__('Goal:','evox');?> <span class="goal"><?php echo esc_html($currency_symbol.$cause_single_goal); ?></span></span>
                                        </div>
                                    </div>
                                    <div class="cause-donate-btn">
                                        <a class="templaza-btn wp-block-buttons" href="#modal-center" data-uk-toggle>
                                            <?php echo esc_html__('Donate Now','evox');?>
                                        </a>
                                    </div>

                                </div>
                                <?php
                                $cause_category = wp_get_post_terms(get_the_ID(), 'cause-category');
                                $cause_categories = array();

                                foreach ($cause_category as $item) {
                                    $cause_categories[] = $item->slug;
                                }
                                if($evox_show_related == true){
                                $related = get_posts(array('post_type' => 'cause',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'cause-category',
                                            'field' => 'slug',
                                            'terms' => $cause_categories,
                                        )
                                    ),
                                    'numberposts' => 5,
                                    'post__not_in' => array(get_the_ID())));

                                $date_format = get_option('date_format');
                                if ($related){
                                    ?>
                                <div class="widget">
                                    <h3><?php echo esc_html__('Related Causes','evox');?></h3>
                                    <?php
                                    foreach ($related as $post) {?>
                                    <div class="uk-card  uk-grid-collapse uk-margin" data-uk-grid>
                                        <div class="uk-card-media-left uk-width-1-4 uk-cover-container">
                                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID));?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" data-uk-cover/>
                                                <canvas width="600" height="400"></canvas>
                                            </a>
                                        </div>
                                        <div class="uk-width-expand">
                                            <div class="uk-margin-left">
                                                <h5 class="cause-title uk-margin-remove">
                                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                                </h5>
                                                <span class="uk-text-meta"><?php echo esc_html(get_the_date($date_format,$post->ID)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                wp_reset_postdata();
                                ?>
                                </div>
                            <?php
                            }
                                }
                            ?>

                                <div id="modal-center" class="uk-flex-top" data-uk-modal>
                                    <div class="uk-modal-dialog uk-margin-auto-vertical">

                                        <div class="donate-cause-img">
                                            <?php
                                            the_post_thumbnail();
                                            ?>
                                        </div>
                                        <div class="uk-modal-body ">

                                        <button class="uk-modal-close-default" type="button" data-uk-close></button>

                                        <form data-id="<?php the_ID();?>"  class="form-horizontal cause-donate-form"
                                              name="donateForm">
                                            <div class="uk-text-center">
                                                <p><?php echo esc_html($paypal_donate_message);?></p>
                                            </div>
                                            <div class="choose-item uk-padding-bototm">
                                                <?php
                                                if(isset($paypal_step)){
                                                    $d=0;
                                                    foreach ($paypal_step as $item){
                                                        ?>
                                                        <div class="item-input">
                                                            <label><?php echo esc_html($currency_symbol.$item);?></label>
                                                            <input name="amount_check" id="input_amount_<?php echo esc_attr($d);?>" class="input_donate" type="radio" value="<?php echo esc_attr($item);?>">
                                                        </div>
                                                        <?php
                                                        $d++;
                                                    }
                                                }
                                                ?>
                                               <div class="item-input">
                                                   <input name="amount-custom" type="text" class="form-control donate-form-text-input" placeholder="<?php esc_attr_e('Custom','evox');?>" value="" />
                                               </div>

                                                <div class="uk-alert-danger uk-margin-remove-bottom donate-alert-choose" data-uk-alert>
                                                    <a class="uk-alert-close" data-uk-close></a>
                                                    <p><?php echo esc_html__('Please choose amount number donate','evox');?></p>
                                                </div>

                                            </div>

                                            <div class="about-donate " data-uk-grid>
                                                <div class="item uk-width-expand">
                                                    <input type="email" placeholder="<?php esc_attr_e('PayPal Email','evox');?>" class="donate_email uk-margin-remove" value=""/>
                                                </div>
                                                <div class="btn templaza-btn btn-donate uk-flex uk-flex-middle">
                                                    <?php echo esc_html__('Donate','evox');?>
                                                </div>
                                            </div>
                                            <?php wp_nonce_field( 'cause_donate' ); ?>

                                        </form>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile; // end while ( have_posts )
        endif; // end if ( have_posts )
        ?>
    </div>
</div>