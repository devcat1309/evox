<?php
global $evox_options;
$evox_link = get_post_meta( $post->ID, '_format_link_url', true );
$evox_blog_date      =    ((!isset($evox_options['evox_blog_general_date'])) || empty($evox_options['evox_blog_general_date'])) ? '1' : $evox_options['evox_blog_general_date'];
$evox_blog_author    =    ((!isset($evox_options['evox_blog_general_author'])) || empty($evox_options['evox_blog_general_author'])) ? '1' : $evox_options['evox_blog_general_author'];
$evox_blog_cat       =    ((!isset($evox_options['evox_blog_general_cat'])) || empty($evox_options['evox_blog_general_cat'])) ? '1' : $evox_options['evox_blog_general_cat'];
$evox_blog_tag       =    ((!isset($evox_options['evox_blog_general_tag'])) || empty($evox_options['evox_blog_general_tag'])) ? '1' : $evox_options['evox_blog_general_tag'];
$evox_blog_content   =    ((!isset($evox_options['evox_blog_general_content'])) || empty($evox_options['evox_blog_general_content'])) ? '1' : $evox_options['evox_blog_general_content'];
?>
<div class="tz-blog-link">
    <a href="<?php echo esc_url($evox_link);?>"><?php echo esc_html($evox_link);?></a>
    <?php if($evox_blog_content == 1){ ?>
        <div class="tz-link-excerpt">
            <?php
            if( ! has_excerpt()):
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'evox' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'evox' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            else:
                the_excerpt();
            endif;
            ?>
        </div>
    <?php } ?>
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
            <?php endif; }?>
    </div>
</div>