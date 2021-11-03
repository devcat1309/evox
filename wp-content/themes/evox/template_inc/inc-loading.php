<?php
global $evox_options;
$evox_show_loading = ((!isset($evox_options['evox_general_show_loading'])) || empty($evox_options['evox_general_show_loading'])) ? '0' : $evox_options['evox_general_show_loading'];
$evox_loading_url = ((!isset($evox_options['evox_general_image_loading'])) || empty($evox_options['evox_general_image_loading'])) ? '' : $evox_options['evox_general_image_loading'];

if (isset($evox_loading_url) && $evox_show_loading == 1):
    ?>
    <div id="tzloadding">
        <?php if (isset($evox_loading_url) && !empty($evox_loading_url)):?>
            <img class="loading_img" src="<?php echo esc_url($evox_loading_url['url']); ?>"
                 alt="<?php esc_attr_e('loading...', 'evox') ?>"
                 width="<?php echo esc_attr($evox_loading_url['width']); ?>"
                 height="<?php echo esc_attr($evox_loading_url['height']); ?>">
        <?php else: ?>
            <img class="loading_img" src="<?php echo esc_url(get_template_directory_uri() . '/images/loading.gif'); ?>" alt="<?php esc_attr_e('loading...', 'evox') ?>" width="100" height="100">
        <?php endif; ?>
    </div>
<?php endif; ?>