<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu');
//$evox_breadcrumb    = evox_metabox('evox_page_breadcrumb','','','show');
//$evox_row           = evox_metabox('evox_page_row','','','container');
//$evox_paddingTop    = evox_metabox('evox_page_padding_top','','','');
//$evox_paddingBottom = evox_metabox('evox_page_padding_bottom','','','');
//$evox_background_color = evox_metabox('evox_page_backgroud_color','','','');

$evox_row           = evox_metabox('evox_page_general_row','','','container');
$evox_paddingTop    = evox_metabox('evox_page_general_padding_top','','','');
$evox_paddingBottom = evox_metabox('evox_page_general_padding_bottom','','','');
$evox_background_color = evox_metabox('evox_page_general_backgroud_color','','','');

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

//if($evox_breadcrumb == 'show'){
    get_template_part('template_inc/inc','breadcrumb');
//}

$evox_style = '';
if($evox_paddingTop != '' || $evox_paddingBottom != '' || $evox_background_color != '' ):
    $evox_style .= 'style=';
    if($evox_paddingTop != ''):
        $evox_style .= 'padding-top:' . $evox_paddingTop . 'px;';
    endif;

    if($evox_paddingBottom != ''):
        $evox_style .= 'padding-bottom:' . $evox_paddingBottom . 'px;';
    endif;

    if($evox_background_color != ''):
        $evox_style .= 'background-color:' . $evox_background_color . ';';
    endif;
endif;
?>

<div class="tz_page_content <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>" <?php echo esc_attr($evox_style)?>>
    <?php if($evox_row == 'container'){ ?>
    <div class="container">
    <?php } ?>
    <?php
    while (have_posts()) : the_post() ;
        ?>
            <?php
                the_content();
                wp_link_pages() ;
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'evox' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'evox' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            ?>
        <div class="tzComments">
        <?php
        comments_template( '', true ); ?>
        </div><!-- end comments -->
        <?php
    endwhile;
    ?>
    <?php if($evox_row == 'container'){ ?>
    </div><!--End Container -->
    <?php } ?>
</div><!--End Page Content -->
<?php
get_template_part('template_inc/inc','footer');
get_footer();
?>

