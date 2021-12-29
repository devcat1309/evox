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
$show_tag           = isset($options[$prefix.'-tag'])?filter_var($options[$prefix.'-tag'], FILTER_VALIDATE_BOOLEAN):true;
$show_author        = isset($options[$prefix.'-author'])?filter_var($options[$prefix.'-author'], FILTER_VALIDATE_BOOLEAN):true;
$show_date          = isset($options[$prefix.'-date'])?filter_var($options[$prefix.'-date'], FILTER_VALIDATE_BOOLEAN):true;

if($show_tag && has_tag()){ ?>
    <div class="templaza-blog-item-info templaza-post-meta templaza-post-meta-footer uk-article-meta">
        <span class="tag">
        <?php the_tags('',', '); ?>
        </span>
    </div>
<?php } ?>