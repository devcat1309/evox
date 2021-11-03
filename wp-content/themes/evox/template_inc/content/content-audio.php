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