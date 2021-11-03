<?php
//Global variable redux
global $evox_options;
$evox_footer_type_select = ((!isset($evox_options['evox_footer_type_select'])) || empty($evox_options['evox_footer_type_select'])) ? '0' : $evox_options['evox_footer_type_select'];
$evox_footer_theme_type = ((!isset($evox_options ["evox_footer_type"])) || empty($evox_options ["evox_footer_type"])) ? '0' : $evox_options ["evox_footer_type"];
$evox_footer_col = ((!isset($evox_options ["evox_footer_column_col"])) || empty($evox_options ["evox_footer_column_col"])) ? '0' : $evox_options ["evox_footer_column_col"];
$evox_footer_widthl = ((!isset($evox_options ["evox_footer_column_w1"])) || empty($evox_options ["evox_footer_column_w1"])) ? '3' : $evox_options ["evox_footer_column_w1"];
$evox_footer_width2 = ((!isset($evox_options ["evox_footer_column_w2"])) || empty($evox_options ["evox_footer_column_w2"])) ? '2' : $evox_options ["evox_footer_column_w2"];
$evox_footer_width3 = ((!isset($evox_options ["evox_footer_column_w3"])) || empty($evox_options ["evox_footer_column_w3"])) ? '4' : $evox_options ["evox_footer_column_w3"];
$evox_footer_width4 = ((!isset($evox_options ["evox_footer_column_w4"])) || empty($evox_options ["evox_footer_column_w4"])) ? '3' : $evox_options ["evox_footer_column_w4"];
$evox_footer_width5 = ((!isset($evox_options ["evox_footer_column_w5"])) || empty($evox_options ["evox_footer_column_w5"])) ? '0' : $evox_options ["evox_footer_column_w5"];
$evox_copyright = ((!isset($evox_options ["evox_footer_copyright_editor"])) || empty($evox_options ["evox_footer_copyright_editor"])) ? '' : $evox_options ["evox_footer_copyright_editor"];
$evox_social = ((!isset($evox_options ["evox_footer_social_editor"])) || empty($evox_options ["evox_footer_social_editor"])) ? '' : $evox_options ["evox_footer_social_editor"];
$evox_footer_logo_type_1 = ((!isset($evox_options ["evox_footer_type_1_logo"]['url'])) || empty($evox_options ["evox_footer_type_1_logo"]['url'])) ? '' : $evox_options ["evox_footer_type_1_logo"]['url'];
$evox_footer_logo_type_2 = ((!isset($evox_options ["evox_footer_type_2_logo"]['url'])) || empty($evox_options ["evox_footer_type_2_logo"]['url'])) ? '' : $evox_options ["evox_footer_type_2_logo"]['url'];
$evox_footer_logo_type_3 = ((!isset($evox_options ["evox_footer_type_3_logo"]['url'])) || empty($evox_options ["evox_footer_type_3_logo"]['url'])) ? '' : $evox_options ["evox_footer_type_3_logo"]['url'];
$evox_footer_link = ((!isset($evox_options ["evox_footer_link"])) || empty($evox_options ["evox_footer_link"])) ? '' : $evox_options ["evox_footer_link"];
$evox_footer_social_facebook = ((!isset($evox_options['evox_footer_social_facebook'])) || empty($evox_options['evox_footer_social_facebook'])) ? '' : $evox_options['evox_footer_social_facebook'];
$evox_footer_social_twitter = ((!isset($evox_options['evox_footer_social_twitter'])) || empty($evox_options['evox_footer_social_twitter'])) ? '' : $evox_options['evox_footer_social_twitter'];
$evox_footer_social_instagram = ((!isset($evox_options['evox_footer_social_instagram'])) || empty($evox_options['evox_footer_social_instagram'])) ? '' : $evox_options['evox_footer_social_instagram'];
$evox_footer_social_youtube = ((!isset($evox_options['evox_footer_social_youtube'])) || empty($evox_options['evox_footer_social_youtube'])) ? '' : $evox_options['evox_footer_social_youtube'];
$evox_footer_social_vimeo = ((!isset($evox_options['evox_footer_social_vimeo'])) || empty($evox_options['evox_footer_social_vimeo'])) ? '' : $evox_options['evox_footer_social_vimeo'];
$evox_footer_social_flickr = ((!isset($evox_options['evox_footer_social_flickr'])) || empty($evox_options['evox_footer_social_flickr'])) ? '' : $evox_options['evox_footer_social_flickr'];

