<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $evox_options;
$evox_branchs_sidebar   =   ((!isset($evox_options['evox_branchs_detail_sidebar'])) || empty($evox_options['evox_branchs_detail_sidebar'])) ? 'right' : $evox_options['evox_branchs_detail_sidebar'];
$evox_branchs_map       =   ((!isset($evox_options['evox_branchs_detail_map'])) || empty($evox_options['evox_branchs_detail_map'])) ? '' : $evox_options['evox_branchs_detail_map'];
$evox_branchs_image     =   ((!isset($evox_options['evox_branchs_detail_image'])) || empty($evox_options['evox_branchs_detail_image'])) ? '' : $evox_options['evox_branchs_detail_image'];
$evox_branchs_info      =   ((!isset($evox_options['evox_branchs_detail_info'])) || empty($evox_options['evox_branchs_detail_info'])) ? '' : $evox_options['evox_branchs_detail_info'];
$evox_branchs_content   =   ((!isset($evox_options['evox_branchs_detail_content'])) || empty($evox_options['evox_branchs_detail_content'])) ? '' : $evox_options['evox_branchs_detail_content'];

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
<div class="tzBranchs-single <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <div class="container">
        <div class="row">
            <?php
            if($evox_branchs_sidebar == 'left') {
                get_sidebar();
            }
            ?>
            <div class="<?php echo esc_attr($evox_branchs_class); ?>">
                <?php
                if(have_posts()) : while (have_posts()) : the_post();
                    $evox_branchs_address = evox_metabox('evox_branchs_address','','','');
                    $evox_branchs_phone   = evox_metabox('evox_branchs_phone','','','');
                    $evox_branchs_email   = evox_metabox('evox_branchs_email','','','');
                    $evox_branchs_messages = evox_metabox('evox_branchs_message','','','');

                    ?>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="tzBranchs-map">
                            <?php if($evox_branchs_map == '1' && $evox_branchs_address != ''):?>
                                <iframe width="100%" height="480" style="border:0" src="<?php echo esc_url('https://maps.google.com/maps?q='.$evox_branchs_address.'&amp;ie=UTF8&amp;&amp;output=embed'); ?>" allowfullscreen></iframe>
                            <?php endif;?>
                        </div>
                        <div class="tzBranchs-bottom">
                            <?php if($evox_branchs_image == '1' || $evox_branchs_info == '1'):?>
                            <div class="tzBranchs-contact">
                                <div class="tzBranchs-contact-box">
                                    <?php if($evox_branchs_image == '1' && has_post_thumbnail()):?>
                                        <div class="tzBranchs-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif;?>

                                    <?php if($evox_branchs_info == '1'):?>

                                        <div class="tzBranchs-info">
                                            <?php if($evox_branchs_address != ''): ?>
                                                <div class="tzBranchs-info-item tzBranchs-address">
                                                    <i class="fa fa-location-arrow"></i>
                                                    <div class="tzBranchs-info-content">
                                                        <?php echo esc_html($evox_branchs_address); ?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if($evox_branchs_phone != ''):?>
                                                <div class="tzBranchs-info-item tzBranchs-phone">
                                                    <i class="fa fa-phone"></i>
                                                    <div class="tzBranchs-info-content">
                                                        <?php echo esc_html($evox_branchs_phone); ?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if($evox_branchs_email != ''):?>
                                            <div class="tzBranchs-info-item tzBranchs-email">
                                                <i class="fa fa-envelope"></i>
                                                <div class="tzBranchs-info-content">
                                                    <?php echo esc_html($evox_branchs_email); ?>
                                                </div>
                                            </div>
                                            <?php endif;?>
                                            <?php
                                            if($evox_branchs_messages != ''):
                                                foreach($evox_branchs_messages as $evox_branchs_message):
                                                ?>
                                                    <div class="tzBranchs-info-item tzBranchs-message">
                                                        <i class="fa fa-calendar-check-o"></i>
                                                        <div class="tzBranchs-info-content">
                                                            <?php echo balanceTags($evox_branchs_message); ?>
                                                        </div>
                                                    </div>
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>

                                    <?php endif;?>
                                </div>
                            </div>
                            <?php endif;?>

                            <?php if($evox_branchs_content == '1'):?>
                            <div class="tzBranchs-content">
                                <h3><?php the_title(); ?></h3>
                                <?php
                                the_content();
                                wp_link_pages();
                                ?>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>

                    <div class="tzComments">
                        <?php comments_template( '', true ); ?>
                    </div><!-- end comments -->

                <?php endwhile; endif; ?>
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
