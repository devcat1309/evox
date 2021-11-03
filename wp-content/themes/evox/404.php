<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');
global $evox_options;
$evox_title      = ((!isset($evox_options['evox_404_title'])) || empty($evox_options['evox_404_title']))? '' : $evox_options['evox_404_title'];
$evox_content    = ((!isset($evox_options['evox_404_editor'])) || empty($evox_options['evox_404_editor']))? '' : $evox_options['evox_404_editor'];

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

?>
<div class="page-404 <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <div class="container error">
        <div class="bug-content">
            <?php if($evox_title != ''):?>
                <h3><?php echo esc_html($evox_title);?></h3>
            <?php endif;?>
            <?php if($evox_content != ''):?>
                <p><?php echo esc_html($evox_content);?></p>
            <?php endif;?>
            <span><?php esc_html_e('404', 'evox');?></span>
            <a class="go-back" href="<?php echo esc_url(home_url('/')); ?>"><?php echo  esc_html__('Go Back Home', 'evox'); ?></a>
        </div>
    </div>
</div>
<?php get_footer(); ?>
