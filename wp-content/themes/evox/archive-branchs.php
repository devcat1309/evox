<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $evox_options;
$evox_branchs_sidebar = ((!isset($evox_options['evox_branchs_list_sidebar'])) || empty($evox_options['evox_branchs_list_sidebar'])) ? 'right' : $evox_options['evox_branchs_list_sidebar'];

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

$evox_branchs_class = '';
if($evox_branchs_sidebar == 'left' || $evox_branchs_sidebar == 'right'){
    $evox_branchs_class = 'col-md-9';
}else{
    $evox_branchs_class = 'col-md-12';
}

?>
<div class="tzBranchs <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <div class="container">
        <div class="row">
            <?php
            if($evox_branchs_sidebar == 'left') {
                get_sidebar();
            }
            ?>
            <div class="tzBranchs-wrapper <?php echo esc_attr($evox_branchs_class); ?>">
                <?php
                if(have_posts()) : while (have_posts()) : the_post();
                    $evox_branchs_address = evox_metabox('evox_branchs_address','','','');
                    $evox_branchs_phone   = evox_metabox('evox_branchs_phone','','','');
                    $evox_branchs_email   = evox_metabox('evox_branchs_email','','','');
                    ?>
                    <div id="post-<?php the_ID();?>" <?php post_class();?>>
                        <div class="tzBranchs-column tzBranchs-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="tzBranchs-column tzBranchs-contact">
                            <span class="tzBranchs-address">
                                <i class="fa fa-location-arrow"></i>
                                <span><?php echo esc_html($evox_branchs_address); ?></span>
                            </span>
                            <span class="tzBranchs-phone">
                                <i class="fa fa-phone"></i>
                                <span><?php echo esc_html($evox_branchs_phone); ?></span>
                            </span>
                            <span class="tzBranchs-email">
                                <i class="fa fa-envelope"></i>
                                <span><?php echo esc_html($evox_branchs_email); ?></span>
                            </span>
                        </div>
                        <div class="tzBranchs-column tzBranchs-info">
                            <h3 class="tzBranchs-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="tzBranchs-des">
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="view-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('View More','evox');?></a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <?php evox_paging_nav(); ?>
            </div>
            <?php
            if($evox_branchs_sidebar == 'right') {
                get_sidebar();
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
