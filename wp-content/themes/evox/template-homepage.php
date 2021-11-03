<?php
/*
 * Template Name: Template Home Default
 */
?>

<?php
get_header();
get_template_part('template_inc/inc', 'menu');
$evox_type = evox_metabox('evox_header_page_type', '', '', '');
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');
$evox_header_theme_select = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_header_page_option = evox_metabox('evox_header_page_option', '', '', 'default');
$evox_header_page_select = evox_metabox('evox_header_page_type', '', '', '0');
//
$tz_class = '';
if (($evox_header_theme_select == '0' && $evox_header_page_option != 'custom') || ($evox_header_page_select == '0' && $evox_header_page_option == 'custom')) {
    $tz_class = 'tz_subx';
}elseif (($evox_header_theme_select == '2' && $evox_header_page_option != 'custom') || ($evox_header_page_select == '2' && $evox_header_page_option == 'custom')) {
    $tz_class = 'tz_suby';
}elseif (($evox_header_theme_select == '7' && $evox_header_page_option != 'custom') || ($evox_header_page_select == '7' && $evox_header_page_option == 'custom')) {
    $tz_class = 'tz_sub';
}
?>
    <div class="main-content <?php echo $tz_class; ?> <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8')) {echo 'tz-mgleft';} ?>">
        <?php
        if (have_posts()):
            while (have_posts()):the_post();
                the_content();
                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'evox') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'evox') . ' </span>%',
                    'separator' => '<span class="screen-reader-text">, </span>',
                ));
            endwhile;
        endif;
        ?>
    </div>
<?php
get_footer();
?>