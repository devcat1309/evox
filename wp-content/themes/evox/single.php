<?php
get_header();
get_template_part('template_inc/inc','menu');
if(has_post_format('quote') || has_post_format('link')) {
    get_template_part('template_inc/inc', 'breadcrumb');
}
global $evox_options;
$evox_single_sidebar    =   ((!isset($evox_options['evox_blog_single_sidebar'])) || empty($evox_options['evox_blog_single_sidebar'])) ? '3' : $evox_options['evox_blog_single_sidebar'];
$evox_single_related    =   ((!isset($evox_options['evox_blog_single_related'])) || empty($evox_options['evox_blog_single_related'])) ? '0' : $evox_options['evox_blog_single_related'];
$evox_single_comment    =   ((!isset($evox_options['evox_blog_single_comment'])) || empty($evox_options['evox_blog_single_comment'])) ? '0' : $evox_options['evox_blog_single_comment'];

$evox_single_date       =   ((!isset($evox_options['evox_blog_single_date'])) || empty($evox_options['evox_blog_single_date'])) ? '0' : $evox_options['evox_blog_single_date'];
$evox_single_author     =   ((!isset($evox_options['evox_blog_single_author'])) || empty($evox_options['evox_blog_single_author'])) ? '0' : $evox_options['evox_blog_single_author'];
$evox_single_cat        =   ((!isset($evox_options['evox_blog_single_cat'])) || empty($evox_options['evox_blog_single_cat'])) ? '0' : $evox_options['evox_blog_single_cat'];
$evox_single_tag        =   ((!isset($evox_options['evox_blog_single_tag'])) || empty($evox_options['evox_blog_single_tag'])) ? '0' : $evox_options['evox_blog_single_tag'];
$evox_single_title      =   ((!isset($evox_options['evox_blog_single_title'])) || empty($evox_options['evox_blog_single_title'])) ? '0' : $evox_options['evox_blog_single_title'];

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

