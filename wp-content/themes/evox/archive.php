<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $evox_options;
$evox_blog_sidebar = ((!isset($evox_options['evox_blog_general_sidebar'])) || empty($evox_options['evox_blog_general_sidebar'])) ? '2' : $evox_options['evox_blog_general_sidebar'];
$evox_blog_paging  = ((!isset($evox_options['evox_blog_general_pagination'])) || empty($evox_options['evox_blog_general_pagination'])) ? '0' : $evox_options['evox_blog_general_pagination'];
$evox_sidebar_type = '';

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

if(isset($_GET["sidebar"]) && !empty($_GET["sidebar"])){
    $evox_sidebar_type = $_GET["sidebar"];
}
if($evox_blog_sidebar == '1' || $evox_sidebar_type == 'none'){
    $evox_blog_class = 'col-md-12';
}else{
    $evox_blog_class = 'col-md-9';
}
?>
<div class="tz-blog <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <div class="container">
        <div class="row">
            <?php
            if($evox_sidebar_type == 'left' || $evox_blog_sidebar == '2' && $evox_blog_class != 'col-md-12') {
                get_sidebar();
            }
            ?>
            <div class="blog-wrapper <?php echo esc_attr($evox_blog_class); ?>">
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
                endif; // end if ( have_posts )
                ?>

                <?php
                if($evox_blog_paging == '1'){
                    evox_paging_nav();
                }
                ?>
            </div>
            <?php
            if($evox_sidebar_type == 'right' || $evox_blog_sidebar == '3' && $evox_blog_class != 'col-md-12'):
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

