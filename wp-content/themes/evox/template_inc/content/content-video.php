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