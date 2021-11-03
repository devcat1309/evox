<?php
global $evox_options;

/* Header Select Type */
$evox_newsletter_theme_select = ((!isset($evox_options['evox_newsletter_type_select'])) || empty($evox_options['evox_newsletter_type_select'])) ? '0' : $evox_options['evox_newsletter_type_select'];
$evox_newsletter_theme_title = ((!isset($evox_options['evox_newsletter_title'])) || empty($evox_options['evox_newsletter_title'])) ? '0' : $evox_options['evox_newsletter_title'];
$evox_newsletter_theme_subtitle = ((!isset($evox_options['evox_newsletter_subtitle'])) || empty($evox_options['evox_newsletter_subtitle'])) ? '' : $evox_options['evox_newsletter_subtitle'];

$evox_newsletter_page_option = evox_metabox('evox_newsletter_page_option','','','default');
$evox_newsletter_page_type = evox_metabox('evox_newsletter_page_type','','','0');
$evox_newsletter_page_title = evox_metabox('evox_newsletter_page_title','','','');
$evox_newsletter_page_subtitle = evox_metabox('evox_newsletter_page_subtitle','','','');
$evox_newsletter_page_bgimage = evox_metabox('evox_newsletter_page_bgimage','','','');
$evox_newsletter_page_bgcolo = evox_metabox('evox_newsletter_page_bgcolo','','','');

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

$evox_bg_image = $evox_title = $evox_newsletter_type = $evox_newsletter_style = $evox_newsletter_title = $evox_newsletter_subtitle = $evox_breadcrumb = $evox_page_breadcrumb_title = $evox_page_breadcrumb_path = $evox_newsletter_backfround = '';

if(is_page() && $evox_newsletter_page_option == 'custom'):

    $evox_newsletter_type = $evox_newsletter_page_type;
    $evox_newsletter_title = $evox_newsletter_page_title;
    $evox_newsletter_subtitle = $evox_newsletter_page_subtitle;

    if($evox_newsletter_page_bgimage != '' || $evox_newsletter_page_bgcolo != ''):
        $evox_newsletter_style .= 'style="background-size: cover;background-position: center;';
        if($evox_newsletter_page_bgimage != ''):
            foreach( $evox_newsletter_page_bgimage as $evox_image ):
                $evox_newsletter_style .= 'background-image: url(' . $evox_image["full_url"] .');';
            endforeach;
        endif;

        if($evox_newsletter_page_bgcolo != ''):
            $evox_newsletter_style .= 'background-color:' . $evox_newsletter_page_bgcolo .';';
        endif;

        $evox_newsletter_style .= '"';
    endif;

    $evox_breadcrumb_title = $evox_page_breadcrumb_title;
    $evox_breadcrumb_path = $evox_page_breadcrumb_path;

else:
    $evox_newsletter_style = '';
    $evox_newsletter_type = $evox_newsletter_theme_select;
    $evox_newsletter_title = $evox_newsletter_theme_title;
    $evox_newsletter_subtitle = $evox_newsletter_theme_subtitle;
    $evox_newsletter_backfround = "Tz_background";
    if($evox_bg_image != ''):
        $evox_breadcrumb_style = 'style="background-image: url(' . $evox_bg_image["url"] .')"';
    endif;
    $evox_breadcrumb_title = $evox_title;
    $evox_breadcrumb_path = $evox_breadcrumb;

endif;

$evox_newsletter_class = '';
$evox_newsletter_col_class = '';

if($evox_newsletter_type == '0'){
    $evox_newsletter_class = 'tz-newsletter-type-1';
    $evox_newsletter_col_class = 'col-md-6';
}elseif($evox_newsletter_type == '1'){
    $evox_newsletter_class = 'tz-newsletter-type-2';
    $evox_newsletter_col_class = 'col-md-12';
}elseif($evox_newsletter_type == '3'){
    $evox_newsletter_class = 'tz-newsletter-type-3';
    $evox_newsletter_col_class = 'col-md-12';
}elseif($evox_newsletter_type == '4'){
    $evox_newsletter_class = 'tz-newsletter-type-4';
    $evox_newsletter_col_class = 'col-md-12';
}

?>
<?php if(shortcode_exists('newsletter_form') && ( $evox_newsletter_type == '0' || $evox_newsletter_type == '1' || $evox_newsletter_type == '4' || $evox_newsletter_type == '3') ) { ?>
    <div class="tz-newsletter <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?> <?php echo esc_attr($evox_newsletter_class)?> <?php echo $evox_newsletter_backfround;?>" <?php echo $evox_newsletter_style;?>>
        <div class="container">
            <div class="row tz-newsletter-flex">
                <div class="newsletter-left <?php echo esc_attr($evox_newsletter_col_class)?>">
                    <?php if($evox_newsletter_type == '0'):?>
                        <div class="news-icon">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                    <?php endif;?>
                    <div class="news-content">
                        <h3 class="new-title">
                            <?php echo balanceTags($evox_newsletter_title); ?>
                        </h3>
                        <?php if ($evox_newsletter_subtitle != ''): ?>
                            <p><?php echo balanceTags($evox_newsletter_subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="newsletter-right <?php echo esc_attr($evox_newsletter_col_class)?>">
                    <?php
                    echo do_shortcode('[newsletter_form button_label="'. esc_html__('Submit','evox') .'"][newsletter_field label="'. esc_html__('email','evox') .'" name="email" placeholder="'. esc_html__('Your email..','evox') .'"][/newsletter_form]');
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
