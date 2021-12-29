<?php
defined('ABSPATH') or exit();

use TemPlazaFramework\Functions;
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $options = array();
}else{
    $options            = Functions::get_theme_options();
}
$donate_button = isset($options['cause-page-donate-button'])?filter_var($options['cause-page-donate-button'], FILTER_VALIDATE_BOOLEAN):true;
if($args){

    global $wpdb;
    $causeID = $args['postID'];
    $posttype= get_post_type($causeID);
    if($posttype !='cause'){
        return;
    }
    $cause_single_goal = get_post_meta( $causeID, 'cause-single-goal',true );
    $meta_key = 'donate_info_causeID_'.$causeID.'';
    $cause_donate_data = $wpdb->get_results($wpdb->prepare( "SELECT  meta_value FROM $wpdb->postmeta WHERE meta_key = %s", $meta_key) , ARRAY_N  );
    $total_donate = 0;
    foreach($cause_donate_data as $item){
        $total_donate = $total_donate + $item[0];
    }
    if($total_donate>0){
        $cause_donate_percent = ($total_donate/$cause_single_goal)*100;
    }else{
        $cause_donate_percent = 0;
    }
    $donate_settings = get_option('tz_cause_settings');
    $cause_single_goal = get_post_meta( $causeID, 'cause-single-goal',true );
    $cause_single_settings = get_post_meta( $causeID, 'cause-single-donate',true );
    if($cause_single_settings == 'custom'){
        $paypal_donate_message = get_post_meta($causeID,'cause-single-paypal-message',true);
        if($paypal_donate_message ==''){
            $paypal_donate_message = isset($donate_settings['paypal-donate-message'])?$donate_settings['paypal-donate-message']:'';
        }
        $paypal_step = get_post_meta($causeID,'cause-single-step-donate',true);
        if($paypal_step[0] ==''){
            $paypal_step = isset($donate_settings['paypal-donate'])?$donate_settings['paypal-donate']:'';
        }
        $currency = get_post_meta($causeID,'cause-single-paypal-currency',true);
        if($currency ==''){
            $currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
        }
        $currency_symbol = get_post_meta($causeID,'cause-single-paypal-symbol',true);
        if($currency_symbol==''){
            $currency_symbol = isset($donate_settings['paypal-currency-symbol'])?$donate_settings['paypal-currency-symbol']:''.$currency.'';
        }
    }else{
        $paypal_step = isset($donate_settings['paypal-donate'])?$donate_settings['paypal-donate']:'';
        $paypal_donate_message = isset($donate_settings['paypal-donate-message'])?$donate_settings['paypal-donate-message']:'';
        $currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
        $currency_symbol = isset($donate_settings['paypal-currency-symbol'])?$donate_settings['paypal-currency-symbol']:''.$currency.'';
    }

    if($cause_single_goal !=''){
        ?>
        <div class="cause-donate-progress uk-margin-bottom">
            <div class="cause-donate-result" data-donate="<?php echo esc_attr($cause_donate_percent);?>">
                <span><?php echo esc_html($cause_donate_percent).esc_html__('%','evox');?></span>
            </div>
        </div>
        <div class="uk-child-width-1-2 uk-margin-medium-bottom cause-goal" data-uk-grid>
            <div>
                <span><?php echo esc_html__('Raised:','evox');?> <span class="goal"><?php echo esc_html($currency_symbol.$total_donate); ?></span></span>
            </div>
            <div class="uk-text-right">
                <span><?php echo esc_html__('Goal:','evox');?> <span class="goal"><?php echo esc_html($currency_symbol.$cause_single_goal); ?></span></span>
            </div>
        </div>
        <?php
        if($donate_button){
            ?>

        <div class="cause-donate-btn">
            <a class="templaza-btn wp-block-buttons" href="#modal-center-<?php echo esc_attr($causeID);?>" data-uk-toggle>
                <?php echo esc_html__('Donate Now','evox');?>
            </a>
        </div>
            <?php
        }
            ?>

        <div id="modal-center-<?php echo esc_attr($causeID);?>" class="uk-flex-top" data-uk-modal>
            <div class="uk-modal-dialog  uk-margin-auto-vertical">

                <div class="donate-cause-img">
                    <?php
                    if(has_post_thumbnail($causeID)){
                    $thumb_cause_url = get_the_post_thumbnail_url($causeID,'large');
                    ?>
                    <img src="<?php echo esc_url($thumb_cause_url);?>" alt="<?php echo esc_attr(get_the_title($causeID));?>"/>
                    <?php
                    }
                    ?>
                </div>
                <div class="uk-modal-body">

                <button class="uk-modal-close-default" type="button" data-uk-close></button>

                <form data-id="<?php the_ID();?>" class="form-horizontal cause-donate-form"
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
                                    <input name="amount_check" class="input_donate" type="radio" value="<?php echo esc_attr($item);?>">
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

                </form>
                </div>

            </div>
        </div>
        <?php
    }
}