<?php
get_header();
if ( is_active_sidebar( 'sidebar-main' ) ) {
    $content_class = 'uk-width-2-3@l uk-width-1-1 uk-width-1-1@s uk-width-1-1@m';
}else{
    $content_class = 'uk-width-expand@m';
}
?>

    <div class="templaza-basic-single-heading  uk-text-center ">
        <div class="uk-container">
            <div class="templaza-heading">
                <?php
                the_title( '<h1 class="page-title uk-heading-small">', '</h1>' );
                do_action('templaza_breadcrumb');
                ?>
            </div>
        </div>
    </div>
    <div class="templaza-basic-wrap templaza-content-session uk-container uk-container-large ">
        <div class="uk-grid-column-collapse" data-uk-grid>
            <div class="<?php echo esc_attr($content_class);?>">
                <div class="">
                    <?php
                    get_template_part( 'templaza-framework/templates/theme_pages/page');
                    ?>
                </div>
            </div>
            <?php
            if ( is_active_sidebar( 'sidebar-main' ) ) {
                ?>
                <div class="uk-width-1-3@l uk-width-1-1 uk-width-1-1@s uk-width-1-1@m">
                    <div class="templaza-sidebar">
                        <?php dynamic_sidebar( 'sidebar-main' ); ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

<?php
get_footer();