?>
<div class="tz-blog-single <?php if(has_post_format('quote')): echo 'single_quote';elseif(has_post_format('link')): echo 'single_link'; endif; ?> <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <?php
    if ( have_posts() ) : while (have_posts()) : the_post();
    evox_setPostViews(get_the_ID());
    $evox_comment_count  = wp_count_comments($post->ID);
    $evox_view = evox_getPostViews($post->ID);
    ?>
    <?php if(has_post_format('gallery')){
        $evox_gallery = get_post_meta( $post->ID, '_format_gallery_images', true );
        if($evox_gallery) :
            ?>
            <div class="tz-blog-slides">
                <ul class="slides">
                    <?php foreach($evox_gallery as $evox_image) : ?>

                        <?php $evox_image_src = wp_get_attachment_image_src( $evox_image, 'full-thumb' ); ?>
                        <?php $evox_caption = get_post_field('post_excerpt', $evox_image); ?>
                        <li><img src="<?php echo esc_url($evox_image_src[0]); ?>" <?php if($evox_caption) : ?>title="<?php echo esc_attr($evox_caption); ?>"<?php endif; ?> alt="<?php echo sanitize_title(get_the_title())?>"/></li>
                    <?php endforeach; ?>
                </ul>
                <div class="content">
                    <div class="container">
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
                                <?php endif; }?>
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
                                <?php endif; }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
    }elseif(has_post_format('video')){ ?>
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>

            <div class="content">
                <div class="container">
                    <?php $evox_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
                    <?php
                    if($evox_video != ''):
                        ?>
                        <div class="tz-blog-video">
                            <?php if(wp_oembed_get( $evox_video )) : ?>
                                <?php echo wp_oembed_get($evox_video); ?>
                            <?php else : ?>
                                <?php echo balanceTags($evox_video); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>
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
                            <?php endif; }?>
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
                            <?php endif; }?>
                    </div>
                </div>
            </div>
        </div>
    <?php }elseif(has_post_format('audio')){  ?>
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>

            <div class="content">
                <div class="container">
                    <?php
                    $evox_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
                    if($evox_audio != ''):
                        ?>
                        <div class="tz-blog-audio">
                            <?php if(wp_oembed_get( $evox_audio )) : ?>
                                <?php echo wp_oembed_get($evox_audio); ?>
                            <?php else : ?>
                                <?php echo balanceTags($evox_audio); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>

                    <?php
                    if( $evox_single_title == 1 ) {
                        ?>
                        <h3 class="tz-blog-title"><?php the_title(); ?></h3>
                        <?php
                    }
                    ?>
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
                            <?php endif; }?>
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
                            <?php endif; }?>
                    </div>
                </div>
            </div>

        </div>
    <?php }elseif(!has_post_format('quote' && !has_post_format('link'))){ ?>
        <!--    Image-->
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>
            <div class="content">
                <div class="container">
                    <?php
                    if( $evox_single_title == 1 ) {
                        ?>
                        <h3 class="tz-blog-title"><?php the_title(); ?></h3>
                        <?php
                    }
                    ?>
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
                            <?php endif; }?>
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
                            <?php endif; }?>
                    </div>
                </div>
            </div>

        </div>
    <?php  } ?>

    <div class="container">
        <div class="row">
            <?php if($evox_single_sidebar == 2):  ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            <div class="blog-wrapper <?php if($evox_single_sidebar == '1'): echo 'col-md-12'; else: echo 'col-md-9'; endif;?>">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    if(has_post_format('quote')):
                        get_template_part( 'template_inc/content/content','quote' );
                    elseif(has_post_format('link')):
                        get_template_part( 'template_inc/content/content','link' );
                    else:
                        get_template_part( 'template_inc/content/content','info' );
                    endif;
                    ?>
                </div>
                <?php
                $evox_author_des = get_the_author_meta('description');
                if($evox_author_des != ''):
                    ?>
                    <div class="author">
                        <div class="author-item">
                            <div class="author-avata">
                                <img src="<?php echo get_avatar_url( get_the_author_meta('ID'),array('size'=> 270,)); ?>" alt="avatar">
                            </div>
                            <div class="author-infor">
                                <?php
                                $evox_facebook    =  get_the_author_meta('facebook');
                                $evox_twitter     =  get_the_author_meta('twitter');
                                $evox_gplus       =  get_the_author_meta('gplus');
                                $evox_dribbble    =  get_the_author_meta('dribbble');
                                $evox_instagram    =  get_the_author_meta('instagram');
                                ?>
                                <span class="written"><?php echo esc_html__('Post Written By','evox');?></span>
                                <div class="social-author">
                                    <?php if(isset($evox_facebook) && !empty($evox_facebook)) {?>
                                        <a target="_blank" href="<?php echo esc_url($evox_facebook);?>">
                                            <i class="fa fa-facebook"></i></a>
                                    <?php } ?>

                                    <?php if(isset($evox_twitter) && !empty($evox_twitter)) {?>
                                        <a target="_blank" href="<?php echo esc_url($evox_twitter);?>">
                                            <i class="fa fa-twitter"></i></a>
                                    <?php } ?>

                                    <?php if(isset($evox_gplus) && !empty($evox_gplus)) {?>
                                        <a target="_blank" href="<?php echo esc_url($evox_gplus);?>">
                                            <i class="fa fa-google-plus"></i></a>
                                    <?php } ?>

                                    <?php if(isset($evox_dribbble) && !empty($evox_dribbble)) {?>
                                        <a target="_blank" href="<?php echo esc_url($evox_dribbble);?>">
                                            <i class="fa fa-pinterest"></i></a>
                                    <?php } ?>
                                    <?php if(isset($evox_instagram) && !empty($evox_instagram)) {?>
                                        <a target="_blank" href="<?php echo esc_url($evox_instagram);?>">
                                            <i class="fa fa-instagram"></i></a>
                                    <?php } ?>
                                </div>
                                <span class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author();?></a></span>
                                <p class="author-des"><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($evox_single_related == 1 && ! is_singular('destination')){ ?>
                    <?php
                    global $post;
                    $evox_tags = wp_get_post_tags($post->ID);

                    if ($evox_tags) {
                        $evox_tag_ids = array();
                        foreach($evox_tags as $evox_individual_tag) $evox_tag_ids[] = $evox_individual_tag->term_id;
                        $evox_args=array(
                            'tag__in' => $evox_tag_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>3,
                            'ignore_sticky_posts' => 1,
                        );

                        $evox_query = new wp_query( $evox_args );
                        if($evox_query->have_posts()){
                            ?>
                            <div class="relatedposts">
                                <h3><?php echo esc_html__('Related Articles','evox'); ?></h3>
                                <div class="related">

                                    <?php
                                    while( $evox_query->have_posts() ) {
                                        $evox_query->the_post();
                                        ?>

                                        <div class="related-item">
                                            <div class="related-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                            </div>
                                            <div class="related-content">
                                                <div class="title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <?php
                                                    $evox_year = get_the_time( 'Y' );
                                                    $evox_month = get_the_time( 'm' );
                                                    $evox_day = get_the_time( 'd' ); ?>
                                                    <span>
                                                                <a href="<?php echo esc_url(get_day_link( $evox_year, $evox_month, $evox_day )) ?>"><?php echo get_the_date(); ?></a>
                                                            </span>
                                                    <span>-</span>
                                                    <span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a></span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>

                    <div class="tzComments">
                        <?php comments_template( '', true ); ?>
                    </div><!-- end comments -->
                <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>
            </div>
            <?php if($evox_single_sidebar == 3):  ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>

