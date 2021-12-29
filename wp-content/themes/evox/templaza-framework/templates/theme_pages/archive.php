<?php
/*
 * Archive Blog
 */

defined('TEMPLAZA_FRAMEWORK');
use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;
use TemPlazaFramework\CSS;
$evox_id             = isset($atts['id'])?$atts['id']:time();
$evox_custom_class   = isset($atts['custom_container_class'])?' '.$atts['custom_container_class']:'';
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $evox_options = array();
}else{
    $evox_options            = Functions::get_theme_options();
}
global $wp_query;
$evox_post_type      = get_post_type(get_the_ID());
if (!$evox_post_type) {
	do_action('templaza_search_no_result');
	return;
}
$prefix               = $evox_post_type.'-page';

if($evox_post_type == 'post'){
    $prefix = 'blog-page';
}

$evox_layout        = isset($evox_options[$prefix.'-layout'])?$evox_options[$prefix.'-layout']:'list';

$evox_grid_col      = isset($evox_options[$prefix.'-grid-column'])?$evox_options[$prefix.'-grid-column']:2;
$evox_col_gap      = isset($evox_options[$prefix.'-column-gap'])?$evox_options[$prefix.'-column-gap']:'';
$evox_thumbnail_size= isset($evox_options[$prefix.'-thumbnail-size'])?$evox_options[$prefix.'-thumbnail-size']:'large';
$evox_thumbnail_effect = isset($evox_options[$prefix.'-thumbnail-effect'])?$evox_options[$prefix.'-thumbnail-effect']:'none';
$evox_leading      = isset($evox_options[$prefix.'-leading'])?filter_var($evox_options[$prefix.'-leading'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_thumbnail     = isset($evox_options[$prefix.'-thumbnail'])?filter_var($evox_options[$prefix.'-thumbnail'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_title         = isset($evox_options[$prefix.'-title'])?filter_var($evox_options[$prefix.'-title'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_description   = isset($evox_options[$prefix.'-description'])?filter_var($evox_options[$prefix.'-description'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_readmore      = isset($evox_options[$prefix.'-readmore'])?filter_var($evox_options[$prefix.'-readmore'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_share         = isset($evox_options[$prefix.'-share'])?filter_var($evox_options[$prefix.'-share'], FILTER_VALIDATE_BOOLEAN):false;
$evox_show_thumbnail_audio = isset($evox_options[$prefix.'-thumb-audio'])?filter_var($evox_options[$prefix.'-thumb-audio'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_thumbnail_video = isset($evox_options[$prefix.'-thumb-video'])?filter_var($evox_options[$prefix.'-thumb-video'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_thumbnail_link = isset($evox_options[$prefix.'-thumb-link'])?filter_var($evox_options[$prefix.'-thumb-link'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_thumbnail_quote = isset($evox_options[$prefix.'-thumb-quote'])?filter_var($evox_options[$prefix.'-thumb-quote'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_pagination = isset($evox_options[$prefix.'-pagination'])?filter_var($evox_options[$prefix.'-pagination'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_category      = isset($evox_options[$prefix.'-category'])?filter_var($evox_options[$prefix.'-category'], FILTER_VALIDATE_BOOLEAN):true;
$evox_show_tag           = isset($evox_options[$prefix.'-tag'])?filter_var($evox_options[$prefix.'-tag'], FILTER_VALIDATE_BOOLEAN):false;
$evox_image_cover           = isset($evox_options[$prefix.'-image-cover'])?filter_var($evox_options[$prefix.'-image-cover'], FILTER_VALIDATE_BOOLEAN):false;
$evox_thumbnail_height = isset($evox_options[$prefix.'-thumbnail-height'])?$evox_options[$prefix.'-thumbnail-height']:300;
$evox_card_size = isset($evox_options[$prefix.'-card-size'])?$evox_options[$prefix.'-card-size']:'';
$evox_card_custom = isset($evox_options[$prefix.'-card-custom'])?$evox_options[$prefix.'-card-custom']:'';
$evox_cl = '';
if ($evox_layout == 'grid') {
    $transition = 'uk-transition-toggle uk-overflow-hidden uk-card';
}else{
    $transition = '';
}
if ($evox_layout == 'column' || $evox_layout == 'grid') {
    $evox_layout_cl = 'templaza-blog-grid uk-child-width-1-'.$evox_grid_col.'@m';
    $evox_cl = '';
}else{
    $evox_layout_cl = 'templaza-blog-list uk-child-width-1-1';
    $evox_cl = '';
}
$designs    = array(
    array(
        'enable'    => true,
        'class'     => '.templaza-archive-item .uk-card-body',
        'options' => array(
            'blog-page-card-custom',
        ),
    ),
);
if ( class_exists( 'TemPlazaFramework\TemPlazaFramework' ) ) {
    if (count($designs)) {
        $styles = array();

        foreach ($designs as $design) {
            $enable = isset($design['enable']) ? (bool)$design['enable'] : false;
            if ($enable) {
                $wd_css_responsive = array(
                    'desktop' => '',
                    'tablet' => '',
                    'mobile' => '',
                );
                $wd_css = Templates::make_css_design_style($design['options'], $evox_options);

                if (!empty($wd_css)) {
                    if (is_array($wd_css)) {
                        foreach ($wd_css as $device => $wd_style) {
                            if (!empty($wd_style)) {
                                $wd_style = $design['class'] . '{' . $wd_style . '}';
                                Templates::add_inline_style($wd_style, $device);
                            }
                        }
                    } else {
                        Templates::add_inline_style($design['class'] . '{' . $wd_css . '}');
                    }
                }
            }
        }
    }
    if ($evox_image_cover == true) {
        $evox_css = '.templaza-blog-item-img a, .uk-slideshow-items,
     .templaza-blog-item-video .tz-embed-responsive {height: ' . $evox_thumbnail_height . 'px;}';

        Templates::add_inline_style($evox_css);
    }
}
?>
<div id="templaza-archive-<?php echo esc_attr($evox_id);?>" class="templaza-blog templaza-archive templaza-archive-<?php echo esc_attr(get_post_type().$evox_custom_class); ?>">
    <div class="templaza-blog-body <?php echo esc_attr($evox_layout_cl. ' uk-grid-'.$evox_col_gap);?>" data-uk-grid>
        <?php
        $d=1;
        if($wp_query->found_posts==0){
            ?>
            <div class="templaza-blog-item">
            <?php
            do_action('templaza_archive_no_result');
            ?>
            </div>
            <?php
        }
        if (have_posts()) : while (have_posts()) : the_post();
            $format = get_post_format() ? : 'standard';
            if(is_sticky(get_the_ID())){
                $sticky_cl = 'templaza-sticky';
            }else{
                $sticky_cl = '';
            }
            if($evox_leading && $d==1 && $evox_layout=='grid'){
                $lead = 'uk-width-1-1';
                $wrap_lead_content = 'uk-container-small uk-container templaza-item-lead';
            }else{
                $lead = $wrap_lead_content = ' ';
            }
            ?>
            <div id='post-<?php the_ID(); ?>' class="<?php echo esc_attr($evox_cl. ' '.$sticky_cl.' '.$lead); ?> templaza-blog-item ">
                <div class="templaza-blog-item-wrap templaza-archive-item <?php echo esc_attr($transition);?>">
                    <?php
                    if(is_sticky(get_the_ID()) && has_post_thumbnail()){
                        ?>
                        <span class="templaza-sticky-post" title="<?php echo esc_attr__('Sticky Post','evox');?>"><i class="fas fa-thumbtack"></i></span>
                        <?php
                    }
                    if ($evox_show_thumbnail){
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
                        if ($format =='audio'){
                            if ($evox_show_thumbnail_audio){
                                do_action('templaza_image_post');
                            }else{
                                do_action('templaza_audio_post');
                            }
                        }
                        if ($format =='link'){
                            if ($evox_show_thumbnail_link){
	                            do_action('templaza_image_post');
                            } else {
	                            do_action('templaza_link_post');
                            }
                        }
                        if ($format == 'quote'){
                            if ($evox_show_thumbnail_quote){
	                            do_action('templaza_image_post');
                            } else {
	                            do_action('templaza_quote_post');
                            }
                        }
                    }
                    ?>
                    <?php
                    if($evox_layout =='grid'){
                        ?>
                        <a href="<?php the_permalink() ?>">
                            <div class="uk-position-cover uk-overlay uk-overlay-primary uk-transition-fade">
                            </div>
                        </a>
                        <div class="ui-post-info-wrap uk-position-bottom uk-light uk-transition-slide-bottom-small ">
                            <div class=" uk-card-body uk-card-<?php echo esc_attr($evox_card_size);?>">
                                <div class="ui-post-meta-top uk-article-meta uk-margin">
                                    <span class="category">
                                        <?php the_category(', '); ?>
                                    </span>
                                </div>
                                <h3 class="ui-title uk-margin-remove-top uk-h3 uk-margin-bottom">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="ui-post-meta-bottom uk-article-meta uk-margin-top templaza-blog-item-info" data-uk-margin="">
                                    <span class="ui-post-meta-date uk-first-column">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </span>
                                    <span class="ui-post-meta-author">
                                        <?php echo esc_html__('By', 'evox') .' '. get_the_author_posts_link();?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php
                    }else{
                        ?>
                        <div class="templaza-blog-item-content <?php echo esc_attr($wrap_lead_content);
                         echo esc_attr(' uk-padding'); ?>">
                            <?php
                            do_action('templaza_meta_post_header');
                            if ($evox_show_title) {
                                do_action('templaza_title_post');
                            }
                            if ($evox_show_description) {
                                do_action('templaza_excerpt_post');
                            }
                            if ($evox_show_share) {
                                do_action('templaza_share_post');
                            }
                            if ($evox_show_readmore) {
                                do_action('templaza_readmore_post');
                            }
                            do_action('templaza_meta_post_footer');
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            $d++;
        endwhile; // end while ( have_posts )

        endif; // end if ( have_posts )
        ?>
    </div>
    <?php if($evox_show_pagination){?>
    <div class="templaza-blog-pagenavi uk-margin-medium-top">
        <?php
        do_action('templaza_pagination');
        ?>
    </div>
    <?php } ?>
</div>