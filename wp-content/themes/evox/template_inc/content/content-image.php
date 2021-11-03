<?php
global $evox_options;
$evox_single_date   =   ((!isset($evox_options['evox_blog_single_date'])) || empty($evox_options['evox_blog_single_date'])) ? '1' : $evox_options['evox_blog_single_date'];
$evox_single_author =   ((!isset($evox_options['evox_blog_single_author'])) || empty($evox_options['evox_blog_single_author'])) ? '1' : $evox_options['evox_blog_single_author'];
$evox_single_cat    =   ((!isset($evox_options['evox_blog_single_cat'])) || empty($evox_options['evox_blog_single_cat'])) ? '1' : $evox_options['evox_blog_single_cat'];
$evox_single_tag    =   ((!isset($evox_options['evox_blog_single_tag'])) || empty($evox_options['evox_blog_single_tag'])) ? '1' : $evox_options['evox_blog_single_tag'];
$evox_single_title  =   ((!isset($evox_options['evox_blog_single_title'])) || empty($evox_options['evox_blog_single_title'])) ? '1' : $evox_options['evox_blog_single_title'];

?>
<?php if ( !is_single() && is_sticky() ): ?>
    <span class="tz-sticky-post"></span>
<?php endif; ?>
<div class="tz-blog-thumbnail">
    <?php the_post_thumbnail();?>
    <?php if(is_single()): ?>
        <div class="content">
            <h3 class="tz-blog-title">
                <?php
                if(is_single() && $evox_single_title == 1) {
                    the_title();
                }
                ?>
            </h3>
            <div class="tz-blog-meta">
                <?php
                if($evox_single_date == 1){
                    $evox_year = get_the_time( 'Y' );
                    $evox_month = get_the_time( 'm' );
                    $evox_day = get_the_time( 'd' ); ?>
                    <span>
                        <i class="fa fa-clock-o"></i>
                        <a href="<?php echo esc_url(get_day_link( $evox_year, $evox_month, $evox_day )) ?>"><?php echo get_the_date(); ?></a>
                    </span>
                <?php }
                if($evox_single_author == 1) {
                    ?>
                    <span>
                        <i class="fa fa-user"></i>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                    </span>
                    <?php
                }
                if($evox_single_cat == 1){
                    if(get_the_category() !=false):
                        ?>

                        <span class="tz-blog-category">
                            <i class="fa fa-folder"></i>
                                <?php
                                the_category(', ');
                                ?>
                        </span>
                    <?php endif;
                }?>
                <?php
                if($evox_single_tag == 1){
                    if(get_the_tags() != false):
                        ?>
                        <span class="tz-blog-tag">
                            <i class="fa fa-tag"></i>
                                <?php
                                the_tags('',', ');
                                ?>
                        </span>
                    <?php endif;
                }?>
            </div>
        </div>
    <?php endif; ?>
</div>