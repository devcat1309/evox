<?php
global $evox_options;
$evox_name = get_post_meta( $post->ID, '_format_quote_source_name', true );
$evox_link = get_post_meta( $post->ID, '_format_quote_source_url', true );
$evox_blog_date      =    ((!isset($evox_options['evox_blog_general_date'])) || empty($evox_options['evox_blog_general_date'])) ? '1' : $evox_options['evox_blog_general_date'];
$evox_blog_author    =    ((!isset($evox_options['evox_blog_general_author'])) || empty($evox_options['evox_blog_general_author'])) ? '1' : $evox_options['evox_blog_general_author'];
$evox_blog_cat       =    ((!isset($evox_options['evox_blog_general_cat'])) || empty($evox_options['evox_blog_general_cat'])) ? '1' : $evox_options['evox_blog_general_cat'];
$evox_blog_tag       =    ((!isset($evox_options['evox_blog_general_tag'])) || empty($evox_options['evox_blog_general_tag'])) ? '1' : $evox_options['evox_blog_general_tag'];
?>

<div class="tz-quote-info">
    <a href="<?php the_permalink(); ?>"><span class="tz-quote-name"><?php echo esc_html($evox_name)?></span></a>
    <a class="tz-quote-link" href="#">- <?php echo esc_html($evox_link)?> -</a>
</div>
<div class="tz-blog-content">
    <div class="tz-blog-meta">
        <?php
        if($evox_blog_date == 1){
            $evox_year = get_the_time( 'Y' );
            $evox_month = get_the_time( 'm' );
            $evox_day = get_the_time( 'd' ); ?>
            <span>
                <i class="fa fa-clock-o"></i>
                <a href="<?php echo esc_url(get_day_link( $evox_year, $evox_month, $evox_day )) ?>"><?php echo get_the_date(); ?></a>
            </span>
        <?php }if($evox_blog_author == 1) { ?>
            <span>
                <i class="fa fa-user"></i>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </span>

            <?php
        }if($evox_blog_cat == 1){
            if(get_the_category() !=false):
                ?>

                <span class="tz-blog-category">
                    <i class="fa fa-folder"></i>
                    <?php
                    the_category(', ');
                    ?>
                </span>
            <?php endif; } ?>
        <?php
        if($evox_blog_tag == 1){
            if(get_the_tags() != false):
                ?>
                <span class="tz-blog-tag">
                    <i class="fa fa-tag"></i>
                    <?php
                    the_tags('',', ');
                    ?>
                </span>
            <?php endif; } ?>
    </div>
</div>