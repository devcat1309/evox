<?php
defined('ABSPATH') or exit();
use TemPlazaFramework\Functions;
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' )){
    $options = array();
}else{
    $options            = Functions::get_theme_options();
}
$post_type          = get_post_type(get_the_ID());
$prefix             = $post_type.'-page';
if($post_type == 'post'){
    $prefix = 'blog-page';
}
if($post_type == 'post' && is_single()){
    $prefix = 'blog-single';
}
$show_comment_count = isset($options[$prefix.'-comment-count'])?filter_var($options[$prefix.'-comment-count'], FILTER_VALIDATE_BOOLEAN):false;
$show_author        = isset($options[$prefix.'-author'])?filter_var($options[$prefix.'-author'], FILTER_VALIDATE_BOOLEAN):true;
$show_category      = isset($evox_options[$prefix.'-category'])?filter_var($evox_options[$prefix.'-category'], FILTER_VALIDATE_BOOLEAN):true;
$show_date          = isset($options[$prefix.'-date'])?filter_var($options[$prefix.'-date'], FILTER_VALIDATE_BOOLEAN):true;
$show_post_view     = isset($options[$prefix.'-post-view'])?filter_var($options[$prefix.'-post-view'], FILTER_VALIDATE_BOOLEAN):false;
?>
<div class="templaza-blog-item-info templaza-post-meta templaza-post-meta-header uk-article-meta uk-margin-small-bottom">
    <?php if ($show_date){ ?>
        <span><?php
            if(get_the_title() !='') {
                echo esc_attr(get_the_date());
            }else{
                ?>
                <a href="<?php the_permalink() ?>"><?php echo esc_html(get_the_date());?></a>
                <?php
            }
            ?></span>
    <?php } ?>
    <?php if($show_author){ ?>
        <span class="author">
            <?php echo esc_html__('by', 'evox') .' '. get_the_author_posts_link();?>
        </span>
    <?php } ?>
    <?php if ($show_category){ ?>
        <span class="category">
            <?php the_category(', '); ?>
        </span>
    <?php } ?>
    <?php if ($show_comment_count){ ?>
        <span class="comment_count">
            <?php do_action('templaza_get_commentcount_post'); ?>
        </span>
    <?php } ?>
    <?php if($show_post_view):?>
        <span class="views">
            <?php do_action('templaza_get_postviews',get_the_ID()); ?>
        </span>
    <?php endif; ?>
</div>