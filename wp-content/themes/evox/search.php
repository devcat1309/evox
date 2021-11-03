<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $evox_options;
$evox_blog_sidebar = ((!isset($evox_options['evox_blog_general_sidebar'])) || empty($evox_options['evox_blog_general_sidebar'])) ? '2' : $evox_options['evox_blog_general_sidebar'];
$evox_blog_paging  = ((!isset($evox_options['evox_blog_general_pagination'])) || empty($evox_options['evox_blog_general_pagination'])) ? '1' : $evox_options['evox_blog_general_pagination'];

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

?>
<div class="tz-blog <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <div class="container">
        <div class="row">
            <?php
            if($evox_blog_sidebar == '1') {
                get_sidebar();
            }
            ?>
            <div class="blog-wrapper col-md-9">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();
                    ?>
                    <div id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
                        <?php
                        if(has_post_format('gallery')):
                            get_template_part( 'template_inc/content/content','gallery' );
                            get_template_part( 'template_inc/content/content','info' );
                        elseif(has_post_format('audio')):
                            get_template_part( 'template_inc/content/content','audio' );
                            get_template_part( 'template_inc/content/content','info' );
                        elseif(has_post_format('video')):
                            get_template_part( 'template_inc/content/content','video' );
                            get_template_part( 'template_inc/content/content','info' );
                        elseif(has_post_format('quote')):
                            get_template_part( 'template_inc/content/content','quote' );
                        elseif(has_post_format('link')):
                            get_template_part( 'template_inc/content/content','link' );
                        else:
                            get_template_part( 'template_inc/content/content','image' );
                            get_template_part( 'template_inc/content/content','info' );
                        endif;

                        ?>
                    </div>
                    <?php
                endwhile; // end while ( have_posts )
                else: ?>
                    <div class="tz-serach-notda">
                        <h3><?php  esc_html_e('No Data', 'evox');?></h3>

                        <div class="page-content">

                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                                <p><?php printf(  esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'evox' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

                            <?php elseif ( is_search() ) : ?>

                                <p><?php  esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'evox' ); ?></p>
                                <?php get_search_form(); ?>

                            <?php else : ?>

                                <p><?php  esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'evox' ); ?></p>
                                <?php get_search_form(); ?>

                            <?php endif; ?>

                        </div><!-- .page-content -->
                    </div>
                
                <?php
                endif; // end if ( have_posts )
                ?>

                <?php
                if($evox_blog_paging == '1'){
                    evox_paging_nav();
                }
                ?>
            </div>
            <?php
            if($evox_blog_sidebar == '2'):
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

