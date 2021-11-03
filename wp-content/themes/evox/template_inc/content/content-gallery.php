<?php
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
    </div>
<?php endif; ?>