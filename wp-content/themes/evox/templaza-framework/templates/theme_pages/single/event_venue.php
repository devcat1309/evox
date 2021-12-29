<?php

defined('TEMPLAZA_FRAMEWORK');
$evox_id             = isset($atts['id'])?$atts['id']:time();

$evox_post_type       = get_post_type(get_the_ID());
$prefix                 = 'blog-single';

?>
<div class="templaza-event">
    <div id="templaza-single-<?php echo esc_attr($evox_id); ?>" class="templaza-single templaza-single-<?php
    echo esc_attr($evox_post_type); ?> templaza-event-body">
        <?php
        if ( have_posts() ) : while (have_posts()) : the_post() ;
            do_action('templaza_set_postviews',get_the_ID());
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('templaza-blog-item'); ?>>
                <div class="templaza-event-item-wrap">
                    <div class="templaza-blog-item-content templaza-archive-item">
                        <div class="templaza-item-heading">
                            <div class="uk-text-center templaza-single-meta">
                                <div class="templaza-blog-item-info templaza-post-meta uk-article-meta">
                                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                                    <span class="author">
                                        <?php echo get_the_author_posts_link();?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="templaza-single-content">
                            <?php
                            the_content();
                            wp_link_pages();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile; // end while ( have_posts )
        endif; // end if ( have_posts )
        ?>
    </div>
</div>