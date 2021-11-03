<?php
/*
 * Template Name: Template Landing Page
 */
?>
<?php
get_header();
get_template_part('template_inc/inc', 'menuld');
?>
    <div class="STD_ladingcontent">
        <a id="back2Top" title="Back to top" href="#"><i class="fas fa-sort-up"></i></a>
        <?php
        if (have_posts()):
            while (have_posts()):the_post();
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'evox' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'evox' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            endwhile;
        endif;
        ?>
    </div>
<?php
get_footer();
?>