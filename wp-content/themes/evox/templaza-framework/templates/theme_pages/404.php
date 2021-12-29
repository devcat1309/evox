<?php
use TemPlazaFramework\CSS;
use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;

$error = new WP_Error();

$options    = Functions::get_theme_options();
$errorContent   = isset($options['404-content'])?$options['404-content']:'';
$errorButton    = isset($options['404-call-to-action'])?$options['404-call-to-action']:'';
// Background Image
$background_setting_404    = isset($options['404-background-setting'])?$options['404-background-setting']:0;

$styles = '';
$video  = [];
if($background_setting_404){
    if($background_setting_404 =="color"){
        $background_color_404 = isset($options['404-background-color'])?$options['404-background-color']:'';

        if (!empty($background_color_404)) {
            $bg_color   = CSS::make_color_rgba($background_color_404['color'], $background_color_404['alpha'],
                $background_color_404['rgba']);
            if(!empty($bg_color)) {
                $styles = 'background-color:' . $bg_color;
            }
        }
    }
    if($background_setting_404 =="image"){
        $background_404 = isset($options['404-background'])?$options['404-background']:array();
        if(count($background_404)){
            $styles .= CSS::background('', $background_404['background-image'],
                $background_404['background-repeat'], $background_404['background-attachment'],
                $background_404['background-position'], $background_404['background-size']);
        }
    }

    if($background_setting_404 =="video"){
        $attributes = [];
        $background_video_404 = isset($options['404-background-video'])?$options['404-background-video']:array();

        if (count($background_video_404) && !empty($background_video_404['url'])) {
            $attributes['data-templaza-video-bg'] = $background_video_404['url'];
            wp_enqueue_script('tzfrm_templazavideobg', Functions::get_my_url().'/assets/js/vendor/jquery.templazavideobg.js');
        }

        $return = [];
        foreach ($attributes as $key => $value) {
            $return[] = $key . '="' . $value . '"';
        }
        $video =  $return;
    }

    if(!empty($styles)){
        Templates::add_inline_style('.templaza-error-page{'.$styles.'}');
    }
}
?>
    <div class="templaza-error-page uk-text-center ">
        <div class="uk-flex uk-flex-middle uk-height-1-1">
            <div class="page-404">
            <?php
            if (!empty($errorContent)) {
                $errorContent   = str_replace('{errorcode}', $error -> get_error_code(), $errorContent);
                $errorContent   = str_replace('{errormessage}', htmlspecialchars($error ->get_error_message(), ENT_QUOTES, 'UTF-8'), $errorContent);
                echo  wp_kses($errorContent,'post');
                get_search_form();
            } else{
            ?>
                <h1 class="title-404"><?php echo esc_html__('404 ERROR!', 'evox'); ?></h1>
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'evox' ); ?></p>
                <?php get_search_form(); ?>
            <?php
            }
            ?>
            <div class="uk-margin-large-top ">
                <a class="templaza-btn btn-backtohome" href="<?php echo esc_url(get_home_url()); ?>" role="button"><?php echo esc_html($errorButton); ?></a>
            </div>

            </div>
        </div>
    </div>