$evox_footer_bg = ((!isset($evox_options['evox_footer_background_type_select'])) || empty($evox_options['evox_footer_background_type_select'])) ? '0' : $evox_options['evox_footer_background_type_select'];
$evox_footer_ovl = ((!isset($evox_options['evox_footer_background_overlay'])) || empty($evox_options['evox_footer_background_overlay'])) ? '0' : $evox_options['evox_footer_background_overlay'];
// Footer Top Option
$evox_footer_page_option = evox_metabox('evox_footer_page_option', '', '', '0');
$evox_footer_page_select = evox_metabox('evox_footer_page_type', '', '', '0');
$evox_footer_page_bgimage = evox_metabox('evox_footer_page_bgimage', '', '', '');
$evox_footer_page_bgcolo = evox_metabox('evox_footer_page_bgcolo', '', '', '');
$evox_footer_page_padding = evox_metabox('evox_footer_page_padding', '', '', '');
// Footer Bottom Option
$evox_footer_bottom_page_option = evox_metabox('evox_footer_bottom_page_option', '', '', '0');
$evox_footer_bottom_page_select = evox_metabox('evox_footer_bottom_page_type', '', '', '0');
$evox_footer_gallery_type = evox_metabox('evox_footer_gallery_type', '', '', '0');
// Footer Type 1 option Metabox
$evox_footer_one_option = evox_metabox('evox_footer_one_option', '', '', '');

$evox_type = evox_metabox('evox_header_page_type', '', '', '');
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

$tz_header_t9 = '';
if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8') || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) {
    $tz_header_t9 = 'tz-mgleft';
}
$evox_footer_type = '';
$evox_left_fb = '';
$evox_left_tw = '';
$evox_left_ins = '';
$evox_left_yt = '';
$evox_left_vm = '';
$evox_left_fl = '';

wp_enqueue_script('owl-carousel');
wp_enqueue_style('owl-carousel');

$tz_bgftov = $tz_bgft = $evox_footer_style = $tz_style = $tz_efect = '';

if (is_page() && $evox_footer_page_option == 'custom'):
    $evox_footer_type = $evox_footer_page_select;
    if ($evox_footer_type == '0'):
        if ($evox_footer_one_option == '1'){
            $tz_efect = '';
        }else{
            $tz_efect = 'tz_sloverlay tz_bgft';
        }
    endif;
else:
    $evox_footer_type = $evox_footer_theme_type;
    if ($evox_footer_type == "0" && $evox_footer_bg == "0" && $evox_footer_ovl == "1") {
        $tz_bgftov = "tz_sloverlay";
    };
    if ($evox_footer_type == '0' && $evox_footer_bg == "0") {
        $tz_bgft = "tz_bgft";
    }
    $tz_efect = $tz_bgftov . ' ' . $tz_bgft;
endif;


$evox_footer_class = '';
if ($evox_footer_type == '1') {
    $evox_footer_class = 'tz-footer-type-2';
} elseif ($evox_footer_type == '2') {
    $evox_footer_class = 'tz-footer-type-3';
    if ($evox_footer_gallery_type == '1') {
        $evox_footer_gallery_type = 'tz_hide';
    }
} elseif ($evox_footer_type == '3') {
    $evox_footer_class = 'tz-footer-type-4';
} else {
    $evox_footer_class = 'tz-footer-type-1';
}

if ($evox_footer_type == '0' || $evox_footer_type == '1') {
    if ($evox_footer_page_bgimage != '' || $evox_footer_page_bgcolo != '' || $evox_footer_page_padding != ''):
        $evox_footer_style .= 'style="';
        if ($evox_footer_page_bgimage != ''):
            foreach ($evox_footer_page_bgimage as $evox_image):
                $evox_footer_style .= 'background-image: url(' . $evox_image["full_url"] . '); background-size: cover;background-position: 50% 50%;';
            endforeach;
        endif;

        if ($evox_footer_page_bgcolo != ''):
            $evox_footer_style .= 'background-color:' . $evox_footer_page_bgcolo . ';';
        endif;

        if ($evox_footer_page_padding != ''):
            $evox_footer_style .= 'padding-bottom:' . $evox_footer_page_padding . ';';
        endif;
        $evox_footer_style .= '"';
    endif;
    if ($evox_footer_one_option != '1'){
        $tz_style = $evox_footer_style;
    }
}

