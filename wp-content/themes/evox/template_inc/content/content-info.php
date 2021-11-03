<?php
global $evox_options;
$evox_blog_title     =    ((!isset($evox_options['evox_blog_general_title'])) || empty($evox_options['evox_blog_general_title'])) ? '0' : $evox_options['evox_blog_general_title'];
$evox_blog_date      =    ((!isset($evox_options['evox_blog_general_date'])) || empty($evox_options['evox_blog_general_date'])) ? '0' : $evox_options['evox_blog_general_date'];
$evox_single_date    =    ((!isset($evox_options['evox_blog_single_date'])) || empty($evox_options['evox_blog_single_date'])) ? '0' : $evox_options['evox_blog_single_date'];
$evox_blog_author    =    ((!isset($evox_options['evox_blog_general_author'])) || empty($evox_options['evox_blog_general_author'])) ? '0' : $evox_options['evox_blog_general_author'];
$evox_single_author  =    ((!isset($evox_options['evox_blog_single_author'])) || empty($evox_options['evox_blog_single_author'])) ? '0' : $evox_options['evox_blog_single_author'];
$evox_blog_cat       =    ((!isset($evox_options['evox_blog_general_cat'])) || empty($evox_options['evox_blog_general_cat'])) ? '0' : $evox_options['evox_blog_general_cat'];
$evox_single_cat     =    ((!isset($evox_options['evox_blog_single_cat'])) || empty($evox_options['evox_blog_single_cat'])) ? '0' : $evox_options['evox_blog_single_cat'];
$evox_blog_tag       =    ((!isset($evox_options['evox_blog_general_tag'])) || empty($evox_options['evox_blog_general_tag'])) ? '0' : $evox_options['evox_blog_general_tag'];
$evox_single_tag     =    ((!isset($evox_options['evox_blog_single_tag'])) || empty($evox_options['evox_blog_single_tag'])) ? '0' : $evox_options['evox_blog_single_tag'];
$evox_blog_content   =    ((!isset($evox_options['evox_blog_general_content'])) || empty($evox_options['evox_blog_general_content'])) ? '0' : $evox_options['evox_blog_general_content'];

$evox_post_type      =    get_post_type( $post -> ID );
$evox_view           =    evox_getPostViews($post->ID);
$evox_single_share   =    '';
?>
<div class="tz-blog-content">
    <?php
    if(!is_single() && $evox_blog_title == 1 ){
    ?>
    <h3 class="tz-blog-title">
        <a href="<?php the_permalink();?>">
            <?php
            if( get_the_title() != '' ){
                the_title();
            }else{
                esc_html_e('No Title','evox');
            }
            ?>
        </a>
    </h3>
        <?php
    }
    ?>
    <?php
    if( is_single()){
        ?>
        <div class="tz-blog-excerpt">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'evox' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'evox' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>
        <?php
        if($evox_single_share == 1 && class_exists('evox_plugin')){
            do_action('evox-social');
        }
    }else{
        if($evox_post_type != 'page'){
            if($evox_blog_content == 1) {
                ?>
                <div class="tz-blog-excerpt">
                    <?php
                    if (!has_excerpt()):
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
                <?php
            }
        }
    }
    ?>
    <?php if(!is_single()): ?>
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
        }
        if($evox_blog_cat == 1){
        if(get_the_category() !=false):
            ?>

            <span class="tz-blog-category">
                <i class="fa fa-folder"></i>
                <?php
                the_category(', ');
                ?>
            </span>
        <?php endif;} ?>
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
    <?php endif; ?>
</div>