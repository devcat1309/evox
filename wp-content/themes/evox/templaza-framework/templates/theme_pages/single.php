<?php

defined('TEMPLAZA_FRAMEWORK');

use TemPlazaFramework\CSS;
use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;

$evox_id             = isset($atts['id'])?$atts['id']:time();
$evox_custom_class   = isset($atts['custom-container-class'])?' '.$atts['custom-container-class']:'';
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $evox_options = array();
}else{
    $evox_options            = Functions::get_theme_options();
}
$evox_post_type       = get_post_type(get_the_ID());
$prefix                 = 'blog-single';

$evox_show_thumbnail         = isset($evox_options[$prefix.'-thumbnail'])?filter_var($evox_options[$prefix.'-thumbnail'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_tag               = isset($evox_options[$prefix.'-tag'])?filter_var($evox_options[$prefix.'-tag'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_meta              = isset($evox_options[$prefix.'-meta'])?filter_var($evox_options[$prefix.'-meta'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_date              = isset($evox_options[$prefix.'-date'])?filter_var($evox_options[$prefix.'-date'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_share             = isset($evox_options[$prefix.'-share'])?filter_var($evox_options[$prefix.'-share'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_title             = isset($evox_options[$prefix.'-title'])?filter_var($evox_options[$prefix.'-title'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_author            = isset($evox_options[$prefix.'-author'])?filter_var($evox_options[$prefix.'-author'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_related           = isset($evox_options[$prefix.'-related'])?filter_var($evox_options[$prefix.'-related'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_comment           = isset($evox_options[$prefix.'-comment'])?filter_var($evox_options[$prefix.'-comment'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_category          = isset($evox_options[$prefix.'-category'])?filter_var($evox_options[$prefix.'-category'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_description       = isset($evox_options[$prefix.'-description'])?filter_var($evox_options[$prefix.'-description'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_comment_count     = isset($evox_options[$prefix.'-comment-count'])?filter_var($evox_options[$prefix.'-comment-count'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_post_view         = isset($evox_options[$prefix.'-post-view'])?filter_var($evox_options[$prefix.'-post-view'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_post_next_preview = isset($evox_options[$prefix.'-next-preview'])?filter_var($evox_options[$prefix.'-next-preview'], FILTER_VALIDATE_BOOLEAN):false;

$evox_blog_slider_autoplay   = isset($evox_options['blog-slider-autoplay'])?filter_var($evox_options['blog-slider-autoplay'], FILTER_VALIDATE_BOOLEAN):true;
$evox_blog_thumbnail_size    = isset($evox_options[$prefix.'-thumbnail-size'])?$evox_options[$prefix.'-thumbnail-size']:'large';
$evox_blog_thumbnail_effect  = isset($evox_options[$prefix.'-thumbnail-effect'])?$evox_options[$prefix.'-thumbnail-effect']:'none';

$evox_blog_slider_animation  = isset($evox_options['blog-slider-animation'])?$evox_options['blog-slider-animation']:'';
$evox_blog_slider_nav        = isset($evox_options['blog-slider-nav'])?filter_var($evox_options['blog-slider-nav'], FILTER_VALIDATE_BOOLEAN):true;
$evox_blog_slider_kenburns   = isset($evox_options['blog-slider-kenburns'])?filter_var($evox_options['blog-slider-kenburns'], FILTER_VALIDATE_BOOLEAN):true;

$evox_blog_slider_options = '';
if($evox_blog_slider_autoplay == true){
    $evox_blog_slider_options .='autoplay: true; ';
}
if($evox_blog_slider_animation != ''){
    $evox_blog_slider_options .='animation: '.$evox_blog_slider_animation. '';
}
if ( have_posts() ) : while (have_posts()) : the_post() ;
    if ( !empty( get_the_content() ) ){
        $tag_class = 'uk-margin-medium-top ';
    }else{
        $tag_class = '';
    }
?>
<div class="templaza-blog">
    <div id="templaza-single-<?php echo esc_attr($evox_id); ?>" class="templaza-single templaza-single-<?php
    echo esc_attr($evox_post_type.' '.$evox_custom_class); ?> templaza-blog-body">
        <?php

            do_action('templaza_set_postviews',get_the_ID());
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('templaza-blog-item'); ?>>
                <div class="templaza-blog-item-wrap">
                    <div class="templaza-blog-item-content templaza-archive-item ">
                        <div class="templaza-item-heading">
                            <div class="uk-text-center templaza-single-meta">
                                <?php
                                if ($evox_show_meta) {
                                    do_action('templaza_single_meta_post');
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        if ($evox_show_thumbnail
                            && has_post_thumbnail()
                            && (
                                has_post_format('gallery')  ||
                                has_post_format('image')  ||
                                has_post_format('video') ||
                                has_post_format('audio') ||
                                has_post_format('link') ||
                                has_post_format()==false ||
                                has_post_format('quote')) ): ?>
                        <div class="templaza-single-feature">
                            <?php
                            if (has_post_format('gallery')){
                                do_action('templaza_gallery_post');
                            }

                            if(has_post_thumbnail() && empty(has_post_format('gallery')) && empty(has_post_format('audio'))
                                && empty(has_post_format('video')) && empty(has_post_format('quote'))&& empty(has_post_format('link'))){
                                do_action('templaza_image_post');
                            }
                            if (has_post_format('video')){
                                do_action('templaza_video_post');
                            }
                            if (has_post_format('audio')){
                                do_action('templaza_audio_post');
                            }
                            if (has_post_format('link')){

                                ?>
                                <div class="templaza-single-box uk-padding-remove-bottom">
                                    <?php
                                    do_action('templaza_link_post');
                                    ?>
                                </div>
                            <?php
                            }
                            if (has_post_format('quote')) {
                                ?>
                            <div class="templaza-single-box uk-padding-remove-bottom">
                                <?php
                                do_action('templaza_quote_post');
                                ?>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        endif;
                        ?>
                        <div class="templaza-single-content uk-margin-medium-bottom templaza-single-box">
                            <div class="templaza-single-content-content">
                            <?php
                            the_content();
                            wp_link_pages();
                            ?>
                            </div>
                            <?php if(($evox_show_tag && has_tag()) || $evox_show_share) { ?>

                                <div class="uk-flex uk-flex-middle uk-padding-small uk-padding-remove-horizontal templaza-tag-share-box uk-grid-collapse  <?php echo esc_attr($tag_class);?>"
                                     data-uk-grid>
                                    <?php
                                    if ($evox_show_tag && has_tag() && get_the_tag_list()) {
                                        do_action('templaza_single_tag_post');
                                    }
                                    if ($evox_show_share) {
                                        ?>
                                        <div class="templaza-single-share uk-padding-small uk-padding-remove-horizontal uk-width-expand@m uk-width-1-1">
                                            <?php do_action('templaza_share_post'); ?>
                                        </div>
                                    <?php }
                                    ?>
                                </div>

                                <?php
                            }
                            $post_nav = posts_nav_link();
                            if($evox_show_post_next_preview){
                                do_action('templaza_single_next_post');
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if($evox_show_author){
                        do_action('templaza_single_author_post');
                    }
                    if($evox_show_related){
                        do_action('templaza_single_related_post');
                    }
                    if($evox_show_comment){ ?>
                        <div class="templaza-single-comment uk-margin-large-top templaza-single-box">
                            <?php comments_template( '', true ); ?>
                        </div><!-- end comments -->
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        endwhile; // end while ( have_posts )

        ?>
    </div>
</div>
<?php
endif; // end if ( have_posts )