$evox_footer_logo = '';
if ($evox_footer_type == '1') {
    $evox_footer_logo = $evox_footer_logo_type_2;
} elseif ($evox_footer_type == '2') {
    $evox_footer_logo = $evox_footer_logo_type_3;
} else {
    $evox_footer_logo = $evox_footer_logo_type_1;
}

if (is_page() && $evox_footer_bottom_page_option == 'custom'):
    $evox_footer_bottom_type = $evox_footer_bottom_page_select;
else:
    $evox_footer_bottom_type = $evox_footer_type_select;
endif;

if ($evox_footer_bottom_type == 1) {
    $evox_left_fb = $evox_footer_social_facebook;
    $evox_left_tw = $evox_footer_social_twitter;
    $evox_left_ins = $evox_footer_social_instagram;
    $evox_left_yt = $evox_footer_social_youtube;
    $evox_left_vm = $evox_footer_social_vimeo;
    $evox_left_fl = $evox_footer_social_flickr;
}
?>
<?php if (!is_page_template('template-homeslide.php' ) && !is_page_template('template-landingpage.php' )): ?>

    <?php get_template_part('template_inc/inc', 'newsletter'); ?>
    <footer class="tz-footer <?php echo $tz_header_t9;?> <?php echo esc_attr($evox_footer_class)?> <?php echo $tz_efect.' '; if ($evox_footer_bottom_type == '2'): echo "ft_credit";endif;?> <?php if($evox_footer_page_padding != ''){echo 'tz_cstyle';}?>" <?php if($tz_style != 'style=""'):echo $tz_style; endif; ?>>
        <?php if (($evox_footer_type == "0" && $evox_footer_bg == "0") || ($evox_footer_type == '0' && $evox_footer_one_option == '0')): ?>
        <div class="tz_background "></div>
        <div class="tz-footer-content">

            <?php endif; ?>
            <?php
            if (is_active_sidebar("tz-plazart-footer-1") || is_active_sidebar("tz-plazart-footer-2") || is_active_sidebar("tz-plazart-footer-3") || is_active_sidebar("tz-plazart-footer-4") || is_active_sidebar("tz-plazart-footer-5")) {
                ?>
                <?php if ($evox_footer_col != '0'): ?>
                    <div class="tz-footer-top">
                        <div class="container">
                            <div class="row">
                                <?php
                                for ($evox_i = 0; $evox_i < $evox_footer_col; $evox_i++):
                                    $evox_j = $evox_i + 1;
                                    if ($evox_i == 0) {
                                        $evox_col = $evox_footer_widthl;
                                    } elseif ($evox_i == 1) {
                                        $evox_col = $evox_footer_width2;
                                    } elseif ($evox_i == 2) {
                                        $evox_col = $evox_footer_width3;
                                    } elseif ($evox_i == 3) {
                                        $evox_col = $evox_footer_width4;
                                    } elseif ($evox_i == 4) {
                                        $evox_col = $evox_footer_width5;
                                    }

                                    ?>
                                    <div class="col-md-<?php echo esc_attr($evox_col); ?> col-sm-6 footerattr">
                                        <?php
                                        if (is_active_sidebar("tz-plazart-footer-" . $evox_j)):
                                            dynamic_sidebar("tz-plazart-footer-" . $evox_j);
                                        endif;
                                        ?>
                                    </div><!--end class footermenu-->
                                <?php
                                endfor;
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($evox_footer_type == '2') { ?>
                    <?php if ($evox_footer_col != '0'): ?>
                        <?php $evox_partner = $evox_options['opt-gallery']; ?>
                        <?php if ($evox_options['opt-gallery'] != ''): ?>
                            <div class="tz-footer-center <?php echo $evox_footer_gallery_type; ?>">
                                <div class="container">
                                    <div class="partner-slider owl-carousel">
                                        <?php
                                        $evox_partner_array = explode(',', $evox_partner);
                                        foreach ($evox_partner_array as $partner):
                                            ?>
                                            <div class="item">
                                                <?php
                                                echo wp_get_attachment_image($partner, 'full');
                                                ?>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php } ?>
            <?php } ?>

            <?php if ($evox_footer_type == '0' || $evox_footer_type == '1' || $evox_footer_type == '2') { ?>
                <div class="tz-footer-bottom <?php if ($evox_footer_bottom_type == '2'): echo "ft_credit"; elseif ($evox_footer_bottom_type == '1'):echo 'tz_social';endif; ?>">
                    <div class="container">
                        <div class="tz-footer-bottom-box">
                            <div class="row">
                                <?php if ($evox_footer_bottom_type == '0'): ?>
                                    <div class="tz-copyright col-md-4">
                                        <?php if ($evox_copyright != ''):
                                            echo ent2ncr($evox_copyright);
                                        else:
                                            echo esc_html__('Copyright Evox, All Right Reserved', 'evox');
                                        endif;
                                        ?>
                                    </div>
                                    <div class="tz-footer-logo col-md-4">
                                        <?php if ($evox_footer_logo != ''): ?>

                                            <img src="<?php echo esc_attr($evox_footer_logo); ?>"
                                                 alt="<?php echo esc_attr(get_bloginfo('title')) ?>"/>
                                        <?php else: ?>

                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    if ($evox_footer_link == true) {
                                        ?>
                                        <div class="tz-footer-link col-md-4">
                                            <?php

                                            if (has_nav_menu('footer-menu')) {
                                                wp_nav_menu(array(
                                                    'theme_location' => 'footer-menu',
                                                    'menu_class' => '',
                                                    'menu_id' => '',
                                                    'container' => false
                                                ));
                                            }

                                            ?>
                                        </div>
                                    <?php } ?>
                                <?php elseif ($evox_footer_bottom_type == '1'): ?>

                                    <div class="tz-footer-logo col-md-4">
                                        <?php if ($evox_footer_logo != ''): ?>

                                            <img src="<?php echo esc_attr($evox_footer_logo); ?>"
                                                 alt="<?php echo esc_attr(get_bloginfo('title')) ?>"/>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()) . '/images/logo-2.png'; ?>"
                                                 alt="<?php echo esc_attr(get_bloginfo('title')) ?>"/>
                                        <?php endif; ?>
                                    </div>
                                    <div class="tz-copyright col-md-4">
                                        <?php if ($evox_copyright != ''):
                                            echo ent2ncr($evox_copyright);
                                        else:
                                            echo esc_html__('Copyright Evox, All Right Reserved', 'evox');
                                        endif;
                                        ?>
                                    </div>
                                    <div class="tz-footer-social col-md-4">
                                        <div class="evox-footer-bottom-left-box">

                                            <?php if ($evox_left_fb != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_fb); ?>"
                                                       target="popup">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($evox_left_tw != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_tw); ?>"
                                                       target="popup">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($evox_left_ins != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_ins); ?>"
                                                       target="popup">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($evox_left_yt != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_yt); ?>"
                                                       target="popup">
                                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($evox_left_vm != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_vm); ?>"
                                                       target="popup">
                                                        <i class="fa fa-vimeo" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($evox_left_fl != ''): ?>
                                                <div class="evox-footer-social-item">
                                                    <a href="<?php echo esc_html($evox_left_fl); ?>"
                                                       target="popup">
                                                        <i class="fa fa-flickr" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="tz-copyright_c col-md-4">
                                        <?php if ($evox_copyright != ''):
                                            echo ent2ncr($evox_copyright);
                                        else:
                                            echo esc_html__('Copyright Evox, All Right Reserved', 'evox');
                                        endif;
                                        ?>
                                    </div>
                                    <div class="tz-footer-logo_c col-md-4">
                                        <?php if ($evox_footer_logo != ''): ?>

                                            <img src="<?php echo esc_attr($evox_footer_logo); ?>"
                                                 alt="<?php echo esc_attr(get_bloginfo('title')) ?>"/>
                                        <?php endif; ?>
                                    </div>
                                    <?php $evox_partner = isset($evox_options['opt-gallerys']) ? $evox_options['opt-gallerys'] : ''; ?>
                                    <div class="tz-footer-credit col-md-4">
                                        <?php
                                        $evox_partner_array = explode(',', $evox_partner);
                                        foreach ($evox_partner_array as $partner):
                                            ?>
                                            <div class="item">
                                                <?php
                                                echo wp_get_attachment_image($partner, 'full');
                                                ?>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (($evox_footer_type == "0" && $evox_footer_bg == "0") || ($evox_footer_type == '0' && $evox_footer_one_option == '0')): ?></div><?php endif; ?>
    </footer>
    <div class="tz-form-booking-ajax-content"></div>
    <div class="tz-reviews-ajax-content"></div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
