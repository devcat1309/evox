<?php
global $evox_options;
$evox_breadcrumb_options   = ((!isset($evox_options['evox_breadcrumbs_options'])) || empty($evox_options['evox_breadcrumbs_options'])) ? '1' : $evox_options['evox_breadcrumbs_options'];
$evox_bg_image             = ((!isset($evox_options['evox_breadcrumb_image'])) || empty($evox_options['evox_breadcrumb_image'])) ? '' : $evox_options['evox_breadcrumb_image'];
$evox_title                = ((!isset($evox_options['evox_breadcrumbs_title'])) || empty($evox_options['evox_breadcrumbs_title'])) ? '1' : $evox_options['evox_breadcrumbs_title'];
$evox_breadcrumb           = ((!isset($evox_options['evox_breadcrumbs_link'])) || empty($evox_options['evox_breadcrumbs_link'])) ? '1' : $evox_options['evox_breadcrumbs_link'];
$evox_shop_bg_image        = ((!isset($evox_options['evox_shop_breadcrumb_image'])) || empty($evox_options['evox_shop_breadcrumb_image'])) ? '' : $evox_options['evox_shop_breadcrumb_image'];
$evox_shop_detail_bg_image        = ((!isset($evox_options['evox_shop_detail_breadcrumb_image'])) || empty($evox_options['evox_shop_detail_breadcrumb_image'])) ? '' : $evox_options['evox_shop_detail_breadcrumb_image'];

$evox_page_breadcrumb                   = evox_metabox('evox_breadcrumb_page_option','','','default');
$evox_page_breadcrumb_options           = evox_metabox('evox_breadcrumb_page_show','','','1');
$evox_page_bgimage                      = evox_metabox('evox_breadcrumb_page_bgimage','','','');
$evox_page_breadcrumb_title             = evox_metabox('evox_breadcrumb_page_title','','','1');
$evox_page_breadcrumb_path              = evox_metabox('evox_breadcrumb_page_path','','','1');
$evox_page_breadcrumb_padding_top       = evox_metabox('evox_breadcrumb_page_padding_top','','','');
$evox_page_breadcrumb_padding_bottom    = evox_metabox('evox_breadcrumb_page_padding_bottom','','','');

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');


$evox_breadcrumb_display = '';
$evox_breadcrumb_style = '';
$evox_breadcrumb_padding_style = '';
$evox_breadcrumb_title = '';
$evox_breadcrumb_path = '';

if(is_page() && $evox_page_breadcrumb == 'custom'):
    $evox_breadcrumb_display = $evox_page_breadcrumb_options;


    if($evox_page_bgimage != ''):
        foreach( $evox_page_bgimage as $evox_image ):
            $evox_breadcrumb_style = 'style="background-image: url(' . $evox_image["full_url"] .')"';
        endforeach;
    endif;

    if($evox_page_breadcrumb_padding_top != '' || $evox_page_breadcrumb_padding_bottom != ''):
        $evox_breadcrumb_padding_style .= 'style="';

        if($evox_page_breadcrumb_padding_top != ''):
            $evox_breadcrumb_padding_style .= 'padding-top:' . $evox_page_breadcrumb_padding_top . 'px;';
        endif;
        if($evox_page_breadcrumb_padding_bottom != ''):
            $evox_breadcrumb_padding_style .= 'padding-bottom:' . $evox_page_breadcrumb_padding_bottom . 'px;';
        endif;
        $evox_breadcrumb_padding_style .= '"';
    endif;

    $evox_breadcrumb_title = $evox_page_breadcrumb_title;
    $evox_breadcrumb_path = $evox_page_breadcrumb_path;

else:

    $evox_breadcrumb_display = $evox_breadcrumb_options;
    if( class_exists('WooCommerce') && is_woocommerce()){
        if( (is_shop() || is_product_category()) && $evox_shop_bg_image != '' ){
            $evox_breadcrumb_style = 'style="background-image: url(' . $evox_shop_bg_image["url"] .')"';
        }elseif(is_product() && $evox_shop_detail_bg_image != '' ){
            $evox_breadcrumb_style = 'style="background-image: url(' . $evox_shop_detail_bg_image["url"] .')"';
        }else{
            if($evox_bg_image != ''):
                $evox_breadcrumb_style = 'style="background-image: url(' . $evox_bg_image["url"] .')"';
            endif;
        }
    }else{
        if($evox_bg_image != ''):
            $evox_breadcrumb_style = 'style="background-image: url(' . $evox_bg_image["url"] .')"';
        endif;
    }
    $evox_breadcrumb_title = $evox_title;
    $evox_breadcrumb_path = $evox_breadcrumb;

endif;

?>
<?php
if($evox_breadcrumb_display == '1'):
    ?>
    <div class="tz-Breadcrumb <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>" <?php echo $evox_breadcrumb_style;?>>
        <div class="tzOverlayBreadcrumb" <?php echo $evox_breadcrumb_padding_style;?>>
            <div class="container">
                <?php
                if($evox_breadcrumb_title == '1'):
                    ?>
                    <h1 <?php if(is_single()): ?> class="single-breadcrumb" <?php endif; ?>>
                    <span>
                        <?php
                        if( class_exists('WooCommerce') && is_woocommerce()){
                            if(is_product()){
                                the_title();
                            }else{
                                woocommerce_page_title();
                            }
                        }else {
                            if (is_category() || is_tax('tour-language') || is_tax('tour-category') || is_tax('branchs-category')) {
                                single_cat_title();
                            } elseif (is_author()) {
                                the_author();
                            } elseif (is_search()) {
                                echo get_search_query();
                            } elseif (is_tag()) {
                                echo single_tag_title();
                            } elseif (is_home()) {
                                single_post_title();
                            } elseif (is_404()) {
                                echo esc_html__('Error 404 - Page Not Found', 'evox');
                            } elseif (is_archive()) {
                                if (is_day()) :
                                    printf(esc_html__('Archives %s', 'evox'), '<span>' . get_the_date() . '</span>');
                                elseif (is_month()) :
                                    printf(esc_html__('Archives %s', 'evox'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'evox') . '</span>'));
                                elseif (is_year()) :
                                    printf(esc_html__('Archives %s', 'evox'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'evox') . '</span>'));
                                else :
//                                    esc_html_e('Archives', 'evox');
                                    echo post_type_archive_title('', false);
                                endif;
                            } else {
                                single_post_title();
                            }
                        }
                        ?>
                    </span>
                    </h1>
                    <?php
                endif;
                ?>
                <?php
                if($evox_breadcrumb_path == '1'):
                    evox_breadcrumbs_custom();
                endif;
                ?>

            </div><!-- end class container -->
        </div>
    </div><!-- end class tzbreadcrumb -->
<?php endif;?>